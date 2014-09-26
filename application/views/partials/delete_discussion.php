<div id="delete_discussion" class="reveal-modal small" data-reveal>
	<div class="large-12 medium-12 small-12 columns text-center">
			<h4>Are you sure you want to delete this post?</h4>
	</div>
	
	<div class="large-6 small-6 columns">
		<form action="/discussions/" method="post">
			<input type="hidden" name="post_id" id="post_id" value="<?= $_GET['id']; ?>">
			
			<button type="submit" name="delete_post" class="tiny radius alert expand button">Yes</button>
		</form>
	</div>
	
	<div class="large-6 small-6 columns">
		<button class="tiny radius secondary expand button" onclick="$('#delete_discussion').foundation('reveal', 'close');">No</button>
	</div>
</div>