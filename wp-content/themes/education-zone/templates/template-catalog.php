<?php
/*
 Template Name: Catalog Page
 */

get_header();
$lg = get_locale();

$cataloges = get_posts( array(
    'post_type'      => 'catalog',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby' => 'id',
    'order'   => 'ASC'
) );
?>
    <div id="primary" class="content-area"> 
        <main id="main" class="site-main" role="main">
            <section class="catalog">
                <div class="row">
                    <?php
                    if ( $cataloges ) {
                        foreach ( $cataloges as $post ) :
                            $post_id = get_the_ID();
                            $pdf_catalog = get_field_object('pdf_catalog' , $post_id);
                    ?> 
                    <div class="col-12 col-sm-6 col-md-4 col-xl-3 item-catalog">
                        <div class="card">
                          <a href="<?php echo $pdf_catalog['value'];?>" target="_blank">
                            <img src="<?php echo get_the_post_thumbnail_url($post_id,'full');?>" class="card-img-top" alt="<?php the_title(); ?>">
                          </a>
                          <div class="card-body text-center">
                            <h5 class="card-title"><a href="<?php echo $pdf_catalog['value'];?>" target="_blank"><?php the_title(); ?></a></h5>
                          </div>
                          <div class="card-footer text-center">
                            <a href="<?php echo $pdf_catalog['value'];?>" download class=""><i class="fas fa-file-pdf-o"></i>Download PDF</a>
                          </div>
                        </div>
                    </div> 
                    <?php
                        endforeach; 
                    }
                    ?>
                </div>
            </section>
        </main>
    </div>
<?php
get_footer();