<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySaverRequest;
use App\Http\Requests\StoreSaverRequest;
use App\Http\Requests\UpdateSaverRequest;
use App\Models\Saver;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SaverController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('saver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $savers = Saver::with(['media'])->get();

        return view('admin.savers.index', compact('savers'));
    }

    public function create()
    {
        abort_if(Gate::denies('saver_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.savers.create');
    }

    public function store(StoreSaverRequest $request)
    {
        $saver = Saver::create($request->all());

        if ($request->input('profilepic', false)) {
            $saver->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilepic'))))->toMediaCollection('profilepic');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $saver->id]);
        }

        return redirect()->route('admin.savers.index');
    }

    public function edit(Saver $saver)
    {
        abort_if(Gate::denies('saver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.savers.edit', compact('saver'));
    }

    public function update(UpdateSaverRequest $request, Saver $saver)
    {
        $saver->update($request->all());

        if ($request->input('profilepic', false)) {
            if (! $saver->profilepic || $request->input('profilepic') !== $saver->profilepic->file_name) {
                if ($saver->profilepic) {
                    $saver->profilepic->delete();
                }
                $saver->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilepic'))))->toMediaCollection('profilepic');
            }
        } elseif ($saver->profilepic) {
            $saver->profilepic->delete();
        }

        return redirect()->route('admin.savers.index');
    }

    public function show(Saver $saver)
    {
        abort_if(Gate::denies('saver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saver->load('saverTransactions');

        return view('admin.savers.show', compact('saver'));
    }

    public function destroy(Saver $saver)
    {
        abort_if(Gate::denies('saver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saver->delete();

        return back();
    }

    public function massDestroy(MassDestroySaverRequest $request)
    {
        $savers = Saver::find(request('ids'));

        foreach ($savers as $saver) {
            $saver->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('saver_create') && Gate::denies('saver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Saver();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
