<div id="sidebar">
	<ul class="xoxo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin first sidebar widgets ?>
		<?php if ( function_exists('wp_tag_cloud') ) : ?>
		<li id="tag-cloud"><!-- Par defaut on affiche les "mots-cles populaires" s'il n'y a pas de widgets associés à la sidebar -->
			<h3 class="widget-title"><?php _e('Popular Tags'); ?></h3>
			<div>
				<?php wp_tag_cloud('smallest=8&largest=18&number=15'); ?>
			</div>
		</li><!-- end Popular Tags section -->
		<?php endif; ?>
		<?php wp_list_bookmarks('title_before=<h3 class="widget-title">&title_after=</h3>&show_images=0') // Ici les widgets s'ajoutent ?>
		<?php endif; // end first sidebar widgets ?>
		<?php if (is_author(1)) { ?>
		<li>Aujourd'hui, je suis <?php echo strtolower(esc_attr( get_the_author_meta('mood', wp_get_current_user()->ID ) )) ?>.</li>
		<li><a href="<?php echo esc_attr( get_the_author_meta('facebook', wp_get_current_user()->ID ) ); ?>"><img width="35px" src="http://www.licence-mci.fr/~licencem/wordpress/wp-content/uploads/2013/01/facebookfdswgfd.png"></a><a href="<?php echo esc_attr( get_the_author_meta('twitter', wp_get_current_user()->ID ) ); ?>"><img src="https://abs.twimg.com/favicons/favicon.ico"></a></li>
		<?php preg_match("/video\/([^_]+)/", esc_attr( get_the_author_meta('dailymotion', wp_get_current_user()->ID ) ), $matches); ?>
		<li><iframe frameborder="0" width="250" height="130" src="http://www.dailymotion.com/embed/video/<?php echo $matches[1]; ?>" allowfullscreen></iframe></li>
		<?php } ?>
	</ul>
</div><!-- #sidebar -->