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
            <li><a href="{{ URL::to('developers')}}">Find Developeres</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <!-- Anchor to trigger modal -->
                <li><a href="{{ URL::to('developers/' . $developer->id) }}" data-toggle="modal">Profile</a></li>
                <li><a href="{{ URL::to('developers/logout') }}" data-toggle="modal">Logout</a></li>
                
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

@section('content')

  <div class="row">
    @if($developer->image_path)
      <div class="col-md-4">
        <a href="#" class="thumbnail">
          <img src="{{ URL::asset($developer->image_path) }}" alt="profile picture">
        </a>
      </div>
    @else
      <div class="col-md-4">
        <a href="#" class="thumbnail">
          <img src="{{ URL::asset('images/profile.jpeg') }}" alt="profile picture">
        </a>
      </div>
    @endif
    
    <div class="col-md-8">
      <h3>{{ $developer->name }}</h3>
      <p>{{ $developer->location }}</p>
      <p>{{ $developer->email }}</p>
      <p>{{ $developer->telephone }}</p>

      @if(Auth::check())
        @if(Auth::user()->email == $developer->email)
          <a class="btn btn-small btn-info" href="{{ URL::to('developers/' . $developer->id . '/edit') }}">Improve Profile</a>
        @endif
      @endif

      <!-- delete the developer (uses the destroy method DESTROY /nerds/{id} -->
      <!-- only user with email address osborn@meltwater,org is allowed to delete users -->
      @if(Auth::check())
        @if(Auth::user()->email=='osborn@meltwater.org')
          {{ Form::open(array('url' => 'developers/' . $developer->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this Developer', array('class' => 'btn btn-warning')) }}
          {{ Form::close() }}
        @endif
      @endif
      

    </div>
  </div>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">About Me</h3>
    </div>
    <div class="panel-body">
      {{ $developer->description }}
    </div>
  </div>  

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Skills</h3>
    </div>
    <div class="panel-body">
      <?php
        $skills = $developer->skills;
        $skill = explode(",", $skills);
      ?>
      <ul class="list-group">
        @foreach($skill as $skill_set)
          <li class="list-group-item">{{ $skill_set }}</li>
        @endforeach   
      </ul>
    </div>
  </div>  
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Education</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>School</th>
            <th>Course</th>
            <th>Start Year</th>
            <th>End Year</th>
          </tr>
          <tr>
            <!-- getting education model -->
            @if($model = User::find($developer->id)->educations) @endif
            @foreach($model as $education)
              <td>{{ $education->school }}</td>
              <td>{{ $education->course }}</td>
              <td>{{ $education->start_month . " " .  $education->start_year}}</td>
              <td>{{ $education->end_month . " " .  $education->end_year}}</td>
            @endforeach
          </tr>
        </table>
      </div>
    </div>
  </div>    

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Experience</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Company</th>
            <th>Role</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>
          
            <!-- getting education model -->
            @if ($project= User::find($developer->id)->projects) @endif

            @foreach($project as $experience)
            <tr>
              <td>{{ $experience->company }}</td>
              <td>{{ $experience->role }}</td>
              <td>{{ $experience->description }}</td>
              <td>{{ $experience->start_date }}</td>
              <td>{{ $experience->end_date }}</td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>    
  
@stop