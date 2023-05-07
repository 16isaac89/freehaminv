<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSaverRequest;
use App\Http\Requests\UpdateSaverRequest;
use App\Http\Resources\Admin\SaverResource;
use App\Models\Saver;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaverApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('saver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SaverResource(Saver::all());
    }

    public function store(StoreSaverRequest $request)
    {
        $saver = Saver::create($request->all());

        if ($request->input('profilepic', false)) {
            $saver->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilepic'))))->toMediaCollection('profilepic');
        }

        return (new SaverResource($saver))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Saver $saver)
    {
        abort_if(Gate::denies('saver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SaverResource($saver);
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

        return (new SaverResource($saver))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Saver $saver)
    {
        abort_if(Gate::denies('saver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saver->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
