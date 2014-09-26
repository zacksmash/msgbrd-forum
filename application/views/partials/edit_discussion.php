<div id="edit_discussion" class="reveal-modal small" data-reveal>
	<form action="/discussion/view/<?= $post['id']; ?>/" method="post" accept-charset="utf-8" data-abide>
		<div class="row collapse">
			<div class="small-4 large-4 columns">
				<span class="prefix">Name:</span>
			</div>
			<div class="small-8 large-8 columns">
				<input type="text" name="post_name" value="<?= $post['post_title']; ?>" disabled>
			</div>
		</div>
		
		<div class="row collapse">
			<div class="small-4 large-4 columns">
				<span class="prefix">Category</span>
			</div>
			<div class="small-8 large-8 columns">
				<select name="post_category" id="post_category">
					<option value="Bugs">Bug</option>
					<option value="Features">Feature</option>
					<option value="Questions">Question</option>
					<? if ($_SESSION['user_is_admin'] == 1) : ?>
					<option value="Announcements">Announcement</option>
					<? endif; ?>
				</select>
				<small class="error">Select a category.</small>
			</div>
		</div>
		
		<textarea name="post_message" rows="4"  placeholder="Add a message for this discussion..." required><?= $post['post_message']; ?></textarea>
		<small class="error">Add a message for this discussion.</small>
		
		<input type="hidden" name="post_id" value="<?= $post['id']; ?>">
		<input type="submit" name="update_post" value="Update Discussion" class="tiny radius button">
		<div class="tiny radius secondary button" onclick="$('#edit_discussion').foundation('reveal', 'close');">Cancel</div>
	</form>
</div>