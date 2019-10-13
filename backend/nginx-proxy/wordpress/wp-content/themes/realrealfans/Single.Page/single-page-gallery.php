<?php

// Check if  We are on an Article Post for Galley or Posts
$media_query = new WP_Query(

    array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => -1,
        'post_parent' => get_the_ID()
    )
);

// If Statement to check if we are on Post_Type Gallery or Posts of Category Article have Images 
if ($media_query) :

    ?>


    <!-- class="ml-n3 ml-md-auto" -->
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:609px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php bloginfo('template_url'); ?>/img/spin.svg" />
        </div>

        <!-------------------------------  Gallery Images --------------------------------------------->
<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:480px;overflow:hidden;">



    <?php

        //-- --------------------------- Article Images Query ------------------------ --//


        foreach ($media_query->posts as $post) {


            echo wp_get_attachment_image($post->ID, 'full');
            ?>

        <!-- --------------------- Display Article Images ------------------- -->
        <div>
            <a href="<?php echo wp_get_attachment_url($post->ID); ?>" data-toggle="lightbox" data-gallery="gallery">
                <?php echo wp_get_attachment_image($post->ID, 'full', "", array(
                            "class" => "img-fluid ",
                            "data-u" => "image"
                        )); ?>
            </a>

            <div data-u="thumb">
                <?php echo wp_get_attachment_image($post->ID, "full", "", array(
                            "class" => "i",
                            "data-u" => 'thumb'
                        )); ?>
                <div class="ti">Slide Description</div>
            </div>
        </div>

    <?php
        }

                wp_reset_postdata();
                ?>

</div>

        <!-- Thumbnail Navigator Full&#160;Description&#160;goes&#160;here -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:-10px;width:980px;height:140px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
            <div class="text-white float-left ml-4 d-block text-center"><?php echo str_replace(' ', '&#160;', 'Full Description goes here'); ?> </div>
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:190px;height:90;margin-top:-26px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <!-- <circle class="a" cx="8000" cy="8000" r="3238.1"></circle> -->
                        <!-- <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line> -->
                        <!-- <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line> -->
                    </svg>
                </div>
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb111" style="position:absolute;bottom:100px;right:12px;" data-scale="0.5">


            <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                    <circle class="b" cx="8000" cy="8000" r="3000"></circle>
                </svg>
                <div data-u="numbertemplate" class="n"></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:200px;left:10px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:200px;right:10px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
            </svg>
        </div>

    </div>
    <script type="text/javascript">
        jssor_1_slider_init();
    </script>



    <!-- // End If Statement check for Post_Type Gallery or Posts of Category Article -->
<?php endif; ?>