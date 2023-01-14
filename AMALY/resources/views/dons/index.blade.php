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
                        <th>Titre du cas</th>
                        <th>type</th>
                        <th>Nom du donateur</th>
                        <th>Action</th>                       
                    </tr> 
                </thead>
                <tbody>
                    <?php $i=1 ;?>
                    @foreach ($dons as $don)               
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $don->cas->titre }}</td>
                        <td>{{ $don->type }}</td>
                        <td>{{ $don->userphones->nom }}</td>
                        <td style="text-align: center;"><a title="voir plus" class="btn btn-info btn-xs" href="{{ route('dons.show', $don->id) }}"><i  class="fa fa-plus"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

@endsection