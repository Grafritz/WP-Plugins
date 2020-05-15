<?php
/**
* Plugin Name: WP_Admin Bar
* plugin URI:http://www.brain-dev.net
* Description:Changer le logo de la page login en mettre le fond en vert.
* Version:1.0
* Author:Jean Fritz DUVERSEAU
* Author URI:http://brain-dev.net
*/
?>
<?php
// admin bar

function wps_admin_bar() {

    global $wp_admin_bar;

	$wp_admin_bar->remove_menu('wp-logo'); // Cette ligne désactive le logo WP et le menu associé
    $wp_admin_bar->remove_menu('about'); // Cette ligne désactive le menu d'acces " A propos de WordPress " 
    $wp_admin_bar->remove_menu('wporg'); // Cette ligne désactive le menu d'acces a WordPress.org
    $wp_admin_bar->remove_menu('documentation'); // Cette ligne désactive le menu d'acces a la documentation de WordPress 
    $wp_admin_bar->remove_menu('support-forums'); // Cette ligne désactive le menu d'acces au forum de WordPress
    $wp_admin_bar->remove_menu('feedback'); // Cette ligne désactive le menu d'acces au Remarque
    $wp_admin_bar->remove_menu('view-site'); // Cette ligne désactive le lien vers le tableau de bord de WordPress
	// $wp_admin_bar->remove_menu('site-name'); // Cette ligne désactive le menu d'acces au tableau de bord
	$wp_admin_bar->remove_menu('dashboard'); // Cette ligne désactive le lien associé au nom du blog vers le tableau de bord de WordPress
	$wp_admin_bar->remove_menu('updates'); // Cette ligne désactive l'icon des mise à jours

	//$wp_admin_bar->remove_menu('themes'); // Cette ligne désactive le lien vers les options du thème.
	//$wp_admin_bar->remove_menu('widgets'); // Cette ligne désactive le lien vers les options des widgets
	//$wp_admin_bar->remove_menu('menus'); // Cette ligne désactive le lien vers l'option menus
	//$wp_admin_bar->remove_menu('comments'); // Cette ligne désactive l'icon des commentaires
	// $wp_admin_bar->remove_menu('new-content'); // Cette ligne désactive l'icon et le menu nouveau
	//$wp_admin_bar->remove_menu('new-post'); // Cette ligne désactive le lien ajouter un nouvelle article
	//$wp_admin_bar->remove_menu('new-media'); // Cette ligne désactive le lien vers la bibliothèque multimédia
	//$wp_admin_bar->remove_menu('new-link'); // Cette ligne désactive le lien ajouter un nouveau lien
	//$wp_admin_bar->remove_menu('new-page'); // Cette ligne désactive le lien ajouter une page
	//$wp_admin_bar->remove_menu('new-user'); // Cette ligne désactive le lien ajouter une page
	//$wp_admin_bar->remove_menu('edit'); // Cette ligne désactive le lien modifier la page
	//$wp_admin_bar->remove_menu('search'); // Cette ligne désactive la fonction rechercher
	// $wp_admin_bar->remove_menu('my-account'); // Cette ligne désactive le menu Utilisateur

	//$wp_admin_bar->remove_menu('user-info'); // Cette ligne désactive les informations de utilisateur
	//$wp_admin_bar->remove_menu('edit-profile'); // Cette ligne désactive le menu d'acces a l'éditeur du profile utilisateur
	//$wp_admin_bar->remove_menu('logout'); // Cette ligne désactive le deconnecter pour les utilisateur

	
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

//*----------------------------------------------------------------*//
/////////////////////////////////**///////////////////////////////////
//*----------------------------------------------------------------*//  
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from() { return 'info@no_reply.com'; }
function new_mail_from_name() { return '[Aministration]'; }

?>