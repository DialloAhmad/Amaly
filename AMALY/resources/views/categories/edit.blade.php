@extends('layout/body')
@section('contenu')


<div class="container mt-2">
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <div class="pull-left">
                <h2 style="margin-left: -15px;" >Modifier une catégorie </h2>
            </div>
    </div><br>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

    <form action="{{ route('categories.update', $categories->id) }}" method="POST" style="margin-left: 20px;">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Nom de la catégorie:</strong>
                    <input type="text" name="titre" value="{{ old('nom', $categories->nom) }}" class="form-control" placeholder="Titre du cas">
                    @error('titre')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <a class="btn btn-secondary" href="{{ route('categories.index') }}" enctype="multipart/form-data" style="margin-left: 15px;">Annuler</a>
                <input type="submit" class="btn btn-primary ml-3" value="Enregistrer">
            </div>
        </div>
    </form>
</div>

@endsection