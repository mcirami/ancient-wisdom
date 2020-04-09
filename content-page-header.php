<section class="row page_header text-center pb-5">
	<article class="col-12">
		<div class="container">
			<h2 class="page_title">
				<?php $pageTitle = get_field('page_title');
					if ($pageTitle) :
						echo $pageTitle;
					else :
				?>
					<?php wp_title(''); ?>

					<?php endif; ?>
					<br>
					<div class="blue_line"></div>
			</h2>
			<p class="page_description"><?php the_field('page_description'); ?></p>
		</div>
	</article>
</section>