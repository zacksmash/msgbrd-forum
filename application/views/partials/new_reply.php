<div id="new_reply" class="reveal-modal small" data-reveal>
	<form action="/discussion/view/<?= $post['id']; ?>/" method="post" accept-charset="utf-8" data-abide>
		<textarea name="reply_message" rows="4"  placeholder="Add a message for this reply..." required></textarea>
		<small class="error">Add a message for this reply.</small>
		
		<input type="hidden" name="op_email" value="<?= $post['author_email'] ?>" />
		<input type="hidden" name="post_id" value="<?= $post['id'] ?>" />
		
		<input type="submit" name="submit_reply" value="Submit Reply" class="tiny radius button">
		<div class="tiny radius secondary button" onclick="$('#new_reply').foundation('reveal', 'close');">Cancel</div>
	</form>
</div>