@extends('layout/body')
@section('contenu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout des catégories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
       @if ($message = Session::get('success'))
         <div class="alert alert-success">
            <p>{{ $message }}</p>
         </div>
        @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="TabCategories" style="width:100%">
            <thead> 
                <tr>
                    <th>N°</th>
                    <th>Titre</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retour_cas as $retour_cas)
                    <tr>
                        <td>{{ $retour_cas->id }}</td>
                        <td>{{ $retour_cas->titre }}</td>
                        <td style="text-align: center"> 

                            <form action="{{ route('retour_cas.statut', $retour_cas->id) }}" method = "POST">
                                @csrf
                                @method('PUT')

                                @if($retour_cas->statut)
                                    Publié
                                @else
                                    Publication en attente
                                @endif
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('retour_cas.edit',$retour_cas->id) }}" method="POST" style="display:inline;">

                                @csrf
                                @method('DELETE')
                                
                                @if($retour_cas->statut)
                                    <a class="btn btn-warning btn-xs" title="Voir plus" href="{{ route('retour_cas.show', $retour_cas->id) }}"><i style="width: 10px; float:left;" class="fa fa-eye"></i></a>
                                @else
                                    <a class="btn btn-warning btn-xs" title="Voir plus" href="{{ route('retour_cas.show', $retour_cas->id) }}"><i style="width: 10px; float:left;" class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary btn-xs" title="Modifier" href="{{ route('retour_cas.edit', $retour_cas->id) }}"><i style="width:10px;float:left;" class="fas fa-pen"></i></a>
                                @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
    </div>
</body>
</html>
@endsection