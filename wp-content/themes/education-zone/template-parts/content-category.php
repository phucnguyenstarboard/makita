<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Zone
 */
$term = get_queried_object();
$categories = get_categories(
    array( 
    	'parent' => $term->term_id,
    	'orderby' => 'id',
    	'order'   => 'ASC'
    )
);
$is_parent = true;
if (empty($categories)){
	$categories[0] = $term;
	$is_parent = false;
}
?>
<section class="category-product">
    <h1 class="title uk-text-left"><?php echo single_cat_title( '', false );?></h1>
    <div class="bnm-category-compare listCompare">
		<div class="list-items-compare">
			<div class="row">
				<div class="col-md-9 col-xs-12">
					<div class="items-compare listCompare">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div id="jk-item-0" class="jk-item"></div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div id="jk-item-1" class="jk-item"></div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div id="jk-item-2" class="jk-item"></div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div id="jk-item-3" class="jk-item"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-12">
					<div class="compare-link">
						<a onclick="jkCompareLink();" class="compare-products uk-button uk-button-small uk-button-primary" title="Compare products" href="javascript:void(0)">
						<span>Compare</span>
						</a>
					</div>
				</div>
			</div>
		</div>	
    </div>
	<?php
	    if ( $categories ) {
	    	$i = 0;
            foreach ( $categories as $category ) :

	?>    
	<div class="items-by-category<?php echo $i > 0 ? ' pt40' : ''?>">
		<?php if ($is_parent): ?>
		<h2 class="title uk-text-left"><?php echo $category->name;?></h2>
	    <?php endif;?>
		<div class="items">
			<div class="row">
				<?php
					$products = get_posts( array(
					    'post_type'      => 'product',
					    'posts_per_page' => -1,
					    'post_status'    => 'publish',
					    'category'       => $category->cat_ID,
					    'orderby' => 'id',
    	                'order'   => 'ASC'
					) );
				?>
				<?php
				    if ( $products ) {
                        foreach ( $products as $post ) :
                        	$post_id = get_the_ID();                        	
                        	$product_code = get_field_object('product_code' , $post_id);
				?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="panel-item">
						<div class="thumnail-item"> 
							<a href="<?php the_permalink(); ?>" class="MagicZoom-single">
							<img src="<?php echo get_the_post_thumbnail_url($post_id,'full');?>">
							</a>
						</div>
						<div class="bnm-item-title uk-flex-item-1">
							<h3 class="uk-margin-remove">
								<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
							</h3>
						</div>
						<div class="bnm-compare-element">
							<span class="zoocompare-element bnm-zoocompare zl-bootstrap" data-item-id="<?php echo $post_id; ?>" data-item-code="<?php echo empty($product_code['value']) ?  '' : $product_code['value'];?>">
								<span> <input type="checkbox" name="zoocompare" class="zoocompareCheckbox"> </span>
								<a class="bnmzoocompare uk-button uk-button-small uk-button-primary" title="Compare this product" href="javascript:void(0)">
								<span class="zoocompare compare">Compare</span>
								</a>
							</span>
						</div>
					</div>
				</div>
				<?php
				        endforeach; 
				    }
				?>					
			</div>
		</div>	
	</div>
	<?php
	        $i++;
	        endforeach; 
	    }
	?>   	
</section>

<script>
	jQuery( document ).ready(function() { 
		jQuery('.zoocompareCheckbox').change(function() {
			var isCheck = jQuery(this).is(':checked');
			var item_id = jQuery(this).parent().parent().data("item-id");
			var item_code = jQuery(this).parent().parent().data("item-code");
			if (isCheck){
				var html = '<div class="jk-inner jk-compare-inner" data-item-id="'+ item_id +'"><p class="jk-product"><span class="product-code">'+ item_code +'</span><span onclick="removeCompareModule(this);" class="jk-remove-compare icon-remove" data-item-id="'+ item_id +'" data-item-code="'+ item_code +'"><i class="fas fa-times"></i</span></p></div>';
				jQuery(".items-compare .jk-item").each(function () {
	                if (jQuery(this).html().trim().length < 5) {
	                    jQuery(this).append(html);
	                    return false;
	                }
	            });	
			}else{
			    jQuery(".jk-compare-inner").each(function () {
	                if (item_id == jQuery(this).data("item-id")) jQuery(this).remove();
	            });
			}
		});
    });
	function removeCompareModule(el){
	    var $ = jQuery;
	    var icon = $(el),
	        data = icon.data('item-data'),
	        inner = icon.parents('.jk-inner')
	    ;
	    inner.fadeOut();
	   
	    console.log(data);
	                $('.zoocompare-element').each(function(ii, elx){
	            var item_id = jQuery(elx).data('item-id');
	            if(item_id == icon.data('item-id')){
	                jQuery(elx).find('.zoocompareCheckbox').prop('checked', false);
	            }
	        });
	            $.ajax({
	        url : ''
	    }).done(function(respone){
	        inner.remove();
	    })
	     // inner.remove();
	}
	
	
	function jkCompareLink(){
	    var link = false;
	    var i = 0;
	    jQuery('.items-compare .jk-item .jk-inner').each(function(){
	        if(jQuery(this).length > 0){
	            var item_id = jQuery(this).data('item-id');
	            if (i == 0){
	            	link = '/compare?item_id['+i+']='+ item_id ;
	            }else{
	            	link += '&item_id['+i+']='+ item_id ;
	            }
	            
	            i++;
	            //break;
	        }
	    });
	    if(link){
	        window.location.href= '<?php echo site_url();?>' + link;
	    }else alert('Please select product to compare');
	}
	
</script>