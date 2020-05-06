@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header  alert alert-info">
                    <div class="row">
                        <div class="col-md-10 text-center">
                            Listes des produits
                        </div>
                        <div class="col-md-2">
                            {!! link_to_route('produit.create', 'ADD Produit',null, ['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <th>ID</th>
                            <th>PRODUIT</th>
                            <th>QUANTITE</th>
                            <th>PRIX</th>
                            <th>IMAGE</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <td>{{$produit->id}}</td>
                                <td>{{$produit->name}}</td>
                                <td>{{$produit->quantite}}</td>
                                <td>{{$produit->prixUnitaire}}</td>
                                <td>
                                    <img src="{{config('images.path')}}/{{$produit->image}}" width="200px" height="150px" alt="">
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! link_to_route('produit.edit', 'Modifier', ['produit'=>$produit->id], ['class' => 'btn btn-primary']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::open(['method'=>'DELETE' , 'route'=>['produit.destroy' , $produit->id]]) !!} {!! Form::submit("SUPPRIMER", ['class' => 'btn btn-danger' , 'onclick' => 'return confirm(\'Vraiment supprimer ce produit ?\')']) !!} {!! Form::close() !!}
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
