<div class="module gallery">
	<h2><?= $module['title']; ?></h2>
	<div class="content"><?= $module['content']; ?></div>
	<ul>
		<?php foreach($module['images'] as $image) { ?>
			<?php
			$title = $image['title'];
			$content = $image['content'];
			$thumbnail = $image['thumbnail']['sizes']['program'];
			?>
			<li style="background-image: url();">
				<img src="<?= $thumbnail; ?>" alt="">
				<div class="content">
					<h3><?= $title; ?></h3>
					<p><?= $content; ?></p>
				</div>
			</li>
		<?php } ?>
	</ul>
</div>
