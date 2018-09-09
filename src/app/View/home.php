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
</div>

<script type="text/javascript">
	// Add javascript/jquery codes here
</script>