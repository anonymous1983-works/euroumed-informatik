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

 wp_title( '|', true, 'right' );

 // Add the blog name.
 bloginfo( 'name' );

 // Add the blog description for the home/front page.
 $site_description = get_bloginfo( 'description', 'display' );
 if ( $site_description && ( is_home() || is_front_page() ) )
  echo " | $site_description";

 // Add a page number if necessary:
 if ( $paged >= 2 || $page >= 2 )
  echo ' | ' . sprintf( __( 'Page %s', 'Alize' ), max( $paged, $page ) );

 ?>
</title>
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
<body class="home page">
    <?php
     $_SESSION['lang'] = qtrans_getLanguage();
     include('traduction.php'); 
   ?>     
  <section id="main" role="main">
    <div id="carouselHome" class="carousel slide" data-interval="3000" data-ride="carousel">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
      <?php
        $category_ids = get_all_category_ids();
        $i=0;
        foreach($category_ids as $cat_id){          
         $cat = get_category($cat_id);          
         if($cat->category_parent == 0){
      ?>      
            <li data-target="#carouselHome" data-slide-to="<?php echo $i;?>" <?php if($i == 0){ ?> class="active" <?php } ?> >
                <?php echo get_cat_name($cat_id);?>
            </li>
         <?php $i++; } } ?> 
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
      <?php
      $i=0;
      foreach($category_ids as $cat_id){
        $cat = get_category($cat_id);          
         if($cat->category_parent == 0){  
      ?>
            <div class="<?php if($i == 0){ echo "active"; }?> item">
              <img src="<?php echo z_taxonomy_image_url($cat_id); ?>" alt="<?php echo get_cat_name($cat_id);?>" />
              <div class="carousel-caption">
                <h3>First slide label</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
         <?php $i++;} } ?> 
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#carouselHome" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="carousel-control right" href="#carouselHome" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
  </section>
  <header id="header" class="navbar navbar-static-top bs-docs-nav" role="banner">
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
            $items = wp_get_nav_menu_items( 'menu-principale');
            $tadTitre = array();
            $tadLink = array();
            foreach($items as $item)
           { 
              if($item->menu_item_parent != 0){           
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
                  $i=0;
                    foreach($items as $item)
                    { $i++;
                      if($item->menu_item_parent == 0){  
                    ?> 
                    <li class="menu-item">
                        <a href="<?php echo $item->url; ?>">
                            <?php echo $item->title; ?>
                        </a>
                        <?php if (count($tadTitre[$item->ID]) > 0) { ?>
                        <ul class="sf-menu-niv2">
                          <?php
                            foreach ($tadTitre[$item->ID] as $key => $value){
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
                  <?php } } ?> 
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
  <div id="wrap" class="clearfix">
    <div class="container">
      <div class="row">
        <div class="container-fluid">
          <div class="main-left col-md-8 col-sm-8 pdl-0">
            <?php 
            query_posts( 'page_id=171&orderby=date&order=desc'); 
            while ( have_posts() ) : the_post(); 
            ?>  
            <div class="title">
                <?php the_title(); ?>                
            </div>
            <a class="img" href="<?php echo the_permalink(); ?>">              
                <?php
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
                $url = $thumb['0'];                                                    
                ?>
                <img alt="<?php the_title(); ?>" src="<?php echo $url; ?>" >
            </a>
            <div class="description">
                <p>
                    <?php the_excerpt_max_charlength(300);?>
                </p>    
            </div>
            <div class="show-plus"><a href="<?php echo the_permalink(); ?>" class="btn ">Lire plus</a>
            </div>
          <?php endwhile; wp_reset_query(); ?>    
          </div>
          <div class="main-right col-md-4 col-sm-4 pdlr-0">
            <div class="nav-right">
                <a class="chat" href="#">Chat<br><?php echo live; ?></a>
                <a class="fiche" href="#"><?php echo sheet; ?><br><?php echo prac; ?></a>
            </div>
            <div class="sidebar-services">
              <div class="title">
                  Services
              </div>
              <div class="items">
                <a href="<?php echo get_permalink( 70 ); ?>" class="mouse">
                    <?php echo get_the_title(70); ?>                    
                  </a>
                <a href="<?php echo get_permalink( 74 ); ?>" class="megaphone tow-line clearfix">
                    <?php echo get_the_title(74); ?>
                  </a>
                <a href="<?php echo get_permalink( 77 ); ?>" class="speech clearfix">                   
                    <?php echo get_the_title(77); ?>
                  </a>
                <a href="<?php echo get_permalink( 183 ); ?>" class="paper clearfix">
                    <?php echo get_the_title(183); ?>                   
                  </a>
              </div>
            </div>
          </div>
          <div class="thumbnail-slider col-md-12 col-sm-12 pdlr-0">
            <div class="well">
              <div id="carouselServices" class="carousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="row">
                      <div class="col-sm-4">
                        <a class="item-thumb" href="<?php echo get_category_link(2); ?>">
                          <div class="title-thumb"><?php echo get_cat_name(2);?></div>
                          <img class="img-thumb img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/materiel.jpg" alt="Image">
                          <img class="img-thumb-over img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/materiel-over.jpg" alt="Image">
                        </a>
                      </div>
                      <div class="col-sm-4">
                        <a class="item-thumb" href="<?php echo get_category_link(3); ?>">
                          <div class="title-thumb"><?php echo get_cat_name(3);?></div>
                          <img class="img-thumb img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/logiciel.jpg" alt="Image">
                          <img class="img-thumb-over img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/logiciel-over.jpg" alt="Image">
                        </a>
                      </div>
                      <div class="col-sm-4">
                        <a class="item-thumb" href="<?php echo get_category_link(4); ?>">
                          <div class="title-thumb"><?php echo get_cat_name(4);?></div>
                          <img class="img-thumb img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/reseau.jpg" alt="Image">
                          <img class="img-thumb-over img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/reseau-over.jpg" alt="Image">
                        </a>
                      </div>
                    </div>
                    <!--/row-->
                  </div>
                  <!--/item-->
                  <div class="item">
                    <div class="row">
                      <div class="col-sm-4">
                        <a class="item-thumb" href="<?php echo get_category_link(5); ?>">
                          <div class="title-thumb"><?php echo get_cat_name(5);?></div>
                          <img class="img-thumb img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/materiel.jpg" alt="Image">
                          <img class="img-thumb-over img-responsive" src="<?php bloginfo('template_url'); ?>/theme/assets/images/slider-bottom/materiel-over.jpg" alt="Image">
                        </a>
                      </div>                     
                    </div>
                    <!--/row-->
                  </div>                  
                </div>
                <!--/carousel-inner-->
                <a class="left carousel-control" href="#carouselServices" data-slide="prev"></a>
                <a class="right carousel-control" href="#carouselServices" data-slide="next"></a>
              </div>
              <!--/carouselServices-->
            </div>
            <!--/well-->
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="partenaires">
        <ul class="clearfix">
            <?php     
            $requete=mysql_query("select * from euroinfo_ngg_pictures,euroinfo_ngg_gallery where euroinfo_ngg_pictures.galleryid = euroinfo_ngg_gallery.gid AND galleryid = '2'"); 
            while ($image = mysql_fetch_object($requete)){           
            ?>
            <li>
                <a class="<?php echo $image->image_slug;?>" href="#" title="<?php echo $image->image_slug;?>"></a>
            </li>
            <?php } ?>        
        </ul>
    </div>   
  </div>
  <footer id="footer" class="motopress-wrapper footer footer-static-bottom bs-docs-footer">
    <div class="menu-footer">
      <div class="container">
        <div class="row">
        <?php            
         $items = wp_get_nav_menu_items( 'menu-footer');
         $tadTitre = array();
         $tadLink = array();
         foreach($items as $item)
        { 
           if($item->menu_item_parent != 0){           
             $tadTitre[$item->menu_item_parent][$item->ID] = $item->title; 
             $tadLink[$item->menu_item_parent][$item->ID] = $item->url; 
           }  
         }  
       
        $i=0;
        foreach($items as $item)
        { $i++;
          if($item->menu_item_parent == 0){  
        ?>         
          <div class="col-md-2 col-sm-2">
            <div id="nav_menu-<?php echo $i;?>">
              <h4 class="menu-footer-menu-title title-h4">
                  <?php echo $item->title;?>
              </h4>
              <?php if( count($tadTitre[$item->ID]) > 0){ ?>
              <div class="menu-footer-menu-container">
                <ul class="menu">
                <?php    
                 foreach($tadTitre[$item->ID] as $key => $value){                  
                ?> 
                  <li>
                      <a href="<?php echo $tadLink[$item->ID][$key];?>">
                          <?php echo $value; ?>
                      </a>
                  </li>
                 <?php } ?> 
                </ul>
              </div>
              <?php } ?>  
            </div>
          </div>
        <?php        
        } }
        ?>         
        </div>
      </div>
    </div>
    <div class="widgets-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-7">
            <div class="widgets-footer-widget-contact">
              <h4 class="menu-footer-menu-title title-h3">Contact</h4>
              <div class="left col-md-5 col-sm-5">
                <ul>
                  <li><a class="address" href="#" title="Adresse">11, quai Conti <br>78430 Louveciennes</a>
                  </li>
                  <li><a class="contact" href="#" title="Contact">Tél : +33 (0) 1 30 82 17 17 <br>Fax : +33 (0) 1 30 82 17 18</a>
                  </li>
                  <li><a class="mail" href="#" title="E-mail">e-mail</a>
                  </li>
                </ul>
              </div>
              <div class="right col-md-7 col-sm-7">
                <ul class="clearfix">
                  <li>
                    <a class="fb" href="#" title="Facebook"></a>
                  </li>
                  <li>
                    <a class="g" href="#" title="Google +"></a>
                  </li>
                  <li>
                    <a class="in" href="#" title="Linkedin"></a>
                  </li>
                </ul>
                <ul class="second clearfix">
                  <li>
                    <a class="tw" href="#" title="Twitter"></a>
                  </li>
                  <li>
                    <a class="p" href="#" title="Path"></a>
                  </li>
                  <li>
                    <a class="x" href="#" title="X"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-5">
            <div class="widgets-footer-widget-newsletter">
              <h4 class="menu-footer-menu-title title-h3">
                  Newsletter
              </h4>
              <p><?php echo more;?>
                <br><?php echo subscribe;?></p>
              <form class="form-inline clearfix" role="form">
                <div class="form-group">
                  <label class="sr-only" for="form-email-newsletter">Email address</label>
                  <input type="email" class="form-control" id="form-email-newsletter" placeholder="<?php echo emailAdress;?>">
                </div>
                <button type="submit" class="btn btn-default"><?php echo register;?></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme/components/jquery/dist/jquery.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme/components/bootstrap/dist/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme/assets/javascript/script.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme/assets/javascript/custom.js"></script>
</body>

</html>

