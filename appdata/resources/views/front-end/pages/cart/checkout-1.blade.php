<div class="row">
    <div class="col-lg-7 last-mobile">
        <div class="igo-checkout-auth-wrap mt-20">
            @if (!auth()->check())
            @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="igo-checkout-title mb-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_login" id="have_account" value="1"
                    {{ $errors->has('tab') && $errors->first('tab') == 1 ? 'checked' : '' }}>
                    <label class="form-check-label igo-md-title-2"
                    for="have_account">@lang('_lan.have_account')</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_login" id="create_account" value="2"
                    {{ $errors->has('tab') ? ($errors->has('tab') && $errors->first('tab') == 2 ? 'checked' : '') : 'checked' }}>
                    <label class="form-check-label igo-md-title-2"
                    for="create_account">@lang('_lan.create_new_account')</label>
                </div>
            </div>

            <div class="igo-billing-login-form mt-20 {{ $errors->has('tab') ? ($errors->has('tab') && $errors->first('tab') == 1 ? '' : 'd-none') : 'd-none' }}"
                id="loginFormShow">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="@lang('_lan.email')">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="@lang('_lan.password')">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">@lang('_lan.login')</button>
                </form>
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1" class="igo-md-title-2">@lang('_lan.country'):</label>
            <select class="form-control" onchange="filterCartData(event)" id="shipping_country">
                @foreach ($countries as $country)
                <option value="{{ $country->id }}"
                    {{ $country->id == $country_id ? 'selected' : '' }}>
                    {{ $country->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1" class="igo-md-title-2">@lang('_lan.shipping_type'):</label>
            <select class="form-control ship1_2" onchange="filterCartData(event)" id="shipping_type">
                @foreach ($shipping_types as $key => $type)
                <option value="{{ $type->id }}" {{ $type->id == $type_id ? 'selected' : '' }}>
                    {{ $type->type }}
                </option>
                @endforeach
            </select>
        </div>
        <div
        class="igo-checkout-billing mt-4 {{ $errors->has('tab') ? ($errors->has('tab') && $errors->first('tab') == 2 ? '' : 'd-none') : '' }}">
        <div class="igo-checkout-title mb-4">
            <h4 class="igo-lg-title font-size-16">@lang('_lan.billing_details')</h4>
        </div>
        <div class="igo-billing-form">
            <form method="post" action="{{ url('paysera/payment') }}" id="paymentForm">
                @csrf
                <input type="hidden" name="payment_method" value="paysera">
                <input type="hidden" name="shipping_type" value="{{ $type_name }}">
                <input type="hidden" name="country_id" value="{{ $country_id }}">
                <input type="hidden" name="type_id" value="{{ $type_id }}">
                <div class="form-row igo-box1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="@lang('_lan.first_name')" name="name"
                        value="{{ $errors->any() ? old('name') : (auth()->check() ? auth()->user()->name : old('name')) }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                        placeholder="@lang('_lan.last_name')" name="lastname"
                        value="{{ $errors->any() ? old('lastname') : (auth()->check() ? auth()->user()->userInfo->last_name : old('lastname')) }}">
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group igo-box1">
                    <input type="text" class="form-control @error('st_address') is-invalid @enderror"
                    placeholder="@lang('_lan.street_address')" name="st_address"
                    value="{{ $errors->any() ? old('st_address') : (auth()->check() ? auth()->user()->userInfo->billing_strt_address : old('st_address')) }}">
                    @error('st_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group igo-box1">
                    <input type="text" class="form-control @error('apartment') is-invalid @enderror"
                    placeholder="@lang('_lan.apartment')" name="apartment"
                    value="{{ $errors->any() ? old('apartment') : (auth()->check() ? auth()->user()->userInfo->billing_apartment : old('apartment')) }}">
                    @error('apartment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group igo-box1">
                    <input type="text" class="form-control @error('town') is-invalid @enderror"
                    placeholder="@lang('_lan.town')" name="town"
                    value="{{ $errors->any() ? old('town') : (auth()->check() ? auth()->user()->userInfo->billing_town : old('town')) }}">
                    @error('town')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group igo-box1">
                    <input type="text" class="form-control @error('district') is-invalid @enderror"
                    placeholder="@lang('_lan.district')" name="district"
                    value="{{ $errors->any() ? old('district') : (auth()->check() ? auth()->user()->userInfo->billing_district : old('district')) }}">
                    @error('district')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-row igo-box1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('country') is-invalid @enderror"
                        placeholder="@lang('_lan.country')" name="country" value="{{ $country_name }}"
                        readonly>
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('post_code') is-invalid @enderror"
                        placeholder="@lang('_lan.post_code')" name="post_code"
                        value="{{ $errors->any() ? old('post_code') : (auth()->check() ? auth()->user()->userInfo->billing_post_code : old('post_code')) }}">
                        @error('post_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group igo-box1">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="@lang('_lan.phone')" name="phone" maxlength="15"
                    value="{{ $errors->any() ? old('phone') : (auth()->check() ? auth()->user()->userInfo->phone : old('phone')) }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @if (!auth()->check())
                <div class="form-row igo-box1">
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control @error('remail') is-invalid @enderror"
                        placeholder="@lang('_lan.email')" value="{{ old('remail') }}"
                        autocomplete="email" name="remail">
                        @error('remail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" class="form-control @error('rpassword') is-invalid @enderror"
                        placeholder="@lang('_lan.password')" name="rpassword" autocomplete="password">
                        @error('rpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" class="form-control" name="rpassword_confirmation"
                        placeholder="@lang('_lan.confirm_password')" autocomplete="password_confirmation">
                    </div>
                </div>
                @endif
                <div class="form-group igo-box1">
                    <textarea type="text" class="form-control" placeholder="@lang('_lan.note')"
                    name="order_note">{{ old('order_note') }}</textarea>
                </div>

                {{-- start second form --}}

                <div class="igo-checkout-title mb-4 igo-box2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input ship_3" type="radio" name="ship_3" value="Įrašykite jums patogų LPEXPRESS paštomatą" checked>
                        <label class="form-check-label igo-md-title-2"
                        for="have_account">Įrašykite jums patogų LPEXPRESS paštomatą</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 igo-box2">
                        <input type="text" class="form-control name2 @error('Vardas_Pavardė') is-invalid @enderror"
                        placeholder="Vardas Pavardė" name="Vardas_Pavardė"
                        value="{{ $errors->any() ? old('Vardas_Pavardė') : (auth()->check() ? auth()->user()->name : old('Vardas_Pavardė')) }}">
                        @error('Vardas_Pavardė')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row igo-box2">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control post_machine @error('Paštomatas') is-invalid @enderror"
                        placeholder="Paštomatas" name="Paštomatas"
                        value="{{ $errors->any() ? old('Paštomatas') : (auth()->check() ? auth()->user()->userInfo->post_machine : old('Paštomatas')) }}">
                        @error('Paštomatas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-row igo-box2">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control phone2 @error('Telefono_numeris') is-invalid @enderror"
                        placeholder="Telefono numeris" name="Telefono_numeris"
                        value="{{ $errors->any() ? old('Telefono_numeris') : (auth()->check() ? auth()->user()->userInfo->phone : old('Telefono_numeris')) }}">
                        @error('Telefono_numeris')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control remail2 @error('El_Paštas') is-invalid @enderror"
                        placeholder="El. Paštas" name="El_Paštas"
                        value="{{ $errors->any() ? old('El_Paštas') : (auth()->check() ? auth()->user()->email : old('El_Paštas')) }}">
                        @error('El_Paštas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @if (!auth()->check())
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control rpassword2 @error('set_password') is-invalid @enderror"
                        placeholder="password" name="set_password" autocomplete="password">
                        @error('set_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @endif
                </div>   
                {{-- end second form --}}
                @include('front-end.pages.cart.companyInfo')





                @if ($errors->has('payment_error') && $errors->first('payment_error') == 1)
                <div class="text-danger mb-2">
                    This shipping country or shipping type not avilable for some selected product.
                </div>
                @endif
            </form>
        </div>
    </div>
</div>


<div class="col-lg-5">
    <div class="igo-checkout-right-wrap mt-3" id="cart_partial">
        @include('front-end.pages.cart.cart-partial')
    </div>
    <div class="igo-payment-method-wrap mt-4">
        <div class="igo-checkout-title">
            <h4 class="igo-lg-title font-size-16">@lang('_lan.payment_method')</h4>
        </div>
        <div class="igo-payment-method">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="igo-pay-item-1 active is_payment" igo-payment="paysera">
                                <div class="igo-img-p">
                                    <div class="igo-img-c">
                                        <img src="{{ asset('assets/img/paysera.png') }}" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="igo-pay-item-1 is_payment" igo-payment="stripe">
                                <div class="igo-img-p">
                                    <div class="igo-img-c">
                                        <img src="{{ asset('assets/img/Stripe.png') }}" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-4 mt-md-3 ch-div {{ $errors->has('tab') ? ($errors->has('tab') && $errors->first('tab') == 2 ? '' : 'd-none') : '' }}">
    <button type="submit" class="btn btn-success border-0" id="paymentBtn">@lang('_lan.process_to_checkout')</button>
</div>
</div>