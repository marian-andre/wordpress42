<?php 
add_action( 'init', 'create_post_type' );
function create_post_type() {

  register_post_type( 'shop',
    array(
      'labels' => array(
        'name' => __( 'Shop' ),
        'singular_name' => __( 'Shop' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}
register_taxonomy( 'Taille', 'shop', array( 'hierarchical' => true, 'label' => 'Taille', 'query_var' => true, 'rewrite' => true ) );

//Ici on ajoute les actions/exécutions
add_action( 'admin_menu', 'my_shop_box' );
add_action( 'save_post', 'my_shop_box_save', 10, 2 );

function my_shop_box() {
	//*Cf Codex pour voir les différents paramètres de la fonction add_meta_box()
	add_meta_box( 'price', 'Prix', 'my_shop_box_create', 'shop', 'normal', 'high' );
}

function my_shop_box_create( $object, $box ) { ?>
	<p>
		<label for="price">Prix</label>
		<br />
		<input type="text" size="80" name="price" id="price" value="<?php echo	esc_html( get_post_meta( $object->ID, 'Prix', true ), 1 ); ?>" />
		<input type="hidden" name="price_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>"/>
	</p>
<?php } 
//Ici on sauve

function my_shop_box_save( $post_id, $post ) {
	if (!wp_verify_nonce( $_POST['price_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;
	if (!current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Prix', true );
	$new_meta_value = stripslashes( $_POST['price'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Prix', $new_meta_value, true );
	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Prix', $new_meta_value );
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Prix', $meta_value );
} 
?>

<?php
add_action('wp_insert_post', 'wpc_champs_personnalises_defaut');
 function wpc_champs_personnalises_defaut($post_id)
 {
 if ( get_post_type($post_id) != 'post' ) {
 add_post_meta($post_id, 'id_dailymotion', '', true);
 }
 return true;
 }
?>
<?php
//Ici on ajoute les actions/exécutions
add_action( 'admin_menu', 'my_create_post_meta_box' );
add_action( 'save_post', 'my_save_post_meta_box', 10, 2 );

function my_create_post_meta_box() {
	//*Cf Codex pour voir les différents paramètres de la fonction add_meta_box()
	add_meta_box( 'desc_img', 'Description de l\'image', 'my_post_meta_box', 'post', 'normal', 'high' );
	add_meta_box( 'desc_img', 'Description de l\'image', 'my_post_meta_box', 'page', 'normal', 'high' );
}

function my_post_meta_box( $object, $box ) { ?>
	<p>
		<label for="desc_img">Description de l'image</label>
		<br />
		<input type="text" size="80" name="desc_img" id="desc_img" value="<?php echo	esc_html( get_post_meta( $object->ID, 'Description de l\'image', true ), 1 ); ?>" />
		<input type="hidden" name="desc_img_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>"/>
	</p>
<?php } 

//Ici on sauve

function my_save_post_meta_box( $post_id, $post ) {
	if (!wp_verify_nonce( $_POST['desc_img_nonce'], plugin_basename( __FILE__ ) ) )
		return $post_id;
	if (!current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$meta_value = get_post_meta( $post_id, 'Description de l\'image', true );
	$new_meta_value = stripslashes( $_POST['desc_img'] );

	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, 'Description de l\'image', $new_meta_value, true );
	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Description de l\'image', $new_meta_value );
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Description de l\'image', $meta_value );
} ?>
<?php

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Main Menu' ),
		));
}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 200, 150, true ); // Normal post thumbnails

add_custom_background();

// Custom comment listing
function wpbx_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$commenter = get_comment_author_link();
	if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
		$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	} else {
		$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	}
	$avatar_email = get_comment_author_email();
    $avatarURL = get_bloginfo('template_directory');
	$avatar = str_replace( "class='avatar", "class='avatar", get_avatar( $avatar_email, 40, $default = $avatarURL . '/images/gravatar-blank.jpg' ) );
?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div id="div-comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo $avatar . ' <span class="fn n">' . $commenter . '</span>'; ?>
			</div>
			<div class="comment-meta">
				<?php printf(__('%1$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'wpbx'),
					get_comment_date('j M Y', '', '', false),
					get_comment_time(),
					'#comment-' . get_comment_ID() );
					edit_comment_link(__('Edit', 'wpbx'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>');
				?>
				<span class="reply-link">
					<span class="meta-sep">|</span> <?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</span>
			</div>

			<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'wpbx') ?>

			<div class="comment-content"><?php comment_text() ?></div>
		</div>
<?php
}
// wpbx_comment()

// For category lists on category archives: Returns other categories except the current one (redundant)
function wpbx_cat_also_in($glue) {
	$current_cat = single_cat_title( '', false );
	$separator = "\n";
	$cats = explode( $separator, get_the_category_list($separator) );
	foreach ( $cats as $i => $str ) {
		if ( strstr( $str, ">$current_cat<" ) ) {
			unset($cats[$i]);
			break;
		}
	}
	if ( empty($cats) )
		return false;

	return trim(join( $glue, $cats ));
}

// For tag lists on tag archives: Returns other tags except the current one (redundant)
function wpbx_tag_also_in($glue) {
	$current_tag = single_tag_title( '', '',  false );
	$separator = "\n";
	$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	foreach ( $tags as $i => $str ) {
		if ( strstr( $str, ">$current_tag<" ) ) {
			unset($tags[$i]);
			break;
		}
	}
	if ( empty($tags) )
		return false;

	return trim(join( $glue, $tags ));
}

// Generate custom excerpt length
function wpbx_excerpt_length($length) {
	return 75;
}
add_filter('excerpt_length', 'wpbx_excerpt_length');


// Widgets plugin: intializes the plugin after the widgets above have passed snuff
function wpbx_widgets_init() {
	if ( !function_exists('register_sidebars') ) {
		return;
	}
	// Formats the theme widgets, adding readability-improving whitespace
	$p = array(
		'before_widget'  =>   '<li id="%1$s" class="widget %2$s">',
		'after_widget'   =>   "</li>\n",
		'before_title'   =>   '<h3 class="widget-title">',
		'after_title'    =>   "</h3>\n"
	);
	register_sidebars( 1, $p );
	register_sidebars(array(
		'name'		 =>   'Team42',
		'before_widget'  =>   '<li id="%1$s" class="widget %2$s">',
		'after_widget'   =>   "</li>\n",
		'before_title'   =>   '<h3 class="widget-title">',
		'after_title'    =>   "</h3>\n"
	));
} // ici on ferme la fonction function wpbx_widgets_init()


// Runs our code at the end to check that everything needed has loaded
add_action( 'init', 'wpbx_widgets_init' );

// Adds filters for the description/meta content
add_filter( 'archive_meta', 'wptexturize' );
add_filter( 'archive_meta', 'convert_smilies' );
add_filter( 'archive_meta', 'convert_chars' );
add_filter( 'archive_meta', 'wpautop' );

// Translate, if applicable
load_theme_textdomain('wpbx');


// Construct the WordPress header
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'next_post_rel_link');
remove_action('wp_head', 'previous_post_rel_link');
