@extends('../layout/body')
@section('contenu')
    <div class="container">
        <div align="center">  
            <a href="{{route('users.index') }}" class="btn btn-primary" align="center"><i class="fas fa-users"></i>&nbspListe des Utilisateurs</a>         
        </div>
        <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 col-lg-5 d-flex">
                        <div style="width: 300px; height: 350px;margin-top: 100px;" class="img d-flex align-self-stretch align-items-center">
                            <img style="width: 100%; height: 100%;" src="{{ Storage::url($user->photo) }}" class="img-thumbnail" alt="photo de profil">
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