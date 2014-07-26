<?php get_header(); ?>

<div class="container">
  <div class="bloc-frame">
    <div class="titre2"> <?php if(qtrans_getLanguage()=='fr') {?>Recherche  <?php }else{ ?> Search <?php } ?></div>
    <div class="clear"></div>
    <div class="contenu-search">
        <div class="txt-frame">	
		<!--Recherche-->
		<?php if(qtrans_getLanguage()=='fr') {?>
	
          <div class="nine columns search" style=" margin-left:100px; margin-top:20px;">
			<?php if ( have_posts() ) : ?>
					<div class="row alaune">
					    <div class="twelve columns">
						   <h1><div style="font-family:Arial, Helvetica, sans-serif; font-size:18px; padding-bottom:25px;"> <?php printf( __( 'R&eacute;sultats de la recherche pour: %s', 'mtd' ), '<i style="color:black;">' . get_search_query() . '</i>' ); ?></div></h1>
						  </div>
				    </div>
					
				
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="voir-detail-search" style="float:left;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><br />
						<?php the_content(); 
						  
						  endwhile; 
					 wp_reset_query(); ?>
			<?php else : ?>

					<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Rien trouv&eacute;', 'mtd' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php _e( 'D&eacute;sol&eacute;, mais rien ne correspond &agrave; vos crit&egrave;res de recherche. S il vous pla&icirc;t essayer de nouveau avec quelques mots cl&eacute;s diff&eacute;rents.', 'mtd' ); ?></p>
						<div style="float:left; margin-top: 8px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; font-weight:bold; ">Recherche pour :&nbsp;&nbsp;</div>
						  <div class="zone-rech">
					<form role="search" method="get" id="searchform" class="searchform1" action="http://www.mtdgroup-mailserver.com/SiteWeb/alize-consulting/">
                    	<input type="text" class="style-input1" value="recherche" name="s" id="s" onblur="if(this.value=='') this.value='recherche';" onfocus="if(this.value=='recherche') this.value='';" />
                    </div><!--zone-rech-->
                
                    	<input type="submit" class="btn-rech" value=""/>
                   </form>
					</div>
				</article>

			<?php endif; ?>
		</div>
		 <?php }else{ ?>
		 
		           <div class="nine columns search" style=" margin-left:100px; margin-top:20px;">
			<?php if ( have_posts() ) : ?>
					<div class="row alaune">
					    <div class="twelve columns">
						   <h1><span><?php printf( __( 'Search Results for: %s', 'mtd' ), '<i style="color:black;">' . get_search_query() . '</i>' ); ?></span></h1>
						  </div>
				    </div>
					
				
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="voir-detail-search" style="float:left;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><br />
						<?php the_content(); 
						  
						  endwhile; 
					 wp_reset_query(); ?>
			<?php else : ?>

					<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'mtd' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'mtd' ); ?></p>
						<div style="float:left; margin-top: 8px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; font-weight:bold; ">Search for :&nbsp;&nbsp;</div>
						  <div class="zone-rech">
					<form role="search" method="get" id="searchform" class="searchform1" action="http://www.mtdgroup-mailserver.com/SiteWeb/alize-consulting/">
                    	<input type="text" class="style-input1" value="recherche" name="s" id="s" onblur="if(this.value=='') this.value='recherche';" onfocus="if(this.value=='recherche') this.value='';" />
                    </div><!--zone-rech-->
                
                    	<input type="submit" class="btn-rech" value=""/>
                   </form>
					</div>
				
				</article>

			<?php endif; ?>
		</div>
		 <?php } ?>
		<!--fin  Recherche-->
        </div>
        <!--txt-frame-->

      
      <div class="clear"></div>
    </div>
    <!--contenu-->
  </div>
  <!--bloc-frame-->
</div>
<!--container-->
<?php get_footer(); ?>
