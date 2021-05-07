<?php
/*
 Template Name: Compare Page
 */

get_header();
$lg = get_locale();
$post_ids = $_GET['item_id'];

$products = get_posts( array(
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'include'        => $post_ids,
));
$arr_key_check = array('chuck_type', 'impact_energy', 'impact_rate', 'max_drilling_capacities_in_masonry', 'max_drilling_capacities_in_steel', 'max_drilling_capacities_in_wood', 'max_lock_torque', 'max_peak_torque', 'max_tightening_torque', 'no_load_speed', 'overall_length', 'skin_weight', 'sound_pressure_level', 'vibration', 'voltage', 'weight_with_battery', 'drive_shank', 'max_capacities_standard_bolt', 'max_capacities_high_tensile_bolt');

$arr_key_show = array();
foreach ( $products as $post ) {
   $arr = get_fields($post->ID);
   foreach ($arr as $key => $value) {
        if (in_array($key, $arr_key_check) && $value != '' && !in_array($key, $arr_key_show)){
            $arr_key_show[] = $key;
        }      
   }
}


foreach ($arr_key_check as $value) {
    $item = array_search($value, $arr_key_check);
    if (!in_array($value, $arr_key_show)){
       unset($arr_key_check[$item]);
    }
}

$arr_key_check = array_values($arr_key_check);

$arr_label = array();

foreach ($arr_key_check as $key => $value) {
    foreach ( $products as $post ) {
        $obj = get_field_object($value, $post->ID);
        if (!empty($obj['label'])){
            $arr_label[] =  $obj['label'];
            break;
        }
    }
}

?>
    <div id="primary" class="content-area"> 
        <main id="main" class="site-main" role="main">
            <section class="category-product">
                <table class="comparison-table">
                  <tr>
                    <th class="width25"></th>
                    <?php
                        foreach ( $products as $post ) :
                            $post_id = get_the_ID();                            
                    ?>
                    <th class="<?php echo count($products) > 1 ? 'width-col-'.count($products) : 'width75';?>">
                        <a href="<?php the_permalink(); ?>" class="MagicZoom-single">
                        <img src="<?php echo get_the_post_thumbnail_url($post_id,'full');?>">
                        </a>
                    </th>
                    <?php
                        endforeach;
                    ?>
                  </tr>
                  <tr class="comparison-table-row product-code">
                    <td>Product Code</td>
                    <?php
                        foreach ( $products as $post ) :
                            $post_id = get_the_ID();
                            $product_code = get_field_object('product_code' , $post_id);
                    ?>
                    <td><?php echo empty($product_code['value']) ?  '' : $product_code['value'];?></td>
                    <?php
                        endforeach;
                    ?>                   
                  </tr>
                  <tr class="comparison-table-row">
                    <td>Product Name</td>
                    <?php
                        foreach ( $products as $post ) :
                    ?>
                    <td><?php the_title(); ?></td>
                    <?php
                        endforeach;
                    ?> 
                  </tr>
                  <tr class="comparison-table-row odd">
                    <td>Product Specification </td>
                    <?php
                        foreach ( $products as $post ) :
                    ?>
                    <td></td>
                    <?php
                        endforeach;
                    ?> 
                  </tr>
                  <?php

                    foreach ($arr_key_check as $key => $value) :
                  ?>
                  <tr class="comparison-table-row <?php echo $key % 2 == 0 ? 'even' : 'odd' ;?>">
                    <td><?php echo $arr_label[$key];?></td>
                    <?php
                        foreach ( $products as $post ) : 
                    ?>
                    <td><?php echo get_field( $value, $post->ID);?></td>
                    <?php
                        endforeach;
                    ?> 
                  </tr>  

                  <?php
                    endforeach;
                  ?>

                </table>
            </section>
        </main>
    </div>
<?php
get_footer();