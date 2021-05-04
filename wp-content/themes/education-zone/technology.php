<?php
/*
 Template Name: Technology
 */

get_header();

$sidebar_layout = education_zone_sidebar_layout_class();

?>

<?php
        $args = array(
            'post_type'       => 'technology',
            'post_status'     => 'publish',
        );
        $the_technology = new WP_Query( $args );
       ?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="contain-banner">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }  ?>
            </div>
            <div class="row technology_wrap">
                <?php if( $the_technology->have_posts() ):
                    while($the_technology->have_posts()) : $the_technology->the_post();
                        ?>
                        <div class="col-md-3 col-sm-6 col-12 pb-3 text-center text-md-left">
                            <a href="<?php echo get_permalink() ?>" target="_blank" >
                                <div class="tech_item">
                                        <div class="shadow-divider">
                                            <?php the_post_thumbnail() ?>
                                        </div>
                                        <h4 class="text-md-start text-center"><?php the_title() ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
if( $sidebar_layout == 'right-sidebar' )
    get_sidebar();
get_footer();
