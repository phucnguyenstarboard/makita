<?php
/*
 Template Name: About Makita
 */

get_header();

$sidebar_layout = education_zone_sidebar_layout_class();

?>

<?php
    $about_makita = new WP_Query(array(
        'post_type'=>'page',
        'page_id'=> 249));

    $args = array(
        'post_type'       => 'branch',
        'post_status'     => 'publish',
    );
    $branch_list = new WP_Query( $args );

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="contain-banner">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }  ?>
            </div>
            <div class="row content_wrap about_content">
                <?php while ($about_makita->have_posts()) : $about_makita->the_post();
                    ?>
                    <div class="col-md-12 text-right global_link mb-3">
                        <a class="btn-makita hvr-rectangle-out" href="<?php echo get_post_meta( get_the_ID(), 'makita_global_link',true ) ?>" target="_blank">
                            <i class="fa fa-globe"></i>Makita Global
                        </a>

                    </div>
                    <div class="pg_content">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile ; wp_reset_query() ;?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="content_wrap branch_block">
                <div class="row contact_title">
                    <div class="col-md-6 text-start">
                        <h2>
                            <?php echo get_post_meta( get_the_ID(), 'contact_place_name',true ) ?>
                        </h2>
                    </div>
                    <div class="col-md-6 text-right working_time">
                        <p>Operating Hours : 8.30am to 5.30pm (Mon to Fri)</p>
                    </div>
                </div>
                <div class="branch_list">
                    <?php
                        if($branch_list->have_posts()):
                            while ($branch_list->have_posts()): $branch_list->the_post();
                                $branch_gallery = get_post_meta(get_the_ID(), 'vdw_gallery_id');

                    ?>
                                <div class="row branch_item mb-4">
                                    <div class="col-lg-6 col-12 branch_bg p-3">
                                        <h2><?php the_title() ?></h2>
                                        <div class="branch_ct mb-3"><?php the_content() ?></div>
                                        <div class="phone_fax row">
                                           <?php
                                                $tel1 = get_post_meta( get_the_ID(), 'tel_1',true );
                                                $tel2 = get_post_meta( get_the_ID(), 'tel_2',true );
                                                $fax = get_post_meta( get_the_ID(), 'fax',true )
                                           ?>
                                            <?php if(!empty($tel1)) {?>
                                                <div class="mb-2 tel col-md-5 col-sm-5 col-xs-12">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/tel.svg">
                                                    <a href="tel: <?php echo $tel1 ?>"><?php echo $tel1 ?></a>
                                                </div>
                                           <?php } ?>
                                            <?php if(!empty($tel2)) {?>
                                                <div class="mb-2 tel col-md-5 col-sm-5 col-xs-12">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/tel.svg">
                                                    <a href="tel: <?php echo $tel2 ?>"><?php echo $tel2 ?></a>
                                                </div>
                                            <?php } ?>
                                            <?php if(!empty($fax)) {?>
                                                <div class="mb-2 tel col-md-5 col-sm-5 col-xs-12 fax ">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/fax.svg">
                                                   <?php echo $fax ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-sm-6 p-0 branch_img">
                                        <?php if(!empty($branch_gallery)) {?>
                                            <div class="owl-carousel owl-theme">
                                                <?php foreach ($branch_gallery[0] as $image) {
                                                   ?>
                                                    <div class="item_slider">
                                                       <?php echo wp_get_attachment_image($image,'thumbnail'); ?>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 branch_map p-0">
                                        <a href="<?php echo get_post_meta(get_the_ID(),"map_url",true)  ?>" target="_blank" title="View on Google Map">

                                            <?php $map_img = get_post_meta(get_the_ID(),"map_image",true) ;
                                                if(!empty($map_img)){
                                            ?>
                                                    <?php echo wp_get_attachment_image($map_img,"full")  ?>
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>

                    <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                     ?>

                </div>
            </div>
            <script>
                jQuery(function(){
                    jQuery('.owl-carousel').owlCarousel({
                        loop:false,
                        autoplay:false,
                        autoplayTimeout:2000,
                        margin:30,
                        nav:true,
                        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                        items:1,
                        dots: true,
                        animateOut:'fadeOut',

                    });
                });
            </script>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
if( $sidebar_layout == 'right-sidebar' )
    get_sidebar();
get_footer();
