<?php
/*
 Template Name: home-custom
 */

get_header();
$lg = get_locale();
?>
    <div id="content" class="site-content home-content">
        <?php
        echo do_shortcode('[smartslider3 slider="2"]');
        ?>
        <div class="product_popular container-fluid">
            <?php
            $args_popular = array(
                'post_type' => 'product_popular',
                'post_status'     => 'publish',
                'post_per_page' => 3,
            );
            $popular_pr = new WP_query( $args_popular);
           // var_dump($popular_pr->post_count);
            ?>
            <div class="row">
                <?php while ($popular_pr->have_posts()): $popular_pr->the_post(); ?>
                    <div class="col-12 col-sm-4 p-0 popular_wrap">
                        <div class="popular_box position-relative">
                            <a href="<?php echo get_post_meta(get_the_ID(),'attached_link',true) ?>">
                                <?php the_post_thumbnail('full'); ?>
                            </a>
                            <div class="popular_info">
                                <h3 class="popular_title m-0"><?php the_title(); ?></h3>
                                <div class="popular_expert"><?php the_excerpt(); ?></div>
                                <div  class="p_more"><a href="<?php echo get_post_meta(get_the_ID(),'attached_link',true) ?>"><?php echo __('View detail','education-zone') ?></a></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>

        <div class="product_featured">
            <h1 class="m-t50 ">
                <?php if($lg == 'en_US'){
                    echo "Featured Products" ;
                }else{
                    echo "Sản phẩm nổi bật" ;
                }

                ?>
            </h1>
        </div>
        <div class="featured_products">
            <div class="container-fluid">
                <?php
                $args_pr = array(
                    'post_type' => 'product',
                   // 'ignore_sticky_posts' => 1,
                    'meta_key' => '_is_ns_featured_post',
                    'meta_value' => 'yes'
                );
                $feat_pro = new WP_query( $args_pr);

                ?>
                <div class="row p-5rem">
                    <div class="slider responsive_featured owl-carousel owl-theme">
                        <?php  while ( $feat_pro->have_posts() ) : $feat_pro->the_post();
                            $product_code = get_field_object('product_code' , get_the_ID());
                            ?>
                            <div class="featured_item">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="item">
                                        <div class="item-media">
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'class' =>'thumnail') ); ?>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-title">
                                                <h3><?php the_title(); ?></h3>
                                                <span><?php echo empty($product_code['value']) ?  '' : $product_code['value'];?></span>
                                                <small></small> <i class="fa fa-caret-right"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        <?php endwhile; wp_reset_query(); ?>

                    </div>
                </div>





            </div>
        </div>
        <div class="technology">
            <?php
                $args_acc = array(
                    'post_type'       => 'accessory',
                    'post_status'     => 'publish',
                    'meta_key' => '_is_ns_featured_post',
                    'meta_value' => 'yes'
                );
                $the_query_acc = new WP_Query( $args_acc );
            ?>
            <div class="container-fluid featured_accessories">
                <h1 class="m-t50 ">
                    <?php if($lg == 'en_US'){
                        echo "New Accessories" ;
                    }else{
                        echo "Phụ kiện mới" ;
                    }

                    ?>
                </h1>
                <div class="row p-5rem">
                    <div class="technology_wrap accessory_featured owl-carousel owl-theme">
                        <?php if( $the_query_acc->have_posts() ):
                            while($the_query_acc->have_posts()) : $the_query_acc->the_post();
                                ?>
                                <div class="pb-3 text-center text-md-left">
                                    <a href="<?php echo get_permalink() ?>" target="_blank" >
                                        <div class="tech_item">
                                            <div class="shadow-divider">
                                                <?php the_post_thumbnail('thumb',array(300,300)) ?>
                                            </div>
                                            <h4 class="text-md-start text-center"><?php the_title() ?></h4>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="news_wrap">
            <?php
                $arr_mkt = array(
                     'post_type'=>'page',
                    'page_id'=> 249 
                );
                $makita_home = new WP_Query($arr_mkt);
             ?>
            <?php
            $args_news = array(
                'post_type' => 'news',
                'post_status' => 'publish'
            );
            $feat_news = new WP_query( $args_news);
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12 p-0">
                        <div class="about_makita mh_350">
                            <div class="news_home py-3  px-3 px-sm-5">
                                <h2 class="news_lable_h m-0">
                                    <?php if($lg == 'en_US'){
                                        echo "News" ;
                                    }else{
                                        echo "Tin tức" ;
                                    }

                                    ?>
                                </h2>
                                <div class="news_list_h">
                                    <?php while ($feat_news->have_posts()): $feat_news->the_post(); ?>
                                        <div class="row mb-2 ">
                                            <div class="col-4">
                                               <div class="news_img_h">
                                                   <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('news-size') ?></a>
                                               </div>
                                            </div>
                                            <div class="col-8">
                                                <p class="news_date_h m-0"><?php echo get_the_date('d.M.Y'); ?></p>
                                                <h3 class="news_title_h m-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            </div>
                                        </div>
                                    <?php endwhile;wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  p-0">
                        <div class="news_block mh_350 home_footer">
                            <div class="news_block_middle">
                                <div class="text-leff" >
                                    <div class="row">
                                        <div class="col-sm-8 col-12 text-left tel_footer_c" data-cattype="1802">
                                            <?php
                                            $arr_footer = array(
                                                'post_type'=>'page',
                                                'page_id'=> 249
                                            );
                                            $makita_footer = new WP_Query($arr_footer);
                                            ?>
                                            <?php while($makita_footer->have_posts()): $makita_footer->the_post(); ?>
                                                <?php
                                                $tel1 = get_post_meta(get_the_ID(),'footer_tel1',true);
                                                $tel1_note= get_post_meta(get_the_ID(),'note_of_tel_1',true);
                                                $tel2= get_post_meta(get_the_ID(),'footer_tel2',true);
                                                $tel2_note= get_post_meta(get_the_ID(),'note_of_tel_2',true);
                                                $fax= get_post_meta(get_the_ID(),'fax_of_footer',true);
                                                $fax_note= get_post_meta(get_the_ID(),'note_of_fax',true);
                                                ?>
                                                <?php if(!empty($tel1)): ?>
                                                    <h1 class="tel mt-2 mb-2 ">
                                                        <img src="<?php echo get_template_directory_uri() ?>/images/tel_footer.png">
                                                        <a href="tel: <?php echo  $tel1; ?>"><?php echo $tel1; ?></a>
                                                        <?php if(!empty($tel1_note)){ ?>
                                                            <span> (<?php echo $tel1_note; ?>) </span>
                                                        <?php } ?>
                                                    </h1>
                                                <?php endif;
                                                if(!empty($tel2)):
                                                    ?>
                                                    <h1 class="tel mt-2 mb-2 ">
                                                        <img src="<?php echo get_template_directory_uri() ?>/images/tel_footer.png">
                                                        <a href="tel: <?php echo $tel2; ?>"><?php echo $tel2; ?></a>
                                                        <?php if(!empty($tel2_note)){ ?>
                                                            <span> (<?php echo $tel2_note; ?>) </span>
                                                        <?php } ?>
                                                    </h1>
                                                <?php endif; ?>
                                                <?php if(!empty($fax)):
                                                    ?>
                                                    <h1 class="tel mt-2 mb-2 fax ">
                                                        <img src="<?php echo get_template_directory_uri() ?>/images/fax_icon.png">
                                                        <?php echo $fax; ?>
                                                        <?php if(!empty($fax_note)){ ?>
                                                            <span> (<?php echo $fax_note; ?>) </span>
                                                        <?php } ?>
                                                    </h1>
                                                <?php endif; endwhile; ?>
                                            <div>
                                                
                                                <div class="search-container  mt-5 mb-3">
                                                    <div class="search_wrap d-inline-block">
                                                        <div class="newsletter_class">
                                                            <?php echo do_shortcode('[cf7form cf7key="Newsletter"]'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-sm-4 col-12 home_menu text-center text-sm-start">
                                            <div class="d-inline-block text-start" >
                                                <?php
                                                wp_nav_menu( array(
                                                    'menu'     => 'Footer menu',
                                                    'sub_menu' => false,
                                                    'show_parent' => true,
                                                    'depth' => 1
                                                ) );

                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".submit_letter").val('');
    })

    jQuery(function(){
        

        jQuery('.responsive_featured ').owlCarousel({
            loop:false,
            autoplay:false,
            autoplayTimeout:2000,
            margin:0,
            nav:true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            items:4,
            dots: false,
            //animateOut:'fadeOut',
                responsive : {
                    // breakpoint from 0 up
                    0:{
                        items:1
                    },
                        // breakpoint from 480 up
                        480 : {
                            items:2,
                    },
                    // breakpoint from 768 up
                    600 : {
                            items:2
                    },
                    1024 : {
                        items:3
                    },
                    1025 : {
                        items:4
                    }
            }

        });
    });

    jQuery(function(){
        jQuery('.accessory_featured ').owlCarousel({
            loop:false,
            autoplay:false,
            autoplayTimeout:2000,
            margin:30,
            nav:true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            items:4,
            dots: false,
            //animateOut:'fadeOut',
            responsive : {
                // breakpoint from 0 up
                0:{
                    items:1
                },
                // breakpoint from 480 up
                480 : {
                    items:2,
                },
                // breakpoint from 768 up
                600 : {
                    items:2
                },
                1024 : {
                    items:3
                },
                1025 : {
                    items:4
                }
            }

        });
    });

    jQuery(".border-shadow-right").click(function () {
        jQuery(".border-shadow-right a").removeClass("active");
        jQuery(this).find('a').addClass("active");
    })
   
</script>
<?php
get_footer();