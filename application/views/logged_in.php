<div class="row">
	<div class="large-8 small-12 large-offset-4 columns">
		<h4>My Profile</h4>
	</div>
</div>

<div class="row">
	<? include('partials/rightside.php'); ?>
	<div class="large-8 small-12 columns">
		<div class="row collapse panel radius">
			<div class="large-3 medium-3 small-6 columns" style="padding-right: 15px;">
				<div style="margin-bottom: 15px; width:134px; height:134px; background: url('<? if ($avatar = $login->hasAvatar($_SESSION['user_id']) == 1) : ?>/public/avatars/avatar-<?= $_SESSION['user_id'] ?>.jpg<? else : ?>/public/avatars/default-avatar.png<? endif; ?>') no-repeat center; background-size: 134px; border: 2px solid #efefef; border-radius: 3px;"></div>
			</div>
			<div class="large-9 medium-9 small-6 right columns">
				<div><?= $user['user_name'] ?></div>
				<hr>
				<? if ($user['user_twitter']) : ?><div><a href="<?= $user['user_twitter'] ?>" target="_blank"><i class="icon-twitter"></i> Twitter</a></div><? endif; ?>
				<? if ($user['user_facebook']) : ?><div><a href="<?= $user['user_facebook'] ?>" target="_blank"><i class="icon-facebook"></i> Facebook</a></div><? endif; ?>
				<? if ($user['user_linkedin']) : ?><div><a href="<?= $user['user_linkedin'] ?>" target="_blank"><i class="icon-linkedin"></i> Linked In</a></div><? endif; ?>
			</div>
			<div class="large-12 small-12 columns">
				<h6><b>About Me:</b></h6>
				<? if ($user['user_bio']) : ?><span><?= $user['user_bio'] ?></span><? else : ?><span>Nothing here.</span><? endif; ?>
			</div>
		</div>
	</div>
	
	<div class="large-8 small-12 columns">
		<h4>My Discussions</h4>
	</div>
	
	<div class="large-8 medium-12 small-12 columns">
		<? if ($posts) : ?>
			<? foreach ($posts as $post) : ?>
			<div class="row collapse panel radius" style="margin-bottom: 15px;">
				<div class="large-10 small-10 columns">
					<a href="/discussion/view/<?= $post['id']; ?>/"><?= $post['post_title']; ?> <? if ($post['edited'] == 1) : ?><b><small>(Edited)</small></b><? endif; ?></a><br>
					<small>Posted by <b><?= $post['post_author'] ?></b> <?= $timeago = $create->timeAgo(strtotime($post['date'])); ?> in</small>
					<span class="<? if ($post['post_category'] == "Bugs") : ?>alert
							     <? elseif ($post['post_category'] == "Features") : ?>success
							     <? elseif ($post['post_category'] == "Questions") : ?>secondary
							     <? elseif ($post['post_category'] == "Announcements") : ?>announcements
							     <? endif; ?>radius label"><?= $post['post_category'] ?></span>
					<? if ($post['post_solved'] == 1 ) : ?><span class="radius label">Solved</span><? elseif ($post['post_solved'] == 2 ) : ?><span class="warning radius label">Reopened</span><? endif; ?>
			    </div>
			    <div class="large-2 small-2 columns">
			    	<div style="width: 50px; height: 50px; background: #efefef; border-radius: 10px; text-align: center; float: right;">
			    		<div style="color: #939393; position: relative; top: 5px;">
			    			<span><?= $reply_total = $create->getReplyTotal($post['id']); ?></span>
							<p style="color: #aaa; font-size: 8px;"><? if ($reply_total = $create->getReplyTotal($post['id']) == 1) : ?>Reply<? else : ?>Replies<? endif; ?></p>
						</div>
			    	</div>
			    </div>
			</div>
			<? endforeach; ?>
		<? else : ?>
			<small>No discussions found, here. Start a new one!</small>
		<? endif; ?>
		<? include('partials/pagination.php'); ?>
	</div>
</div>

<? include('partials/new_discussion.php'); ?>