@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Se Connecter') }}</h1>
                  </div>
                <div class="card-body p-0">
                    <form method="POST" class="user" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            
                                <input id="email" type="email" placeholder="Adresse E-mail" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            
                                <input id="password" type="password" placeholder="Mot de Passe" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se Souvenir De moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Se Connecter') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot De Passe Oublié?') }}
                                    </a>
                                @endif
                            </div>
                    </form>
                </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
