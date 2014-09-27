<div id="delete_reply" class="reveal-modal small" data-reveal>
	<div class="large-12 medium-12 small-12 columns text-center">
			<h4>Are you sure you want to delete this reply?</h4>
	</div>
	
	<div class="large-6 small-6 columns">
		<form action="/discussion/view/<?= $post['id'] ?>/" method="post">
			<input type="hidden" name="reply_id" id="reply_id" value="">
			
			<button type="submit" name="delete_reply" class="tiny radius alert expand button">Yes</button>
		</form>
	</div>
	
	<div class="large-6 small-6 columns">
		<button class="tiny radius secondary expand button" onclick="$('#delete_reply').foundation('reveal', 'close');">No</button>
	</div>
</div>