@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="saver_id">{{ trans('cruds.transaction.fields.saver') }}</label>
                <select class="form-control select2 {{ $errors->has('saver') ? 'is-invalid' : '' }}" name="saver_id" id="saver_id" required>
                    @foreach($savers as $id => $entry)
                        <option value="{{ $id }}" {{ old('saver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('saver'))
                    <span class="text-danger">{{ $errors->first('saver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.saver_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_method_id">{{ trans('cruds.transaction.fields.payment_method') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method_id" id="payment_method_id" required>
                    @foreach($payment_methods as $id => $entry)
                        <option value="{{ $id }}" {{ old('payment_method_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shares_quantity">{{ trans('cruds.transaction.fields.shares_quantity') }}</label>
                <input class="form-control {{ $errors->has('shares_quantity') ? 'is-invalid' : '' }}" type="number" name="shares_quantity" id="shares_quantity" value="{{ old('shares_quantity', '') }}" step="1">
                @if($errors->has('shares_quantity'))
                    <span class="text-danger">{{ $errors->first('shares_quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.shares_quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.transaction.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01">
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection