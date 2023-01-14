@extends('layout/body')
@section('contenu')
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
        <div class="col-lg-12 margin-tb">
               <div class="pull-right mb-2" style="float: right;">
                    <a class="btn btn-primary" href="{{ route('categories.create') }}"><span class=pull-right>Ajouter une catégorie</span></a>
              </div>
           </div>
    </div>
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
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->nom }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $categories->id) }}" method="POST" style="display:inline;">
            
                                @csrf
                                @method('DELETE')

                                <a class="btn btn-primary" title="Modifier" href="{{ route('categories.edit', $categories->id) }}" style="display:inline;"><i class="fas fa-pen"></i></a>
                                <button title="Supprimer" title="Supprimer" type="submit" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment Supprimer cette catégorie ?');" ><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>
</html>
@endsection