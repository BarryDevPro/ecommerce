@extends('front.base')
@section('title')
    Login
@endsection
@section('content')
    
  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Login / Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login/Register</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							{!! link_to_route('registre.get', 'Create an account', null, ['class'=>'button button-account']) !!}
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						{!! Form::open(['route' => 'connexion.post' , 'class' => 'row login_form']) !!}
						<div class="col-md-12 form-group">
							{!! Form::text('email', null, ['class' => 'form-control' , 'placeholder' => 'Email']) !!}
							{!! $errors->first('email' , '<span class="text-danger">:message</span>')!!}
						</div>
						<div class="col-md-12 form-group">
							{!! Form::password('password',['class' => 'form-control' , 'placeholder' => 'Password']) !!}
							{!! $errors->first('password' , '<span class="text-danger">:message</span>')!!}
						</div>
						<div class="col-md-12 form-group">
							{!! Form::submit('Log In', ['class' => 'button button-login w-100 form-control']) !!}
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
@endsection