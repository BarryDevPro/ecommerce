@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center  alert alert-primary">Modifier une categorie de produit</div>

                <div class="card-body">
                {!! Form::model($categorie , ['method'=>'PUT','route'=>['categorie.update' , 'categorie' => $categorie->id]]) !!}
                <div  class="form-group {!!$errors->has('libelle') ? 'is-invalid':'' !!}">
                    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('libelle' , '<span class="text-danger">:message</span>')!!}
                </div>
                    {!! Form::submit('MODIFIER', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
