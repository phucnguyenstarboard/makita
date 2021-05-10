<?php
/*
 Template Name: Dealer
 */

get_header();

$sidebar_layout = education_zone_sidebar_layout_class();

?>

<?php
    $current_lat = ( isset($_COOKIE["getlat"]) && $_COOKIE['getlat'] != "" )   ? $_COOKIE['getlat'] : '';
    $current_lon = ( isset($_COOKIE["getlon"]) && $_COOKIE['getlon'] !='' )   ? $_COOKIE['getlon'] : '';


    $region_pr = isset($_REQUEST['regionid']) ? $_REQUEST['regionid'] : '';
    $dealer_type_pr = isset($_REQUEST['dealer_type']) ? $_REQUEST['dealer_type'] : '';

    $paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;

    $args = array(
    'post_type'       => 'dealer',
    'post_status'     => 'publish',
    //'posts_per_page' => 1,
    //'paged' => $paged
    );

    $tax_query = array(
        'relation' => 'AND'
    );

    if(!empty($region_pr)){
        $term_id = $region_pr;
        $region_qr =  array(
            'taxonomy'=> 'dealer-region-category',
            'field' => 'term_id',
            'terms' => $term_id
        );
        $tax_query[] = $region_qr;
    }

    if(!empty($dealer_type_pr)){
        $term_type_id = $dealer_type_pr;
        $dealer_type_qr =  array(
            'taxonomy'=> 'dealer-type-category',
            'field' => 'term_id',
            'terms' => $term_type_id
        );
        $tax_query[] = $dealer_type_qr;
    }

    $args['tax_query'] = $tax_query;
    $args['posts_per_page'] = 10;
    $args['paged'] = $paged;


    $dealer_list = new WP_Query( $args );

    $regions  = get_terms( 'dealer-region-category', array(
        'hide_empty' => false,
    ) );
    $dealer_types  = get_terms( 'dealer-type-category', array(
        'hide_empty' => false,
    ) );

    global $wp;
    // get current url with query string.
    $current_url =  home_url( $wp->request );

    // get the position where '/page.. ' text start.
    $pos = strpos($current_url , '/page');

    // remove string from the specific postion
    $finalurl = substr($current_url,0,$pos);

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="contain-banner">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }  ?>
            </div>
            <div class="content_wrap branch_block ">
                <div class="dealer_search text-center">
                    <form action="<?php echo $finalurl; ?>" method="get">
                        <select  id="dealer_region" name="regionid" class="me-2  mb-3">
                            <option value=0 <?php echo  ($region_pr == 0) ? "selected"  : '';  ?>><?php echo __('Select region','education-zone'); ?></option>
                            <?php foreach ($regions as $region) {?>
                                <option value="<?php echo $region->term_id ; ?>" <?php echo  ($region_pr == $region->term_id) ? "selected"  : '';  ?>><?php echo $region->name; ?></option>
                            <?php } ?>
                        </select>
                        <select id="dealer_type" name="dealer_type" class="me-2  mb-3">
                            <option value=0 <?php echo  ($dealer_type_pr == 0) ? "selected"  : '';  ?>><?php echo __('Select dealer type','education-zone'); ?></option>
                            <?php foreach ($dealer_types as $dealer_type) {?>
                                <option value="<?php echo $dealer_type->term_id ; ?>" <?php echo  ($dealer_type_pr == $dealer_type->term_id) ? "selected"  : '';  ?>><?php echo $dealer_type->name; ?></option>
                            <?php } ?>
                        </select>
                        <a class="btn-location hvr-rectangle-out  mb-2 <?php echo  ($current_lat != "" && $current_lon != "" ) ? "active" : ""; ?>" >
                            <i class="fa fa-map-marker"></i> Use My Location        </a>
                    </form>
                </div>
                <div class="branch_list dealer_list" id="dealer_list">
                    <?php
                        if($dealer_list->have_posts()):
                            while ($dealer_list->have_posts()): $dealer_list->the_post();
                                $dealer_gallery = get_post_meta(get_the_ID(), 'vdw_gallery_id');

                    ?>
                                <div class="row branch_item mb-4">
                                    <?php if(!empty($dealer_gallery)) {?>
                                    <div class="col-lg-6 col-12 branch_bg p-3 position-relative pb-5 pb-lg-0">
                                    <?php }else{ ?>
                                    <div class="col-lg-9 col-sm-6 col-12 branch_bg p-3 position-relative pb-5 pb-lg-0">
                                    <?php } ?>    
                                        <h2><?php the_title() ?><small> (<?php echo get_post_meta( get_the_ID(), 'dealer_code',true );  ?>) </small></h2>
                                        <div class="branch_ct mb-3"><?php the_content() ?></div>
                                        <div class="phone_fax">
                                           <?php
                                                $tel1 = get_post_meta( get_the_ID(), 'dealer_tel1',true );
                                                $tel2 = get_post_meta( get_the_ID(), 'dealer_tel2',true );
                                                $fax = get_post_meta( get_the_ID(), 'dealer_fax',true );
                                                $web_url = get_post_meta(get_the_ID(),'dealer_website',true);
                                                $lat_p = get_post_meta(get_the_ID(),'latitude',true);
                                                $lon_p = get_post_meta(get_the_ID(),'longitude',true);
                                           ?>
                                            <?php if(!empty($tel1)) {?>
                                                <div class="mb-2 tel d-block d-sm-inline-block pe-2 ">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/tel.svg">
                                                    <a href="tel: <?php echo $tel1 ?>"><?php echo $tel1 ?></a>
                                                </div>
                                           <?php } ?>
                                            <?php if(!empty($tel2)) {?>
                                                <div class="mb-2 tel d-block d-sm-inline-block pe-2 ">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/tel.svg">
                                                    <a href="tel: <?php echo $tel2 ?>"><?php echo $tel2 ?></a>
                                                </div>
                                            <?php } ?>
                                            <?php if(!empty($fax)) {?>
                                                <div class="mb-2 tel  fax d-block d-sm-inline-block">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/fax.svg">
                                                   <?php echo $fax ?>
                                                </div>
                                            <?php } ?>
                                            <?php if(!empty($web_url)) {?>
                                                <div class="mb-2 tel ">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/website.png">
                                                    <a href="<?php echo $web_url ?>" class="web_url"><?php echo $web_url; ?></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                            $is_mpc_dealer = get_post_meta(get_the_ID(),'_is_ns_featured_post',true);
                                            if($is_mpc_dealer == 'yes'){
                                        ?>
                                                <span class="tag-mcp"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-mcp.png"></span>
                                            <?php } ?>
                                        <?php
                                            $region = wp_get_post_terms(get_the_ID(),'dealer-region-category',array('field'=>'name'));
                                            if(!empty($region)){
                                                foreach ($region as $re){ ?>
                                                    <span class="tag-state"><?php echo $re->name; ?></span>
                                                <?php }
                                            }
                                        ?>
                                    </div>
                                    <?php if(!empty($dealer_gallery)) {?>
                                    <div class="col-lg-3 col-sm-6 p-0 branch_img branch_bg">
                                            <div class="owl-carousel owl-theme">
                                                <?php foreach ($dealer_gallery[0] as $image) {
                                                   ?>
                                                    <div class="item_slider dealer_img">
                                                        <a href="<?php echo wp_get_attachment_image_url($image,'full') ?>" rel="group_<?php the_ID(); ?>" class="thickbox " >
                                                            <?php echo wp_get_attachment_image($image,'thumbnail'); ?>
                                                        </a>
                                                    </div>
                                                <?php }?>
                                            </div>
                                    </div>
                                     <?php } ?>
                                     <?php if(!empty($dealer_gallery)) {?>
                                    <div class="col-lg-3 col-sm-6 branch_map branch_bg p-0 position-relative">
                                    <?php }else{ ?>
                                    <div class="col-lg-3 col-12 col-sm-6 branch_map  branch_bg p-0 position-relative">
                                    <?php } ?>   
                                    
                                        <a href="<?php echo get_post_meta(get_the_ID(),"dealer_map_url",true)  ?>" target="_blank" title="View on Google Map">

                                            <?php $map_img = get_post_meta(get_the_ID(),"dealer_map_image",true) ;
                                                if(!empty($map_img)){
                                            ?>
                                                    <?php echo wp_get_attachment_image($map_img,"full")  ?>
                                            <?php } ?>
                                        </a>
                                        <?php
                                            if($lat_p !="" && $lon_p !="" && $current_lat != "" && $current_lon != ""){
                                        ?>
                                        <div class="distance   fadeIn"><?php echo  distance($lat_p, $lon_p, $current_lat,$current_lon) ?> km</div>
                                        <?php } ?>
                                    </div>
                                </div>

                    <?php
                            endwhile;
                        endif;

                     ?>



                </div>
                 <div class="row">
                     <?php

                         if (function_exists("ct_pagination")) {

                             ct_pagination($dealer_list->max_num_pages);

                         }
                     wp_reset_query();
                     ?>
                 </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
if( $sidebar_layout == 'right-sidebar' )
    get_sidebar();
get_footer();
