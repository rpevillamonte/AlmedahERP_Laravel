<!doctype html>
<html lang="en">
  <head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>Almedah ERP System Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<style media="screen">
  html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>

  </head>

  <body class="text-center">
    <div class="container">
     <div class="row mx-auto">
        <img src="images/login_logo.png" class="mx-auto shadow" style="max-width:30%;">
      </div>
      <div class="card shadow mx-auto" style="max-width: 80%; background-image: url('images/img_login.png'); background-size: cover;">
        <div class="row">
          <div class="col-sm-7">
            <!-- <img src="images/img_login.png" class="card-img-top mx-auto"> -->
          </div>
          <div class="col-sm-5">
              <div class="card-body" style="background-color: rgba(228,228,228,.70);">
              <form class="form-signin">
                <h1 class="h3 mb-3 font-weight-bold">Almedah ERP System</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control my-2" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                     <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Don't have an Account? Sign Up</button>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
	<!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="regTitle">Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="row">
					<div class="col-lg-6">
							<form>
								<div class="form-group">
									<input type="text" class="form-control" id="fname" placeholder="First Name">
								</div>
							
								<div class="form-group">
									<input type="text" class="form-control" id="pos" placeholder="Position">
								</div>
							</form>
					</div>
					<div class="col-lg-6">
						<form>
							<div class="form-group">
									<input type="text" class="form-control" id="lname" placeholder="Last Name">
							</div>
							<div class="form-group">
									<input type="number" class="form-control" id="contNo" placeholder="Contact Number">
							</div>
						</form>
					</div>
			</div>
			<div class="row">
				<div class="col">
						<form>
							<div class="form-group">
									<input type="text" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="form-group">
									<label class="form-floating-left">Gender</label>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
									  <label class="form-check-label" for="inlineRadio1">Male</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
									  <label class="form-check-label" for="inlineRadio2">Female</label>
									</div>
							</div>
						</form>
					</div>
			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
</div>
  </body>
</html>  
