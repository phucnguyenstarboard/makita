<section id="banner">
  <div class="banner ">
      <?php if ( is_front_page() || is_home() ) {?>
        <?php if ( get_header_image() ) : ?>
        <div class="homeslider">
          <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" >
          <?php
            $banner_heading = get_theme_mod('banner_heading');
            $banner_sub_heading = get_theme_mod('banner_sub_heading');
            $banner_readmore_text = get_theme_mod('banner_readmore_text');
            $banner_read_more_link = get_theme_mod('banner_read_more_link');
            if( !empty($banner_heading) || !empty($banner_sub_heading)){ ?>
              <div class="bannercontent">
                <div class="banner_heading"><h3><?php echo esc_html($banner_heading); ?></h3></div><!--banner_heading-->
                <div class="banner_sub_heading"><?php echo esc_html($banner_sub_heading); ?></div><!--banner_heading-->
                <?php if( !empty($banner_readmore_text) && !empty($banner_read_more_link)){ ?>
                <div class="banner_read_more_link">
                  <a class="button" href="<?php echo esc_url(get_theme_mod('banner_read_more_link')); ?>"><?php echo esc_html($banner_readmore_text); ?></a>
                </div><!--banner_read_more_link-->
              <?php }?>
              </div><!--bannercontent-->
          <?php } ?>
        </div>  <!--homeslider-->
    <?php endif; ?>
    <?php }elseif(is_page() ){?>
          <?php if ( has_post_thumbnail() ) {?> 
            <?php the_post_thumbnail('full');?>           
            <?php }else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/innerbanner.jpg" alt="<?php bloginfo('name'); ?>"> 
            <?php }?>  
    <?php }elseif(is_search()){?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/innerbanner.jpg" alt="<?php bloginfo('name'); ?>">
    <?php }elseif(is_single()){?>
            <?php if ( has_post_thumbnail() ) {?> 
            <?php the_post_thumbnail(array(1600,373));?>           
            <?php }else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/innerbanner.jpg" alt="<?php bloginfo('name'); ?>"> 
            <?php }?>  
    <?php }elseif ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
      if(is_shop() || is_product_category()){?>
         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/innerbanner.jpg" alt="<?php bloginfo('name'); ?>">
    <?php }}?>
  </div><!--banner-->
</section><!--banner-->