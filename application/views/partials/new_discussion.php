<div id="new_discussion" class="reveal-modal small" data-reveal>
	<form action="" method="post" accept-charset="utf-8" data-abide>
		<div class="row collapse">
			<div class="small-4 large-4 columns">
				<span class="prefix">Post Title:</span>
			</div>
			<div class="small-8 large-8 columns">
				<input type="text" name="post_name" id="post_name" required>
				<small class="error">Add a name for this discussion.</small>
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
			</div>
		</div>
		
		<textarea name="post_message" rows="4"  placeholder="Add a message for this discussion..." required></textarea>
		<small class="error">Add a message to your discussion.</small>
		
		<input type="submit" name="submit_post" value="Submit Discussion" class="tiny radius button">
		<div class="tiny radius secondary button" onclick="$('#new_discussion').foundation('reveal', 'close');">Cancel</div>
	</form>
</div>