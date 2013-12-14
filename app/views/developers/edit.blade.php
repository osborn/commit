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
            <li><a href="{{ URL::to('developers') }}">Developers</a></li>
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

<h3>Edit {{ $developer->name }}</h3>
<a href="{{ URL::to('developers/'.$developer->id) }}" class="btn btn-small btn-info">Done</a>
<br>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Personal Info
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
          <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        {{ Form::model($developer, array('route' => array('developers.update', $developer->id), 'method' => 'PUT', 'files' => true)) }}

          <div class="form-group">
            {{ Form::label('image', 'Image') }}
            {{ Form::file('image') }}
          </div>

          <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('location', 'City') }}
            {{ Form::select('location', array('Other' => 'Select a City', 'Accra' => 'Accra', 'Kumasi' => 'Kumasi', 'Cape Coast' => 'Cape Coast', 'Tamale' => 'Tamale', 'Takoradi' => 'Takoradi', 'Ho' => 'Ho'), Input::old('city'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('telephone', 'Phone Number') }}
            {{ Form::text('telephone', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('description', 'About You') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('skills', 'Skills') }}
            <p>Add all your skills and press enter after you type each skill.</p>
            {{ Form::text('skills', null, array('data-role' => 'tagsinput', 'placeholder' => 'Add tags')) }}
          </div>

          <div class="form-group">
            {{ Form::hidden('type', 'developer') }}
          </div>

          {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Education
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
          <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <!-- getting education model -->
        @if ($education = User::find($developer->id)->educations) @endif
        @foreach($education as $model)

          {{ Form::model($model, array('route' => array('developers.update', $developer->id), 'method' => 'PUT'))}}
          <div class="form-group">
            {{ Form::label('school', 'School')}}
            {{ Form::text('school', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('course', 'Course')}}
            {{ Form::text('course', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('start_month', 'Month Started') }}
            <br>
            {{ Form::select('start_month', array('January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('start_year', 'Year started')}}
            {{ Form::text('start_year', null, array('class' => 'form-control')) }}
          </div>

           <div class="form-group">
            {{ Form::label('end_month', 'Month Ended') }}
            <br>
            {{ Form::select('end_month', array('January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('end_year', 'Year Ended')}}
            {{ Form::text('end_year', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::hidden('type', 'education') }}
          </div>

          {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
        @endforeach

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Experience
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <!-- will be used to show any messages -->

        @if (Session::has('message'))
          <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <!-- getting education model -->
        @if ($project= User::find($developer->id)->projects) @endif

        @foreach($project as $model)

          {{ Form::model($model, array('route' => array('developers.update', $developer->id), 'method' => 'PUT'))}}
          <div class="form-group">
            {{ Form::label('company', 'Company')}}
            {{ Form::text('company', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('role', 'Role')}}
            {{ Form::text('role', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('start_date', 'Date Started')}}
            <input name="start_date" type="date" class="form-control" value="{{$model->end_date}}">
          </div>

           <div class="form-group">
            {{ Form::label('end_date', 'Date Ended')}}
            <input name="end_date" type="date" class="form-control" value="{{$model->end_date}}">
          </div>

          <div class="form-group">
            {{ Form::hidden('type', 'experience') }}
          </div>

          {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

        @endforeach

      </div>
    </div>
  </div>
</div>


@stop