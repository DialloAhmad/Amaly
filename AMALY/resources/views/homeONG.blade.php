@extends('../layout/body')
@section('contenu')

<div class="container">
    <div class="row justify-content-center">
        Bienvenu sur votre Tableau de bord MR/MME {{auth()->user()->nom}}  {{auth()->user()->prenom}} <br>
    </div>
    <br><br>
</div>
@endsection
