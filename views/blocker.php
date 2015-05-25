<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="<?php echo $title;?> - <?php echo $subtitle;?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>
        <style>
            html {
                color: #222;
                font-size: 1em;
                line-height: 1.4;
            }

            ::-moz-selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            ::selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            hr {
                display: block;
                height: 1px;
                border: 0;
                border-top: 1px solid #ccc;
                margin: 1em 0;
                padding: 0;
            }

            audio,
            canvas,
            iframe,
            img,
            svg,
            video {
                vertical-align: middle;
            }

            fieldset {
                border: 0;
                margin: 0;
                padding: 0;
            }

            textarea {
                resize: vertical;
            }

            .browserupgrade {
                margin: 0.2em 0;
                background: #ccc;
                color: #000;
                padding: 0.2em 0;
            }


            /* ==========================================================================
               Author's custom styles
               ========================================================================== */

            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
                font-family: 'Lato', sans-serif;
            }

            body {
                font-weight: 300;
                color: #444;
            }

            h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
                color: #222;
            }

            .clearfix:after, .clearfix:before, .container:after, .container:before, .row:after, .row:before {
                display: table;
                content: " ";
            }

            @media (min-width: 768px) {
                .container {
                    width:750px
                }
            }

            @media (min-width: 992px) {
                .container {
                    width:970px
                }
            }

            @media (min-width: 1200px) {
                .container {
                    width:1170px
                }
            }

            .container {
                padding-right: 40px;
                padding-left: 40px;
                margin-right: auto;
                margin-left: auto;
            }

            .row {
                margin-right: -15px;
                margin-left: -15px;
            }

            .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9 {
                position: relative;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            }

            @media (min-width: 768px) {
                .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9 {
                    float: left;
                }

                .col-12 {
                    width: 100%
                }

                .col-11 {
                    width: 91.66666667%;
                }

                .col-10 {
                    width: 83.33333333%;
                }

                .col-9 {
                    width: 75%;
                }

                .col-8 {
                    width: 66.66666667%;
                }

                .col-7 {
                    width: 58.33333333%;
                }

                .col-6 {
                    width: 50%;
                }

                .col-5 {
                    width: 41.66666667%;
                }

                .col-4 {
                    width: 33.33333333%;
                }

                .col-3 {
                    width: 25%;
                }

                .col-2 {
                    width: 16.66666667%;
                }

                .col-1 {
                    width: 8.33333333%;
                }
            }

            figure {
                margin: 0;
            }

            img {
                width: 100%;
            }

            hr {
                border-top: 1px solid #E1E2E6;
                width: 25%;
                margin: 25px 0;
            }

            #top, #bottom, #left, #right {
                background: #E9E9EC;
                position: fixed;
            }

            #left, #right {
                top: 0; bottom: 0;
                width: 20px;
            }

            #left { left: 0; }
            #right { right: 0; }
                    
            #top, #bottom {
                left: 0;
                right: 0;
                height: 20px;
            }

            #top { top: 0; }

            #bottom { bottom: 0; }

            .site-header {
                margin-bottom: 50px;
            }

            h1#logo {
                text-align: center;
                margin-top: 70px;
            }

            h1#logo img {
            	width: auto;
            	max-width: 120px;
            }

            .main-content {
                margin-bottom: 50px;
            }

            h2.theme-title {
                font-size: 36px;
                margin-bottom: 15px;
            }

            h2.theme-title a {
                color: #222;
                text-decoration: none;
            }

            h2.theme-title a:hover {
                color: #333;
            }

            @media (min-width: 992px) {
                h2.theme-title {
                    font-size: 40px;
                }
            }

            @media (min-width: 1200px) {
                h2.theme-title {
                    font-size: 44px;
                }
            }

            h4.theme-subtitle {
                font-size: 14px;
                text-transform: uppercase;
                color: #A6B0B3;
                font-weight: 300;
                margin-top: 0;
            }

            .theme-description {
                margin-bottom: 50px;
            }

            .button {
                display: inline-block;
                width: 100%;
                line-height: 38px;
                height: 40px;
                padding: 0 16px;
                margin-bottom: 15px;
                outline: 0;
                color: rgba(0,0,0,0.7);
                background: rgba(0,0,0,0);
                text-align: center;
                text-decoration: none;
                cursor: pointer;
                border: 1px solid rgba(0,0,0,0.3);
                vertical-align: middle;
                white-space: nowrap;
                border-radius: 999em;
                letter-spacing: -0.02em;
                transition: 100ms background-color,100ms border-color,100ms color;
            }

            .button:focus,.button:active,.button:hover {
                color: #FFF;
                border-color: rgba(0,0,0,0.7);
                background-color: rgba(0,0,0,0.7);
            }

            .button.demo {
                color: #468C54;
                border-color: #57ad68
            }

            .button.demo:focus,.button.demo:active,.button.demo:hover {
                color: #FFF;
                background-color: #57ad68;
                border-color: #468C54;
            }

            .the-fucking-banner {
                position: fixed;
                bottom: 0;
                left: 20px;
                right: 20px;
            }

            .inner-banner,
            .inner-banner a {
                color: #FFF;
            }

            .inner-banner {
                background-color: #88C55E;
                font-weight: 700;
                text-align: center;
                line-height: 1.8;
            }

            .inner-banner p {
                margin: 0;
                padding: 10px 20px;
            }

            .inner-banner a {
                margin-left: 5px;
                text-decoration: none;
                background-color: rgba(0,0,0,0.1);
                -moz-border-radius: 2px;
                -webkit-border-radius: 2px;
                border-radius: 2px;
                color: #FFF;
                cursor: pointer;
                padding: 3px 6px;
                text-decoration: none;
                white-space: nowrap;
            }

            .inner-banner a:hover {
                background-color: rgba(0,0,0,0.2);
            }


            /* ==========================================================================
               Media Queries
               ========================================================================== */

            @media only screen and (min-width: 35em) {

            }

            @media print,
                   (-o-min-device-pixel-ratio: 5/4),
                   (-webkit-min-device-pixel-ratio: 1.25),
                   (min-resolution: 120dpi) {

            }

            /* ==========================================================================
               Helper classes
               ========================================================================== */

            .hidden {
                display: none !important;
                visibility: hidden;
            }

            .visuallyhidden {
                border: 0;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            .visuallyhidden.focusable:active,
            .visuallyhidden.focusable:focus {
                clip: auto;
                height: auto;
                margin: 0;
                overflow: visible;
                position: static;
                width: auto;
            }

            .invisible {
                visibility: hidden;
            }

            .clearfix:before,
            .clearfix:after {
                content: " ";
                display: table;
            }

            .clearfix:after {
                clear: both;
            }

            .clearfix {
                *zoom: 1;
            }

            /* ==========================================================================
               Print styles
               ========================================================================== */

            @media print {
                *,
                *:before,
                *:after {
                    background: transparent !important;
                    color: #000 !important;
                    box-shadow: none !important;
                    text-shadow: none !important;
                }

                a,
                a:visited {
                    text-decoration: underline;
                }

                a[href]:after {
                    content: " (" attr(href) ")";
                }

                abbr[title]:after {
                    content: " (" attr(title) ")";
                }

                a[href^="#"]:after,
                a[href^="javascript:"]:after {
                    content: "";
                }

                pre,
                blockquote {
                    border: 1px solid #999;
                    page-break-inside: avoid;
                }

                thead {
                    display: table-header-group;
                }

                tr,
                img {
                    page-break-inside: avoid;
                }

                img {
                    max-width: 100% !important;
                }

                p,
                h2,
                h3 {
                    orphans: 3;
                    widows: 3;
                }

                h2,
                h3 {
                    page-break-after: avoid;
                }
            }
            .inner-banner {
                background-color: <?php echo $banner_colors;?>;
            }
        </style>

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $javascript_url; ?>"></script>
        <script type="text/javascript">jQuery(Pronamic_Cookies.blocker.ready);</script>
        <script type="text/javascript">
            
            <?php 
            
            $setting_expire = get_option( 'pronamic_cookie_options_advanced_expires', '1 year' );
            
            if ( empty( $setting_expire ) )
                $setting_expire = '1 year';
            
            $setting_path = get_option( 'pronamic_cookie_options_advanced_path', '/' );
            
            if ( empty( $setting_path ) )
                $setting_path = '/';
            
            $expires_date = new DateTime( $setting_expire, new DateTimeZone( 'GMT' ) ); 
            
            ?>
            var Pronamic_Cookies_Vars = {
                cookie: {
                    path:"<?php echo $setting_path; ?>",
                    expires: "<?php echo $expires_date->format( 'D, d M Y H:i:s e' ); ?>"
                }
            };
        </script>

        <script type="text/javascript">

            (function( $ ) {

                function adjustScrolling() {
                
                    var bannerH = $('.the-fucking-banner').height(),
                        whiteCard = $('.main-content'),
                        fixMarginB = bannerH + 20;

                    whiteCard.css({
                        'margin-bottom': fixMarginB + 20
                    });

                }

                adjustScrolling();

                $(window).resize(function() {
                    adjustScrolling();
                });

            })( jQuery );

        </script>

    </head>
    <body>
        
        <div class="site-header">
            <h1 id="logo">
                <a class="jBlockerAcceptExternal" href="<?php echo $logo_link;?>">
                    <?php
                    if ( $img_logo ) {
                    ?>
                        <img src="<?php echo $img_logo; ?>">
                    <?php
                    } else {
                        if ( $svg_logo ) {
                            echo $svg_logo;
                        }
                    }
                    ?>
                </a>
            </h1>
        </div>

        <div class="container main-content">
            <div class="row">

				<?php
				if ( $image ) {
				?>

                <div class="col-8">
                    <figure>
                        <a class="jBlockerAcceptExternal" href="<?php echo $demo_link;?>">
                            <img src="<?php echo $image; ?>" alt="<?php echo $title;?> screenshot">
                        </a>
                    </figure>
                </div>
                <div class="col-4">

                <?php
                } else {
                ?>

                <div class="col-12">

				<?php
                }
                ?>

                    <header>
                        <h2 class="theme-title"><a class="jBlockerAcceptExternal" href="<?php echo $demo_link;?>"><?php echo $title;?></a></h2>
                        <h4 class="theme-subtitle"><?php echo $subtitle;?></h4>
                    </header>
                    <hr>
                    <div class="theme-description">
                        <p><?php echo $text;?></p>
                    </div>
                    <footer>
                        <div class="row">
                            <div class="col-6">
                                <a class="button demo jBlockerAcceptExternal" href="<?php echo $demo_link;?>"><?php echo $demo_text;?></a>
                                </div>
                            <div class="col-6">
                                <a class="button purchase jBlockerAcceptExternal" href="<?php echo $buy_link;?>"><?php echo $buy_text;?></a>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <dv class="clearfix"></dv>
        </div>

        <div id="left"></div>
        <div id="right"></div>
        <div id="top"></div>
        <div id="bottom"></div>

        <div class="the-fucking-banner">
            <div class="inner-banner">
                <p><?php echo $banner_text;?><a class="jBlockerAcceptReload" href="<?php echo $demo_link;?>"><?php echo $ok_text;?></a><a href="<?php echo $policy_link;?>"><?php echo $policy_text;?></a></p>
            </div>
        </div>

    </body>
</html>