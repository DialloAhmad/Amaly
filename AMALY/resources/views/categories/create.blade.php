@extends('layout/body')
@section('contenu')

    <div class="container mt-2">
    
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <div class="pull-left mb-2">
                <h2 style="margin-left: 20px;">Ajouter une catégorie</h2>
            </div>
        </div>
    </div><br>
    
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
   
    <form action="{{ route('categories.store') }}" method="POST" >
        @csrf

        <div class="row" >
            <div class="col-xs-8 col-sm-8 col-md-8"  style="margin-left:15px;">
                <div class="form-group">
                    <strong>Nom de la catégorie:</strong>
                    <input type="text" name="nom" class="form-control" placeholder="Nom de la catégories">
                    @error('nom')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <a class="btn btn-secondary" href="{{ route('categories.index') }}" style="margin-left:15px;"> Annuler</a>
                <button type="submit" class="btn btn-primary ml-3">Envoyer</button>
            </div>
        </div>
    </form>
@endsection