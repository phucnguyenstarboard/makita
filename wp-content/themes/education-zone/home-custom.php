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
                $args = array(
                    'post_type' => 'product',
                   // 'ignore_sticky_posts' => 1,
                    'meta_key' => '_is_ns_featured_post',
                    'meta_value' => 'yes'
                );
                $feat_pro = new WP_query( $args);
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
                $args = array(
                    'post_type'       => 'technology',
                    'post_status'     => 'publish',
                    'posts_per_page' => '4',
                    'meta_query' => array(
                        array(
                            'key'       => 'is_featured',
                            'value'     => '1',
                        )
                    )
                );
                $the_query = new WP_Query( $args );
            ?>
            <div class="container-fluid px-5">
                <h1 class="m-tb50">
                    <?php if($lg == 'en_US'){
                        echo "Technologies" ;
                    }else{
                        echo "Công nghệ" ;
                    }

                    ?>
                </h1>
                <ul class="grid tech-list trans-all">
                    <?php if( $the_query->have_posts() ):
                        while($the_query->have_posts()) : $the_query->the_post();
                    ?>
                            <li class="border-shadow-right">
                                <a href="<?php echo get_permalink() ?>" target="_blank" >
                                    <?php the_post_thumbnail() ?>
                                    <h3><?php the_title() ?></h3>
                                </a>
                            </li>
                    <?php endwhile; endif; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
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
                // 'ignore_sticky_posts' => 1,
                'meta_key' => '_is_ns_featured_post',
                'meta_value' => 'yes'
            );
            $feat_news = new WP_query( $args_news);
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12 p-0">
                        <div class="about_makita mh_350">
                            <div class="middle_bg d-none d-xl-block"></div>
                            <div class="summary">
                                <div class="makita-sum text-white text-left">
                                    <h1>
                                        <?php
                                        $lang_h = get_locale();
                                        if($lang_h=='en_US'){
                                            echo "News";
                                        }else{
                                            echo "Tin tức";
                                        }
                                        ?>
                                    </h1>
                                    <?php
                                        while ($feat_news->have_posts()) : $feat_news->the_post();
                                               
                                     ?>
<!--                                    <h1>--><?php //echo the_title() ?><!--</h1>-->
                                    <p class="text-justify">
                                        <?php echo  the_title(); ?>
                                    </p>

                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                    <a class="text-center hvr-rectangle-out" href="/news" target="_blank">
                                        <?php
                                        $lang_h = get_locale();
                                        if($lang_h=='en_US'){
                                            echo "View More";
                                        }else{
                                            echo "Xem thêm";
                                        }
                                        ?>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  p-0">
                        <div class="news_block mh_350 home_footer">
                            <div class="news_block_middle">
                                <div class="text-leff" >
                                    <div class="row">
                                        <div class="col-sm-8 col-12 text-center" data-cattype="1802">
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
                                                $tel2= get_post_meta(get_the_ID(),'footer_tel2',true);
                                                ?>
                                                <?php if(!empty($tel1)): ?>
                                                    <h1 class="tel mt-2 mb-2 ">
                                                        <img src="<?php echo get_template_directory_uri() ?>/images/tel_footer.png">
                                                        <a href="tel: <?php echo  $tel1; ?>"><?php echo $tel1; ?></a>
                                                    </h1>
                                                <?php endif;
                                                if(!empty($tel2)):
                                                    ?>
                                                    <h1 class="tel mt-2 mb-2 ">
                                                        <img src="<?php echo get_template_directory_uri() ?>/images/tel_footer.png">
                                                        <a href="tel: <?php echo $tel2; ?>"><?php echo $tel2; ?></a>
                                                    </h1>
                                                <?php endif; endwhile; ?>
                                            <div>
                                                <div class="search-container text-center mt-5 mb-3">
                                                    <div class="search_wrap d-inline-block">
                                                        <form action="generalenquiry?" class="newsletterEnquiry" method="post" data-fail-pageid="505" data-pass-pageid="505" id="inlineEnquiry">
                                                            <input name="Subjust" type="hidden" value="Newsletter subscription request" /> <input class="input-news" type="text" placeholder="Newsletter Sign Up" name="email" />
                                                            <button class="submit-news hvr-rectangle-out" type="submit"><i class="fa fa-caret-right"></i></button>
                                                        </form>
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
    

    jQuery(".border-shadow-right").click(function () {
        jQuery(".border-shadow-right a").removeClass("active");
        jQuery(this).find('a').addClass("active");
    })
</script>
<?php
get_footer();