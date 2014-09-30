<div class="row radius panel">
	<div class="large-7 medium-10 small-12 large-centered medium-centered columns">
		<h4>Enter your username to reset your password.</h4>
		<? if ($login->passwordResetLinkIsValid() == true) : ?>
		<form method="post" action="/" name="new_password_form" data-abide>
		    <input type='hidden' name='user_name' value='<?= $_GET['user_name']; ?>' />
		    <input type='hidden' name='user_password_reset_hash' value='<?= $_GET['verification_code']; ?>' />
		    
		    <div class="row collapse">
		    	<div class="small-4 large-4 columns">
		    		<span class="prefix">New Password:</span>
		    	</div>
		    	<div class="small-8 large-8 columns">
		    		<input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
		    		<small class="error">Enter your new password</small>
		    	</div>
		    </div>
		
		    <div class="row collapse">
		    	<div class="small-4 large-4 columns">
		    		<span class="prefix">Confirm:</span>
		    	</div>
		    	<div class="small-8 large-8 columns">
		    		<input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" data-equalto="user_password_new" />
		    		<small class="error">Passwords do not match.</small>
		    	</div>
		    </div>
		    
		    <input type="submit" name="submit_new_password" value="Update Password" class="tiny radius button" />
		</form>
		<!-- no data from a password-reset-mail has been provided, so we simply show the request-a-password-reset form -->
		<? else : ?>
		<form method="post" action="/password_reset/" name="password_reset_form" data-abide>
		    <div class="row collapse">
		    	<div class="small-4 large-4 columns">
		    		<span class="prefix">Username:</span>
		    	</div>
		    	<div class="small-8 large-8 columns">
		    		<input id="user_name" type="text" name="user_name" required />
		    		<small class="error">Enter your current username.</small>
		    	</div>
		    </div>
		    
		    <input type="submit" name="request_password_reset" value="Reset Password" class="tiny radius button" />
		</form>
		<? endif; ?>
		
	</div>
</div>