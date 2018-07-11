<?php 
  $obj = get_queried_object();

  $category = get_post_taxonomies($obj->ID);

  $args = array(
  'post_type'              => $obj->post_type,
  'post_status'            => array( 'publish' ),
  'cat'                    => $category,
  'nopaging'               => false,
  'paged'                  => $paged,
  'offset'                 => $offset,
  'ignore_sticky_posts'    => true,
  'order'                  => 'DESC',
  'orderby'                => 'date',
  'posts_per_page'         => 4,
 );

?>

<div class="product">
  
  <?php get_template_part('_modules/_breadcrumbs'); ?>

  <div class="container__inner row">
    
  <?php if ( has_post_thumbnail() ) { ?>
    <figure class="product__image column columns-4">
    <?php 
          the_post_thumbnail();
          echo "<figcaption>";
            the_post_thumbnail_caption();
          echo "</figcaption>"; 
    ?>    
    </figure>
  <?php } ?>
  
  <div class="product__wrapper column columns-8">

    <h1 class="product__name">
      <?php the_title(); ?>
    </h1>
    
    <div class="product__meta">
      
      <div class="product__price">
        <span class="product__price__amount"><?php the_field('product__amount'); ?></span>
        <span class="product__price__currency"><?php the_field('product__currency'); ?></span>
      </div>

      <div class="product__cta">
        <?php $choice = get_field('product__cta__choice'); ?>
        <?php if ( $choice == 'url' ) { ?>
            <a class="btn btn--negative expand" onClick="ga('send', 'event', 'CTA', 'klick',
'<?php the_title(); ?>' ,1);" href="<?php the_field('product__cta__link'); ?>"><?php the_field('product__cta__txt'); ?></a>
        <?php } elseif ( $choice == 'form' ) { ?>
            <a class="btn btn--negative expand" onClick="ga('send', 'event', 'CTA', 'klick',
'<?php the_title(); ?>' ,1);" href="#orderform"><?php the_field('product__cta__txt'); ?></a>
         <?php } ?>
        
      </div>

      <div class="product__reviews">
        
        <?php 
          $review_count = rand(15, 120);
          $review_rating = get_field('product__reviews__rating'); 
        ?>

        <div class="product__reviews__rating" data-rating="<?php echo($review_rating); ?>">
          <div class="product__reviews__rating__stars">
            <?php
              foreach(range(1, $review_rating) as $number) {
                echo '<i class="fa fa-star"></i>';
              }
              echo ' ' . $review_rating . ' von 5 Sternen bei ' . $review_count . ' Bewertungen.';
            ?>
          </div>
        </div>

      </div>
    
    </div> 

    <div class="product__excerpt">
      <?php the_excerpt(); ?>
    </div>
    
    <?php if ( get_field('product__gallery') ) { ?>
      <div class="product__gallery grid grid-4">
        <?php 
          $gallery = get_field('product__gallery');
          foreach ($gallery as $image) {
            echo '<a class="grid-item" rel="lightbox" href="' . $image['url'] .'"><img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] .'" title="' .  $image['caption'] .'"></img></a>';
          }
        ?>
      </div>
    <?php } ?>
    
    <div class="product__content accordion">
      <h3 class="accordion__headline"><?php _e('Beschreibung:'); ?></h3>
        <div class="accordion__inner">
          <div class="accordion__container"><?php the_content(); ?></div>
        </div>
    </div>

    <div class="product__attributes accordion">
      <h3 class="accordion__headline"><?php _e('Eigenschaften:'); ?></h3>
      <div class="accordion__inner">
        <div class="accordion__container">
          <?php 
            $table = get_field('product__attributes');
            if ( $table ) {
              include(locate_template('_modules/_table.php'));
            }
          ?>
        </div>
      </div>
    </div>
    </div>

    

  </div>
  
  <?php if ( get_field('product__upselling') ) {  ?>
  <section class="product__section">

  <div class="container__inner">
         
    <div class="product__upsale">
      <?php 
            _e('<h2>Das könnte Ihnen auch gefallen:</h2>'); 
            echo '<div class="grid grid-3">';

            $posts = get_field('product__upselling');

            if( $posts ):
            foreach( $posts as $post): // variable must be called $post (IMPORTANT)
                    setup_postdata($post);
                    include(locate_template('_modules/_card--product.php'));
                endforeach;

            wp_reset_postdata();
             endif;
            echo '</div>';
      ?>
        
    </div>

  </div>

  </section>
  <?php } ?>
  
  <section class="product__section">

  <div class="container__inner">

    <div class="product__crosssale">
      <?php 
          _e('<h2>Perfekt dafür gemacht:</h2>'); 

          $query = new WP_Query( $args );

          echo '<div class="grid grid-3">';

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              include(locate_template('_modules/_card--product.php'));
            }
          } else {
          }

          wp_reset_postdata();
          echo '</div>';
      ?>

    </div>

  </div>

</section>

  <section class="product__section">
  
  <?php if ( $choice == 'form' ) { ?>
    <div class="product__form" id="orderform">
      <div class="container__inner">
        <?php the_field('product__cta__form'); ?>
      </div>
    </div>
  <?php } ?>

</section>

</div>
  
<?php $companies = get_field('companies', 'option'); ?>

<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "<?php the_title(); ?>",
  "image": [
    <?php 
      foreach ($gallery as $image) {
            echo '"';
            echo $image["url"];
            echo '",' . " \n" . '';
      }
    ?>
   ],
  "description": "<?php echo get_the_excerpt(); ?>",
  "mpn": "<?php the_field('product__mpn'); ?>",
  "brand": {
    "@type": "Thing",
    "name": "<?php the_field('product__brand'); ?>"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo $review_rating; ?>",
    "reviewCount": "<?php echo $review_count; ?>"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "<?php the_field('product__currency'); ?>",
    "price": "<?php the_field('product__amount'); ?>",
    "priceValidUntil": "2099-11-05",
    "itemCondition": "http://schema.org/NewCondition",
    "availability": "http://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "<?php echo($companies[0]["company__name"]); ?>"
    }
  }
}
</script>