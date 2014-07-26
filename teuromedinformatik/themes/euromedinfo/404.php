<?php get_header();?>
<div class="content page"><!--la balise qui englobe le site : se ferme dans la page footer-->

	<div class="row">
		<div class="three columns"><!--menu verticale & les deux images au dessous-->
			<?php get_sidebar( "leftAccueil" ); ?>
		</div>
		<div class="nine columns search">
			<h1>erreur 404 ;)</h1>
			<?php get_search_form(); ?>
		</div>
	</div>

<?php get_footer(); ?>