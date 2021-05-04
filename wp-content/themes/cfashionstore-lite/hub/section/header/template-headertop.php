<section id="header">
  <header class="container">
    <div class="header_top row">
      
      <div class="header_left headercommon">
      <div class="logo">
          <?php if (display_header_text()==true){?>
          <h1><a href="<?php echo esc_url( home_url( '/') ); ?>"><?php bloginfo('name'); ?></a></h1>
          <p><?php bloginfo('description'); ?></p>
          <?php } ?>          
        </div><!-- logo -->
      </div><!--header_left-->
   
      <div class="header_right headercommon">
        <div class="header-right-top">
          <?php get_search_form();?>
        </div>        
        <div class="clear"></div> 
        <div class="topmenu">
          <?php
          wp_nav_menu( array(
          'theme_location' => 'topmenu'
          ) );
          ?>
        </div><!--topmenu-->

      </div>
      <div class="clear"></div>
    </div><!--header_top-->
    <div class="clear"></div>
    
  </header>
</section><!--header-->
<section id="main_navigation">
  <div class="container">
  <div class="main-navigation-inner mainwidth">
      <div class="toggle">
                <a class="togglemenu" href="#"><?php esc_html_e('Menu','cfashionstore-lite'); ?></a>
             </div><!-- toggle --> 
      <div class="sitenav">
          <?php
          wp_nav_menu( array(
          'theme_location' => 'primary'
          ) );
          ?>
            </div><!-- site-nav -->
    </div><!--main-navigation-->
  </div><!--container-->
</section><!--main_navigation-->