<div class="row">
	<div class="large-8 small-12 large-offset-4 columns">
		<h4>Edit Your Profile</h4>
	</div>
</div>

<div class="row">
	<? include('partials/rightside.php'); ?>
	
	<div class="large-8 medium-12 small-12 columns">
		<div class="row radius panel collapse">
			<div class="large-12 small-12 columns">
				<div>
					<form method="post" action name="user_edit_form_avatar" enctype="multipart/form-data">
					    <div class="row collapse">
					    	<div class="small-12 large-4 columns" style="margin-bottom: 20px;">
								<div style="margin-bottom: 15px; width:134px; height:134px; background: url('<? if ($avatar = $login->hasAvatar($_SESSION['user_id']) == 1) : ?>/public/avatars/avatar-<?= $_SESSION['user_id'] ?>.jpg<? else : ?>/public/avatars/default-avatar.png<? endif; ?>') no-repeat center; background-size: 134px; border: 2px solid #efefef; border-radius: 3px;"></div>
					    	</div>
					    	<div class="small-12 large-4 large-offset-4 columns">
								<div class="file-upload tiny radius button expand" style="margin-bottom: 20px;">
								    <span>Choose Image</span>
								    <input id="upload_button" type="file" name="avatar_file" class="upload" />
								</div>
								<small id="filename">&nbsp;</small>
					    	</div>
					    	<div class="small-12 large-4 large-offset-8 columns">
								<input type="submit" name="user_edit_upload_avatar" value="Upload Image" class="tiny radius button expand" style="margin-bottom: 20px;">
					    	</div>
					    </div>
					</form>
				</div><hr>
				<div>
					<form method="post" action="/edit/" name="user_edit_form_name" data-abide>
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">Username:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_name" type="text" name="user_name" pattern="[a-zA-Z0-9]{2,64}" placeholder="Current: <?= $_SESSION['user_name']; ?>" required />
					    		<small class="error">Enter your desired username.</small>
					    	</div>
					    </div>
					    
					    <input type="submit" name="user_edit_submit_name" value="Update Username" class="tiny radius button right" style="margin-bottom: 20px;" />
					</form>
				</div><hr>
				<div>
					<form method="post" action="/edit/" name="user_edit_form_email" data-abide>
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">Email:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_email" type="email" name="user_email" placeholder="Current: <?= $_SESSION['user_email']; ?>" required />
					    		<small class="error">Enter a valid email address.</small>
					    	</div>
					    </div>
					    
					    <input type="submit" name="user_edit_submit_email" value="Update Email" class="tiny radius button right" style="margin-bottom: 20px;" />
					</form>
				</div><hr>
				<div>
					<form method="post" action="/edit/" name="user_edit_form_password" data-abide>
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">Current:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_password_old" type="password" name="user_password_old" autocomplete="off" required />
					    		<small class="error">Enter your current password.</small>
					    	</div>
					    </div>
					    
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">New Password:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_password_new" type="password" name="user_password_new" autocomplete="off" required />
					    		<small class="error">Enter a new password.</small>
					    	</div>
					    </div>
					    
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">Confirm:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_password_repeat" type="password" name="user_password_repeat" autocomplete="off" data-equalto="user_password_new" required/>
					    		<small class="error">Passwords do not match.</small>
					    	</div>
					    </div>
					
					    <input type="submit" name="user_edit_submit_password" value="Update Password" class="tiny radius button right" style="margin-bottom: 20px;"  />
					</form>
				</div><hr>
				<div>
					<form method="post" action="/edit/" name="user_edit_form_social">
					    <div class="row collapse">
					    	<div class="small-12 large-12 columns">
					    		<label for="user_bio">About Me:</label>
					    		<textarea name="user_bio" id="user_bio" rows="5"><?= $user['user_bio']; ?></textarea>
					    	</div>
					    </div>
					    
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">Twitter:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_twitter" type="url" name="user_twitter" autocomplete="off" value="<?= $user['user_twitter']; ?>" />
					    	</div>
					    </div>
					    
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">Facebook:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_facebook" type="url" name="user_facebook" autocomplete="off" value="<?= $user['user_facebook']; ?>" />
					    	</div>
					    </div>
					    
					    <div class="row collapse">
					    	<div class="small-4 large-4 columns">
					    		<span class="prefix">Linked In:</span>
					    	</div>
					    	<div class="small-8 large-8 columns">
					    		<input id="user_linkedin" type="url" name="user_linkedin" autocomplete="off" value="<?= $user['user_linkedin']; ?>" />
					    	</div>
					    </div>
					    
					    <input type="submit" name="user_edit_submit_social" value="Update Profile" class="tiny radius button right" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

document.getElementById("upload_button").onchange = function () {
    document.getElementById("filename").innerHTML = "Image Name: " + this.value.replace("C:\\fakepath\\", "");
}

</script>

<div id="myModal" class="reveal-modal small" data-reveal>
	<? include('partials/delete_account.php'); ?>
</div>

<? include('partials/new_discussion.php'); ?>