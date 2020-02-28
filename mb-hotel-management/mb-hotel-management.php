<?php
/**
 * Plugin Name: Management Hotel 
 * Plugin URI: 
 * Description: You can manage hotel reservations inside your WordPress dashboard with full calendar view.
 * Version: 1.0 
 * Author: Dev WordPress
 * Author URI:  
 * License: GPLv2 or later
 */
?>

<?php 

class managerBooking 
{

    /**
     * Initializes the plugin by setting localization, filters, and administration functions.
     */
    public function __construct() 
    {

        // Add extra submenu to the admin panel
        add_action( 'admin_menu', array( $this, 'create_menu_admin_panel' ) );


    } // end constructor

   
    public function create_menu_admin_panel() 
    {

        add_menu_page( 'Manager booking', 'Manager booking', 'edit_posts', 'manager-booking', array($this, 'manager_booking' ) );

    }   
    
    /**
     * Create Plugin option page
     */ 
    public function manager_booking() 
    {
        if (!current_user_can( 'edit_posts' )) {
            wp_die( __('You do not have sufficient permission to access this page.') );
        }

        wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
        wp_enqueue_style( 'fullcalendar-core', plugins_url( 'lib/fullcalendar/packages/core/main.css', __FILE__ ) );
        wp_enqueue_style( 'fullcalendar-daygrid', plugins_url( 'lib/fullcalendar/packages/daygrid/main.css', __FILE__ ) );
        wp_enqueue_style( 'css-custom', plugins_url( 'css/plugin.css', __FILE__ ) );

        wp_enqueue_script('ct-jquery', 'https://code.jquery.com/jquery-3.3.1.js');
        wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'  );
        wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'  );
        wp_enqueue_script( 'fullcalendar-core', plugins_url( 'lib/fullcalendar/packages/core/main.js', __FILE__ ) );
        wp_enqueue_script( 'fullcalendar-daygrid', plugins_url( 'lib/fullcalendar/packages/daygrid/main.js', __FILE__ ) );
        wp_enqueue_script( 'js-custom', plugins_url( 'js/plugin.js', __FILE__ ) );

        include 'inc/front.php';
    }


} // end class

$Data = new managerBooking();

?>
