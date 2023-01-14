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
        td{
            text-align: center;
        }
    </style>
   
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2" style="float: right;">
                        <a class="btn btn-primary"  href="{{ route('cas.create') }}"> <span class=pull-right> Créer un nouveau cas</span></a>
                </div>
            </div> --}}
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
                            @if($cas->deleted_at)
                            <p style="text-align: center;">Cas Supprimer</p>
                            @else

                                <form action="{{ route('cas.statut', $cas->id) }}" method = "POST">
                                    @csrf
                                    @method('PUT')

                                    @if($cas->statut)
                                        <button type="submit" title="Suspendre" style="width:100%; float:left;" class="btn btn-danger btn-xs"><i style="" class="fa fa-ban"></i></button>
                                    @else
                                        <button type="submit" title="Valider" style="width:100%; float:left;" class="btn btn-success btn-xs"><i style="" class="fa fa-check"></i></button>
                                    @endif
                                </form>
                            @endif
                            </td>
                            <td style="text-align: center;">
                                <form action="{{ route('cas.edit',$cas->id) }}" method="POST" style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    @if($cas->deleted_at)                                        
                                    @else
                                        <a class="btn btn-warning btn-xs" title="Voir plus" href="{{ route('cas.show', $cas->id) }}" ><i style="width:10px;float:left;" class="fa fa-eye"></i></a>
                                        {{-- <a class="btn btn-primary btn-xs" title="Modifier" href="{{ route('cas.edit', $cas->id) }}"><i style="width:10px;float:left;" class="fas fa-pen"></i></a> --}}
                                    @endif
                                </form>
                                <form action="{{ route($cas->deleted_at? 'cas.forceDestroy' : 'cas.destroy',$cas->id) }}" method="POST" style="display:inline;">
                
                                    @csrf
                                    @method('DELETE')

                                    <button  title="Supprimer" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Voulez vous vraiment Supprimer ce cas ?');" ><i style="width: 10px;" class="fa fa-trash"></i></button>
                                </form>
                                @if($cas->deleted_at)
                                    <form action="{{ route('cas.restore', $cas->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button title="Restaurer" class="btn btn-warning btn-xs" ><i class="fa fa-undo"></i></button>
                                    </form>
                                @endif
                            </td>
                            {{-- <td><a class="btn btn-primary" href="{{ route('retour_cas.create') }}">Faire un retour</a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</html>
@endsection