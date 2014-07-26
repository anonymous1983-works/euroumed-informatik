<?php
get_header();
while (have_posts()) : the_post(); ?>  
<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="main-left col-md-8 col-sm-8 pdl-0">
                <div class="breadcrumb">
                    <a href="<?php bloginfo('url'); ?>">> <?php _e( 'Home' ); ?></a>
                    <?php
                      if(get_the_ID() != 171){ 
                    ?>
                        <a href="<?php echo get_permalink( 171 ); ?>">
                                >                            
                                <?php ;echo company;  ?>
                        </a>
                    <?php } ?>
                    <span class="in-progress"> > <?php the_title(); ?></span>
                </div>
               <h1 class="page-title"> 
                <?php if(get_the_ID() != 171){ echo company; } ?> 
               </h1> 
                    <div class="thumbnail-slider col-md-12 col-sm-12 pdlr-0">
                        <div class="well">
                            <div class="carousel slide" id="CarouselArticle">
                                <p class="carousel-article-title">
                                    <?php the_title(); ?>
                                </p>
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a data-toggle="modal" href="#myModal" class="item-detail">                                               
                                                    <?php
                                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
                                                    $url = $thumb['0'];                                                    
                                                    ?>
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
<!--                        <span class="info-title">
                            <?php //the_title(); ?>
                        </span>-->
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
