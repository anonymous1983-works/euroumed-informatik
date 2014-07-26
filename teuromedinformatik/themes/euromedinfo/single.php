<?php
get_header();
$post_categories = wp_get_post_categories(get_the_ID());
$Id_category = $post_categories[0]; //id de la categorie
$Name_category = get_cat_name($Id_category); // nom de la categorie
$cat = get_category($Id_category);
$parent_cat = $cat->category_parent;
?>
<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="main-left col-md-8 col-sm-8 pdl-0">
                <div class="breadcrumb">
                    <a href="<?php bloginfo('url'); ?>">> <?php _e( 'Home' ); ?></a>    
                    <?php if ($parent_cat != 0) { ?>
                        <a href="<?php echo get_category_link($parent_cat); ?>">
                            > <?php echo get_cat_name($parent_cat); ?>
                        </a> 
                    <?php } ?>
                    <span class="in-progress"> > <?php echo $Name_category; ?></span>
                </div>
                <h1 class="page-title"><?php echo get_cat_name($parent_cat); ?></h1>

                <?php while (have_posts()) : the_post(); ?>  

                    <div class="thumbnail-slider col-md-12 col-sm-12 pdlr-0">
                        <div class="well">
                            <div class="carousel slide" id="CarouselArticle">
                                <p class="carousel-article-title">
                                    <?php echo $Name_category; ?>
                                </p>
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-sm-12">
												 <?php
                                                    $url = MultiPostThumbnails::get_post_thumbnail_url(
                                                                    get_post_type(), 'secondary-image'
                                                    );
												  if(!empty($url)){	
                                                 ?>
													<a data-toggle="modal" href="#myModal" class="item-detail"> 
														<img alt="<?php the_title(); ?>" src="<?php echo $url; ?>" class="img-article img-responsive">
													</a>
												<?php } ?>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <!--/item-->
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="#x" class="item-detail">
                                                    <img alt="<?php the_title(); ?>" src="<?php echo $url; ?>" class="img-article img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <!--/item-->
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="#x" class="item-detail">
                                                    <img alt="<?php the_title(); ?>" src="<?php echo $url; ?>" class="img-article img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <!--/item-->
                                </div>
                                <!--/carousel-inner--> 
                                <!--                            <a data-slide="prev" href="#CarouselArticle" class="left carousel-control"></a>
                                                            <a data-slide="next" href="#CarouselArticle" class="right carousel-control"></a>-->
                            </div>
                            <!--/myCarousel-->
                        </div>
                        <!--/well-->
                    </div>               
                    <div class="info">
                        <span class="info-title">
                            <?php the_title(); ?>
                        </span>
                        <p class="info-description first">
                            <?php the_content(); ?>
                        </p>    
                    </div>

                <?php endwhile; // end of the loop.  ?>
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

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
<!--            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>-->
            <img class="img-responsive" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
        </div>
    </div>
</div>
