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
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:616px;overflow:hidden;visibility:hidden;margin-bottom:5%;">
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
                            "data-u" => "image",
                            "style" => "border-top: 7px solid white;"
                        )); ?>
            </a>

            <div data-u="thumb">
                <?php echo wp_get_attachment_image($post->ID, "full", "", array(
                            "class" => "i",
                            "data-u" => 'thumb',
                            "style" => 'width:200px; height:90px;'
                        )); ?>
                <!-- <div class="ti">Slide Description</div> -->
            </div>
        </div>

    <?php
        }

                wp_reset_postdata();
                ?>

</div>

        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator"  class="jssort101 " style="height:130px;position:absolute;left:0px;bottom:0px;width:980px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
            <div class="text-white float-left d-inline-block text-center d-inline-block" style="width:100%; height:20px;z-index:1000;position:absolute;"><?php echo str_replace(' ', '&#160;', ' Full Description goes here all the time what u say about my mama?'); ?> </div>
            <div data-u="slides">
                <div data-u="prototype" class="p" style="height:125px!important;width:190px;margin-top:0px;">
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
        <div data-u="navigator" class="jssorb111" style="position:absolute;bottom:102px;right:12px;" data-scale="0.7">


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