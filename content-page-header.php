<?php $pageID = get_the_ID();?>

<section class="row page_header text-center pb-3 pb-md-5">
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
			<?php $description = get_field('page_description');
				if ($description) :
			?>
				<p class="page_description"><?php echo $description; ?></p>

				<?php endif; ?>

			<?php if($pageID == 86 || $pageID == 89 || ($pageID == 77 && !is_user_logged_in()) ) : ?>

				<?php get_template_part( 'content', 'mailchimp-form' ); ?>

			<?php endif; ?>

		</div>
	</article>
</section>