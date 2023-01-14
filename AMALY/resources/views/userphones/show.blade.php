@extends('../layout/body')
@section('contenu')
    <div class="container">
        <div align="center">  
            <a href="{{route('userphones.index') }}" class="btn btn-primary" align="center"><i class="fas fa-phone"></i>&nbspListe des Utilisateurs Mobile</a>         
        </div>
        <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 col-lg-5 d-flex">
                        <div style="width: 300px; height: 350px;margin-top: 100px;" class="img d-flex align-self-stretch align-items-center">
                            <img style="width: 100%; height: 100%;" src="{{ Storage::url($userphone->photo) }}" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 pl-lg-5">
                        <div>
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                                    <h4 class="mb-4">Id : {{ $userphone->id }} </h2>
                                    <h4 class="mb-4">Nom : {{ $userphone->nom }} </h2> 
                                    <h4 class="mb-4">Prenom : {{ $userphone->prenom }} </h2>
                                    <h4 class="mb-4">Telephone : {{ $userphone->telephone }} </h2>
                                    <h4 class="mb-4">Adresse e-mail : {{ $userphone->email }} </h2>
                                    <h4 class="mb-4">Genre : {{ $userphone->genre }} </h2>
                                    <h4 class="mb-4">Inscrit le : {{ $userphone->created_at }} </h2>                      
                                </div>
                        </div>
                    </div>
                </div>
                   
                </div>
            </div>
           
        </section>

    </div>
@endsection