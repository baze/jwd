<?php 
	global $post;
	$id= $post->ID;
	$slug = $post->post_name;
	$parent = $post->post_parent;
	$parent_link = get_permalink( $parent );

	$site__color = get_field('site__color', 'option');
	$subnavi = get_field('subnavi__settings', $parent);

	$value_header_classes = get_field('header__classes', 'option'); 

	if ( is_array($value_header_classes) ) {
		$header_classes = implode(' ', $value_header_classes);
	} else {
		$header_classes = $value_header_classes;
	}

?>

<?php if ( $subnavi["subnavi__show"] ) {  ?>

	<header class="header subnavi--active <?php echo $header_classes; ?>" id="header" role="header">

<?php } else { ?>

	<header class="header <?php echo $header_classes; ?>" id="header" role="header">

<?php } ?>	

	<div class="header__container">
		
		<?php get_template_part('_modules/_header__logo'); ?>

		<?php if ( get_field('searchform', 'option') ) { ?>
			
			<div class="header__search">
				<?php get_search_form(); ?>
			</div>

		<?php } ?>
		

		<nav class="header__navigation navigation" role="navigation">
			<?php get_template_part('_menus/_menu-primary');?>
			<?php get_template_part('_modules/_cta');?>
		</nav>

	</div>
	
	<?php include(locate_template('_modules/_subnavi.php')); ?>

<?php echo '<style>.header.header--fixed{ max-width: ' . $body__maxwidth . 'px !important; }</style>'; ?>

</header>