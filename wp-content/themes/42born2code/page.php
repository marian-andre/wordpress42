<?php get_header() ?>
<div id="content">
<?php the_post() //cf. codex the_post() ?>
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
		<?php the_content() //cf. codex the_content() ?>
		<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
		</div>
	</div><!-- entry -->
<?php if ( get_post_custom_values('comments') ) comments_template() ?>
</div><!-- #content -->

<?php 
if (is_page("L'équipe et les moyens"))
	dynamic_sidebar('Team42');
else
	get_sidebar(); ?>
<?php get_footer() ?>