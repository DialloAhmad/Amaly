@extends('../layout/body')
@section('contenu')
    <div class="container">
        <div align="center">  
            <a href="{{route('dons.index') }}" class="btn btn-primary" align="center"><i class="fas fa-handshake"></i>&nbspTous Les Dons</a>         
        </div>
        <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" >
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 col-lg-5 d-flex">
                        <div style="width: 320px; height: 350px;margin-top: 100px;" class="img d-flex align-self-stretch align-items-center">
                            @if ($dons->type=="Bien(s)")
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target=".carousel" data-slide-to="0" class="active"></li>
                                    <li data-target=".carousel" data-slide-to="1"></li>
                                    <li data-target=".carousel" data-slide-to="2"></li>
                                    <li data-target=".carousel" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Dons/'. $dons->image1) }}" style="width: 100%; height: 20%;"/>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Dons/'. $dons->image2) }}" style="width: 100%; height:20%;"/>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Dons/'. $dons->image3) }}" style="width: 100%; height:20%;"/>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Dons/'. $dons->image4) }}" style="width: 100%; height: 20%;"/>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Précédent</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Suivant</span>
                                </a>
                            </div>
                            @else  
                            <img style="width: 100%; height: 100%;" src="{{ Storage::url("images/user.png") }}" class="img-thumbnail" alt="...">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 pl-lg-5">
                        <div>
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                                    <h4 class="mb-4">Id : {{ $dons->id }} </h4>
                                    <h4 class="mb-4">Titre cas : {{ $dons->cas->titre }} </h4> 
                                    <h4 class="mb-4">Type de dons : {{ $dons->type }} </h4>
                                    <h4 class="mb-4">Don : {{ $dons->don }} </h4>
                                    <h4 class="mb-4">Nom du donataire : {{ $dons->userphones->nom }} </h4>
                                    <h4 class="mb-4">Contact du donataire  : {{ $dons->telephone }} </h4>
                                    <h4 class="mb-4">Commentaire : {{ $dons->commentaire }} </h4>
                                    <h4 class="mb-4">Date et provenance du Don : {{ $dons->created_at }} à {{ $dons->quartier }}, {{ $dons->ville }} </h4>
                                                       
                                </div>
                        </div>
                    </div>
                </div>
                   
                </div>
                @if ($dons->type=="Bien(s)")
                <h4 class="mb-4">Description du point de collecte du bien :</h4>
                <p> {{ $dons->description }}</p>
                @else  
                @endif
            </div>
           
        </section>

    </div>
@endsection