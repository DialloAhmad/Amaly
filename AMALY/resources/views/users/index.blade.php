@extends('../layout/body')
@section('contenu')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card shadow mb-4">         
        <div class="card-body">
            <div class="pull-right mb-2" style="float :right;">
                <a class="btn btn-primary" href="{{ route('users.create') }}"> Créer un nouvel utilisateur</a>
            </div>  
        <div class="table-responsive">
            <table id="leTab" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        {{-- <th>PHOTO</th> --}}
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>E-MAIL</th>
                        {{-- <th>TELEPHONE</th> --}}
                        <th>PROFIL</th>
                        {{-- <th>COMPAGNIE</th>
                        <th>POSTE</th>
                        <th>VILLE</th>
                        <th>QUARTIER</th>
                        <th>GENRE</th> --}}
                        {{-- <th>DESCRIPTION</th>                --}}
                        <th>MODIFICATIONS</th>
                        <th>ACTIONS</th>
                        
                    </tr> 
                </thead>
                <tbody>
                    <?php $i=1 ;?>
                    @foreach ($users as $user)               
                    <tr>
                        <td>{{ $i++ }}</td>
                        {{-- <td><img src="{{ Storage::url($user->photo) }}" height="75" width="75" alt="" /></td> --}}
                        <td>{{ $user->nom }}</td>
                        {{-- <td>{{ $user->email }}</td> --}}
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->telephone }}</td> --}}
                        <td>{{ $user->profil }}</td>
                        {{-- <td>{{ $user->compagnie }}</td>
                        <td>{{ $user->poste }}</td>
                        <td>{{ $user->ville }}</td>
                        <td>{{ $user->quartier }}</td>
                        <td>{{ $user->genre }}</td>
                        <td>{{ $user->description }}</td> --}}
                        <td style="text-align: center;">
                            @if($user->deleted_at)
                                UTILISATEUR DÉSACTIVÉ
                            @else
                                
                                <form action="{{ route('users.statut',$user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    {{-- @if ($user->statut)
                                        <button type="submit" title="Désactiver"  class="btn btn-success  btn-xs"><i   style="width:10px;float:left;" class="fa fa-check"></i></button>
                                    @else
                                        <button type="submit" title="activer"  class="btn btn-danger  btn-xs"><i  style="width:10px;float:left;" class="fa fa-ban"></i></button>
                                    @endif       --}}
                                        <a class="btn btn-primary btn-xs" title="Modifier"  href="{{ route('users.edit',$user->id) }}"><i style="width:10px;float:left;" class="fa fa-pen"></i></a>
                                        <br> <br>
                            @endif
                            
                            </form>
                        </td>
                        <td style="text-align: center;">
                            @if (! $user->deleted_at)
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a title="voir plus" class="btn btn-info btn-xs" href="{{ route('users.show', $user->id) }}"><i style="width:10px;float:left;" class="fa fa-plus"></i></a>
                               
                                <button class="btn btn-danger  btn-xs" onclick="return confirm('Voulez vous vraiment Suspendre cet utilisateur ?');" title="Suspendre"  ><i style="width:10px; float:right;"  class="fas fa-toggle-off"></i></button>
                            </form>
                            @else
                                <form action="{{ route('users.restore', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-xs" title="Restaurer"><i title="restaurer" style="" class="fa fa-undo"></i></button>
                                </form>
                            @endif
                            
                            {{-- <form action="{{ route($user->deleted_at? 'users.force.destroy' : 'users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger  btn-xs" onclick="return confirm('Voulez vous vraiment Supprimer cet utilisateur ?');" title="Supprimer" style="width:100%;"><i   class="fa fa-trash"></i>&nbspSupprimer</button>
                                <hr>
                            </form>
                            @if($user->deleted_at)
                            <form action="{{ route('users.restore', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-warning btn-xs" style="width:100%;"><i title="restaurer" style="" class="fa fa-undo"></i>&nbspRestaurer</button>
                            </form>
                            @else
                                <a class="btn btn-warning btn-xs" style="width:100%;" href="{{ route('users.show', $user->id) }}"><i title="voir" style="" class="fa fa-user"></i>&nbspEn Savoir plus</a>
                            @endif --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

@endsection