@extends('layouts.admin')
@section('content')
@can('saver_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.savers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.saver.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Saver', 'route' => 'admin.savers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.saver.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Saver">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.firstname') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.secondname') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.profilepic') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.phone_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.phone_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.account_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.savings') }}
                        </th>
                        <th>
                            {{ trans('cruds.saver.fields.shares') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($savers as $key => $saver)
                        <tr data-entry-id="{{ $saver->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $saver->id ?? '' }}
                            </td>
                            <td>
                                {{ $saver->firstname ?? '' }}
                            </td>
                            <td>
                                {{ $saver->secondname ?? '' }}
                            </td>
                            <td>
                                {{ $saver->email ?? '' }}
                            </td>
                            <td>
                                @if($saver->profilepic)
                                    <a href="{{ $saver->profilepic->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $saver->profilepic->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $saver->phone_1 ?? '' }}
                            </td>
                            <td>
                                {{ $saver->phone_2 ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Saver::TYPE_SELECT[$saver->type] ?? '' }}
                            </td>
                            <td>
                                {{ $saver->account_number ?? '' }}
                            </td>
                            <td>
                                {{ $saver->savings ?? '' }}
                            </td>
                            <td>
                                {{ $saver->shares ?? '' }}
                            </td>
                            <td>
                                @can('saver_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.savers.show', $saver->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('saver_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.savers.edit', $saver->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('saver_delete')
                                    <form action="{{ route('admin.savers.destroy', $saver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('saver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.savers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Saver:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection