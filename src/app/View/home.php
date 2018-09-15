<?php
	use App\Model\UsersModel;
	$user = new UsersModel();
	$is_db_connected = $user->getConn()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<div class="col-md-4 offset-md-4 text-center">
	<h2>Home</h2>
	<p>This is the home view page located at app/View folder.</p>
	<p>Your final examination starts... NOW!</p>
	<p>Oh Wait! Please remove unnecessary codes like this -> <?= $is_db_connected ?></p>
	<p>Good Luck!</p>
	<hr>
	<h4><b>Hints:</b></h4>
	<ul class="text-justify">
		<li>
			This mini-framework has similar routing conventions as other frameworks.
			You can simply create a UsersController class with public function login inside app/Controller 
			and Users/login.php file inside app/View to create the route <em>http://localhost:9999/users/login</em>
			or simply override the routes in app/Config/routes.php. But routes like <em>/users/view/1</em>
			don't exist, you won't need it for the exam. (<b>Note*: Mind the naming conventions</b>)
		</li>
		<li>
			You can modify app/View/Common directory files or even just create a new header or footer inside
			app/View/Common and set them as your default header and footer in app/Config/layout.php file
		</li>
	</ul>
</div>

<script type="text/javascript">
	// Add javascript/jquery codes here
</script>