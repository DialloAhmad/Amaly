@extends('../layout/body')
@section('contenu')
<div class="container-fluid">
        <div align="center">  
            <a href="{{route('profil', Auth::user()->id) }}" class="btn btn-primary" align="center"><i class="fas fa-user"></i>&nbspMon Compte</a>
            <br>
            <br>
            <h3>MODIFICATION DE LA PHOTO DE PROFIL</h3> 
            <p>Laissez le champ de selection de photo vide si vous ne voulez pas avoir de photo de profil.</p>     
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 col-lg-12 d-flex">  
                        <div  style="width: 20px; height: 300px;"  class="img d-flex align-self-stretch  col-md-4">
                            <img style="width: 100%; height: 100%;" src="{{ Storage::url($user->photo) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-md-4">
                            <form  action="{{ route('profil.updateImage',$user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="file" class="form-control item" name="photo">
                                    @error('photo')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="Submit" method="POST" action="" class="btn btn-primary">Modifier</button>
                                </div>            
                            </form> 
                        </div>
                        </div>
                    </div>
                </div>
</div>
 @endsection