<?php
/*
 Template Name: News
 */

get_header();

$sidebar_layout = education_zone_sidebar_layout_class();

?>

<?php
    $args = array(
        'post_type'       => 'news',
        'post_status'     => 'publish',
    );
    $news_list = new WP_Query( $args );

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class=" content_wrap about_content">
                <?php while ($news_list->have_posts()) : $news_list->the_post();
                    ?>
                    <div class="row mb-4">
                        <div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
                            <div class="news_img">                        
                                 <a href="<?php the_permalink(); ?>">
                                     <?php  the_post_thumbnail('news-size'); ?>
                                 </a>
                            </div>
                         </div>
                         <div class="col-12 col-sm-8 col-md-9">
                             <h2 class="news_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                             <p class="news_date"><?php the_date('d F Y'); ?></p>
                             <?php the_excerpt(); ?>
                         </div>  
                    </div>                

                <?php endwhile ; wp_reset_query() ;?>
                <?php wp_reset_postdata(); ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
if( $sidebar_layout == 'right-sidebar' )
    get_sidebar();
get_footer();
