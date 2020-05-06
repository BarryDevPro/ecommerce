@extends('layouts.app') 


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    <div class="card-header text-center alert alert-primary">
                       Modification des informations
                    </div>
                

                <div class="card-body">
                        
                        {!! Form::model($client , ['method'=>'PUT','route'=>['client.update' , 'client' => $client->id]]) !!}
                        <div class="form-group {!!$errors->has('nom') ? 'is-invalid':'' !!}">
                            {!! Form::text('nom', null, ['class' => 'form-control' , 'placeholder'=>'Name']) !!} {!! $errors->first('nom' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group {!!$errors->has('prenom') ? 'is-invalid':'' !!}">
                            {!! Form::text('prenom', null, ['class' => 'form-control' , 'placeholder'=>'Last Name']) !!} {!! $errors->first('prenom' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group {!!$errors->has('telephone') ? 'is-invalid':'' !!}">
                            {!! Form::text('telephone', null, ['class' => 'form-control' , 'placeholder'=>'Telephone']) !!} {!! $errors->first('telephone' , '<span class="text-danger">:message</span>')!!}
                        </div>

                        <div class="form-group {!!$errors->has('email') ? 'is-invalid':'' !!}">
                            {!! Form::email('email', null, ['class' => 'form-control' , 'placeholder'=>'Email']) !!} {!! $errors->first('email' , '<span class="text-danger">:message</span>')!!}
                        </div>

                        <div class="form-group {!!$errors->has('adresse') ? 'is-invalid':'' !!}">
                            {!! Form::text('adresse', null, ['class' => 'form-control' , 'placeholder'=>'Adresse']) !!} {!! $errors->first('adresse' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group {!!$errors->has('password') ? 'is-invalid':'' !!}">
                            {!! Form::password('password', ['class' => 'form-control' , 'placeholder'=>'Password']) !!} {!! $errors->first('password' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group {!!$errors->has('password_confirmation') ? 'is-invalid':'' !!}">
                            {!! Form::password('password_confirmation', ['class' => 'form-control' , 'placeholder'=>'Confirm Password ']) !!} {!! $errors->first('password_confirmation' , '<span class="text-danger">:message</span>')!!}
                        </div>
                        

                        {!! Form::submit('MODIFIER', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
