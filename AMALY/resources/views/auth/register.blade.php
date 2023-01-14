@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card">
                

                <div class="card-body  p-0">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Inscription</h1>
                              </div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                             <input id="nom" placeholder="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
        
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                          <div class="col-sm-6">
                            <input id="prenom" placeholder="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
        
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <input id="email" type="email" placeholder="Adresse E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                             <input id="compagnie" type="text" placeholder="compagnie" class="form-control @error('compagnie') is-invalid @enderror" name="compagnie" value="{{ old('compagnie') }}" required autocomplete="compagnie" autofocus>
        
                                        @error('compagnie')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                          <div class="col-sm-6">
                            <input id="telephone" type="text" placeholder="telephone" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
        
                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                        </div>
                        <div class="form-group">
                           <textarea  class="form-control @error('description') is-invalid @enderror" name="description" value="" placeholder="Description" required autocomplete="description">{{ old('description') }}</textarea>
                                    @error('description')
                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                              <input id="poste" placeholder="poste" type="text" class="form-control @error('poste') is-invalid @enderror" name="poste" value="{{ old('poste') }}" required autocomplete="poste" autofocus>
        
                                        @error('poste')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                          <div class="col-sm-6">
                            <input id="ville" type="text" placeholder="ville" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>
        
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <div>
                             <input id="quartier" placeholder="quartier" type="text" class="form-control @error('quartier') is-invalid @enderror" name="quartier" value="{{ old('quartier') }}" required autocomplete="quartier" autofocus>
        
                                        @error('quartier')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="col-sm-6">
                              <label for="genre" class="col-sm-4 col-form-label text-md-right">{{ __('Genre') }}</label>
                                    <div class="col-sm-8" style="float: right;">
                                    <select class="form-control  @error('genre') is-invalid @enderror"  name="genre"> 
                                        <option  value="Masculin" > Homme </option>
                                        <option value="Feminin" > Femme </option>
                                        <option value="Autre" > Autre </option>
                                    </select>
                                    </div>
                                    @error('genre')
                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                          </div>
                          <div class="col-sm-6">
                            <label for="profil" class="col-sm-4 col-form-label text-md-right">{{ __('Profil') }}</label>
                                    <div class="col-sm-8" style="float: right;" >
                                    <select class="form-control @error('profil') is-invalid @enderror"  name="profil"> 
                                        <option value="ONG" > ONG </option>
                                        <option value="Administrateur" > Administrateur </option>
                                        <option value="Demandeur" > Demandeur </option>
                                    </select>
                                    </div>
                                    @error('profil')
                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror 
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                             <input id="password" placeholder="Mot de Passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          </div>
                          <div class="col-sm-6">
                             <input id="password-confirm" placeholder="Confirmation de mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                             @error('password')
                             <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                             @enderror
                          </div>
                        </div>  
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Inscription') }}
                                </button>
                            </div>
                        </div>
                        <br><br>             
                      </form>
                    </div>  
                </div>
            </div>
        </div>
</div>
@endsection
