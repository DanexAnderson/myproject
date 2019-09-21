
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 0,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
                $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $SpacingX: 5,
                $SpacingY: 5
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

                /*jssor slider bullet skin 111 css*/
        .jssorb111 .i {position:absolute;color:#fff;font-family:"Helvetica neue",Helvetica,Arial,sans-serif;text-align:center;cursor:pointer;z-index:0;}
        .jssorb111 .i .n {display:none;}
        .jssorb111 .i .b {fill:#fff;stroke:#b50e80;stroke-width:500;stroke-miterlimit:10;stroke-opacity:.5;}
        .jssorb111 .i:hover .b {fill:#fea900;stroke:grey;stroke-width:6000;stroke-opacity:1;}
        .jssorb111 .iav .b {fill:#000;stroke-width:6000;stroke-opacity:1;}
        .jssorb111 .i.idn {opacity:.3;}
        .jssorb111 .iav .n, .jssorb111 .i:hover .n {display:block;}

        /*jssor slider arrow skin 106 css*/
        .jssora106 {display:block;position:absolute;cursor:pointer;}
        .jssora106 .c {fill:#fff;opacity:.1;}
        .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
        .jssora106:hover .c {opacity:.5;}
        .jssora106:hover .a {opacity:.8;}
        .jssora106.jssora106dn .c {opacity:.2;}
        .jssora106.jssora106dn .a {opacity:1;}
        .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

        /*jssor slider thumbnail skin 101 css*/
        .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
        
        .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;margin-top:30px;}
        .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
        .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
        .jssort101 .p:hover{padding:2px;}
        .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35; }
        .jssort101 .p:hover.pdn{padding:0;}
        .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
        .jssort101 .pav .cv {border-color:#fff;opacity:.35; border: 3px solid #fff;}
        .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
        .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
        .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
        .jssort101 .ti {position:absolute;bottom:-30px;left:0px;width:100%;height:28px;line-height:28px;text-align:center;font-size:16px;color:#fff;background-color:rgba(0,0,0,.3)}
        .jssort101 .pav .ti, .jssort101 .pdn .ti, .jssort101 .p:hover.pdn .ti{color:#000;background-color:rgba(255,255,255,.6);}
    </style>


<!--  -->

    <div id="jssor_1" class="ml-n3 ml-md-0"style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:609px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php bloginfo('template_url');?>/img/spin.svg" />
        </div>

        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:480px;overflow:hidden;">
            <div>
                <a  href="<?php bloginfo('template_url');?>/img/031.jpg" data-toggle="lightbox" data-gallery="gallery" >
                    <img data-u="image" src="<?php bloginfo('template_url');?>/img/031.jpg" class="img-fluid"/>
                </a>
                
                <div data-u="thumb" >
                    <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/031-s190x90.jpg" />
                    <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/032.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/032-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>

              <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/033.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/033-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/034.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/034-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/035.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/035-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/036.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/036-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/037.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/037-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/038.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/038-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/039.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/039-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php bloginfo('template_url');?>/img/040.jpg" />

                <div data-u="thumb">
                <img data-u="thumb" class="i" src="<?php bloginfo('template_url');?>/img/040-s190x90.jpg" />
                <div class="ti">Slide Description</div>
                </div>
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:-10px;width:980px;height:140px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
    <div class="text-white float-left ml-4 d-block text-center"> Full Discription goes here </div>
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:190px;height:90;margin-top:-26px;">
                    <div data-u="thumbnailtemplate" class="t" style=""></div>
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
    <script type="text/javascript">jssor_1_slider_init();</script>


    <!-- ------------------------------------------------------------------------ -->

  
    <div class="container">
  <div class="row">
    <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid rounded">
    </a>
    <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid rounded">
    </a>
    <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid rounded">
    </a>
  </div>
  <div class="row">
    <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid rounded">
    </a>
    <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid rounded">
    </a>
    <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid rounded">
    </a>
  </div>
</div>