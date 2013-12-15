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
          <a class="navbar-brand" href="#">Commit</a>
        </div>
        <div class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{URL::to('developers')}}">Find Developers</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Developers<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <!-- Anchor to trigger modal -->
                <li><a href="#myModal" data-toggle="modal">Log In or Register</a></li>

                
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

@section('content')
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <h3>To join Commit, sign up below...it's free!</h3>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
          @endif

    {{ Form::open(array('url' => 'developers')) }}

      <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => "Enter full name" )) }}
      </div>

      <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => "Enter email")) }}
      </div>

      <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::select('city', array('Other' => 'Select a City', 'Accra' => 'Accra', 'Kumasi' => 'Kumasi', 'Cape Coast' => 'Cape Coast', 'Tamale' => 'Tamale', 'Takoradi' => 'Takoradi', 'Ho' => 'Ho'), Input::old('city'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => "Enter password")) }}
      </div>

      <p>By clicking Join Commit, you agree to Commit's <a>User Agreement</a>, <a>Privacy Policy</a> and <a href=""> Cookie Policy<a>.</p>

      {{ Form::submit('Join Commit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
  </div>
  <div class="col-md-3"></div>
</div>

  

@stop