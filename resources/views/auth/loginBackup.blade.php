
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Login</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="http://radixtouch.in/templates/admin/smile/source/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="http://radixtouch.in/templates/admin/smile/source/fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
	<link href="http://radixtouch.in/templates/admin/smile/source/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="http://radixtouch.in/templates/admin/smile/source/assets/css/pages/extra_pages.css">
	<!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smile/source/assets/img/favicon.ico" />
</head>
<body>
  <div class="form-title">
      <h1>Login</h1>
  </div>
  <!-- Login Form-->
  <div class="login-form text-center">
      <!-- <div class="toggle"><i class="fa fa-user-plus"></i>
      </div> -->
      <div class="form formLogin">

      </div>
      <div class="form formRegister">
        <h2>Login to your account</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" placeholder="Email" name="email"  />
            <input type="password" placeholder="Password" name="password" />
            <button>Login</button>
        </form>
      </div>

  </div>
  <br><br><br><br><br>
  <br><br><br>

    <!-- start js include path -->
    <!-- <script src="assets/plugins/jquery/jquery.min.js" ></script>
    <script src="assets/js/pages/extra_pages/pages.js" ></script> -->
    <!-- end js include path -->
</body>
</html>
