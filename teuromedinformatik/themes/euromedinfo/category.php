<?php
    get_header();
    $Id_category=get_query_var('cat');//id de la categorie
    $Name_category=get_cat_name($Id_category);// nom de la categorie
    $cat = get_category($Id_category);     
    $parent_cat = $cat->category_parent;   
?>
<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="main-left col-md-8 col-sm-8 pdl-0">
                <div class="breadcrumb">
                    <a href="<?php bloginfo('url'); ?>">> <?php _e( 'Home' ); ?></a>    
                    <?php if($parent_cat != 0){ ?>
                        <a href="<?php echo get_category_link( $parent_cat ); ?>">
                            > <?php echo get_cat_name($parent_cat); ?>
                        </a> 
                    <?php } ?>
                    <span class="in-progress"> > <?php echo $Name_category; ?></span>
                </div>
                <h1 class="page-title"><?php echo get_cat_name($parent_cat); ?></h1>
                <div class="thumbnail-slider col-md-12 col-sm-12 pdlr-0">
                    <div class="well">
                        <div id="CarouselArticle" class="carousel slide">
                            <!-- Carousel indicators -->
<!--                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active">1</li>
                                <li data-target="#myCarousel" data-slide-to="1">2</li>
                                <li data-target="#myCarousel" data-slide-to="2">3</li>
                            </ol>-->
                            <p class="carousel-article-title">
                                <?php echo $Name_category; ?>
                            </p>
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                          <?php
                                            query_posts( 'cat='.$Id_category.'&orderby=date&order=desc'); 
                                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                                         ?>
                                            <div class="col-sm-12">
                                                <?php
                                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
                                                    $url = $thumb['0'];                                                    
                                                ?>
                                                <a class="item-article" href="<?php the_permalink(); ?>">
													<div class="div-img img-article img-responsive">
														<img class="img-article img-responsive" src="<?php echo $url; ?>" alt="Image">  
													</div>		
                                                    <div class="title-article">                                                    
                                                        <?php the_title(); ?>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endwhile; ?>        
                                        <?php endif; ?>
                                        <?php wp_reset_query(); ?>                                        
                                    </div>
                                    <!--/row-->
                                </div>                                
                            </div>
                            <!--/carousel-inner--> 
<!--                            <a class="left carousel-control" href="#CarouselArticle" data-slide="prev"></a>
                            <a class="right carousel-control" href="#CarouselArticle" data-slide="next"></a>-->
                        </div>
                        <!--/myCarousel-->
                    </div>
                    <!--/well-->
                </div>
            </div>
            <?php
             include('right-block.php'); 
            ?>            
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!--container-->
<?php get_footer(); ?>
