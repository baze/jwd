<?php if ( $subnavi["subnavi__show"] ) {  ?>

	<?php 
		if ( $subnavi["subnavi__color"] ) {
			$subnavi__color = $subnavi["subnavi__color"];
		} else {
			$subnavi__color = $site__color;
		}
	?>

	<nav class="subnavi" role="navigation" style="background-color:<?php echo $subnavi__color; ?>;">
			<?php if ( $subnavi["subnavi__logo"] ) {  ?>
				<a class="subnavi__logo__link" href="<?php echo $parent_link; ?>?rel=subnavi-logo&source=<?php echo $slug ?>">
					<img src="<?php echo $subnavi["subnavi__logo"]["url"]; ?>" alt="" class="subnavi__logo">
				</a>
			<?php } ?>
			
			<?php if ( $subnavi["subnavi__pages"] ) {  ?>
			
				<?php $subnavi__pages = $subnavi["subnavi__pages"]; ?>

				<ul class="subnavi__pages">
					<?php 
						foreach ($subnavi__pages as $page) {

							$page__id = $page->ID;
							$page__title = $page->post_title;
							$page__url = get_permalink($page__id);

							if ($id == $page__id) {
								echo '<li class="subnavi__pages__entry current"><a href="' . $page__url . '?rel=subnavi&source='. $slug . '">' . $page__title . '</a></li>';
							} else {
								echo '<li class="subnavi__pages__entry"><a href="' . $page__url . '?rel=subnavi&source='. $slug . '">' . $page__title . '</a></li>';
							}
							
						}
					?>
				</ul>
		
		<?php } ?>
		
		
	</nav>

<?php } ?>