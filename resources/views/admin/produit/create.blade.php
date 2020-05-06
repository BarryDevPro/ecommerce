@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    <div class="card-header text-center  alert alert-info">
                      Ajout Produit
                    </div>

                <div class="card-body">
                        {!! Form::open(['route'=>'produit.store' , 'files'=>true]) !!}
                        <div class="form-group {!!$errors->has('name') ? 'is-invalid':'' !!}">
                            {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder'=>'nom produit']) !!} {!! $errors->first('name' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group {!!$errors->has('quantite') ? 'is-invalid':'' !!}">
                            {!! Form::text('quantite', null, ['class' => 'form-control' , 'placeholder'=>'quantite']) !!} {!! $errors->first('quantite' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group {!!$errors->has('prixUnitaire') ? 'is-invalid':'' !!}">
                            {!! Form::text('prixUnitaire', null, ['class' => 'form-control' , 'placeholder'=>'prix unitaire']) !!} {!! $errors->first('prixUnitaire' , '<span class="text-danger">:message</span>')!!}
                        </div>

                        <div class="form-group {!!$errors->has('categories_id') ? 'is-invalid':'' !!}">
                        {!! Form::select('categories_id', $categories , null, ['class' => 'form-control']) !!} {!! $errors->first('categories_id' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group {!!$errors->has('image') ? 'is-invalid':'' !!}">
                        {!! Form::file('image', ['class' => 'btn btn-info']) !!} 
                        <p>{!! $errors->first('image' , '<span class="text-danger">:message</span>')!!}</p>
                        </div>

                        {!! Form::submit('AJOUTER', ['class' => 'btn btn-info']) !!} {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
