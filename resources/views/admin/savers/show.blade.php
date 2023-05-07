@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.saver.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.savers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.id') }}
                        </th>
                        <td>
                            {{ $saver->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.firstname') }}
                        </th>
                        <td>
                            {{ $saver->firstname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.secondname') }}
                        </th>
                        <td>
                            {{ $saver->secondname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.thirdname') }}
                        </th>
                        <td>
                            {{ $saver->thirdname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.email') }}
                        </th>
                        <td>
                            {{ $saver->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.profilepic') }}
                        </th>
                        <td>
                            @if($saver->profilepic)
                                <a href="{{ $saver->profilepic->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $saver->profilepic->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.phone_1') }}
                        </th>
                        <td>
                            {{ $saver->phone_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.phone_2') }}
                        </th>
                        <td>
                            {{ $saver->phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Saver::TYPE_SELECT[$saver->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.account_number') }}
                        </th>
                        <td>
                            {{ $saver->account_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.savings') }}
                        </th>
                        <td>
                            {{ $saver->savings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.saver.fields.shares') }}
                        </th>
                        <td>
                            {{ $saver->shares }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.savers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#saver_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transaction.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="saver_transactions">
            @includeIf('admin.savers.relationships.saverTransactions', ['transactions' => $saver->saverTransactions])
        </div>
    </div>
</div>

@endsection