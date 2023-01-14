@extends('layout/body')
@section('contenu')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <style>
        th{
            text-align: center;
        }
    </style>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2" style="float: right;">
                        <a class="btn btn-primary"  href="{{ route('Mescas.create') }}"> <span class=pull-right> Créer un nouveau cas</span></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="TabCas" style="width:100%">
                <thead> 
                    <tr>
                        <th>N°</th>
                        <th>Titre</th>
                        <th>Numéro</th>
                        <th>Montant</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>Retour du Cas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cas as $cas)
                        <tr>
                            <td>{{ $cas->id }}</td>
                            <td>{{ $cas->titre }}</td>
                            <td>{{ $cas->numero }}</td>
                            <td>{{ $cas->montant }} GNF</td> 
                            <td style="text-align: center"> 

                                <form action="{{ route('cas.statut', $cas->id) }}" method = "POST">
                                    @csrf
                                    @method('PUT')

                                    @if($cas->statut)
                                        Publié
                                    @else
                                        Publication en attente
                                    @endif
                                </form>
                            </td>
                            <td style="text-align: center;">
                                <form action="{{ route('cas.edit',$cas->id) }}" method="POST" style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    @if($cas->statut)       
                                        <a class="btn btn-warning btn-xs" title="Voir plus" href="{{ route('Mescas.show', $cas->id) }}" ><i style="width:10px;float:left;" class="fa fa-eye"></i></a>                                 
                                    @else
                                        <a class="btn btn-warning btn-xs" title="Voir plus" href="{{ route('Mescas.show', $cas->id) }}" ><i style="width:10px;float:left;" class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" title="Modifier" href="{{ route('Mescas.edit', $cas->id) }}"><i style="width:10px;float:left;" class="fa fa-pen"></i></a>
                                    @endif
                                </form>
                            </td>
                            <td>
                            @if($cas->statut)                           
                            <a class="btn btn-primary" href="{{ route('retour_cas.create') }}">Faire un retour</a>
                            @else
                            Cas Suspendu
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</html>
@endsection