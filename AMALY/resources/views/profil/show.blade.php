@extends('../layout/body')
@section('contenu')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row" align="center">
            <div class="col-md-4"><a  href="{{ route('profil.editPassword',  Auth::user()->id) }}" class="btn btn-primary"><i class="fas fa-lock"></i>&nbspChanger Mon Mot de Passe</a></div>
            <div class="col-md-4"><a href="{{ route('profil.editImage',  Auth::user()->id) }}" class="btn btn-primary"><i class="fas fa-image"></i>&nbspChanger Ma photo de Profil</a></div>
            @if (!(auth()->user()->profil=="Demandeur"))
            {{-- @else --}}
                <div class="col-md-4"><a href="{{ route('profil.edit',  Auth::user()->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i>&nbspModifier Mes Informations</a></div>
            @endif
        </div>
                   
        
        <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 col-lg-5 d-flex">
                        <div style="width: 300px; height: 300px;margin-top: 100px;" class="img d-flex align-self-stretch align-items-center">
                            <img style="width: 100%; height: 100%;" src="{{ Storage::url($user->photo) }}" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 pl-lg-5">
                        <div>
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                                    <h4 class="mb-4">Id : {{ $user->id }} </h2>
                                    <h4 class="mb-4">Nom : {{ $user->nom }} </h2> 
                                    <h4 class="mb-4">Prenom : {{ $user->prenom }} </h2>
                                    <h4 class="mb-4">Telephone : {{ $user->telephone }} </h2>
                                    <h4 class="mb-4">Adresse e-mail : {{ $user->email }} </h2>
                                    <h4 class="mb-4">Compagnie : {{ $user->compagnie }} </h2>
                                    <h4 class="mb-4">Poste : {{ $user->poste }} </h2>
                                    <h4 class="mb-4">Ville : {{ $user->ville }} </h2>
                                    <h4 class="mb-4">Quartier : {{ $user->quartier }} </h2>
                                    <h4 class="mb-4">Genre : {{ $user->genre }} </h2>
                                    <h4 class="mb-4">Profil : {{ $user->profil }} </h2>
                                    <h4 class="mb-4">Inscrit le : {{ $user->created_at }} </h2>
                                    <h4 class="mb-4">Statut : @if ($user->statut) Actif @else Inactif @endif </h2>                       
                                </div>
                        </div>
                    </div>
                </div>                 
                </div>
                <h2 class="mb-4">Description</h2>
                <p> {{ $user->description }}</p>
            </div>          
        </section>

    </div>
@endsection