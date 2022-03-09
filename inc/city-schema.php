<?php if( get_field('area_served_city') ): ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MovingCompany",
  "name": "State2State Movers",
  "image": "https://state2statemovers.com/wp-content/uploads/2020/11/logo.png",
  "url": "https://state2statemovers.com/",
  "telephone": "<?php the_field('phone_number_city_sidebar'); ?>",
  "priceRange": "$ - $$$",
  "slogan": "Get ready to move",
  "description": "State to State Moving and Auto Shipping is a US based long distance company that offers cross country shipping and car transport to customers within the country.",
  "foundingDate": "2010",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "",
    "addressLocality": "<?php the_field('area_served_city'); ?>",
    "addressRegion": "<?php the_field('region_city_schema'); ?>",
    "postalCode": "",
    "addressCountry": "US"
  },

  "areaServed":
  [
  "<?php the_field('area_served_city'); ?>"
  ],
  
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "19:00"
  },

  "contactPoint" : {
     "@type" : "ContactPoint",
      "telephone" : "<?php the_field('phone_number_city_sidebar'); ?>",
      "contactType" : "customer service"
    },

        <?php $post_objects = get_field('reviews_list_for_schema'); ?>
        <?php $count = count(get_field('reviews_list_for_schema')); ?>
        <?php $rowCount = $count; //GET THE COUNT ?>    

 

       "review": [
        
            <?php $i = 1; ?>


                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>


                {
                    "@type": "Review",
                    "name": "<?php the_field('city_test'); ?>",
                    "reviewBody": "<?php the_field('review_content_text', false, false); ?>",
                    "reviewRating": {
                    "@type": "Rating",

                    <?php if (get_field('rating_reviewer') == '5') { ?>
                        "ratingValue": "5",
                    <?php } elseif (get_field('rating_reviewer') == '4') { ?>
                        "ratingValue": "4",
                    <?php } elseif (get_field('rating_reviewer') == '3') { ?>
                        "ratingValue": "3",
                    <?php } elseif (get_field('rating_reviewer') == '2') { ?>
                        "ratingValue": "2",
                    <?php } elseif (get_field('rating_reviewer') == '1') { ?>
                        "ratingValue": "1",
                    <?php } ?>  

                    "bestRating": "5",
                    "worstRating": "1"
                    },
                    "datePublished": "<?php echo get_the_date( 'F j, Y' ); ?>",
                    "author": {"@type": "Person", "name": "<?php the_title(''); ?>"},
                    "publisher": {"@type": "Organization", "name": "State2State Movers"}
                }


                <?php if($i < $rowCount): ?>
                    ,
                <?php endif; ?>


                
                

                <?php
                $rating = get_field('rating_reviewer');
                $ratingsArray[$i++] += get_field('rating_reviewer');
                ?>                

                <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        
        ] ,

        "aggregateRating": {
            "@type": "AggregateRating",
            <?php
                $totalRatings =  array_sum($ratingsArray);      
                $totalCountReview = $totalRatings  / $rowCount ;
            ?>
            "ratingValue": "<?php echo round($totalCountReview , 1); ?>",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "<?php echo $rowCount; ?>",
            "reviewCount": "<?php echo $rowCount; ?>"
        },
  

  "sameAs": [

    <?php if( get_field('yelp_link_schema') ): ?>
        "<?php the_field('yelp_link_schema'); ?>" , 
    <?php endif; ?>

    "https://www.facebook.com/State-to-State-Movers-106202568108996",
    "https://twitter.com/state2statemov",
    "https://www.instagram.com/State2StateMov",
    "https://www.youtube.com/channel/UCbt5R9l-au5G-EHPtYfj_0g"
  ] 
}
</script>

<?php endif; ?>