@extends('layout')

@section('nav')
<!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}">Commit</a>
        </div>
        <div class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

@section('content')

	<div class="alert alert-warning alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong>Please try again!</strong> Username or password Incorrect.
	</div>

	{{ Form::open(array('url' => 'developers/signin')) }}

	  <div class="form-group">
	    {{ Form::label('email', 'Email') }}
	    {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => "Enter email")) }}
	  </div>

	  <div class="form-group">
	    {{ Form::label('password', 'Password') }}
	    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => "Enter password")) }}
	  </div>

	  {{ Form::submit('Sign in', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

@stop


