<?php
/**
 * @package cfashionstore-lite
 */

get_header(); 
?>
<div class="container">
     <div class="page_content">
        <div class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        
                        while ( have_posts() ) : the_post();
                        ?>   
						<div class="pageheading"><h1><?php the_title(); ?></h1></div>
						<div class="pagecontent"><?php the_content();?></div>
                        <div>
                            <?php
                            wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'cfashionstore-lite' ),
                            'after'  => '</div>',
                            ) );
                            ?>
                        </div>
						 <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
						<?php if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;?>
                        <?php endwhile;
                    endif;
                    ?>
                    </div><!--blog-post -->
             </div><!--site-main-->
             <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {?>
            <?php if ( !is_cart() && !is_checkout()){?>
             <?php get_sidebar();?>
            <?php }?>
        <?php }else{?>
            <?php get_sidebar();?>
        <?php }?>
        <div class="clear"></div>
    </div><!-- row -->
</div><!-- container -->
<?php get_footer(); ?>