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
             <li><a href="{{ URL::to('developers') }}">Find Developers</a></li>
            <li class="dropdown">
              @if(Auth::check())
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="{{ URL::to('developers/' . Auth::user()->id) }}" data-toggle="modal">Profile</a></li>
                <li><a href="{{ URL::to('developers/logout') }}" data-toggle="modal">Logout</a></li>
              @else
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Developers<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <!-- Anchor to trigger modal -->
                  <li><a href="#myModal" data-toggle="modal">Log In or Register</a></li>
              @endif
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

@section('content')

  {{ HTML::ul($errors->all()) }}

  <h1>Connecting developers with jobs.</h1>
  <p>Discover developers right here in Ghana.</p>
  <p>Discover tech jobs right here in Ghana.</p>
@stop

      