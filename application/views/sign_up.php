<div class="row radius panel">
	<div class="large-7 medium-10 small-12 large-centered medium-centered columns">
		<h4>Sign up for a free account.</h4>
		<form method="post" action="/sign_up/" name="registerform" data-abide>
		    <div class="row collapse">
		    	<div class="small-4 large-4 columns">
		    		<span class="prefix">Username:</span>
		    	</div>
		    	<div class="small-8 large-8 columns">
		    		<input id="user_name" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
		    		<small class="error">Enter your desired username.</small>
		    	</div>
		    </div>
		    
		    <div class="row collapse">
		    	<div class="small-4 large-4 columns">
		    		<span class="prefix">Email:</span>
		    	</div>
		    	<div class="small-8 large-8 columns">
		    		<input id="user_email" type="email" name="user_email" required />
		    		<small class="error">Enter a valid email address</small>
		    	</div>
		    </div>
		    
		    <div class="row collapse">
		    	<div class="small-4 large-4 columns">
		    		<span class="prefix">Password:</span>
		    	</div>
		    	<div class="small-8 large-8 columns">
		    		<input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
		    		<small class="error">Enter a valid password, at least 6 characters</small>
		    	</div>
		    </div>
		    
		    <div class="row collapse">
		    	<div class="small-4 large-4 columns">
		    		<span class="prefix">Confirm:</span>
		    	</div>
		    	<div class="small-8 large-8 columns">
		    		<input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" data-equalto="user_password_new"/>
		    		<small class="error">Passwords do not match.</small>
		    	</div>
		    </div>
		
		    <input type="submit" name="register" value="Register" class="tiny radius button" />
		</form>
		
	</div>
</div>