<div class="row">
	<div class="large-8 small-12 large-offset-4 columns">
		<h4>Latest Discussions</h4>
	</div>
</div>

<div class="row">
	<? include('partials/rightside.php'); ?>

	<div class="large-8 medium-12 small-12 columns">
		<? if ($posts) : ?>
		<? foreach ($posts as $post) : ?>
		<? $avatar = $login->hasAvatar($post['author_id']); ?>

		<div class="row collapse panel radius post" style="margin-bottom: 15px;">

			<div class="large-2 small-6 columns">
				<div style="width:50px; height:50px; background: url('<? if ($avatar == 1) : ?>/public/avatars/avatar-<?= $post['author_id'] ?>.jpg<? else : ?>/public/avatars/default-avatar.png<? endif; ?>') no-repeat center; background-size: 50px; border-radius: 3px;"></div>
			</div>

			<div class="large-2 small-6 columns right">
				<div style="width: 50px; height: 50px; background: #efefef; border-radius: 10px; text-align: center; float: right;">
					<div style="color: #aaa; position: relative; top: 5px;">
						<span><?= $reply_total = $create->getReplyTotal($post['id']); ?></span>
						<p style="color: #939393; font-size: 8px;">
							<? if ($reply_total = $create->getReplyTotal($post['id']) == 1) : ?>Reply
							<? else : ?>Replies
							<? endif; ?>
						</p>
					</div>
				</div>
			</div>

			<div class="large-8 small-12 columns">
				<a href="/discussion/view/<?= $post['id']; ?>/"><?= $post['post_title']; ?>
					<? if ($post['edited'] == 1) : ?><b><small>(Edited)</small></b>
					<? endif; ?></a><br>
				<small>Posted by <b><?= $post['post_author'] ?></b> <?= $timeago = $create->timeAgo(strtotime($post['date'])); ?> in</small>
				<span class="<? if ($post['post_category'] == " Bugs") : ?>alert
					<? elseif ($post['post_category'] == "Features") : ?>success
					<? elseif ($post['post_category'] == "Questions") : ?>secondary
					<? elseif ($post['post_category'] == "Announcements") : ?>announcements
					<? endif; ?> radius label"><?= $post['post_category'] ?></span>
				<? if ($post['post_solved'] == 1 ) : ?><span class="radius label">Solved</span>
				<? elseif ($post['post_solved'] == 2 ) : ?><span class="warning radius label">Reopened</span>
				<? endif; ?>
			</div>

		</div>
		<? endforeach; ?>
		<? else : ?>
		<small>No discussions found, here.</small>
		<? endif; ?>
		<? include('partials/pagination.php'); ?>
	</div>

</div>