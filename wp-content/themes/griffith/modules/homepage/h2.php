<section class="cta module">
	<div>
		<?php foreach ($module['ctas'] as $cta): ?>
			<section>
				<h2><?php echo $cta['title'] ?></h2>
				<p><?php echo $cta['content'] ?></p>
				<?php
					$linkTarget = '';
					if (isset($cta['link_type']) && $cta['link_type'] === 'external') {
						$link = $cta['link_external'];
						$linkTarget = '_blank';
					} else {
						$link = GriffithHelper::getUrl($cta['link_internal']);
					}
				?>
				<a href="<?php echo $link ?>" target="<?php echo $linkTarget ?>"><?php echo $cta['label'] ?></a>
			</section>
		<?php endforeach ?>
	</div>
</section>