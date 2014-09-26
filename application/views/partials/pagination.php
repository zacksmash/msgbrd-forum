<? if ($total > $limit) : ?>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<ul class="pagination">
			<li class="arrow <? if ($page <= 2) : ?>unavailable<? endif; ?>">
				<a  <? if ($page >= 3) : ?>href="?<? if (isset($_GET['search'])) : ?>search=<?= $_GET['search'] ?>&amp;<? endif; ?>page=1"<? endif; ?>>&laquo;</a>
			</li>
			<li class="arrow <? if ($page == 1) : ?>unavailable<? endif; ?>">
				<a <? if ($page > 1) :?>href="?<? if (isset($_GET['search'])) : ?>search=<?= $_GET['search'] ?>&amp;<? endif; ?>page=<?= $page - 1 ?><? endif; ?>">&lsaquo;</a>
			</li>
			<li class="current">
				<a>Page <?= $page ?> of <?= $pages ?></a>
			</li>
			<li class="arrow <? if ($page == $pages) : ?>unavailable<? endif; ?>">
				<a <? if ($page < $pages) :?>href="?<? if (isset($_GET['search'])) : ?>search=<?= $_GET['search'] ?>&amp;<? endif; ?>page=<?= $page + 1 ?><? endif; ?>">&rsaquo;</a>
			</li>
			<li class="arrow <? if (($pages - $page) <= 1) : ?>unavailable<? endif; ?>">
				<a <? if (($pages - $page) >= 2) : ?>href="?<? if (isset($_GET['search'])) : ?>search=<?= $_GET['search'] ?>&amp;<? endif; ?>page=<?= $pages ?><? endif; ?>">&raquo;</a>
			</li>
		</ul>
	</div>
</div>
<? endif; ?>