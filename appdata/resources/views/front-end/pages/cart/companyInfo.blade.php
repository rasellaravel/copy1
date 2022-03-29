<div class="igo-checkout-title mb-4">
    <h4 class="igo-lg-title font-size-16">@lang('_lan.company_info')</h4>
</div>
<div class="form-row igo-box1">
    <div class="form-group col-md-6">
        <input type="text" class="form-control @error('company_name') is-invalid @enderror"
        placeholder="@lang('_lan.company_name')" name="company_name" maxlength="15"
        value="{{ $errors->any() ? old('company_name') : (auth()->check() ? auth()->user()->userInfo->company_name : old('company_name')) }}">
        @error('company_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control @error('company_id') is-invalid @enderror"
        placeholder="@lang('_lan.company_id')" name="company_id" maxlength="15"
        value="{{ $errors->any() ? old('company_vat') : (auth()->check() ? auth()->user()->userInfo->company_id : old('company_id')) }}">
        @error('company_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control @error('company_vat') is-invalid @enderror"
        placeholder="@lang('_lan.company_vat')" name="company_vat" maxlength="15"
        value="{{ $errors->any() ? old('company_vat') : (auth()->check() ? auth()->user()->userInfo->company_vat : old('company_vat')) }}">
        @error('company_vat')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control @error('company_address') is-invalid @enderror"
        placeholder="@lang('_lan.company_address')" name="company_address" maxlength="15"
        value="{{ $errors->any() ? old('company_address') : (auth()->check() ? auth()->user()->userInfo->company_address : old('company_address')) }}">
        @error('company_address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-12">
        <textarea type="text" class="form-control" placeholder="@lang('_lan.others')"
        name="others">{{ old('others') }}</textarea>
    </div>
</div>    