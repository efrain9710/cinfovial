<!DOCTYPE html>
<html lang="en">
<head>
	<title>CINFOVIAL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="formulario" method="post">
					<span class="login100-form-logo">
						<img src="images/cinfo.png" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" id="username" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<input type="hidden" name="tip_funct" id="tip_funct" value="login_user">

					<div class="container-login100-form-btn">
						<input type="submit"  id="login" value="Ingresar" class="btn btn-info" style="color: #FFF;">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="resp">

	</div>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script>
			$(document).ready(function()
			{
				$('#login').click(function()
				{
					var username=$("#username").val();
					var password=$("#password").val();
					var tip_funct=$("#tip_funct").val();
					var dataString = 'username='+username+'&password='+password+'&tip_funct='+tip_funct;
					if($.trim(username).length>0 && $.trim(password).length>0)
					{
						$.ajax({
						type: "POST",
						url: "controladores/login.php",
						data: dataString,
						cache: false,
						success: function(data){
						if(data)
						{
							//$("body").load("home.php").hide().fadeIn(1500).delay(6000);
							//or
							window.location.href = data;
						}
						else
						{
						//Shake animation effect.
							$('#box').shake();
							$("#login").val('Login')
							$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
						}
					}
				});
			}
			return false;
		});
	});
		</script>



<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
