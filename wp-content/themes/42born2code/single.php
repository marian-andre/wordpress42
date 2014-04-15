<?php get_header() ?>
<div id="content">
	<?php the_post() ?>
	<div class="entry-single">
		<div class="entry-top">
		<?php  ?>
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
			?>Photo : <?php the_post_thumbnail(); ?>
			<?php if ( get_post_meta($post->ID, 'Description de l\'image', true) ) : ?> 
			<?php echo "<br />".get_post_meta($post->ID, 'Description de l\'image', true) ?>
			<?php endif; ?>
			<?php } ?>
			<h2 class="entry-title"><?php the_title() ?></h2>
			<div class="entry-meta-top">
				<span class="entry-date"><?php unset($previousday); printf( __( '%1$s', 'wpbx' ), the_date( 'D, j M Y', '', '', false ) ) ?></span>
				<span class="entry-meta-sep">|</span>
				<span class="entry-comm">Publié dans <?php the_category(', '); ?></span>
			</div>
		</div>
		<div class="entry-content clearfix">
			<?php the_content() ?>
		</div>
		<div class="entry-meta entry-bottom">
			<?php the_tags( __( '<span class="tag-links">Tags: ', 'wpbx' ), ", ", "</span>\n" ) ?>
		</div>
	</div><!-- .post -->
	<?php comments_template(); ?>
</div><!-- #content -->
<?php get_footer() ?>