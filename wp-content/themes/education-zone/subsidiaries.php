<?php
/*
 Template Name: Subsidiaries
 */

get_header();

$sidebar_layout = education_zone_sidebar_layout_class();

?>
<?php
    $list_countries = get_terms('subsidiary-category', array( 'hide_empty' => 0 ));    
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
                <div class="tab_country">
                    <ul class="nav nav-pills m-0 mb-3" id="pills-tab" role="tablist">
                        <li class="region_cls"><?php echo __("Choose your country or region","education-zone") ?></li>
                        <?php foreach ($list_countries as $key => $value) {                           
                            ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo  ($key == 0) ?  'active' : ''  ;?>" id="pills-<?php echo $key ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $key ?>" type="button" role="tab" aria-controls="pills-<?php echo $key ?>" aria-selected="<?php echo  ($key == 0) ?  true : false  ;?>">

                                    <?php echo $value->name ?>
                                        
                                </button>
                              </li>
                       <?php  } ?>                      
                     
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <?php foreach ($list_countries as $key => $value) { ?>  
                        <div class="tab-pane fade show <?php echo  ($key == 0) ?  'active' : ''  ;?>" id="pills-<?php echo $key ?>" role="tabpanel" aria-labelledby="pills-<?php echo $key ?>-tab">
                            <?php 
                                $stores_arr = array(
                                'post_type' => 'subsidiary',
                                'tax_query' => array(
                                    array(
                                    'taxonomy' => 'subsidiary-category',
                                    'field' => 'term_id',
                                    'terms' => $value->term_id
                                     )
                                  )
                                );
                                $stores = new WP_Query( $stores_arr );
                            ?>
                             <div class="row store_list">
                             <?php while($stores->have_posts()): $stores->the_post();?>
                                    <div class="col-6 col-md-3 pt-3 pb-3 text-center">
                                        <a href="<?php echo get_post_meta(get_the_ID(),'link_web',true); ?>" target="_blank">
                                        <?php the_title(); ?>
                                    </a>
                                            
                                        </div>
                             <?php endwhile; ?>
                             </div>
                        </div>
                      <?php } ?>
                      
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<script type="text/javascript">
    var triggerTabList = [].slice.call(document.querySelectorAll('#tab_region a'))
    triggerTabList.forEach(function (triggerEl) {
      var tabTrigger = new bootstrap.Tab(triggerEl)

      triggerEl.addEventListener('click', function (event) {
        event.preventDefault()
        tabTrigger.show()
      })
    })
</script>
<?php
if( $sidebar_layout == 'right-sidebar' )
    get_sidebar();
get_footer();
