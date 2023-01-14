@extends('../layout/body')
@section('contenu')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card shadow mb-4">         
        <div class="card-body">  
        <div class="table-responsive">
            <table id="leTab" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>TELEPHONE</th>
                        <th>E-MAIL</th>
                        <th>ACTIONS</th>
                        
                    </tr> 
                </thead>
                <tbody>
                    <?php $i=1 ;?>
                    @foreach ($userphones as $userphone)               
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $userphone->nom }}</td>
                        <td>{{ $userphone->prenom }}</td>
                        <td>{{ $userphone->telephone }}</td>
                        <td>{{ $userphone->email }}</td>
                        <td style="text-align: center;">
                            @if (! $userphone->deleted_at)
                            <form action="{{ route('userphones.destroy', $userphone->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a title="voir plus" class="btn btn-info btn-xs" href="{{ route('userphones.show', $userphone->id) }}"><i style="width:10px;float:left;" class="fa fa-plus"></i></a>              
                                <button class="btn btn-danger  btn-xs" onclick="return confirm('Voulez vous vraiment Suspendre cet utilisateur ?');" title="Suspendre"  ><i style="width:10px; float:right;"  class="fas fa-toggle-off"></i></button>
                            </form>
                            @else
                                <form action="{{ route('userphones.restore', $userphone->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-xs" title="Restaurer"><i title="restaurer" style="" class="fa fa-undo"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

@endsection