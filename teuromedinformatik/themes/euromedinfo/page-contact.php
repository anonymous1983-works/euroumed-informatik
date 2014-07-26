<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>EuroMed Informatik</title>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/theme/components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/theme/assets/stylesheet/style.css">
  <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme/components/modernizr/modernizr.js"></script>
  <!--/ END JAVASCRIPT SECTION -->
</head>

<body class="no-home page-authentification page-contact">
     <?php
     $_SESSION['lang'] = qtrans_getLanguage();
     include('traduction.php'); 
    ?> 
  <div id="div_carte" class="wrap-bg-top" data-spy="affix" data-offset-top="10">
  </div>
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
  <div id="wrap" class="clearfix" data-spy="affix" data-offset-top="10">
    <div class="container">
      <div class="row">
        <div class="container-fluid">
          <div class="main-left col-md-8 col-sm-8 pdl-0">
            <div class="breadcrumb">
              <a href="<?php bloginfo('url'); ?>">> <?php _e( 'Home' ); ?></a>
              <span class="in-progress">> Contact</span>
            </div>
            <h1 class="page-title">Contact</h1>
            <form class="form-inline form-contact clearfix" method="GET" action="#">
              <!-- ligne form -->
              <div class="form-group">
                <div class="form-input w-50">
                  <label>Nom<span>*</span></label>
                  <input type="text" placeholder="Nom *">
                </div>
                <div class="form-input w-50 right">
                  <label>Prénom<span>*</span></label>
                  <input type="text" placeholder="Prénom *">
                </div>
              </div>
              <!-- /ligne form -->
              <!-- ligne form -->
              <div class="form-group">
                <div class="form-input w-60">
                  <label>E-mail</label>
                  <input type="email" placeholder="E-mail">
                </div>
                <div class="form-input w-40 right">
                  <label>Tél.<span>*</span></label>
                  <input type="text" placeholder="Tél. *">
                </div>
              </div>
              <!-- /ligne form -->
              <!-- ligne form -->
              <div class="form-group">
                <div class="form-input w-100">
                  <label>Société</label>
                  <input type="text" placeholder="Société">
                </div>
              </div>
              <!-- /ligne form -->
              <!-- ligne form -->
              <div class="form-group">
                <div class="form-input w-30">
                  <label>Code Postal</label>
                  <input type="text" placeholder="Code Postal">
                </div>
                <div class="form-input w-70 right">
                  <label>Ville</label>
                  <input type="text" placeholder="Ville">
                </div>
              </div>
              <!-- /ligne form -->
              <!-- ligne form -->
              <div class="form-group">
                <div class="form-input w-100">
                  <label>Sujet</label>
                  <input type="text" placeholder="Sujet">
                </div>
              </div>
              <!-- /ligne form -->
              <!-- ligne form -->
              <div class="form-group last">
                <div class="form-input w-100">
                  <label>Message<span>*</span></label>
                  <textarea placeholder="Message *"></textarea> 
                </div>
              </div>
              <!-- /ligne form -->
              <p class="required"><span>*</span>Champs obligatoires</p>
              <div class="form-group submit">
                <input class="btn btn-submit" type="submit" value="Envoyer">
              </div>
            </form>
          </div>
          <div class="main-right col-md-4 col-sm-4 pdr-0">
            <div class="nav-right">
                <a class="chat" href="#">Chat<br><?php echo live; ?></a>
                <a class="fiche" href="#"><?php echo sheet; ?><br><?php echo prac; ?></a>
            </div>
            <div class="info-contact">
             <img src="<?php bloginfo('template_url'); ?>/theme/assets/images/contact.jpg" alt="image contact">
             <a class="logo-contact" href="#" title="euroumed-informatik"></a>
             <p>11, quai Conti 78430 Louveciennes</p>
             <p>Tél : +33 (0) 1 30 82 17 17 <br> Fax : +33 (0) 1 30 82 17 18</p>
             <p class="last">SARL au capital de 11 400€ <br> RCS Versailles B488 509 548</p>
             <ul class="social clearfix">
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
            <ul class="social second clearfix">
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
        <!-- /.container-fluid -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    <?php get_footer(); ?> 
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/theme/assets/javascript/maps.js"></script>
 