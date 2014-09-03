<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Snapchat Spammer</title>

	<!-- Bootstrap -->
	<link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
  	<div class="container">
  		<h1 class="text-center" style="margin: 20px 0">Send Snapchat</h1>
      @if(Session::has('error'))
      <div class="alert alert-danger">
        {{Session::get('error',"Error!")}}
      </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{Session::get('success',"Success!")}}
      </div>
      @endif
  		{{Form::open(['class'=>'form-horizontal','files'=>true])}}
  		<div class="form-group">
  			<label class="control-label col-md-2">Login</label>
  			<div class="col-md-5">
  				<input class="form-control" placeholder="Username" name="username">
  			</div>
  			<div class="col-md-5">
  				<input class="form-control" type="password" placeholder="Password" name="password">
  			</div>
  		</div>
  		<div class="form-group">
  			<label class="control-label col-md-2">To</label>
  			<div class="col-md-10">
  				<input class="form-control" placeholder="Usernames" name="usernames" id="usernames">
  				<span class="help-block">Seperated by commas</span>

  			</div>
  		</div>
  		<div class="form-group">
  			<label class="control-label col-md-2">Image/Video</label>
  			<div class="col-md-10">
  				<input class="form-control" type="file" name="file">
  			</div>
  		</div>
  		<input type="submit" class="btn btn-primary col-md-offset-2" value="Send">
  		{{Form::close()}}

  	</div>

  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="vendor/jquery/dist/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

  </body>
  </html>