@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">

                    <div class="card-header alert alert-primary">
                        <div class="row">
                            <div class="col-md-10">
                                Listes des clients
                            </div>
                            <div class="col-md-2">
                                {!! link_to_route('client.create', 'AJOUTER',null, ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <th>ID</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>EMAIL</th>
                            <th>TELEPHONE</th>
                            <th>ADRESSE</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                            
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->nom}}</td>
                                        <td>{{$client->prenom}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->telephone}}</td>
                                        <td>{{$client->adresse}}</td>
                                        <td>
                                          <div class="row">
                                                <div class="col-md-4">
                                                        {!! link_to_route('client.edit', 'MODIFIER', ['client'=>$client->id], ['class' => 'btn btn-primary']) !!}
    
                                                  </div>
                                                  <div class="col-md-3">
                                                        {!! Form::open(['method'=>'DELETE' , 'route'=>['client.destroy' , $client->id]]) !!}
                                                        {!! Form::submit("SUPPRIMER", ['class' => 'btn btn-danger' , 'onclick' => 'return confirm(\'Vraiment supprimer ce client ?\')']) !!}
                                                        {!! Form::close() !!}
                                                  </div>
                                          </div>
                                        </td>
                                    </tr>
                                @endforeach
                        
                        </tbody>
                    </table>
                    {!! $links !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>

@endsection
