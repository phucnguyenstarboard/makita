<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Zone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
        <?php 
	    if(has_post_thumbnail()){ 
	      	the_post_thumbnail( 'education-zone-search-result' ); 
	    }else{
	    	education_zone_get_fallback_svg( 'education-zone-search-result' );
	    } 
		
		?>
    </a>
    <div class="text">
        <header class="entry-header">			  	
            <?php //relevanssi_the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><span class="search_index">'.$index_p.'. </span><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <h2 class="entry-title" itemprop="headline">
                <span class="search_index"><?php echo $index_p ?>. </span>
                <a href="<?php echo  get_permalink() ; ?>" rel="bookmark">
                    <?php echo $title = str_ireplace( $s, '<strong class="search-excerpt">'.$s.'</strong>', get_the_title() ) ?>
                </a>
            </h2>

            <?php if(has_category()){ ?>
            <div class="cat-name">
                (
                <?php 
				$category_detail=get_the_category(get_the_ID());
				foreach($category_detail as $cd){
				echo $cd->cat_name;
				}
				?>
                )
            </div>
            <?php } ?>


            <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php education_zone_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content" itemprop="text">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>"
                class="read-more"><?php esc_html_e( 'Read More', 'education-zone' ); ?></a>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->