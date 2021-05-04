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
            <div class="container">
                <?php
                    $tax_query[] = array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN',
                    );
                $args = array( 'post_type' => 'product','ignore_sticky_posts' => 1, 'tax_query' => $tax_query);
                $feat_pro = new WP_query( $args);
                ?>



                <div class="slider responsive_featured">
                    <?php  while ( $feat_pro->have_posts() ) : $feat_pro->the_post();?>
                    <div class="featured_item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="item">
                                <div class="item-media">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'class' =>'thumnail') ); ?>
                                </div>
                                <div class="item-content">
                                    <div class="item-title">
                                        <h3><?php the_title(); ?></h3>
                                        <span><?php echo get_post_meta( get_the_ID(), '_sku', true ); ?>  </span>
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
            <div class="container">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12 p-0">
                        <div class="about_makita mh_350">
                            <div class="middle_bg d-none d-xl-block"></div>
                            <div class="summary">
                                <div class="makita-sum text-white text-left">
                                    <?php
                                        while ($makita_home->have_posts()) : $makita_home->the_post();
                                               
                                     ?>
                                    <h1><?php echo get_post_meta(get_the_ID(),'title_makita',true); ?></h1>
                                    <p class="text-justify">
                                        <?php echo get_post_meta(get_the_ID(),'content_makita',true); ?>
                                    </p>
                                    <a class="text-center hvr-rectangle-out" href="<?php echo get_post_meta(get_the_ID(),'makita_global_link',true) ?>" target="_blank">Makita Global</a>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  p-0">
                        <div class="news_block mh_350">
                            <div class="news_block_middle">
                                <div class="text-left p-tb20 p-lr50" >
                                    <h1 class="name">What's On</h1>
                                    <div class="widget-post clearfix  bdr-b-1 m-b10 p-b10">
                                        <div class="recent-posts-entry-date" onclick="location.href = 'news-events/?pagedetail=951';">
                                            <div class="wt-post-date text-center text-uppercase text-white">
                                                <h2 class="title_1">MAY</h2>
                                                <h1 >12</h1>

                                            </div>
                                            <div class="wt-post-info">
                                                <h2 class="post-title">
                                                    <a href="news-events/?pagedetail=951">April New Product Launching Promotion</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-post clearfix  bdr-b-1 m-b10 p-b10">
                                        <div class="recent-posts-entry-date" onclick="location.href = 'news-events/?pagedetail=950';">
                                            <div class="wt-post-date text-center text-uppercase text-white">
                                                <h1 class="title_1">08</h1>
                                                <h2 >Apr</h2>
                                            </div>
                                            <div class="wt-post-info">
                                                <h2 class="post-title">
                                                    <a href="news-events/?pagedetail=950">Raya and Parents Day Promotion</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-post clearfix  bdr-b-1 m-b10 p-b10">
                                        <div class="recent-posts-entry-date" onclick="location.href = 'news-events/?pagedetail=938';">
                                            <div class="wt-post-date text-center text-uppercase text-white">
                                                <h1 class="title_1">10</h1>
                                                <h2>Mar</h2>
                                            </div>
                                            <div class="wt-post-info">
                                                <h2 class="post-title">
                                                    <a href="news-events/?pagedetail=938">March New Product Launching Promotion</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="site-button-secondry hvr-rectangle-out text-uppercase text-center" href="news-events/">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    jQuery('.responsive_featured').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    jQuery(".border-shadow-right").click(function () {
        jQuery(".border-shadow-right a").removeClass("active");
        jQuery(this).find('a').addClass("active");
    })
</script>
<?php
get_footer();