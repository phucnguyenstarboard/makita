<div class="footerinner-bottom">
      <div class="container">
        <div class="footer-bottom">
          <?php if(get_theme_mod('cfashionstore_lite_fb') || get_theme_mod('cfashionstore_lite_twitter') || get_theme_mod('cfashionstore_lite_glplus') || get_theme_mod('cfashionstore_lite_in')){?>
          <div class="footersocial">
                  <ul>
            <?php if(get_theme_mod('cfashionstore_lite_fb')){?>
              <li><a title="<?php esc_attr_e('Facebook','cfashionstore-lite'); ?>" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('cfashionstore_lite_fb','')); ?>"></a> </li>
            <?php }?>
            <?php if(get_theme_mod('cfashionstore_lite_twitter')){?>
              <li><a title="<?php esc_attr_e('twitter','cfashionstore-lite'); ?>" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('cfashionstore_lite_twitter','')); ?>"></a></li>
            <?php }?>
            <?php if(get_theme_mod('cfashionstore_lite_youtube')){?>
              <li><a title="<?php esc_attr_e('youtube','cfashionstore-lite'); ?>" class="fa fa-youtube" target="_blank" href="<?php echo esc_url(get_theme_mod('cfashionstore_lite_youtube','')); ?>"></a></li>
            <?php }?>
            <?php if(get_theme_mod('cfashionstore_lite_in')){?>
              <li><a title="<?php esc_attr_e('linkedin','cfashionstore-lite'); ?>" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('cfashionstore_lite_in','')); ?>"></a></li>
            <?php }?>
          </ul>
          </div><!--footersocial-->
        <?php }?>
          <div class="copyright mainwidth">
          <div class="creditlink">
            <?php $cfashionstore_lite_design = get_theme_mod('cfashionstore_lite_design'); ?>
              <?php if(get_theme_mod('cfashionstore_lite_design')){?>
                <?php echo esc_html($cfashionstore_lite_design);?>
              <?php }?>
          </div><!--creditlink-->
          <div class="creditcopy">
            <?php $cfashionstore_lite_copyright = get_theme_mod('cfashionstore_lite_copyright'); ?>
              <?php if(get_theme_mod('cfashionstore_lite_copyright')){?>
                <?php echo esc_html($cfashionstore_lite_copyright);?>
              <?php }?>
            
          </div><!--creditcopy-->
          <div class="clear"></div>
          </div>
        </div><!--footer-bottom-->
      </div><!--container-->
</div><!--footerinner-bottom-->