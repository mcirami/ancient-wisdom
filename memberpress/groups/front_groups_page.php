
<div class="row text-center mb-5 pb-5">
	<div class="col-12">
		<div class="container">
			<p><?php the_field('top_description', 'options'); ?></p>
		</div>
	</div>
</div>

<?php if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');} ?>

<?php
  $products       = $group->products();
  $group_theme    = preg_replace('~\.css$~', '', (is_null($theme) ? $group->group_theme : $theme));
  $group_template = $group->group_template();
?>
<div class="mepr-price-menu <?php echo $group_theme; ?> <?php echo $group_template; ?>">
  <div class="mepr-price-boxes mepr-<?php echo count($products); ?>-col">
  <?php
    if(!empty($products)) {
      foreach($products as $product) {
	      if($product->pricing_title == "Monthly Membership") {
		      $oldPrice = "$19.99/mo";
	      } elseif ($product->pricing_title == "Annual Membership") {
		      $oldPrice = "$249/yr";
	      } else {
		      $oldPrice = null;
	      }
        MeprGroupsHelper::group_page_item($product, $oldPrice, $group );
      }
    }
  ?>
  </div>
</div>


<div class="row text-center my-5 py-5">
	<div class="col-12">
		<div class="container">
			<p><?php the_field('bottom_description', 'options'); ?></p>
		</div>
	</div>
</div>