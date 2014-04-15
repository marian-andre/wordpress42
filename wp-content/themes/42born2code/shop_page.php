<?php
/*
Template Name: Shop Page
*/
?>
<?php get_header() ?>
<div id="wrapper">
	<div id="container">
		<div id="contentfull">
			<?php the_post() ?>
			<div class="entry-wide">
				<h2 class="page-title"><?php the_title() ?></h2>
				<div class="entry-content">
				<?php the_content() ?>
				<?php
				$loop = new WP_Query( array( 'post_type' => 'shop', 'posts_per_page' => 10 ) );
				while ( $loop->have_posts() ) : $loop->the_post();
  					echo '<div style="margin: 1em auto;border-bottom: 1px solid #aaa;"><form name="_xclick" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
					echo '<div style="float:left;text-align:center;margin: 1em 2em;">';
					the_post_thumbnail();
					echo '<br /><h3>';
					the_title();
					echo '</h3><br />';
					if ( get_post_meta($post->ID, 'Prix', true) ) { echo "<div stlye=\"float:right;\"><h3>".get_post_meta($post->ID, 'Prix', true)." €</h3></div>"; }
					echo '</div>';
  					echo '<div>';
  					the_content();
  					echo '</div><div>';
					$tailles = wp_get_post_terms($post->ID, 'Taille', array("fields" => "names"));
					if (count($tailles)> 1) $multis = 's';
					echo 'Taille'.$multis.' disponible'.$multis.' : <input type="hidden" name="on0" value="Taille"><select name="os0">';
					foreach ($tailles as $key => $taille)
					{
						echo '<option>'.$taille.'</option>';
					}
					echo '</select></div>

<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="marian@ecvvt.fr">
<input type="hidden" name="currency_code" value="EUR">
<input type="hidden" name="item_name" value="'.get_the_title().'">
<input type="hidden" name="amount" value="'.get_post_meta($post->ID, 'Prix', true).'">
<input type="image" src="http://www.paypal.com/fr_FR/i/btn/sc-but-01.gif" border="0" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!">
<input type="hidden" name="add" value="1">
</form>
					<div style="clear:both;"></div></div>';
				endwhile;
				?>
				</div>
			</div><!-- entry -->
<?php if ( get_post_custom_values('comments') ) comments_template() ?>
		</div><!-- #contentfull -->
	</div><!-- #container -->
</div><!-- #wrapper -->
<?php get_footer() ?>