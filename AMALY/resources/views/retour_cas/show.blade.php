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
							<img alt="Photo de l'utilisateur" src="{{ Storage::url($retour_cas->users->photo) }}" class="rounded-circle" style="width: 100%; padding-top: 10px;" />
						</div> 
						<div class="col-md-4"></div>
					</div><br>
                    <p style="text-aling: center;"><strong style="text-aling: center; margin-left: 20px;">Retourner par: </strong>{{$retour_cas->users->nom}} {{$retour_cas->users->prenom}}</p>
                    <h2>Category : <a href=""><span class="theme_color">{{ $retour_cas->cas->categories->nom }}</span></a></h2>
                    <h2>Titre du retour : <strong>{{$retour_cas->titre}}</strong></h2>
					<div><h4><i class="icon-map-pin theme_color"></i><strong> Lieu : </strong> {{$retour_cas->ville}}, {{$retour_cas->quartier}}</h4> </div>
                    <p><strong>Description :</strong></p>
                    <p>{{$retour_cas->description}} </p>
				</div>
				<div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h2 style="text-align: center;">Retour du cas: <strong>{{$retour_cas->cas->titre}}</strong></h2>
                            <div style="height: 100%; width: 100%;">
                                <div id="carousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target=".carousel" data-slide-to="0" class="active"></li>
                                        <li data-target=".carousel" data-slide-to="1"></li>
                                        <li data-target=".carousel" data-slide-to="2"></li>
                                        <li data-target=".carousel" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_RetourCas/'. $retour_cas->image1) }}" style="width: 100%; height: 20%;"/>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_RetourCas/'. $retour_cas->image2) }}" style="width: 100%; height:20%;"/>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_RetourCas/'. $retour_cas->image3) }}" style="width: 100%; height:20%;"/>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" alt="Image descriptive" src="{{ asset('storage/Image_RetourCas/'. $retour_cas->image4) }}" style="width: 100%; height: 20%;"/>
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

