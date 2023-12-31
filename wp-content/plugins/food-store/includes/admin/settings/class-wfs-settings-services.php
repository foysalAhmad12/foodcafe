<?php
/**
 * FoodStore Services Settings
 *
 * @package FoodStore/Admin
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WFS_Settings_Services', false ) ) {
  return new WFS_Settings_Services();
}

/**
 * WFS_Settings_Services.
 */
class WFS_Settings_Services extends WFS_Settings_Page {

  /**
   * Constructor.
   */
  public function __construct() {
    
    $this->id    = 'services';
    $this->label = __( 'Services', 'food-store' );

    parent::__construct();
  }

  /**
   * Get sections.
   *
   * @return array
   */
  public function get_sections() {
    
    $sections = array(
      ''           => __( 'General', 'food-store' ),
      'pickup'     => __( 'Pickup Service', 'food-store' ),
      'delivery'   => __( 'Delivery Service', 'food-store' ),
    );
    return apply_filters( 'foodstore_get_sections_' . $this->id, $sections );
  }

  /**
   * Get settings array.
   *
   * @param string $current_section Current section name.
   * @return array
   */
  public function get_settings( $current_section = '' ) {

    $default_service = get_option( '_wfs_default_service', 'pickup' );
    $enable_delivery = $enable_pickup = $is_default = '';

    if ( 'pickup' === $current_section ) {

      if ( $default_service == 'pickup' ) {
        $is_default     = __( 'Pickup Service is <b><i>Enabled</i></b> by default.', 'food-store' );
        $enable_pickup  = 'yes';
      }
      
      $settings = apply_filters(
        
        'foodstore_pickup_settings',
        
        array(

          array(
            'title'     => __( 'Pickup Service', 'food-store' ),
            'type'      => 'title',
            'id'        => 'service_pickup_options',
            'desc'      => $is_default,
          ),

          array(
            'title'     => __( 'Enable Pickup', 'food-store' ),
            'type'      => 'checkbox',
            'id'        => '_wfs_enable_pickup',
            'desc'      => __( 'Enable Pickup Service', 'food-store' ),
            'default'   => $enable_pickup,
          ),

          array(
            'title'     => __( 'Pickup Label', 'food-store' ),
            'id'        => '_wfs_pickup_label',
            'type'      => 'text',
            'default'   => __( 'Pickup', 'food-store' ),
          ),

          array(
            'title'     => __( 'Pickup Time Interval', 'food-store' ),
            'type'      => 'number',
            'default'   => 30,
            'id'        => '_wfs_pickup_time_interval',
            'desc_tip'  => __( 'Enter pickup time interval in minutes.', 'food-store' ),
            'custom_attributes' => array(
              'min'   => 5,
              'max'   => 60,
              'step'  => 5,
            ),
          ),

          array(
            'title'     => __( 'Min Order Amount', 'food-store' ),
            'id'        => '_wfs_min_pickup_order_amount',
            'type'      => 'number',
            'default'   => 99,
            'desc_tip'  => __( 'Minimum order amount for pickup service.', 'food-store' ),
          ),

          array(
            'title'     => __( 'Min Order Amount Error', 'food-store' ),
            'id'        => '_wfs_min_pickup_order_amount_error',
            'type'      => 'textarea',
            'css'       => 'min-width: 50%; height: 75px;',
            'default'   => __( 'Minimum order price for {service_type} is {min_order_amount}', 'food-store' ),
            'desc_tip'  => __( 'Error message for minimum order amount. You can use variable {service_type} and {min_order_amount}', 'food-store' ),
          ),

          array(
            'type'      => 'sectionend',
            'id'        => 'service_pickup_options',
          ),

        )
      );
    
    } else if( 'delivery' === $current_section ) {

      if ( $default_service == 'delivery' ){
        $is_default       = __( 'Delivery Service is <b><i>Enabled</i></b> by default.', 'food-store' );
        $enable_delivery  = 'yes';
      }
      
      $settings = apply_filters(
        
        'foodstore_service_settings',
        
        array(

          array(
            'title'     => __( 'Delivery Service', 'food-store' ),
            'type'      => 'title',
            'id'        => 'delivery_options',
            'desc'      => $is_default,
          ),

          array(
            'title'     => __( 'Enable Delivery', 'food-store' ),
            'type'      => 'checkbox',
            'id'        => '_wfs_enable_delivery',
            'desc'      => __( 'Enable Delivery Service', 'food-store' ),
            'default'   => $enable_delivery,
          ),

          array(
            'title'     => __( 'Delivery Label', 'food-store' ),
            'id'        => '_wfs_delivery_label',
            'type'      => 'text',
            'default'   => __( 'Delivery', 'food-store' ),
          ),

          array(
            'title'     => __( 'Delivery Time Interval', 'food-store' ),
            'type'      => 'number',
            'default'   => 30,
            'id'        => '_wfs_delivery_time_interval',
            'desc_tip'  => __( 'Enter delivery time interval in minutes.', 'food-store' ),
            'custom_attributes' => array(
              'min'   => 5,
              'max'   => 60,
              'step'  => 5,
            ),
          ),

          array(
            'title'     => __( 'Min Order Amount', 'food-store' ),
            'type'      => 'number',
            'default'   => 99,
            'css'       => 'width:100px;',
            'id'        => '_wfs_min_delivery_order_amount',
            'desc_tip'  => __( 'Enter order amount for delivery service.', 'food-store' ),
          ),

          array(
            'title'     => __( 'Min Order Amount Error', 'food-store' ),
            'id'        => '_wfs_min_delivery_order_amount_error',
            'type'      => 'textarea',
            'css'       => 'min-width: 50%; height: 75px;',
            'default'   => __( 'Minimum order price for {service_type} is {min_order_amount}', 'food-store' ),
            'desc_tip'  => __( 'Error message for minimum order amount. You can use variable {service_type} and {min_order_amount}.', 'food-store' ),
          ),

          array(
            'type'      => 'sectionend',
            'id'        => 'service_options',
          ),
        )
      );
    
    } else {
      
      $settings = apply_filters(
        
        'foodstore_service_settings',
        
        array(

          array(
            'title'     => __( 'Service Settings', 'food-store' ),
            'type'      => 'title',
            'id'        => 'service_options',
          ),

          array(
            'title'     => __( 'Enable Pickup/Delivery Service', 'food-store' ),
            'type'      => 'checkbox',
            'id'        => '_wfs_enable_service',
            'desc'      => __( 'Enable Service', 'food-store' ),
            'default'   => 'yes',
          ),

          array(
            'title'     => __( 'Enable Checkout Service Fields', 'food-store' ),
            'type'      => 'checkbox',
            'id'        => '_wfs_enable_checkout_fields',
            'desc'      => __( 'Enable Service Fields on Checkout', 'food-store' ),
            'default'   => 'yes',
          ),

          array(
            'title'     => __( 'Default Service', 'food-store' ),
            'type'      => 'radio',
            'id'        => '_wfs_default_service',
            'options'   => array( 
              'pickup'   => __( 'Pickup', 'food-store' ), 
              'delivery' => __( 'Delivery', 'food-store' ),
            ),
            'default'   => 'pickup',
            'desc_tip'  => __( 'Set default service type which will act as fallback in case both delivery and pickup are disabled.', 'food-store' ),
          ),

          array(
            'title'     => __( 'Enable ASAP option', 'food-store' ),
            'type'      => 'checkbox',
            'id'        => '_wfs_enable_asap',
            'desc'      => __( 'Enable this option to show ASAP on your store service time', 'food-store' ),
            'default'   => '',
          ),

          array(
            'title'     => __( 'ASAP Label', 'food-store' ),
            'id'        => '_wfs_asap_label',
            'default'   => __( 'ASAP', 'food-store' ),
            'type'      => 'text',
            'desc_tip'  => __( 'Use this text as ASAP on your service time modal', 'food-store' ),
          ),

          array(
            'title'     => __( 'Order Later Label', 'food-store' ),
            'id'        => '_wfs_order_later_label',
            'default'   => __( 'Later', 'food-store' ),
            'type'      => 'text',
            'desc_tip'  => __( 'Use this text to show order later options', 'food-store' ),
          ),

          array(
            'title'     => __( 'Auto Update Shipping Method', 'food-store' ),
            'type'      => 'checkbox',
            'id'        => '_wfs_enable_shipping_selection',
            'desc'      => __( 'Choose best suited Shipping method based on the service chosen.', 'food-store' ),
            'default'   => 'yes',
          ),

          array(
            'title'     => __( 'Keep Store Always Open', 'food-store' ),
            'type'      => 'checkbox',
            'id'        => '_wfs_store_open_always',
            'desc'      => __( 'This will make your store open always. Disable this option if you want to set your store open and close hours.', 'food-store' ),
            'default'   => 'no',
          ),
          
          array(
            'title'     => __( 'Store/Service Start Time', 'food-store' ),
            'type'      => 'text',
            'css'       => 'width:100px;',
            'class'     => 'wfs_service_time',
            'id'        => '_wfs_open_time',
            'default'   => '07:00am',
            'desc_tip'  => __( 'Set the time from when you can provide service.', 'food-store' ),
          ),

          array(
            'title'     => __( 'Store/Service Close Time', 'food-store' ),
            'type'      => 'text',
            'css'       => 'width:100px;',
            'class'     => 'wfs_service_time',
            'id'        => '_wfs_close_time',
            'default'   => '10:00pm',
            'desc_tip'  => __( 'Set closing time of store or service.', 'food-store' ),
          ),

          array(
            'title'     => __( 'Preparation Time', 'food-store' ),
            'id'        => '_wfs_food_prepation_time',
            'type'      => 'number',
            'desc_tip'  => __( 'Set food preparation time in minutes.', 'food-store' ),
            'default'   => 15,
            'css'       => 'min-width: 100px;',
            'custom_attributes' => array(
              'min'   => 0,
              'max'   => 60,
              'step'  => 5,
            ),
          ),

          array(
            'title'     => __( 'Store Closed Message', 'food-store' ),
            'id'        => '_wfs_store_closed_message',
            'default'   => __( 'Sorry, we are closed now.', 'food-store' ),
            'type'      => 'textarea',
            'desc_tip'  => __( 'Set message for users to see when your store is closed.', 'food-store' ),
          ),

          array(
            'title'     => __( 'Slots Unavailable Message', 'food-store' ),
            'id'        => '_wfs_no_slot_message',
            'default'   => __( 'Slots unavailable for selected Date!', 'food-store' ),
            'type'      => 'textarea',
            'desc_tip'  => __( 'Set message for users to see when there are not time slots available for a particular day.', 'food-store' ),
          ),

          array(
            'title'     => __( 'Service Modal Settings', 'food-store' ),
            'type'      => 'radio',
            'id'        => '_wfs_service_modal_option',
            'options'   => array(  
              'auto'          => __( 'Set available service type and time by default.', 'food-store' ),
              'auto_modal'    => __( 'Open service modal when menu page is ready.', 'food-store' ),
              'manual_modal'  => __( 'Open service modal when add to cart is clicked.', 'food-store' ),
            ),
            'default'   => 'auto',
            'desc_tip'  => __( 'Choose how you want your customers to select the Service Settings.', 'food-store' ),
          ),
          
          array(
            'type'      => 'sectionend',
            'id'        => 'service_options',
          ),
        )
      );
    }

    return apply_filters( 'foodstore_get_settings_' . $this->id, $settings, $current_section );
  }

  /**
   * Output the settings.
   */
  public function output() {
    
    global $current_section;

    $settings = $this->get_settings( $current_section );
    WFS_Admin_Settings::output_fields( $settings );
  }

  /**
   * Save settings.
   */
  public function save() {
    
    global $current_section;

    $settings = $this->get_settings( $current_section );
    WFS_Admin_Settings::save_fields( $settings );

    if ( $current_section ) {
      do_action( 'foodstore_update_options_' . $this->id . '_' . $current_section );
    }
  }
}
return new WFS_Settings_Services();