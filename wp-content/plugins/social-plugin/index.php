<?php 
/*
	Plugin Name: Social Plugin
	Description: Permet d'ajouter des pages Facebook / Twitter ou des vidéos Dailymotion avec, en prime, l'ajout de l'humeur de 'auteur
	License: GPL
	Author: mandre
	Version: v0.0001 alpha
*/
function fb_add_custom_user_profile_fields( $user ) { // On ajoute les données ici ?>
<h3><?php _e('Social', 'your_textdomain'); ?></h3> <table class="form-table">
<tr>
<th>
<label for="facebook"><?php _e('Facebook', 'your_textdomain'); ?></label>
</th>
<td>
<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta(
'facebook', $user->ID ) ); ?>" class="regular-text" /><br /> <span class="facebook">
<?php _e('Entrez le lien de votre page facebook', 'your_textdomain'); ?> </span>
</td>
</tr>
<tr>
<th>
<label for="twitter"><?php _e('Twitter', 'your_textdomain'); ?></label>
</th>
<td>
<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta(
'twitter', $user->ID ) ); ?>" class="regular-text" /><br /> <span class="twitter">
<?php _e('Entrez le lien de votre page Twitter', 'your_textdomain'); ?> </span>
</td>
</tr>
<tr>
<th>
<label for="dailymotion"><?php _e('Dailymotion', 'your_textdomain'); ?></label>
</th>
<td>
<input type="text" name="dailymotion" id="dailymotion" value="<?php echo esc_attr( get_the_author_meta(
'dailymotion', $user->ID ) ); ?>" class="regular-text" /><br /> <span class="dailymotion">
<?php _e('Entrez le lien de votre vidéo Dailymotion', 'your_textdomain'); ?> </span>
</td>
</tr>
<tr>
<th>
<label for="mood"><?php _e('Humeur', 'your_textdomain'); ?></label>
</th>
<td>
<select name="mood" id="mood">
	<option<?php if (esc_attr( get_the_author_meta('mood', $user->ID ) ) == "Heureux") echo " selected=\"selected\""; ?>>Heureux</option>
	<option<?php if (esc_attr( get_the_author_meta('mood', $user->ID ) ) == "Joyeux") echo " selected=\"selected\""; ?>>Joyeux</option>
	<option<?php if (esc_attr( get_the_author_meta('mood', $user->ID ) ) == "Grincheux") echo " selected=\"selected\""; ?>>Grincheux</option>
	<option<?php if (esc_attr( get_the_author_meta('mood', $user->ID ) ) == "Dormeur") echo " selected=\"selected\""; ?>>Dormeur</option>
	<option<?php if (esc_attr( get_the_author_meta('mood', $user->ID ) ) == "Malade") echo " selected=\"selected\""; ?>>Malade</option>
	<option<?php if (esc_attr( get_the_author_meta('mood', $user->ID ) ) == "Triste") echo " selected=\"selected\""; ?>>Triste</option>
	<option<?php if (esc_attr( get_the_author_meta('mood', $user->ID ) ) == "En colère") echo " selected=\"selected\""; ?>>En colère</option>
</select><br /> <span class="mood">
<?php _e('Quel est votre humeur ?', 'your_textdomain'); ?> </span>
</td>
</tr>
</table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) { // On sauvegarde les données ici
	if ( !current_user_can( 'edit_user', $user_id ) ) return FALSE;
update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
update_usermeta( $user_id, 'dailymotion', $_POST['dailymotion'] );
update_usermeta( $user_id, 'mood', $_POST['mood'] );
}
// On dit que fb_add_custom... va « agir » avec show_user_profile et edit_user_profile /on exécute add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );
// On dit que fb_save_custom... va « agir » avec personl_option_update et edit_user_profile_update /on exécute add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );

?>