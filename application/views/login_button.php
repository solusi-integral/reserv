<?php include 'includes/core/document_head.php'?>
	<div id="pjax">
		<div id="wrapper">
			<div class="isolate">
				<div class="center narrow">
					<div class="main_container full_size container_16 clearfix">
						<div class="box">
							<div class="block">
								<div class="section">
									<div class="alert dismissible alert_light">
										<img width="24" height="24" src="images/icons/small/grey/locked.png">
										<strong>Welcome to Adminica.</strong> Please enter your details to login.
									</div>
								</div>
								<form action="index.php" class="validate_form">
								<fieldset class="label_side top">
									<label for="username_field">Username<span>or email address</span></label>
									<div>
										<input type="text" id="username_field" name="username_field" class="required">
									</div>
								</fieldset>
								<fieldset class="label_side bottom">
									<label for="password_field">Password<span><a href="#">Do you remember?</a></span></label>
									<div>
										<input type="password" id="password_field" name="password_field" class="required">
									</div>
								</fieldset>
								<div class="button_bar clearfix">
									<button class="wide" type="submit">
										<img src="images/icons/small/white/key_2.png">
										<span>Login</span>
									</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					<a href="index.php" id="login_logo"><span>Adminica</span></a>
					<button data-dialog="dialog_register" class="dialog_button send_right" style="margin-top:10px;">
						<img src="images/icons/small/white/user.png">
						<span>Not Registered ?</span>
					</button>
				</div>
			</div>
		<?php include 'includes/dialogs/dialog_register.php'?>
<?php include 'includes/core/document_foot.php'?>