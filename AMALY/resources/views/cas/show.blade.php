@extends('layout/body')
@section('contenu')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12" style="margin-left: 20px;">
			<div class="row">
				<div class="col-md-4" style="border:1px solid #C0C0C0;">
					<div class="row" style="text-aling: center;">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<img alt="Photo de l'utilisateur" src="{{ Storage::url($cas->users->photo) }}" alt="photo de profil" class="rounded-circle" style="width: 100%; padding-top: 10px;" />
						</div> 
						<div class="col-md-4"></div>
					</div><br>
                    <p style="text-aling: center;"><strong style="text-aling: center; margin-left: 20px;">Publier par: </strong>{{$cas->users->nom}} {{$cas->users->prenom}}</p>
                    <h2>Category : <a href=""><span class="theme_color">{{ $cas->categories->nom }}</span></a></h2>
					<div><h4><i class="icon-map-pin theme_color"></i><strong> Lieu du cas: </strong> {{$cas->ville}}, {{$cas->quartier}}</h4> </div>
                    <p><strong>Description :</strong></p>
                    <p>{{$cas->description}} </p>
                    <h5>Le montant estimer <br> pour le cas : <strong>{{$cas->montant}} GNF</strong></h5>
                    <h6>Faites un don sur ce numéro : <strong>{{$cas->numero}}</strong></h6><br>
				</div>
				<div class="col-md-8">
                    <div class="row" style="text-aling: center;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div  style="height: 50%;width: 80%;">
                            <h2 style="text-align: center;"><strong>{{$cas->titre}}</strong></h2> <br>
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target=".carousel" data-slide-to="0" class="active"></li>
                                    <li data-target=".carousel" data-slide-to="1"></li>
                                    <li data-target=".carousel" data-slide-to="2"></li>
                                    <li data-target=".carousel" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Cas/'. $cas->image1) }}" style="width: 100%; object-fit: cover;"/>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Cas/'. $cas->image2) }}" style="width: 100%; object-fit: cover;"/>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Cas/'. $cas->image3) }}" style="width: 100%; object-fit: cover;"/>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_Cas/'. $cas->image4) }}" style="width: 100%; object-fit: cover;"/>
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
                        </div>
                    </div>
                    <div class="col-md-2"></div>
				    </div>
                </div>
			</div>
		</div>
	</div>
</div>

@endsection