
<?php if( have_rows('tabs') ): ?>

	<?php $tabs_row = 0; ?>

	<section class="tabs">

	<nav class="tabs-nav">
	    <ul class="tabs-nav-entries">
	       
	       <?php 
	       		while ( have_rows('tabs') ) : the_row();
	       	 		++$tabs_row;
	       			$tab__title = get_sub_field('tab__title');
	       			$tab__data = str_replace(' ','-',$tab__title);
	       			
	       			if ( $tabs_animation["animation_active"] ) {
	       				echo '<li class="tabs-nav-entry" data-aos="' . $tabs_animation["animation_name"] .'" data-aos-delay="' . $tabs_animation["animation_delay"] * $tabs_row . '" data-content="' . $tab__data . '">' . $tab__title . '</li>';
	       			} else {
	       				echo '<li class="tabs-nav-entry" data-content="' . $tab__data . '">' . $tab__title . '</li>';
	       			}

	       		endwhile;
	       	?>
	        	
	       
	    </ul>
	</nav>

	

	<ul class="tabs-entries">
	    
		<?php 
			while ( have_rows('tabs') ) : the_row(); 
			$tab__title = get_sub_field('tab__title');
	       	$tab__data = str_replace(' ','-',$tab__title);
		?>
		
		<li class="tab-entry" data-content="<?php echo $tab__data; ?>">
	    	<h3><?php the_sub_field('tab__title'); ?></h3>
	    	<?php the_sub_field('tab__content'); ?>
	    </li>

	    <?php endwhile; ?>
    
	</ul>

	

</section>

<?php else : endif; ?>