@extends('../layout/body')
@section('contenu')
<div class="container-fluid">
    <div class="registration-form">
        <div align="center">  
            <a href="{{route('profil', Auth::user()->id) }}" class="btn btn-primary" align="center"><i class="fas fa-user"></i>&nbspMon Compte</a>
            <br>
            <br>
            <h3>MODIFICATION DES INFORMATIONS</h3>            
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form  action="{{ route('profil.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-icon">
                <span><i class="fas fa-user"></i></span>
            </div>
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" class="form-control item" name="nom" value="{{ $user->nom }}"  placeholder="Nom" required>
                @error('nom')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="prenom" value="{{ $user->prenom }}" placeholder="Prenom" required>
                @error('prenom')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control item" name="email"value="{{ $user->email }}" placeholder="Adresse E-mail" required>
                @error('email')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="compagnie" value="{{ $user->compagnie }}" placeholder="Compagnie" required>
                @error('compagnie')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="poste" value="{{ $user->poste }}"placeholder="poste" required>
                @error('poste')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="telephone" value="{{ $user->telephone }}" placeholder="Numero telephonique" required>
                @error('telephone')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="ville" value="{{ $user->ville }}" placeholder="ville" required>
                @error('ville')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="quartier" value="{{ $user->quartier }}" placeholder="quartier" required>
                @error('quartier')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div>
                <label  for="description">Description</label>
                </div>
                <textarea class="form-control item" name="description" value="" placeholder="" required>{{ $user->description }}</textarea>
                
                @error('description')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Genre :</label>
                <select class="form-control "  value="{{ $user->genre }}" name="genre"> 
                    <option  value="Masculin" > Homme </option>
                    <option value="Feminin" > Femme </option>
                    <option value="Autre" > Autre </option>
                </select>
                @error('genre')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror           
            </div>
            <div class="form-group">
                <img src="{{ Storage::url($user->photo) }}" height="200" width="200" alt="" />
            </div>
            <div class="form-group">
                <button type="Submit" method="POST" action="" class="btn btn-primary">Modifier</button>
            </div>
            
        </form>
    </div>
</div>
 @endsection