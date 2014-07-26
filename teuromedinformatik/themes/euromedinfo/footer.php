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
                $items = wp_get_nav_menu_items('menu-footer');
                $tadTitre = array();
                $tadLink = array();
                foreach ($items as $item) {
                    if ($item->menu_item_parent != 0) {
                        $tadTitre[$item->menu_item_parent][$item->ID] = $item->title;
                        $tadLink[$item->menu_item_parent][$item->ID] = $item->url;
                    }
                }

                $i = 0;
                foreach ($items as $item) {
                    $i++;
                    if ($item->menu_item_parent == 0) {
                        ?>         
                        <div class="col-md-2 col-sm-2">
                            <div id="nav_menu-<?php echo $i; ?>">
                                <h4 class="menu-footer-menu-title title-h4">
                                    <?php echo $item->title; ?>
                                </h4>
                                <?php if (count($tadTitre[$item->ID]) > 0) { ?>
                                    <div class="menu-footer-menu-container">
                                        <ul class="menu">
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
                                    </div>
                                <?php } ?>  
                            </div>
                        </div>
                        <?php
                    }
                }
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
                                <li><a class="address" href="#" title="Adresse">11, quai Conti <br>78430 Louveciennes</a></li>
                                <li><a class="contact" href="#" title="Contact">Tél : +33 (0) 1 30 82 17 17 <br>Fax : +33 (0) 1 30 82 17 18</a></li>
                                <li><a class="mail" href="#" title="E-mail">e-mail</a></li>
                            </ul>
                        </div>
                        <div class="right col-md-7 col-sm-7">
                            <ul class="clearfix">
                                <li><a class="fb" href="#" title="Facebook"></a></li>
                                <li><a class="g" href="#" title="Google +"></a></li>
                                <li><a class="in" href="#" title="Linkedin"></a></li>
                            </ul>
                            <ul class="second clearfix">
                                <li><a class="tw" href="#" title="Twitter"></a></li>
                                <li><a class="p" href="#" title="Path"></a></li>
                                <li><a class="x" href="#" title="X"></a></li>
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
<?php wp_footer(); ?>