<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header() ?>
<?php the_post() ?>
<div id="content">
	<div class="entry">
<?php if (!get_the_post_thumbnail()) { 
			if ( get_post_meta($post->ID, 'id_dailymotion', true) ) {
			?>
			Video : <iframe frameborder="0" width="250" height="130" src="http://www.dailymotion.com/embed/video/<?php echo get_post_meta($post->ID, 'id_dailymotion', true); ?>" allowfullscreen></iframe>
			<?php } 
			else
			{ ?>
			Photo : <img width="200px" src="https://lh6.googleusercontent.com/-GeKt7ojqviA/AAAAAAAAAAI/AAAAAAAAHbQ/xPih_hA0Joo/photo.jpg">
			<?php }
		} else {
			?>Photo : <?php the_post_thumbnail(); 
			} ?>
		<h2 class="page-title"><?php the_title() ?></h2>
		<div class="entry-content">
			<div class="archives-page-left">
				<strong><?php _e("By Page", 'star'); ?>:</strong>
					<ul>
					<?php wp_list_pages('title_li='); ?>
					</ul>
				<strong><?php _e("By Category", 'star'); ?>:</strong>
					<ul>
					<?php wp_list_categories('sort_column=name&title_li='); ?>
					</ul>
				<strong><?php _e("By Month", 'star'); ?>:</strong>
					<ul>
					<?php wp_get_archives('type=monthly'); ?>
					</ul>
			</div>
			<div class="archives-page-right">
				<strong><?php _e("Last 50 Posts", 'star'); ?>:</strong>
					<ul>
					<?php wp_get_archives('type=postbypost&limit=50'); ?>
					</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div><!-- entry -->
</div><!-- #content -->
<?php get_sidebar() ?>
<?php get_footer() ?>