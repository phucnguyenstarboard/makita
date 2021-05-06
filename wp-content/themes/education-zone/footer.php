<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Zone
 */
    $enabled_sections = education_zone_get_sections();  

    if( ! ( is_front_page() && ! is_home() ) || ! $enabled_sections ){
        if ( !is_front_page() ) {
        ?>
            </div>
        </div>
	</div><!-- #content -->
<?php } } ?>

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter" data-cattype="1802">
<!--        <div class="footer-middle">-->
<!--            <div class="container pd-mfooter">-->
<!--                <div class="container">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-2 col-sm-3  border-shadow-right">-->
<!--                            --><?php //
//                            wp_nav_menu( array(
//                              'menu'     => 'Footer menu',
//                              'sub_menu' => true,
//                              'show_parent' => true,
//                            ) );
//
//                             ?>
<!---->
<!--                        </div>-->
<!--                        <div class="col-md-6 col-sm-5 p-lr30 ">-->
<!--                            <h2>Find a dealer</h2>-->
<!--                            <ul class="search-container p-b20">-->
<!--                                <li>-->
<!--                                    <div class="search-container p-b20">-->
<!--                                <span class="select_box">-->
<!--                                    <select class="select-region">-->
<!--                                        <option value="Dealers/?regionid=11">All</option>-->
<!--                                        <option value="Dealers/?regionid=191">KL &amp; Selangor</option>-->
<!--                                        <option value="Dealers/?regionid=42">Johor</option>-->
<!--                                        <option value="Dealers/?regionid=43">Kedah</option>-->
<!--                                        <option value="Dealers/?regionid=51">Kelantan</option>-->
<!--                                        <option value="Dealers/?regionid=53">Melaka</option>-->
<!--                                        <option value="Dealers/?regionid=98">Negeri Sembilan</option>-->
<!--                                        <option value="Dealers/?regionid=175">Pahang</option>-->
<!--                                        <option value="Dealers/?regionid=54">Penang</option>-->
<!--                                        <option value="Dealers/?regionid=55">Perak</option>-->
<!--                                        <option value="Dealers/?regionid=56">Perlis</option>-->
<!--                                        <option value="Dealers/?regionid=70">Terengganu</option>-->
<!--                                        <option value="Dealers/?regionid=58">Sabah</option>-->
<!--                                        <option value="Dealers/?regionid=59">Sarawak</option>-->
<!--                                    </select>-->
<!--                                </span>-->
<!--                                        <button class="submit-region hvr-rectangle-out" type="submit">Search</button>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            -->
<!--                        </div>-->
<!--                        <div class="col-md-4 col-sm-4 p-lr30 border-shadow-left footer-right">-->
<!--                             --><?php
//                                    $arr_footer = array(
//                                         'post_type'=>'page',
//                                        'page_id'=> 249
//                                    );
//                                    $makita_footer = new WP_Query($arr_footer);
//                                 ?>
<!--                                --><?php //while($makita_footer->have_posts()): $makita_footer->the_post(); ?><!-- -->
<!--                                    --><?php //
//                                        $tel1 = get_post_meta(get_the_ID(),'footer_tel1',true);
//                                        $tel2= get_post_meta(get_the_ID(),'footer_tel2',true);
//                                     ?>
<!--                                     --><?php //if(!empty($tel1)): ?>
<!--                                    <h1 class="tel mt-2 mb-2 ">-->
<!--                                        <img src="--><?php //echo get_template_directory_uri() ?><!--/images/tel_footer.png">-->
<!--                                        <a href="tel: --><?php //echo  $tel1; ?><!--">--><?php //echo $tel1; ?><!--</a>-->
<!--                                    </h1>-->
<!--                                --><?php //endif;
//                                    if(!empty($tel2)):
//                                 ?>
<!--                                    <h1 class="tel mt-2 mb-2 ">-->
<!--                                        <img src="--><?php //echo get_template_directory_uri() ?><!--/images/tel_footer.png">-->
<!--                                        <a href="tel: --><?php //echo $tel2; ?><!--">--><?php //echo $tel2; ?><!--</a>-->
<!--                                    </h1>-->
<!--                                --><?php //endif; endwhile; ?>
<!--                                <div class="footer_social mt-2 mb-2">-->
<!--                                    <div class="social_title">-->
<!--                                        <h2>--><?php //echo __("Connect with us","education-zone") ?><!--</h2>-->
<!--                                    </div>-->
<!--                                    <div class="footer_social_icon g-social">-->
<!--                                          <div id="social-3453-particle" class="g-content g-particle">-->
<!--                                <div class="bnm-social">-->
<!--                                    <div class="g-social">-->
<!--                                        <a target="_blank" href="https://facebook.com/MakitaAustralia" data-uk-tooltip="">-->
<!--                                            <span class="fa fa-facebook-official fa-fw fa-3x"></span>-->
<!--                                        </a>-->
<!--                                        <a target="_blank" href="https://www.youtube.com/user/MakitaAustralia" data-uk-tooltip="">-->
<!--                                            <i class="fa fa-youtube-square" aria-hidden="true"></i>-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            -->
<!--                            <div class="search-container">-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
            <div class="footer-bottom" >
                <div class="container-fluid px-5 p-t30">
                    <div class="row">
                    <div class="wt-footer-bot-left col-md-2 col-12 text-md-left text-center  d-sm-block d-none">
                        <?php
                        if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            the_custom_logo();
                        }
                        ?>
                    </div>
                    <div class="wt-footer-bot-right col-md-8 col-12  text-md-left ">
                        <span>Makita reserves the right to change specification of products without notice. Standard equipment and specifications may differ from country to country. Some products published here may not be sold in your country. The contents of the leaflets can be different from current products since they are original.
                            <br>
                            </span>
                            <p>Copyright © 2021 Makita Power Tools (Malaysia) Sdn Bhd. All Rights Reserved.
                                <span style="color: #ccc;">Web powered by
                                    <a href="https://www.entertop.com.my" rel="nofollow" title="Entertop | Web design company in Malaysia" target="_blank" style="color: #ccc;">Entertop</a>.
                                </span>
                            </p>
                    </div>
                </div>
                </div>
            </div>

<!--	      --><?php //if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) { ?>
<!--            <div class="widget-area">-->
<!--				<div class="row">-->
<!--					-->
<!--                    --><?php //if( is_active_sidebar( 'footer-one') ) { ?>
<!--                        <div class="col">--><?php //dynamic_sidebar( 'footer-one' ); ?><!--</div>                        -->
<!--                    --><?php //} ?><!-- -->
<!--                    -->
<!--                    --><?php //if( is_active_sidebar( 'footer-two') ) { ?>
<!--                        <div class="col">--><?php //dynamic_sidebar( 'footer-two' ); ?><!--</div>                        -->
<!--                    --><?php //} ?><!-- -->
<!--                    -->
<!--                    --><?php //if( is_active_sidebar( 'footer-three') ) { ?>
<!--                        <div class="col">--><?php //dynamic_sidebar( 'footer-three' ); ?><!--</div>                        -->
<!--                    --><?php //} ?>
<!--                        				-->
<!--				</div>-->
<!--			</div>-->
<!--            --><?php //} ?>
<!--            -->
<!--			<div class="site-info">-->
<!--			    --><?php //if( get_theme_mod('education_zone_ed_social') ) do_action('education_zone_social');
//
//                $copyright_text = get_theme_mod( 'education_zone_footer_copyright_text' ); ?>
<!--                    -->
<!--                <p> -->
<!--                --><?php //
//                    if( $copyright_text ){
//                        echo '<span>' .wp_kses_post( $copyright_text ) . '</span>';
//                    }else{
//                        echo '<span>';
//                        echo  esc_html__( 'Copyright &copy;', 'education-zone' ) . date_i18n( esc_html__( 'Y', 'education-zone' ) );
//                        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.</span>';
//                    }?>
<!--    			    <span class="by">-->
<!--                        --><?php //echo esc_html__( 'Education Zone | Developed By', 'education-zone' ); ?>
<!--                        <a rel="nofollow" href="--><?php //echo esc_url( 'https://rarathemes.com/' ); ?><!--" target="_blank">--><?php //echo esc_html__( 'Rara Theme', 'education-zone' ); ?><!--</a>.-->
<!--                        --><?php //printf( esc_html__( 'Powered by %s.', 'education-zone' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'education-zone' ) ) .'" target="_blank">WordPress</a>' ); ?>
<!--                    </span>-->
<!--                    --><?php //
//                        if ( function_exists( 'the_privacy_policy_link' ) ) {
//                            the_privacy_policy_link();
//                        }
//                    ?>
<!--                </p>-->
<!--			</div><!-- .site-info -->
<!--		</div>-->
	</footer><!-- #colophon -->
    <div class="footer-overlay"></div>
</div><!-- done for accessibility reasons -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
