<?
if (isset($_COOKIE['UNID']) && isset($_COOKIE['SSID']) && isset($_COOKIE['pswd']) && isset($_COOKIE['hash_e'])) {
	header("Location: /account");
}
include 'temp/templates_stand/header.php';
tmpheader('logsign.css');
?>
<main>
	<div class="wrapper">
		<div class="blk">
	<form name="login_form">
		<b class="b_form">Log in</b><br>
		<input type="email" name="email" placeholder="Email" class="inp_form"><br><br>
		<input type="password" name="password" placeholder="Password" class="inp_form"><br><br>
		<div id="error_login"></div>
		<button type="submit" class="btn">Login</button><a href="/forgot" class="link" style="margin-left: 15px">Forgot your password?</a><br><br>
	</form>
	<form name="signup_form">
		<b class="b_form">Sign up</b><br>
		<input type="email" name="email" placeholder="Email" class="inp_form"><br><br>
		<input type="password" name="password" placeholder="Password" class="inp_form"><br><br>
		<input type="password" name="r_password" placeholder="Repeat password" class="inp_form"><br><br>
		<div class="chk_block">
				<input type="checkbox" id="chk" name="checkbox" class="checkbox"><label for="chk" class="chk_lb">I read and agree with <a href="/privacy-policy" class="link">privacy-policy</a></label><br>
			</div>
		<div id="error_signup"></div>
		<button type="submit" class="btn">Sign up</button>
	</form>
</div>
	<div class="block_for">
		<div class="block-title">After log in you can:</div>
		<div class="body_for">
			<li>Save your files for 5 day</li>
			<li>Create up to 15,000 records</li>
			<li>See how many files you generated</li>
		</div>
	</div>
	<!-- /.block_for -->
</div>
</main>
	<div id="response"></div>
	<script src="engine/users/src/js/ajax.js"></script>
<?
include 'temp/templates_stand/footer.php';
tmpfooter();
