<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category Travellers
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

// /**
//  * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
//  */

// if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
// 	require_once dirname( __FILE__ ) . '/cmb2/init.php';
// } elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
// 	require_once dirname( __FILE__ ) . '/CMB2/init.php';
// }

add_filter( 'cmb2_meta_boxes', 'travellers_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function travellers_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_trv_';
	$meta_boxes['page_extras'] = array(
		'id'            => 'page_extras',
		'title'         => __( 'Page Extras', 'trv' ),
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields'  => array(
			array(
				'name'    => __( 'Page Icon', 'trv' ),
				'desc'    => __( 'Icon related to this page (if any)', 'trv' ),
				'id'      => $prefix . 'icon',
				'type'    => 'select',
				'options' => array(
					'none' => __( 'None', 'trv' ),
					'bike'   => __( 'Bike', 'trv' ),
					'calendar'     => __( 'Calendar', 'trv' ),
					'crumpled'     => __( 'map', 'trv' ),
					'cases'     => __( 'suitcases', 'trv' ),
					'facebook'     => __( 'facebook', 'trv' ),
					'ithing'     => __( 'iThing', 'trv' ),
					'krakowkit'     => __( 'krakow_kit', 'trv' ),
					'zsolty'     => __( 'zsolty', 'trv' )
				)
			)
		)
	);

	$meta_boxes['gallery'] = array(
		'id'            => 'gallery_metaboxes',
		'title'         => __( 'Gallery Images', 'trv' ),
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
        'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/gallery-page.php' ),
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields'  => array(
			array(
				'name'    => __( 'Gallery Images', 'trv' ),
				'desc'    => __( 'gallery images to shown on the page. They can be reordered I hope.', 'trv' ),
				'id'      => $prefix . 'gallery_images',
				'type'    => 'group',
				'options' => array(
					'group_title'   => __( 'Image {#}', 'trv' ), // since version 1.1.4, {#} gets replaced by row number
			        'add_button'    => __( 'Add Another Image', 'trv' ),
			        'remove_button' => __( 'Remove Image', 'trv' ),
			        'sortable'      => true, // beta
				),
				'fields'      => array(
			        array(
					    'name' => 'Image File',
					    'desc' => 'Upload an image or enter an URL.',
					    'id' => $prefix . 'gallery_image_file',
					    'type' => 'file',
					    // Optionally hide the text input for the url:
					    // 'options' => array(
					    //     'url' => false,
					    // ),
				    )
		        )
			)
		)
	);


	// Add other metaboxes as needed

	return $meta_boxes;
}
