<div class="main-right col-md-4 col-sm-4 pdr-0">
    <div class="nav-right">
        <a class="chat" href="#">Chat<br><?php echo live; ?></a>
        <a class="fiche" href="#"><?php echo sheet; ?><br><?php echo prac; ?></a>
    </div>
    <div class="tools">
        <a href="<?php echo get_category_link(3); ?>" class="item hover-blue software">
            <span>
                <?php echo software; ?>
            </span>
            <?php echo management; ?>
            <br><?php echo message; ?>
            <br><?php echo otherSoft; ?>
        </a>
        <a href="<?php echo get_category_link(4); ?>" class="item hover-red network">
            <span><?php echo reseaux; ?></span>Administration
            <br><?php echo Wiring; ?>
        </a>
        <a href="<?php echo get_category_link(5); ?>" class="item hover-blue save">
            <span><?php echo Sauvegardes; ?></span><?php echo tv; ?>
            <br><?php echo sauvRep; ?>
            <br><?php echo data; ?>
        </a>
    </div>
</div>