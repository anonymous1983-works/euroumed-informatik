<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;

            wp_title('|', true, 'right');

            // Add the blog name.
            bloginfo('name');

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
            ?>
        </title>
        <?php wp_head(); ?>       
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/theme/components/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/theme/assets/stylesheet/style.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/theme/assets/stylesheet/custom.css">
        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme/components/modernizr/modernizr.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>

    <body <?php body_class($class); ?> >
        <?php
        $_SESSION['lang'] = qtrans_getLanguage();
 	include('traduction.php'); 
        $urlBg = "";        
        if (is_single()) {
            $post_categories = wp_get_post_categories(get_the_ID());
            $cat = get_category($post_categories[0]);
            $urlBg = z_taxonomy_image_url($cat->category_parent);
        }      
        if (is_category()) {
            $Id_category = get_query_var('cat');
            $cat = get_category($Id_category);
            $urlBg = z_taxonomy_image_url($cat->category_parent);
        }
        if (!empty($urlBg)) { 
            ?>
            <div class="wrap-bg-top" style="background-image: url(<?php bloginfo('template_url'); ?>/theme/media/bg-top/bg-article.jpg);" data-spy="affix" data-offset-top="10">
            </div>
            <?php
        }elseif(is_page()) { 
            ?>
            <div class="wrap-bg-top" style="background-image: url(<?php bloginfo('template_url'); ?>/theme/media/bg-top/bg-presentation.jpg);" data-spy="affix" data-offset-top="10">
            </div>
            <?php
        }else{    
            ?>
            <div class="wrap-bg-top" style="background-image: url(<?php echo $urlBg; ?>);" data-spy="affix" data-offset-top="10">
            </div>
            <?php
        }
        ?> 
        <header id="header" class="navbar navbar-static-top bs-docs-nav header-fixed-top" role="banner" data-spy="affix" data-offset-top="10">
            <div class="container">
                <div class="row">
                    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                        <div class="container-fluid">
                            <!-- logo -->
                            <div class="col-md-3 col-sm-3 pdl-0">
                                <a class="logo" href="<?php bloginfo('url'); ?>" title="EuroMed Informatik">EuroMed Informatik</a>
                            </div>
                            <!-- /.logo -->
                            <?php
                            $items = wp_get_nav_menu_items('menu-principale');
                            $tadTitre = array();
                            $tadLink = array();
                            foreach ($items as $item) {
                                if ($item->menu_item_parent != 0) {
                                    $tadTitre[$item->menu_item_parent][$item->ID] = $item->title;
                                    $tadLink[$item->menu_item_parent][$item->ID] = $item->url;
                                }
                            }
                            ?>  
                            <!-- menu -->
                            <div class="col-md-9 col-sm-9 pdlr-0">
                                <nav class="nav__primary clearfix">
                                    <ul id="topnav" class="sf-menu">
                                        <?php
                                        $i = 0;
                                        foreach ($items as $item) {
                                            $i++;
                                            if ($item->menu_item_parent == 0) { 
                                                ?> 
                                                <li class="menu-item">
                                                    <a href="<?php echo $item->url; ?>">
                                                        <?php echo $item->title; ?>
                                                    </a>
                                                    <?php if (count($tadTitre[$item->ID]) > 0) { ?>
                                                        <ul class="sf-menu-niv2">
                                                            <?php
                                                            foreach ($tadTitre[$item->ID] as $key => $value) {
                                                                ?>   
                                                                <li>
                                                                    <a href="<?php echo $tadLink[$item->ID][$key]; ?>">
                                                                        <?php echo $value; ?>
                                                                    </a>
                                                                </li>
                                                            <?php } ?> 
                                                        </ul>
                                                    <?php } ?>
                                                </li>                        
                                            <?php }
                                        } ?> 
                                    </ul>    
                                </nav>
                            </div>
                            <!-- /.menu -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </header>
        <div id="wrap" class="clearfix" data-spy="affix" data-offset-top="10">