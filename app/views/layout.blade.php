
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Commit</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('dist/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('dist/css/navbar.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('dist/css/signin.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('dist/css/tagsinput.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    @yield('nav')

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        
        @yield('content')

      </div>

    </div> <!-- /container -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Please sign in</h4>
          </div>
          <div class="modal-body">

            {{ HTML::ul($errors->all()) }}

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


          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" href="developers/create" role="button">Sign up for a new account</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('dist/js/jquery-2.0.3.min.js') }}"></script>

    <script src="{{ URL::asset('dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('dist/js/tagsinput.js') }}"></script>    

  </body>
</html>
