<?php 
	global $post;
	$id= $post->ID;
	$slug = $post->post_name;
	$parent = $post->post_parent;
	$parent_link = get_permalink( $parent );

	$search = get_field('searchform', 'option');

	$site__color = get_field('site__color', 'option');
	$subnavi = get_field('subnavi__settings', $parent);

	$value_header_classes = get_field('header__classes', 'option'); 

	if ( is_array($value_header_classes) ) {
		$header_classes = implode(' ', $value_header_classes);
	} else {
		$header_classes = $value_header_classes;
	}

?>

<?php if ( $subnavi["subnavi__show"] && $search == true ) {  ?>

	<header class="header subnavi--active search--active <?php echo $header_classes; ?>" id="header" role="header">

<?php } elseif ( $subnavi["subnavi__show"] ) { ?>

	<header class="header subnavi--active <?php echo $header_classes; ?>" id="header" role="header">

<?php } elseif ( $search == true ) { ?>

	<header class="header search--active <?php echo $header_classes; ?>" id="header" role="header">

<?php } else { ?>

	<header class="header <?php echo $header_classes; ?>" id="header" role="header">

<?php } ?>	

	<?php 
		if ( $search == true ) { ?>
			
			<div class="header__search">
				<?php get_search_form(); ?>
			</div>

	<?php } ?>

	<div class="header__container">
		
		<?php get_template_part('_modules/_header__logo'); ?>
		
		<nav class="header__navigation navigation" role="navigation">
			<?php get_template_part('_menus/_menu-primary');?>
			<?php get_template_part('_modules/_cta');?>
		</nav>

	</div>
	
	<?php include(locate_template('_modules/_mega-menu.php')); ?>
	<?php 
		if ( $subnavi["subnavi__show"] ) {	
			include(locate_template('_modules/_subnavi.php'));
		}
	?>

<?php 
	if ($body__maxwidth) {
		echo '<style>.header.header--fixed{ max-width: ' . $body__maxwidth . 'px !important; }</style>';
	}	 
?>

</header>