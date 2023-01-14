@extends('../layout/body')
@section('contenu')
<div class="container-fluid">
    <div class="registration-form">
        <div align="center">  
            <a href="{{route('users.index') }}" class="btn btn-primary" align="center"><i class="fas fa-users"></i>Liste des Utilisateurs</a>
            <br><br>
            <h3 >INSCRIPTION</h3>          
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form  action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            <div class="form-icon">
                <span><i class="fas fa-user"></i></span>
            </div>
            @csrf
            <div class="form-group">
                <input type="text" class="form-control item" name="nom" value="{{ old('nom') }}"  placeholder="Nom" required>
                @error('nom')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="prenom" value="{{ old('prenom') }}" placeholder="Prenom" required>
                @error('prenom')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control item" name="email" value="{{ old('email') }}" placeholder="Adresse E-mail" required>
                @error('email')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="compagnie" value="{{ old('compagnie') }}" placeholder="Compagnie" required>
                @error('compagnie')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="poste" value="{{ old('poste') }}" placeholder="poste" required>
                @error('poste')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="telephone" value="{{ old('telephone') }}" placeholder="Numero telephonique" required>
                @error('telephone')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="ville" value="{{ old('ville') }}" placeholder="ville" required>
                @error('ville')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="quartier" value="{{ old('quartier') }}" placeholder="quartier" required>
                @error('quartier')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div>
                <label  for="description">Description</label>
                </div>
                <textarea  class="form-control item" name="description" value="" placeholder="" required>
                    {{ old('description') }}
                </textarea>
                @error('description')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Genre :</label>
                <select class="form-control "  name="genre"> 
                    <option  value="Masculin" > Homme </option>
                    <option value="Feminin" > Femme </option>
                    <option value="Autre" > Autre </option>
                </select>
                @error('genre')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror           
            </div>
            <div class="form-group">
                <label for="">Profil :</label>
                <select class="form-control "  name="profil"> 
                    <option  value="Administrateur" > Admin </option>
                    <option value="ONG" > ONG </option>
                    <option value="Demandeur" > Demandeur </option>
                </select>
                @error('profil')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror           
            </div>
            <div class="form-group">
                <label for="photo">photo :</label>
                <input type="file" class="form-control item" value="{{ old('photo') }}" name="photo">
                @error('photo')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <img src="{{ Storage::url($user->photo) }}" height="200" width="200" alt="" />
            </div> --}}
            <div class="form-group">
                <input type="password" class="form-control item" value="{{ old('password') }}" name="password" placeholder="Mot De Passe" required>
                @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password_confirm" placeholder="Confirmation Mot De Passe" required>
                @error('password_confirm')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="Submit" method="POST" action="" class="btn btn-primary">Creer Un Compte</button>
            </div>
        </form>
    </div>
</div>
 @endsection