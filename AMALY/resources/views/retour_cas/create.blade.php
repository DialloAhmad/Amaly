@extends('layout/body')
@section('contenu')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 bg-info rounded text-white">

            <h1 align="center";>Création d'un retour de cas </h1><br>

            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('retour_cas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group rounded">
                            <label ><strong>Choisissez le cas à retourner</strong></label>
                            <select class="form-control item" name="cas_id">
                                @foreach($cas as $cas)
                                    <option value="{{ $cas->id }}">{{ $cas->titre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group rounded">
                            <strong>Titre :</strong>
                            <input type="text" name="titre" class="form-control item" value="{{ old('titre') }}" placeholder="Titre" >
                            @error('titre')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group rounded">
                            <strong>Description :</strong>
                            <textarea  class="form-control item" name="description" value="{{ old('description') }}" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group rounded">
                            <strong>Ville :</strong>
                            <input type="text" name="ville" class="form-control item" value="{{ old('ville') }}" placeholder="Ville" >
                            @error('ville')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group rounded">
                            <strong>Quartier :</strong>
                            <input type="text" name="quartier" class="form-control item" value="{{ old('quartier') }}" placeholder="Quartier" >
                            @error('titre')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group rounded">
                            <strong>Image descriptive  :</strong>
                            <input type="file" name="image1" class="form-control item" placeholder="Image" value="{{ old('image1') }}">
                            @error('image1')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group rounded">
                            <strong>Image descriptive  :</strong>
                            <input type="file" name="image2" class="form-control item" placeholder="Image" value="{{ old('image2') }}">
                            @error('image2')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group rounded">
                            <strong>Image descriptive  :</strong>
                            <input type="file" name="image3" class="form-control item" placeholder="Image" value="{{ old('image3') }}">
                            @error('image3')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group rounded">
                            <strong>Image descriptive  :</strong>
                            <input type="file" name="image4" class="form-control item" placeholder="Image" value="{{ old('image4') }}">
                            @error('image4')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <a class="btn btn-secondary" href="{{ route('cas.index') }}" enctype="multipart/form-data" style="margin-left:30px;"> Annuler</a>
                        <button type="submit" class="btn btn-success ml-3">Publier</button>
                        </div>
                    <div class="col-md-2"></div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div> 
@endsection