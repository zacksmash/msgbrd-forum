<? if ($post) : ?>

<div class="row">
	<div class="large-8 small-12 large-offset-4 columns">
		<h4>View Discussion</h4>
	</div>
</div>

<div class="row">
	<? include('partials/rightside.php'); ?>
	
	<div class="large-8 medium-12 small-12 columns">
		<div class="row collapse panel radius post" style="margin-bottom: 15px;">
			<div class="large-3 medium-3 small-6 columns">
				<div style="margin-bottom: 15px; width:134px; height:134px; background: url('<? if ($avatar = $login->hasAvatar($post['author_id']) == 1) : ?>/public/avatars/avatar-<?= $post['author_id'] ?>.jpg<? else : ?>/public/avatars/default-avatar.png<? endif; ?>') no-repeat center; background-size: 134px; border: 2px solid #efefef; border-radius: 3px;"></div>
			</div>
			<div class="large-9 medium-9 small-6 columns">
				<h3 style="margin-bottom:0"><?= $post['post_title']; ?></h3><? if ($post['edited'] == 1) : ?><b><small>(Edited)</small></b><? endif; ?><br>
				<small>Posted by <b><? if ($login->isUserLoggedIn() == true) : ?><a href="<? if ($post['author_id'] == $_SESSION['user_id']) : ?>/<? else : ?>/users/view/<?= $post['author_id'] ?>/<? endif; ?>"><?= $post['post_author'] ?></a><? else : ?><?= $post['post_author'] ?><? endif ; ?></b> <?= $timeago = $create->timeAgo(strtotime($post['date'])); ?> in</small>
				<span class="<? if ($post['post_category'] == "Bugs") : ?>alert
							     <? elseif ($post['post_category'] == "Features") : ?>success
							     <? elseif ($post['post_category'] == "Questions") : ?>secondary
							     <? elseif ($post['post_category'] == "Announcements") : ?>announcements
							     <? endif; ?>radius label"><?= $post['post_category'] ?></span>
				<? if ($post['post_solved'] == 1 ) : ?><span class="radius label">Solved</span><? elseif ($post['post_solved'] == 2 ) : ?><span class="warning radius label">Reopened</span><? endif; ?>
		    </div>
		    <div class="large-12 small-12 columns" style="margin: 15px 0;">
		    	<span><?= $post['post_message'] ?></span>
		    </div>
		</div>
		<div class="row collapse" style="margin-bottom: 15px;">
			<div class="large-12 small-12 columns">
		    	<? if ($login->isUserLoggedIn() == true) : ?><div class="tiny radius button right" data-reveal-id="new_reply">Reply To This Discussion</div><? endif; ?>
		    </div>
		</div>
		<? if ($replies) : ?>
			<? foreach ($replies as $reply) : ?>
			<? $avatar = $login->hasAvatar($reply['author_id']); ?>
			
			<div class="row collapse panel radius post" style="margin-bottom: 15px;">
				<div class="large-2 small-2 columns">
					<div style="width:50px; height:50px; background: url('<? if ($avatar == 1) : ?>/public/avatars/avatar-<?= $reply['author_id'] ?>.jpg<? else : ?>/public/avatars/default-avatar.png<? endif; ?>') no-repeat center; background-size: 50px; border: 2px solid #efefef; border-radius: 3px;"></div>
				</div>
				<div class="large-10 small-10 columns">
					<span><?= $reply['reply_message']; ?></span><br>
					<small>Posted by <b><? if ($login->isUserLoggedIn() == true && $reply['author_id'] != 0) : ?><a href="<? if ($reply['author_id'] == $_SESSION['user_id']) : ?>/<? else : ?>/users/view/<?= $reply['author_id'] ?>/<? endif; ?>"><?= $reply['reply_author'] ?></a><? else : ?><?= $reply['reply_author'] ?><? endif ; ?></b> <?= $timeago = $create->timeAgo(strtotime($reply['date'])); ?> in</small>
			    </div>
			    <? if ($login->isUserLoggedIn() == true) : ?>
				    <? if ($_SESSION['user_is_admin'] == 1 && $reply['author_id'] != 0) : ?>
				    <div class="large-12 small-12 columns">
				    	<a><span class="alert radius label right delete-reply" data-reveal-id="delete_reply" data-reply-id="<?= $reply['id'] ?>" onclick="getReplyId(this)">Delete Reply</span></a>
				    </div>
				    <? endif; ?>
				<? endif; ?>
			</div>
			<? endforeach; ?>
			<div class="row collapse" style="margin-bottom: 15px;">
				<div class="large-12 small-12 columns">
		    		<? if ($login->isUserLoggedIn() == true) : ?><div class="tiny radius button right" data-reveal-id="new_reply">Reply To This Discussion</div><? endif; ?>
				</div>
			</div>
		<? else : ?>
			<small>No replies yet, here. <? if ($login->isUserLoggedIn() == true) : ?>Reply to this message!<? else : ?>Log in to reply to this message.<? endif; ?></small>
		<? endif; ?>
		<? include('partials/pagination.php'); ?>
	</div>
</div>

<? include('partials/new_discussion.php'); ?>

<? include('partials/new_reply.php'); ?>

<? if ($login->isUserLoggedIn() == true) : ?>
	<? if ($post['author_id'] === $_SESSION['user_id'] || $_SESSION['user_is_admin'] == 1) : ?>
	<? include('partials/edit_discussion.php'); ?>
	<? endif; ?>
	
	<? if ($_SESSION['user_is_admin'] == 1) : ?>
	<? include('partials/delete_discussion.php'); ?>
	<? include('partials/delete_reply.php'); ?>
	<? endif; ?>
<? endif; ?>

<script>

function getReplyId(e) {
	var reply_id = $(e).data('reply-id');
	$('#reply_id').attr('value',reply_id);
}

</script>

<? endif; ?>