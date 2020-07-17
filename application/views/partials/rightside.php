<div class="large-4 medium-12 small-12 columns">
	<? if ($login->isUserLoggedIn() == true) : ?>
	<div class="row radius panel collapse" style="margin-bottom: 15px;">
		<div class="large-3 small-2 columns hide-for-small">
			<div style="width:50px; height:50px; background: url('<? if ($avatar = $login->hasAvatar($_SESSION['user_id']) == 1) : ?>/public/avatars/avatar-<?= $_SESSION['user_id'] ?>.jpg<? else : ?>/public/avatars/default-avatar.png<? endif; ?>') no-repeat center; background-size: 50px;border: 2px solid #efefef; border-radius: 3px;"></div>
		</div>
		<div class="large-9 small-10 columns hide-for-small" style="margin-bottom: 20px;">
			<span><?= $_SESSION['user_name'] ?></span><br>
			<small><a href="/edit/">Edit Profile</a></small>
		</div>
		<div class="large-12 small-12 columns text-center hide-for-small">
			<div class="row">
				<div class="large-6 small-6 columns" style="border-right: 1px solid #dddddd;">
					<span><?= $post_total = $create->getUserPostTotal($_SESSION['user_id']); ?></span><br>
					<small>Open
						<? if ($post_total = $create->getUserPostTotal($_SESSION['user_id']) == 1) : ?>Discussion
						<? else : ?>Discussions
						<? endif; ?></small>
				</div>
				<div class="large-6 small-6 columns">
					<span><?= $reply_total = $create->getUserReplyTotal($_SESSION['user_id']); ?></span><br>
					<small>
						<? if ($reply_total = $create->getUserReplyTotal($_SESSION['user_id']) == 1) : ?>Reply
						<? else : ?>Replies
						<? endif; ?></small>
				</div>
			</div>
			<hr>
		</div>
		<div class="large-12 small-12 columns">
			<div class="tiny radius expand button" data-reveal-id="new_discussion">New Discussion</div>
			<? if (isset($post)) : ?>
			<? if ($post['author_id'] === $_SESSION['user_id'] || $_SESSION['user_is_admin'] == 1 && $pagetitle == "View Discussion") : ?>
			<ul class="button-group radius even-2" style="margin-left: 5px;">
				<li>
					<? if ($post['post_solved'] == 0 || $post['post_solved'] == 2) : ?>
					<form method="post" action="/discussion/view/<?= $post['id'] ?>/" name="post_solved">
						<input type="hidden" name="post_id" value="<?= $post['id'] ?>" />
						<input type="submit" name="mark_as_solved" class="tiny radius button" style="margin-top: 20px;" value="Mark As Solved" />
					</form>
					<? else : ?>
					<form method="post" action="/discussion/view/<?= $post['id'] ?>/" name="post_reopened">
						<input type="hidden" name="post_id" value="<?= $post['id'] ?>" />
						<input type="submit" name="mark_as_reopened" class="tiny radius button" style="margin-top: 20px;" value="Reopen" />
					</form>
					<? endif; ?>
				</li>
				<li>
					<div class="tiny secondary button" data-reveal-id="edit_discussion" style="margin-top: 20px;">Edit Discussion</div>
				</li>
			</ul>
			<? endif; ?>
			<? if ($_SESSION['user_is_admin'] == 1 && $pagetitle == "View Discussion") : ?>
			<div class="tiny radius alert expand button" data-reveal-id="delete_discussion" style="margin-top: 20px;">Delete Discussion</div>
			<? endif; ?>
			<? endif; ?>
			<hr>
		</div>
		<form method="post" action="/search_posts/">
			<div class="row collapse">
				<div class="large-8 small-8 columns">
					<input type="text" name="search_term" placeholder="search..." style="border-radius: 3px 0 0 3px; margin-bottom: 0;">
				</div>
				<div class="large-4 small-4 columns">
					<input type="submit" name="search" value="Search" class="postfix radius button expand" style="font-size: 0.6875rem; margin-bottom: 0;" />
				</div>
			</div>
		</form>
	</div>
	<div class="row radius panel collapse hide-for-small" style="margin-bottom: 15px;">
		<div class="large-12 medium-12 small-12 columns text-center">
			<h6>View Discussions By Category</h6>
			<hr>
		</div>
		<div class="large-12 medium-12 small-12 columns">
			<a href="/discussions/bugs/" class="tiny radius expand button" style="margin-bottom: 15px;">View Bugs</a>
			<a href="/discussions/features/" class="tiny radius expand button" style="margin-bottom: 15px;">View Features</a>
			<a href="/discussions/questions/" class="tiny radius expand button" style="margin-bottom: 15px;">View Questions</a>
			<a href="/discussions/announcements/" class="tiny radius expand button">View Announcements</a>
		</div>
	</div>
	<? else : ?>
	<div class="row radius panel collapse" style="margin-bottom: 15px;">
		<div class="large-12 small-12 columns">
			<form method="post" action="" name="loginform" data-abide>
				<div class="row collapse">
					<label for="user_name">Username:</label>
					<input id="user_name" type="text" name="user_name" autocorrect="off" autocapitalize="off" required />
					<small class="error">Enter your username to log in.</small>
				</div>

				<div class="row collapse">
					<label for="user_password">Password:</label>
					<input id="user_password" type="password" name="user_password" autocomplete="off" required />
					<small class="error">Enter your password to log in.</small>
				</div>

				<div class="row collapse">
					<ul class="button-group radius even-2" style="margin-left: 5px;">
						<li><input type="submit" name="login" value="Log In" class="tiny button" style="margin-bottom: 15px;" /></li>
						<li><a href="/sign_up/" class="tiny button">Sign Up</a></li>
					</ul>
					<input type="checkbox" id="user_rememberme" name="user_rememberme" value="1" style="margin-bottom: 0;" />
					<label for="user_rememberme"><small>Remember Me</small></label>
				</div>
				<hr>
			</form>
			<form method="post" action="/search_posts/">
				<div class="row collapse">
					<div class="large-8 small-8 columns">
						<input type="text" name="search_term" placeholder="search..." style="border-radius: 3px 0 0 3px; margin-bottom: 0;">
					</div>
					<div class="large-4 small-4 columns">
						<input type="submit" name="search" value="Search" class="postfix radius button expand" style="font-size: 0.6875rem; margin-bottom: 0;" />
					</div>
				</div>
			</form>
		</div>
	</div>
	<? endif; ?>
</div>