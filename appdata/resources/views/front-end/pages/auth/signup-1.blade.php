<div class="row mb-40">
    <div class="col-lg-6 offset-lg-3">
        <div class="igo-cont-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group ">
                    <label for="name" class="igo-normal-title2">@lang('_lan.name') <span
                            class="text-danger">*</span></label>

                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="@lang('_lan.name')" autocomplete="name" id="name"
                        autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group ">
                    <label for="email" class="igo-normal-title2">@lang('_lan.email') <span
                            class="text-danger">*</span></label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="@lang('_lan.email')"
                        autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group ">
                    <label for="password" class="igo-normal-title2">@lang('_lan.password') <span
                            class="text-danger">*</span></label>

                    <input placeholder="@lang('_lan.password')" id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        autocomplete="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="confirm_password" class="igo-normal-title2">@lang('_lan.confirm_password')</label>

                    <input placeholder="@lang('_lan.confirm_password')" id="confirm_password" type="password"
                        class="form-control" name="password_confirmation" autocomplete="password_confirmation">
                </div>
                <p class="pt-10">
                    <button type="submit" class="igo-btn igo-btn-one border-0">@lang('_lan.register')</button>
                </p>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="igo-theme-color">@lang('_lan.all_ready_have_account')</a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
