@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

            <div class="card-header alert alert-primary">
                        <div class="row">
                            <div class="col-md-10">
                                Listes des categories
                            </div>
                            <div class="col-md-2">
                                {!! link_to_route('categorie.create', 'AJOUTER',null, ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                <div class="card-body">
                   
                    <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <th>ID</th>
                            <th>LIBELLE</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                            <tr>
                                <td> {{$categorie->id}} </td>
                                <td> {{$categorie->libelle}} </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-3">
                                            {!! link_to_route('categorie.edit', 'Modifier', ['categorie'=>$categorie->id], ['class' => 'btn btn-primary']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['method'=>'DELETE' , 'route'=>['categorie.destroy' , $categorie->id]]) !!}
                                            {!! Form::submit("SUPPRIMER", ['class' => 'btn btn-danger' , 'onclick' => 'return confirm(\'etes vous sur  ?\')']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$links !!}
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
