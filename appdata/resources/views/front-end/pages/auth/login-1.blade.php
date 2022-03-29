<div class="row mb-40">
    <div class="col-lg-7">
        <div class="igo-cont-form {{ session()->get('is_screen') == 'web' ? 'mr-5' : '' }}">
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="igo-normal-title2">@lang('_lan.email')</label>

                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="@lang('_lan.email')" value="{{ old('email') }}" autocomplete="email" autofocus
                        name="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        placeholder="@lang('_lan.password')" autocomplete="current-password" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-check d-flex justify-content-between">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">@lang('_lan.remember_me')</label>
                    <p>
                        <button type="submit" class="igo-btn igo-btn-one border-0">@lang('_lan.signin')</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-5 mt-5">
        <div class="igo-lgin-right">
            <h1 class="igo-lg-title-2">@lang('_lan.not_registered_member')</h1>
            <a href="{{ route('register') }}" class="igo-theme-color">@lang('_lan.register_new_account')</a>
        </div>
    </div>
</div>
