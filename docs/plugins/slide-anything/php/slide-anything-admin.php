<?php
/**
 * #####################################################################
 * ### SLIDE ANYTHING PLUGIN - PHP FUNCTIONS FOR WordPress DASHBOARD ###
 * #####################################################################
 *
 * @package     WordPress_Slide_Anything
 * @author      Simon Edge
 * @copyright   EdgeWebPages
 * @license     GPLv2 or later
 */

/**
 * ##### PLUGIN REGISTRATION HOOK - RUN WHEN THE PLUGIN IS ACTIVATED #####
 */
function cpt_slider_plugin_activation() {
	// INSERT A 'SAMPLE SLIDER' CUSTOM POST INTO THE DATABASE.
	$sample_post_title = 'Sample Slider';

	// check if the 'sample slider' already exists (plugin has been activated before).
	$cpt_post = get_page_by_title( $sample_post_title, 'OBJECT', 'sa_slider' );

	if ( is_null( $cpt_post ) ) {
		// create the post object.
		$sample_post = array(
			'post_title'   => $sample_post_title,
			'post_content' => '',
			'post_status'  => 'publish',
			'post_type'    => 'sa_slider',
		);
		// insert the post into the database.
		$cpt_id = wp_insert_post( $sample_post );

		// insert meta data for the 'sample slider' slides.
		for ( $i = 1; $i <= 8; $i++ ) {
			if ( 1 === $i ) {
				$color = '#f4cccc';
				$image = 'sample_logo1.png';
			} elseif ( 2 === $i ) {
				$color = '#d9ead3';
				$image = 'sample_logo2.png';
			} elseif ( 3 === $i ) {
				$color = '#fce5cd';
				$image = 'sample_logo3.png';
			} elseif ( 4 === $i ) {
				$color = '#d0e0e3';
				$image = 'sample_logo4.png';
			} elseif ( 5 === $i ) {
				$color = '#fff2cc';
				$image = 'sample_logo5.png';
			} elseif ( 6 === $i ) {
				$color = '#cfe2f3';
				$image = 'sample_logo6.png';
			} elseif ( 7 === $i ) {
				$color = '#d9d2e9';
				$image = 'sample_logo7.png';
			} elseif ( 8 === $i ) {
				$color = '#ead1dc';
				$image = 'sample_logo8.png';
			}
			$content  = "<div style='text-align: center; padding-bottom: 10px;'>\n";
			$content .= "<div><img src='" . plugins_url() . '/slide-anything/images/' . $image . "' alt='Logo " . $i . "' /></div>\n";
			$content .= "<h3>Company Name</h3>\n";
			$content .= "<p>Lorem ipsum dolor sit amet, cu usu cibo vituperata, id ius probo maiestatis inciderint, sit eu vide volutpat.</p>\n";
			$content .= "</div>\n";
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_content', $content );
			$image_data = '~left top~contain~no-repeat~' . $color;
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_image_data', $image_data );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_link_url', '' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_link_target', '_self' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_type', 'NONE' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_imageid', '' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_imagetitle', '' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_video_id', '' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_video_type', '' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_background', 'no' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_html', '' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_shortcode', '0' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_bgcol', '#ffffff' );
			update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_width', '600' );
		}
		// insert meta data for the 'sample slider' configuration.
		update_post_meta( $cpt_id, 'sa_disable_visual_editor', '0' );
		update_post_meta( $cpt_id, 'sa_num_slides', 8 );
		update_post_meta( $cpt_id, 'sa_slide_duration', 4 );
		update_post_meta( $cpt_id, 'sa_slide_transition', 0.3 );
		update_post_meta( $cpt_id, 'sa_slide_by', 1 );
		update_post_meta( $cpt_id, 'sa_loop_slider', '1' );
		update_post_meta( $cpt_id, 'sa_stop_hover', '1' );
		update_post_meta( $cpt_id, 'sa_nav_arrows', '1' );
		update_post_meta( $cpt_id, 'sa_pagination', '1' );
		update_post_meta( $cpt_id, 'sa_shortcodes', '0' );
		update_post_meta( $cpt_id, 'sa_random_order', '1' );
		update_post_meta( $cpt_id, 'sa_reverse_order', '0' );
		update_post_meta( $cpt_id, 'sa_mouse_drag', '0' );
		update_post_meta( $cpt_id, 'sa_touch_drag', '1' );
		update_post_meta( $cpt_id, 'sa_mousewheel', '0' );
		update_post_meta( $cpt_id, 'sa_click_advance', '0' );
		update_post_meta( $cpt_id, 'sa_auto_height', '0' );
		update_post_meta( $cpt_id, 'sa_vert_center', '0' );
		update_post_meta( $cpt_id, 'sa_items_width1', 1 );
		update_post_meta( $cpt_id, 'sa_items_width2', 2 );
		update_post_meta( $cpt_id, 'sa_items_width3', 3 );
		update_post_meta( $cpt_id, 'sa_items_width4', 4 );
		update_post_meta( $cpt_id, 'sa_items_width5', 4 );
		update_post_meta( $cpt_id, 'sa_items_width6', 4 );
		update_post_meta( $cpt_id, 'sa_transition', 'fade' );
		update_post_meta( $cpt_id, 'sa_hero_slider', '0' );
		update_post_meta( $cpt_id, 'sa_showcase_slider', '0' );
		update_post_meta( $cpt_id, 'sa_showcase_width', '120' );
		update_post_meta( $cpt_id, 'sa_showcase_tablet', '1' );
		update_post_meta( $cpt_id, 'sa_showcase_width_tab', '130' );
		update_post_meta( $cpt_id, 'sa_showcase_mobile', '0' );
		update_post_meta( $cpt_id, 'sa_showcase_width_mob', '140' );
		update_post_meta( $cpt_id, 'sa_css_id', 'sample_slider' );
		update_post_meta( $cpt_id, 'sa_background_color', '#fafafa' );
		update_post_meta( $cpt_id, 'sa_border_width', 1 );
		update_post_meta( $cpt_id, 'sa_border_color', '#f0f0f0' );
		update_post_meta( $cpt_id, 'sa_border_radius', 5 );
		update_post_meta( $cpt_id, 'sa_wrapper_padd_top', 8 );
		update_post_meta( $cpt_id, 'sa_wrapper_padd_right', 8 );
		update_post_meta( $cpt_id, 'sa_wrapper_padd_bottom', 8 );
		update_post_meta( $cpt_id, 'sa_wrapper_padd_left', 8 );
		update_post_meta( $cpt_id, 'sa_slide_min_height_perc', 50 );
		update_post_meta( $cpt_id, 'sa_slide_padding_tb', 5 );
		update_post_meta( $cpt_id, 'sa_slide_padding_lr', 5 );
		update_post_meta( $cpt_id, 'sa_slide_margin_lr', 0 );
		update_post_meta( $cpt_id, 'sa_autohide_arrows', '1' );
		update_post_meta( $cpt_id, 'sa_dot_per_slide', '0' );
		update_post_meta( $cpt_id, 'sa_slide_icons_location', 'Center Center' );
		update_post_meta( $cpt_id, 'sa_slide_icons_visible', '0' );
		update_post_meta( $cpt_id, 'sa_slide_icons_color', 'white' );
		update_post_meta( $cpt_id, 'sa_thumbs_active', '0' );
		update_post_meta( $cpt_id, 'sa_thumbs_location', 'Inside Bottom' );
		update_post_meta( $cpt_id, 'sa_thumbs_image_size', 'thumbnail' );
		update_post_meta( $cpt_id, 'sa_thumbs_padding', 3 );
		update_post_meta( $cpt_id, 'sa_thumbs_width', 150 );
		update_post_meta( $cpt_id, 'sa_thumbs_height', 85 );
		update_post_meta( $cpt_id, 'sa_thumbs_opacity', 50 );
		update_post_meta( $cpt_id, 'sa_thumbs_border_width', 0 );
		update_post_meta( $cpt_id, 'sa_thumbs_border_color', '#ffffff' );
		update_post_meta( $cpt_id, 'sa_thumbs_resp_tablet', 75 );
		update_post_meta( $cpt_id, 'sa_thumbs_resp_mobile', 50 );
	}
}

/**
 * ##### ADD CHECKBOX OPTION UNDER "Settings -> Writing" CALLED "Disable TinyMCE Button" #####
 */
function cpt_slider_disable_tinymce_button_setting() {
	// REGISTER WordPress SETTING.
	register_setting(
		'writing',
		'sa-disable-tinymce-button',
		'cpt_slider_writing_settings_sanitize'
	);
	// CREATE SETTINGS SECTION (within "Settings->Writing").
	add_settings_section(
		'sa-writing-settings-section',
		'Slide Anything Settings',
		'cpt_slider_writing_settings_section_description',
		'writing'
	);
	// CREATE SETTINGS INPUT FIELD.
	add_settings_field(
		'sa-settings-field1',
		'Disable TinyMCE Button',
		'cpt_slider_writing_settings_field1_callback',
		'writing',
		'sa-writing-settings-section'
	);
}

/**
 * ##### SANATIZE SETTINGS CALLBACK FUNCTION #####
 *
 * @param string $input Disable TinyMCE Button checkbox.
 */
function cpt_slider_writing_settings_sanitize( $input ) {
	return isset( $input ) ? true : false;
}
/**
 * ##### SETTING SECTION DESCRIPTION #####
 */
function cpt_slider_writing_settings_section_description() {
	echo esc_html( "Disable the 'Slide Anything Sliders' button within the toolbar of the WordPress Classic Editor when editing pages and posts." );
}
/**
 * ##### SETTINGS INPUT FIELD CALLBACK #####
 */
function cpt_slider_writing_settings_field1_callback() {
	?>
	<label for="sa-disable-tinymce-input">
		<input id="sa-disable-tinymce-input" type="checkbox" value="1" name="sa-disable-tinymce-button" <?php checked( get_option( 'sa-disable-tinymce-button', false ) ); ?>>
	</label>
	<?php
}

/**
 * ##### ACTION HOOK - REGISTER SCRIPTS (JS AND CSS) FOR WordPress DASHBOARD ONLY #####
 */
function cpt_slider_register_admin_scripts() {
	$screen      = get_current_screen();
	$plugin_path = dirname( __FILE__ ) . '/../slide-anything.php';
	$plugin_data = get_plugin_data( $plugin_path, false, false );
	$plugin_ver  = $plugin_data['Version'];
	if ( 'sa_slider' === $screen->post_type ) {
		// ONLY LOAD SCRIPTS (JS & CSS) WITHIN 'Slide Anything' SCREENS IN WordPress DASHBOARD.
		// enqueues all scripts, styles & settings required in order to use the WordPress Media JS APIs.
		wp_enqueue_media();
		// load 'WordPress jquery-ui' scripts.
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'jquery-ui-resize' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_script( 'jquery-ui-tooltip' );
		wp_enqueue_script( 'jquery-ui-spinner' );
		// load 'spectrum colorpicker' script and css.
		wp_register_script( 'spectrum_js', SA_PLUGIN_PATH . 'spectrum/spectrum.js', array( 'jquery' ), '1.8.0', true );
		wp_enqueue_script( 'spectrum_js' );
		wp_register_style( 'spectrum_css', SA_PLUGIN_PATH . 'spectrum/spectrum.css', array(), '1.8.0' );
		wp_enqueue_style( 'spectrum_css' );
		// load 'jquery-ui' css.
		wp_register_style( 'admin_ui_css', SA_PLUGIN_PATH . 'css/admin-user-interface.min.css', array(), '1.11.4' );
		wp_enqueue_style( 'admin_ui_css' );
		// load 'slide-anything' custom javasript and css for WordPress admin.
		wp_register_script( 'sa-slider-admin-script', SA_PLUGIN_PATH . 'js/slide-anything-admin.js', array( 'jquery' ), $plugin_ver, true );
		wp_enqueue_script( 'sa-slider-admin-script' );
		wp_register_style( 'sa-slider-admin-css', SA_PLUGIN_PATH . 'css/slide-anything-admin.css', array(), $plugin_ver );
		wp_enqueue_style( 'sa-slider-admin-css' );
	}
	if ( 'settings_page_sa-settings-page' === $screen->id ) {
		// SLIDE ANYTHING SETTINGS PAGE - load custom css script.
		wp_register_style( 'sa-slider-admin-css', SA_PLUGIN_PATH . 'css/slide-anything-admin.css', array(), $plugin_ver );
		wp_enqueue_style( 'sa-slider-admin-css' );
	}
	// style for TINYMCE editor 'Slide Anything sliders' button.
	wp_register_style( 'tinymce-css', SA_PLUGIN_PATH . 'css/tinymce_style.css', array(), $plugin_ver );
	wp_enqueue_style( 'tinymce-css' );
}



/**
 * ##### ACTION HOOK - REGISTER THE 'Slide Anything' CUSTOM POST TYPE #####
 */
function cpt_slider_register() {
	$labels = array(
		'name'               => _x( 'SA Sliders', 'post type general name', 'sa_slider_textdomain' ),
		'singular_name'      => _x( 'Slider', 'post type singular name', 'sa_slider_textdomain' ),
		'menu_name'          => __( 'SA Sliders', 'sa_slider_textdomain' ),
		'add_new'            => __( 'Add New Slider', 'sa_slider_textdomain' ),
		'add_new_item'       => __( 'Add New Slider', 'sa_slider_textdomain' ),
		'edit_item'          => __( 'Edit Slider', 'sa_slider_textdomain' ),
		'new_item'           => __( 'New Slider', 'sa_slider_textdomain' ),
		'view_item'          => __( 'View Slider', 'sa_slider_textdomain' ),
		'not_found'          => __( 'No sliders found', 'sa_slider_textdomain' ),
		'not_found_in_trash' => __( 'No sliders found in Trash', 'sa_slider_textdomain' ),
	);
	$args   = array(
		'labels'              => $labels,
		'description'         => __( 'Slide Anything carousel/slider', 'sa_slider_textdomain' ),
		'public'              => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'show_in_menu'        => true,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-images-alt2',
		'hierarchical'        => false,
		'supports'            => array( 'title' ),
		'has_archive'         => false,
		'query_var'           => false,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'sa_slider', $args );
}



/**
 * ##### WP DASHBOARD - SLIDER LIST PAGE #####
 * ACTION HOOK - ADD/REMOVE (HOVER-OVER) ROW ACTIONS WHEN THIS CUSTOM POST TYPE IS LISTED IN DASHBOARD
 *
 * @param array $actions Row Actions.
 * @param array $post Post Type.
 */
function cpt_slider_row_actions( $actions, $post ) {
	if ( 'sa_slider' === $post->post_type ) {
		// REMOVE 'Quick Edit' ROW ACTION.
		unset( $actions['inline hide-if-no-js'] );
	}
	return $actions;
}

/**
 * ##### FILTER TO ADD/REMOVE COLUMNS DISPLAYED FOR THIS CUSTOM POST TYPE IN DASHBOARD #####
 *
 * @param array $columns Post List Columns.
 */
function cpt_slider_modify_columns( $columns ) {
	// new columns to be added.
	$new_columns = array(
		'slides'    => 'Slides',
		'shortcode' => 'Shortcode',
		'css-id'    => 'CSS ID',
	);
	$columns     = array_slice( $columns, 0, 2, true ) + $new_columns + array_slice( $columns, 2, null, true );
	return $columns;
}

/**
 * ##### DEFINE OUTPUT FOR EACH CUSTOM COLUMN DISPLAYED FOR THIS POST TYPE IN THE DASHBOARD #####
 *
 * @param array $column Post List Column.
 */
function cpt_slider_custom_column_content( $column ) {
	// get post object for this row.
	global $post;

	// output for the 'Slides' column.
	if ( 'slides' === $column ) {
		$num_slides = get_post_meta( $post->ID, 'sa_num_slides', true );
		if ( '' === $num_slides ) {
			$num_slides = '-';
		}
		echo esc_html( $num_slides );
	}

	// output for the 'Shortcode' column.
	if ( 'shortcode' === $column ) {
		$shortcode = "[slide-anything id='" . $post->ID . "']";
		echo esc_html( $shortcode );
	}

	// output for the 'CSS ID' column.
	if ( 'css-id' === $column ) {
		$css_id = get_post_meta( $post->ID, 'sa_css_id', true );
		if ( '' === $css_id ) {
			$css_id = '-';
		} else {
			$css_id = '#' . $css_id;
		}
		echo esc_html( $css_id );
	}
}



/**
 * ##### ADD A CUSTOM BUTTON TO WordPress TINYMCE EDITOR (ON PAGES AND POSTS ONLY) #####
 */
function cpt_slider_add_tinymce_button() {
	global $typenow;
	// check user permissions.
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
		return;
	}
	// verify the post type - only display button on posts and pages.
	if ( ! in_array( $typenow, array( 'post', 'page' ), true ) ) {
		return;
	}
	// check if WYSIWYG is enabled.
	if ( 'true' === get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'cpt_slider_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'cpt_slider_register_tinymce_button' );
	}
}

/**
 * ##### FILTER HOOK: mce_external_plugins #####
 *
 * @param array $plugin_array Plugin Array.
 */
function cpt_slider_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['tinymce_button'] = SA_PLUGIN_PATH . 'js/add_tinymce_button.js';
	return $plugin_array;
}

/**
 * ##### FILTER HOOK: mce_buttons #####
 *
 * @param array $buttons TinyMCE buttons.
 */
function cpt_slider_register_tinymce_button( $buttons ) {
	array_push( $buttons, 'tinymce_button' );
	return $buttons;
}

/**
 * ##### ACTION HOOK: admin_footer #####
 */
function cpt_slider_get_tinymce_shortcode_array() {
	$screen = get_current_screen();
	if ( 'envira' !== $screen->post_type ) { // ### BUG FIX - CLASHING WITH ENVIRA GALLERY (VER 2.0.13) ###.
		// display 2 javascript arrays (in footer) containing all the slide anything post titles and post ids.
		// these 2 arrays are used to display the shortcode options by the TinyMCE button.
		echo "<script type='text/javascript'>\n";
		echo "var sa_title_arr = new Array();\n";
		echo "var sa_id_arr = new Array();\n";

		$args            = array(
			'post_type'      => 'sa_slider',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);
		$sa_slider_query = new WP_Query( $args );
		$count           = 0;
		foreach ( $sa_slider_query->posts as $sa_post ) {
			$title = $sa_post->post_title;
			echo 'sa_title_arr[' . esc_js( $count ) . "] = '" . esc_js( $title ) . "';\n";
			echo 'sa_id_arr[' . esc_js( $count ) . "] = '" . esc_js( $sa_post->ID ) . "';\n";
			$count++;
		}
		echo "</script>\n";
	}
}



/**
 * ##### ACTION HOOK - ADD META BOXES TO THE 'Slide Anything' CUSTOM POST TYPE #####
 */
function cpt_slider_add_meta_boxes() {
	global $post;
	global $current_user;
	if ( ! is_object( $post ) ) {
		return;
	}

	$info_added      = get_post_meta( $post->ID, 'sa_info_added', true );
	$info_deleted    = get_post_meta( $post->ID, 'sa_info_deleted', true );
	$info_duplicated = get_post_meta( $post->ID, 'sa_info_duplicated', true );
	$info_moved      = get_post_meta( $post->ID, 'sa_info_moved', true );
	if ( '1' === $info_added ) {
		add_meta_box( 'cpt_slide_added', __( 'Information' ), 'cpt_slide_added_content', 'sa_slider', 'normal', 'high' );
		update_post_meta( $post->ID, 'sa_info_added', '0' );
	}
	if ( '1' === $info_deleted ) {
		add_meta_box( 'cpt_slide_deleted', __( 'Information' ), 'cpt_slide_deleted_content', 'sa_slider', 'normal', 'high' );
		update_post_meta( $post->ID, 'sa_info_deleted', '0' );
	}
	if ( '1' === $info_duplicated ) {
		add_meta_box( 'cpt_slide_duplicated', __( 'Information' ), 'cpt_slide_duplicated_content', 'sa_slider', 'normal', 'high' );
		update_post_meta( $post->ID, 'sa_info_duplicated', '0' );
	}
	if ( '1' === $info_moved ) {
		add_meta_box( 'cpt_slide_moved', __( 'Information' ), 'cpt_slide_moved_content', 'sa_slider', 'normal', 'high' );
		update_post_meta( $post->ID, 'sa_info_moved', '0' );
	}
	add_meta_box( 'cpt_slider_settings', __( 'Slider Settings' ), 'cpt_slider_settings_content', 'sa_slider', 'normal', 'high' );
	add_meta_box( 'cpt_slider_slides', __( 'Slides' ), 'cpt_slider_slides_content', 'sa_slider', 'normal', 'high' );
	add_meta_box( 'cpt_slider_shortcode', __( 'Shortcode / Preview' ), 'cpt_slider_shortcode_content', 'sa_slider', 'side', 'high' );
	add_meta_box( 'cpt_slider_items', __( 'Items Displayed' ), 'cpt_slider_items_content', 'sa_slider', 'side', 'default' );
	add_meta_box( 'cpt_slider_style', __( 'Slider Style' ), 'cpt_slider_style_content', 'sa_slider', 'side', 'default' );
	add_meta_box( 'cpt_slider_thumbs', __( 'Thumbnail Pagination' ), 'cpt_slider_thumbs_content', 'sa_slider', 'side', 'default' );
	remove_meta_box( 'mymetabox_revslider_0', 'sa_slider', 'normal' ); // remove revolution slider meta box.
}



/**
 * ##### META BOX CONTENT - 'Information' (slide added) BOX #####
 */
function cpt_slide_added_content() {
	echo "<h3 id='sa_slide_added_mess'>A new slide has been added to this slider.</h3>";
}



/**
 * ##### META BOX CONTENT - 'Information' (slide deleted) BOX #####
 */
function cpt_slide_deleted_content() {
	echo "<h3 id='sa_slide_deleted_mess'>A slide has been deleted from this slider.</h3>";
}



/**
 * ##### META BOX CONTENT - 'Information' (slide duplicated) BOX #####
 */
function cpt_slide_duplicated_content() {
	echo "<h3 id='sa_slide_duplicated_mess'>A slide has been duplicated (copied) within this slider.</h3>";
}



/**
 * ##### META BOX CONTENT - 'Information' (slide moved) BOX #####
 */
function cpt_slide_moved_content() {
	echo "<h3 id='sa_slide_moved_mess'>The slide order of this slider has been has changed.</h3>";
}



/**
 * // ##### META BOX CONTENT - 'Slider Settings' BOX #####
 *
 * @param array $post Custom Post 'sa_slider'.
 */
function cpt_slider_settings_content( $post ) {
	$num_slides = get_post_meta( $post->ID, 'sa_num_slides', true );
	echo "<div id='sa_slider_settings'>\n";

	// NONCE TO PREVENT CSRF SECURITY ATTACKS.
	wp_nonce_field( basename( __FILE__ ), 'nonce_save_slider' );

	// HIDDEN FIELD - NUMBER OF SLIDES.
	if ( '' === $num_slides ) {
		// new slider is being created.
		echo "<input type='hidden' id='num_slides_id' name='sa_num_slides' value='3'/>\n";
	} else {
		// existing slider.
		$num_slides = intval( $num_slides );
		echo "<input type='hidden' id='num_slides_id' name='sa_num_slides' value='" . esc_attr( $num_slides ) . "'/>\n";
	}
	// HIDDEN FIELD - SLIDE ADDED INDICATOR.
	echo "<input type='hidden' id='sa_info_added' name='sa_info_added' value='0'/>\n";
	// HIDDEN FIELD - SLIDE DELETED INDICATOR.
	echo "<input type='hidden' id='sa_info_deleted' name='sa_info_deleted' value='0'/>\n";
	// HIDDEN FIELD - SLIDE DUPLICATED INDICATOR.
	echo "<input type='hidden' id='sa_info_duplicated' name='sa_info_duplicated' value='0'/>\n";
	// HIDDEN FIELD - SLIDE MOVED UP INDICATOR.
	echo "<input type='hidden' id='sa_info_moved' name='sa_info_moved' value='0'/>\n";
	// HIDDEN FIELD - DUPLICATE SLIDE NUMBER.
	echo "<input type='hidden' id='sa_duplicate_slide' name='sa_duplicate_slide' value='0'/>\n";
	// HIDDEN FIELD - MOVE SLIDE UP (SLIDE NUMBER).
	echo "<input type='hidden' id='sa_move_slide_up' name='sa_move_slide_up' value='0'/>\n";
	// HIDDEN FIELD - PRO VERSION.
	echo "<input type='hidden' id='sa_pro_version' name='sa_pro_version' value='1'/>\n";
	// SLIDE DURATION.
	$slide_duration = get_post_meta( $post->ID, 'sa_slide_duration', true );
	if ( '' === $slide_duration ) {
		$slide_duration = 5;
	}
	echo "<div class='sa_slider_value'><span>Slide Duration:</span>";
	echo "<input type='text' id='sa_slide_duration' name='sa_slide_duration' readonly value='" . esc_attr( $slide_duration ) . "'><em>seconds (0 = manual navigation)</em>";
	echo "<em class='sa_tooltip' href='' title='Set to 0 to disable slider autoplay (manual slider navigation only)'></em></div>\n";
	echo "<div class='jquery_ui_slider' id='jq_slider_duration'></div><hr/>\n";
	// SLIDE TRANSITION.
	$slide_transition = get_post_meta( $post->ID, 'sa_slide_transition', true );
	if ( '' === $slide_transition ) {
		$slide_transition = 0.2;
	}
	echo "<div class='sa_slider_value'><span>Slide Transition:</span>";
	echo "<input type='text' id='sa_slide_transition' name='sa_slide_transition' readonly value='" . esc_attr( $slide_transition ) . "'><em>seconds</em>\n";
	echo "<em class='sa_tooltip' href='' title='The time it takes to change from one slide to the next slide'></em></div>\n";
	echo "<div class='jquery_ui_slider' id='jq_slider_transition'></div><hr/>\n";
	// SLIDE BY.
	$slide_by = get_post_meta( $post->ID, 'sa_slide_by', true );
	if ( '' === $slide_by ) {
		$slide_by = 1;
	}
	echo "<div class='sa_slider_value'><span>Slide By:</span>";
	echo "<input type='text' id='sa_slide_by' name='sa_slide_by' readonly value='" . esc_attr( $slide_by ) . "'><em>slides (0 = slide by page)</em>";
	echo "<em class='sa_tooltip' href='' title='The number of slides to slide per transition. Set to 0 to enable the Slide by Page option.'></em></div>\n";
	echo "<div class='jquery_ui_slider' id='jq_slider_by'></div><hr/>\n";
	echo "<div class='half_width_column'>\n";
	// LOOP SLIDER.
	$loop_slider = get_post_meta( $post->ID, 'sa_loop_slider', true );
	if ( '' === $loop_slider ) {
		$loop_slider = '1';
	}
	echo "<div class='sa_setting_checkbox'><span>Loop Slider:</span>";
	if ( '1' === $loop_slider ) {
		echo "<input type='checkbox' id='sa_loop_slider' name='sa_loop_slider' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_loop_slider' name='sa_loop_slider' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Only applies when slide duration is NOT zero (loops back to first slide after last slide is displayed)'></em>";
	echo "</div>\n";
	// STOP ON HOVER.
	$stop_hover = get_post_meta( $post->ID, 'sa_stop_hover', true );
	if ( '' === $stop_hover ) {
		$stop_hover = '1';
	}
	echo "<div class='sa_setting_checkbox'><span>Stop on Hover:</span>";
	if ( '1' === $stop_hover ) {
		echo "<input type='checkbox' id='sa_stop_hover' name='sa_stop_hover' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_stop_hover' name='sa_stop_hover' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Only applies when slide duration is NOT zero (slideshow is paused when hovering over a slide)'></em>";
	echo "</div>\n";
	// RANDOM ORDER.
	$random_order = get_post_meta( $post->ID, 'sa_random_order', true );
	if ( '' === $random_order ) {
		$random_order = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Random Order:</span>";
	if ( '1' === $random_order ) {
		echo "<input type='checkbox' id='sa_random_order' name='sa_random_order' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_random_order' name='sa_random_order' value='1'/>";
	}
	echo "<em class='sa_tooltip' title='When checked slides will be randomly re-ordered whenever the slider is displayed'></em>";
	echo "</div>\n";
	// REVERSE ORDER.
	$reverse_order = get_post_meta( $post->ID, 'sa_reverse_order', true );
	if ( '' === $reverse_order ) {
		$reverse_order = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Reverse Order:</span>";
	if ( '1' === $reverse_order ) {
		echo "<input type='checkbox' id='sa_reverse_order' name='sa_reverse_order' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_reverse_order' name='sa_reverse_order' value='1'/>";
	}
	echo "<em class='sa_tooltip' title='When checked your slides will be shown in the reverse order (i.e. last slide first)'></em>";
	echo "</div>\n";
	// ALLOW SHORTCODES.
	$shortcodes = get_post_meta( $post->ID, 'sa_shortcodes', true );
	if ( '' === $shortcodes ) {
		$shortcodes = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Allow Shortcodes:</span>";
	if ( '1' === $shortcodes ) {
		echo "<input type='checkbox' id='sa_shortcodes' name='sa_shortcodes' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_shortcodes' name='sa_shortcodes' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Include WordPree shorcodes within slide content. NOTE: Running shortcodes in Slide Anything may cause issues with some WordPress Page Builders'></em>\n";
	echo "</div>\n";
	// VERTICAL CENTER.
	$vert_center = get_post_meta( $post->ID, 'sa_vert_center', true );
	if ( '' === $vert_center ) {
		$vert_center = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Vertical Center:</span>";
	if ( '1' === $vert_center ) {
		echo "<input type='checkbox' id='sa_vert_center' name='sa_vert_center' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_vert_center' name='sa_vert_center' value='1'/>";
	}
	echo "<em class='sa_tooltip' title='Vertically center content within slides. Only use this setting if you have set a Min Height for your slider (which sets a minimum height for each slide).'></em>";
	echo "</div>\n";
	echo "</div>\n";
	echo "<div class='half_width_column'>\n";
	// NAVIGATE ARROWS.
	$nav_arrows = get_post_meta( $post->ID, 'sa_nav_arrows', true );
	if ( '' === $nav_arrows ) {
		$nav_arrows = '1';
	}
	echo "<div class='sa_setting_checkbox'><span>Navigate Arrows:</span>";
	if ( '1' === $nav_arrows ) {
		echo "<input type='checkbox' id='sa_nav_arrows' name='sa_nav_arrows' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_nav_arrows' name='sa_nav_arrows' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Display the \"next slide\" amd \"previous slide\" buttons'></em>\n";
	echo "</div>\n";
	// SHOW PAGINATION.
	$pagination = get_post_meta( $post->ID, 'sa_pagination', true );
	if ( '' === $pagination ) {
		$pagination = '1';
	}
	echo "<div class='sa_setting_checkbox'><span>Show Pagination:</span>";
	if ( '1' === $pagination ) {
		echo "<input type='checkbox' id='sa_pagination' name='sa_pagination' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_pagination' name='sa_pagination' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Display slider pagination below the slider'></em>\n";
	echo "</div>\n";

	// MOUSE DRAG.
	$mouse_drag = get_post_meta( $post->ID, 'sa_mouse_drag', true );
	if ( '' === $mouse_drag ) {
		$mouse_drag = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Mouse Drag:</span>";
	if ( '1' === $mouse_drag ) {
		echo "<input type='checkbox' id='sa_mouse_drag' name='sa_mouse_drag' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_mouse_drag' name='sa_mouse_drag' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Allow navigation to previous/next slides by holding down left mouse button and dragging left/right. (NOTE: Enabling this option will disable vertical touch-drag scrolling on mobile devices)'></em>\n";
	echo "</div>\n";
	// TOUCH DRAG.
	$touch_drag = get_post_meta( $post->ID, 'sa_touch_drag', true );
	if ( '' === $touch_drag ) {
		$touch_drag = '1';
	}
	echo "<div class='sa_setting_checkbox'><span>Touch Drag:</span>";
	if ( '1' === $touch_drag ) {
		echo "<input type='checkbox' id='sa_touch_drag' name='sa_touch_drag' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_touch_drag' name='sa_touch_drag' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Allow navigation to previous/next slides on mobile devices by touching screen and dragging left/right'></em>\n";
	echo "</div>\n";
	// MOUSEWHEEL NAV.
	$mousewheel = get_post_meta( $post->ID, 'sa_mousewheel', true );
	if ( '' === $mousewheel ) {
		$mousewheel = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Mousewheel Nav:</span>";
	if ( '1' === $mousewheel ) {
		echo "<input type='checkbox' id='sa_mousewheel' name='sa_mousewheel' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_mousewheel' name='sa_mousewheel' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Allow previous/next slide navigation using the mousewheel (NOTE: does not work well with the Apple Mac touchpad scroll wheel mimic)'></em>\n";
	echo "</div>\n";
	// CLICK TO ADVANCE.
	$click_advance = get_post_meta( $post->ID, 'sa_click_advance', true );
	if ( '' === $click_advance ) {
		$click_advance = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Click to Advance:</span>";
	if ( '1' === $click_advance ) {
		echo "<input type='checkbox' id='sa_click_advance' name='sa_click_advance' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_click_advance' name='sa_click_advance' value='1'/>";
	}
	echo "<em class='sa_tooltip' href='' title='Clicking on the slider advances to the next slide. NOTE: Only works when the Mouse Drag and Touch Drag options are NOT checked.'></em>\n";
	echo "</div>\n";
	// AUTO HEIGHT.
	$auto_height = get_post_meta( $post->ID, 'sa_auto_height', true );
	if ( '' === $auto_height ) {
		$auto_height = '0';
	}
	echo "<div class='sa_setting_checkbox'><span>Auto Height:</span>";
	if ( '1' === $auto_height ) {
		echo "<input type='checkbox' id='sa_auto_height' name='sa_auto_height' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_auto_height' name='sa_auto_height' value='1'/>";
	}
	echo "<em class='sa_tooltip' title='Only works with 1 item on the screen. When checked the height of slider is automatically changed to match the height for each slide.'></em>";
	echo "</div>\n";
	echo "</div>\n";
	echo "<div style='clear:both; float:none; width:100%; height:1px;'></div>\n";
	echo "</div>\n";
}



/**
 * ##### META BOX CONTENT - 'Slides' BOX #####
 *
 * @param array $post Custom Post 'sa_slider'.
 */
function cpt_slider_slides_content( $post ) {
	$num_slides    = get_post_meta( $post->ID, 'sa_num_slides', true );
	$slider_css_id = get_post_meta( $post->ID, 'sa_css_id', true );
	// DISABLE VISUAL EDITOR CHECKBOX.
	$disable_visual_editor = get_post_meta( $post->ID, 'sa_disable_visual_editor', true );
	if ( '' === $disable_visual_editor ) {
		$disable_visual_editor = '0';
	}
	echo "<div id='sa_visual_editor_checkbox'><span>Disable Visual Editor:</span>";
	if ( '1' === $disable_visual_editor ) {
		echo "<input type='checkbox' id='sa_disable_visual_editor' name='sa_disable_visual_editor' value='1' checked/></div>\n";
	} else {
		echo "<input type='checkbox' id='sa_disable_visual_editor' name='sa_disable_visual_editor' value='1'/></div>\n";
	}
	// SLIDER EDITOR BOX SETTINGS.
	if ( '1' === $disable_visual_editor ) {
		$editor_args = array(
			'tinymce'       => false,
			'wpautop'       => false,
			'media_buttons' => true,
			'editor_class'  => 'sa_slide_content',
			'editor_height' => '250',
		);
	} else {
		$editor_args = array(
			'tinymce'       => true,
			'wpautop'       => false,
			'media_buttons' => true,
			'editor_class'  => 'sa_slide_content',
			'editor_height' => '250',
		);
	}
	if ( '' === $num_slides ) {
		// A NEW SLIDER IS BEING CREATED - ADD 3 INITIAL SLIDES.
		$num_slides                        = 3;
		$slide_data[0]['edit_id']          = 'sa_slide1_content';
		$slide_data[0]['content']          = 'Slide content';
		$slide_data[0]['del_id']           = 'sa_slide1_delete';
		$slide_data[0]['image_data']       = 'sa_slide1_image_data';
		$slide_data[0]['image_id']         = 'sa_slide1_image_id';
		$slide_data[0]['thumb']            = 'slide1_thumb';
		$slide_data[0]['image_del']        = 'slide1_image_del';
		$slide_data[0]['image_pos']        = 'sa_slide1_image_pos';
		$slide_data[0]['image_size']       = 'sa_slide1_image_size';
		$slide_data[0]['image_repeat']     = 'sa_slide1_image_repeat';
		$slide_data[0]['image_color']      = 'sa_slide1_image_color';
		$slide_data[0]['link_url']         = 'sa_slide1_link_url';
		$slide_data[0]['link_target']      = 'sa_slide1_link_target';
		$slide_data[0]['slide_no']         = 1;
		$slide_data[1]['edit_id']          = 'sa_slide2_content';
		$slide_data[1]['content']          = 'Slide content';
		$slide_data[1]['del_id']           = 'sa_slide2_delete';
		$slide_data[1]['image_data']       = 'sa_slide2_image_data';
		$slide_data[1]['image_id']         = 'sa_slide2_image_id';
		$slide_data[1]['thumb']            = 'slide2_thumb';
		$slide_data[1]['image_del']        = 'slide2_image_del';
		$slide_data[1]['image_pos']        = 'sa_slide2_image_pos';
		$slide_data[1]['image_size']       = 'sa_slide2_image_size';
		$slide_data[1]['image_repeat']     = 'sa_slide2_image_repeat';
		$slide_data[1]['image_color']      = 'sa_slide2_image_color';
		$slide_data[1]['link_url']         = 'sa_slide2_link_url';
		$slide_data[1]['link_target']      = 'sa_slide2_link_target';
		$slide_data[1]['slide_no']         = 2;
		$slide_data[2]['edit_id']          = 'sa_slide3_content';
		$slide_data[2]['content']          = 'Slide content';
		$slide_data[2]['del_id']           = 'sa_slide3_delete';
		$slide_data[2]['image_data']       = 'sa_slide3_image_data';
		$slide_data[2]['image_id']         = 'sa_slide3_image_id';
		$slide_data[2]['thumb']            = 'slide3_thumb';
		$slide_data[2]['image_del']        = 'slide3_image_del';
		$slide_data[2]['image_pos']        = 'sa_slide3_image_pos';
		$slide_data[2]['image_size']       = 'sa_slide3_image_size';
		$slide_data[2]['image_repeat']     = 'sa_slide3_image_repeat';
		$slide_data[2]['image_color']      = 'sa_slide3_image_color';
		$slide_data[2]['link_url']         = 'sa_slide3_link_url';
		$slide_data[2]['link_target']      = 'sa_slide3_link_target';
		$slide_data[2]['slide_no']         = 3;
		$slide_data[0]['popup_type']       = 'sa_slide1_popup_type';
		$slide_data[0]['popup_imageid']    = 'sa_slide1_popup_imageid';
		$slide_data[0]['popup_imagetitle'] = 'sa_slide1_popup_imagetitle';
		$slide_data[0]['popup_video_id']   = 'sa_slide1_popup_video_id';
		$slide_data[0]['popup_video_type'] = 'sa_slide1_popup_video_type';
		$slide_data[0]['popup_background'] = 'sa_slide1_popup_background';
		$slide_data[0]['popup_html']       = 'sa_slide1_popup_html';
		$slide_data[0]['popup_shortcode']  = 'sa_slide1_popup_shortcode';
		$slide_data[0]['popup_bgcol']      = 'sa_slide1_popup_bgcol';
		$slide_data[0]['popup_width']      = 'sa_slide1_popup_width';
		$slide_data[1]['popup_type']       = 'sa_slide2_popup_type';
		$slide_data[1]['popup_imageid']    = 'sa_slide2_popup_imageid';
		$slide_data[1]['popup_imagetitle'] = 'sa_slide2_popup_imagetitle';
		$slide_data[1]['popup_video_id']   = 'sa_slide2_popup_video_id';
		$slide_data[1]['popup_video_type'] = 'sa_slide2_popup_video_type';
		$slide_data[1]['popup_background'] = 'sa_slide2_popup_background';
		$slide_data[1]['popup_html']       = 'sa_slide2_popup_html';
		$slide_data[1]['popup_shortcode']  = 'sa_slide2_popup_shortcode';
		$slide_data[1]['popup_bgcol']      = 'sa_slide2_popup_bgcol';
		$slide_data[1]['popup_width']      = 'sa_slide2_popup_width';
		$slide_data[2]['popup_type']       = 'sa_slide3_popup_type';
		$slide_data[2]['popup_imageid']    = 'sa_slide3_popup_imageid';
		$slide_data[2]['popup_imagetitle'] = 'sa_slide3_popup_imagetitle';
		$slide_data[2]['popup_video_id']   = 'sa_slide3_popup_video_id';
		$slide_data[2]['popup_video_type'] = 'sa_slide3_popup_video_type';
		$slide_data[2]['popup_background'] = 'sa_slide3_popup_background';
		$slide_data[2]['popup_html']       = 'sa_slide3_popup_html';
		$slide_data[2]['popup_shortcode']  = 'sa_slide3_popup_shortcode';
		$slide_data[2]['popup_bgcol']      = 'sa_slide3_popup_bgcol';
		$slide_data[2]['popup_width']      = 'sa_slide3_popup_width';
	} else {
		// AN EXISTING SLIDER - GET SLIDE DATA FROM THE DATABASE AND SAVE WITHIN AN ARRAY.
		$num_slides = intval( $num_slides );
		$slide_data = array();
		$count      = 0;
		for ( $i = 1; $i <= $num_slides; $i++ ) {
			$slide_edit_id                            = 'sa_slide' . $i . '_content';
			$slide_char_count                         = 'sa_slide' . $i . '_char_count';
			$slide_data[ $count ]['edit_id']          = $slide_edit_id;
			$slide_data[ $count ]['content']          = get_post_meta( $post->ID, $slide_edit_id, true );
			$slide_data[ $count ]['char_count']       = get_post_meta( $post->ID, $slide_char_count, true );
			$slide_data[ $count ]['del_id']           = 'sa_slide' . $i . '_delete';
			$slide_data[ $count ]['thumb']            = 'slide' . $i . '_thumb';
			$slide_data[ $count ]['image_del']        = 'slide' . $i . '_image_del';
			$slide_data[ $count ]['image_data']       = 'sa_slide' . $i . '_image_data';
			$slide_data[ $count ]['image_id']         = 'sa_slide' . $i . '_image_id';
			$slide_data[ $count ]['image_pos']        = 'sa_slide' . $i . '_image_pos';
			$slide_data[ $count ]['image_size']       = 'sa_slide' . $i . '_image_size';
			$slide_data[ $count ]['image_repeat']     = 'sa_slide' . $i . '_image_repeat';
			$slide_data[ $count ]['image_color']      = 'sa_slide' . $i . '_image_color';
			$slide_data[ $count ]['image_data']       = 'sa_slide' . $i . '_image_data';
			$slide_data[ $count ]['link_url']         = 'sa_slide' . $i . '_link_url';
			$slide_data[ $count ]['link_target']      = 'sa_slide' . $i . '_link_target';
			$slide_data[ $count ]['popup_type']       = 'sa_slide' . $i . '_popup_type';
			$slide_data[ $count ]['popup_imageid']    = 'sa_slide' . $i . '_popup_imageid';
			$slide_data[ $count ]['popup_imagetitle'] = 'sa_slide' . $i . '_popup_imagetitle';
			$slide_data[ $count ]['popup_video_id']   = 'sa_slide' . $i . '_popup_video_id';
			$slide_data[ $count ]['popup_video_type'] = 'sa_slide' . $i . '_popup_video_type';
			$slide_data[ $count ]['popup_background'] = 'sa_slide' . $i . '_popup_background';
			$slide_data[ $count ]['popup_html']       = 'sa_slide' . $i . '_popup_html';
			$slide_data[ $count ]['popup_shortcode']  = 'sa_slide' . $i . '_popup_shortcode';
			$slide_data[ $count ]['popup_bgcol']      = 'sa_slide' . $i . '_popup_bgcol';
			$slide_data[ $count ]['popup_width']      = 'sa_slide' . $i . '_popup_width';
			$slide_data[ $count ]['slide_no']         = $i;
			$count++;
		}
	}
	// GET AVAILABLE WordPress IMAGE SIZES AND SAVE WITHIN AN ARRAY.
	global $_wp_additional_image_sizes;
	$image_size_arr             = array();
	$image_size_arr[0]['value'] = 'no';
	$image_size_arr[0]['desc']  = 'NO';
	$count                      = 1;
	foreach ( get_intermediate_image_sizes() as $image_size ) {
		if ( in_array( $image_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
			$width  = get_option( "{$image_size}_size_w" );
			$height = get_option( "{$image_size}_size_h" );
		} elseif ( isset( $_wp_additional_image_sizes[ $image_size ] ) ) {
			$width  = $_wp_additional_image_sizes[ $image_size ]['width'];
			$height = $_wp_additional_image_sizes[ $image_size ]['height'];
		}
		if ( ( 0 !== $width ) && ( 0 !== $height ) ) {
			$image_size_arr[ $count ]['value'] = $image_size;
			$image_size_arr[ $count ]['desc']  = $image_size . ' (' . $width . '&times;' . $height . ')';
			$count++;
		}
	}
	/**
	 * ###### LOOP TO DISPLAY INPUT ELEMENTS FOR EACH SLIDE ######
	 */
	echo "<div id='slider_accordion'>\n";

	// determine whether to use css classes instead of csss ids.
	$use_classes    = 0;
	$other_settings = get_post_meta( $post->ID, 'sa_other_settings', true );
	if ( '' !== $other_settings ) {
		$other_settings_arr = explode( '|', $other_settings );
	}
	if ( isset( $other_settings_arr ) && ( count( $other_settings_arr ) > 7 ) ) {
		$disable_slide_ids = $other_settings_arr[7];
	} else {
		$disable_slide_ids = '0';
	}
	if ( '1' === $disable_slide_ids ) {
		$use_classes = 1;
	}

	$tot = count( $slide_data );
	for ( $i = 0; $i < $tot; $i++ ) {
		// DISPLAY ACCORDION HEADING.
		echo '<h3>Slide ' . esc_html( $slide_data[ $i ]['slide_no'] );
		$css_id = $slider_css_id . '_slide' . sprintf( '%02d', $slide_data[ $i ]['slide_no'] );
		// display CSS ID/CLASS for the current slide.
		if ( 1 === $use_classes ) {
			echo '<span>.' . esc_html( $css_id ) . '</span>';
		} else {
			echo '<span>#' . esc_html( $css_id ) . '</span>';
		}
		echo "</h3>\n";
		echo "<div>\n";

		// ### DISPLAY THE SLIDE CONTENT EDITOR (textarea field) ###
		wp_editor( $slide_data[ $i ]['content'], $slide_data[ $i ]['edit_id'], $editor_args );

		/**
		 * ##############################
		 * ##### SLIDE TABS - START #####
		 * ##############################
		 */
		$tabs_num = $i + 1;
		echo "<div id='slide_" . esc_html( $tabs_num ) . "_tabs' class='sa_slide_tabs'>\n";
		echo "<ul>\n";
		echo "<li><a href='#slide" . esc_html( $tabs_num ) . "_background_tab'>Slide Background</a></li>\n";
		echo "<li><a href='#slide" . esc_html( $tabs_num ) . "_link_tab'>Slide Link</a></li>\n";
		echo "<li><a href='#slide" . esc_html( $tabs_num ) . "_popup_tab'>Slide Popup</a></li>\n";
		echo "<li><a href='#slide" . esc_html( $tabs_num ) . "_goto_tab'>Slide Goto Link</a></li>\n";
		echo "</ul>\n";

		/**
		 * ####### SLIDE TAB 1 - SLIDE BACKGROUND #######
		 */
		echo "<div id='slide" . esc_html( $tabs_num ) . "_background_tab' class='sa_slide_tab'>\n";

		// GET BACKGROUND IMAGE DATA FOR THIS SLIDE (image id, position, size, repeat and color) FROM DATABASE.
		$slide_image_data = get_post_meta( $post->ID, $slide_data[ $i ]['image_data'], true );
		if ( isset( $slide_image_data ) && ( '' !== $slide_image_data ) ) {
			$data_arr           = explode( '~', $slide_image_data );
			$slide_image_id     = $data_arr[0];
			$slide_image_pos    = $data_arr[1];
			$slide_image_size   = $data_arr[2];
			$slide_image_repeat = $data_arr[3];
			$slide_image_color  = $data_arr[4];
		} else {
			$slide_image_id     = get_post_meta( $post->ID, $slide_data[ $i ]['image_id'], true );
			$slide_image_pos    = get_post_meta( $post->ID, $slide_data[ $i ]['image_pos'], true );
			$slide_image_size   = get_post_meta( $post->ID, $slide_data[ $i ]['image_size'], true );
			$slide_image_repeat = get_post_meta( $post->ID, $slide_data[ $i ]['image_repeat'], true );
			$slide_image_color  = get_post_meta( $post->ID, $slide_data[ $i ]['image_color'], true );
		}
		if ( '' === $slide_image_pos ) {
			$slide_image_pos = 'left top';
		}
		if ( '' === $slide_image_size ) {
			$slide_image_size = 'contain';
		}
		if ( '' === $slide_image_repeat ) {
			$slide_image_repeat = 'no-repeat';
		}
		if ( '' === $slide_image_color ) {
			$slide_image_color = 'rgba(0,0,0,0)';
		}

		echo "<div class='sa_slide_bg_wrapper'>\n";

		/**
		 * ### 'USE POPUP IMAGE AS SLIDE BACKGROUND' SETTING ###
		 */
		$slide_popup_background = get_post_meta( $post->ID, $slide_data[ $i ]['popup_background'], true );
		if ( '' === $slide_popup_background ) {
			$slide_popup_background = 'no';
		}
		echo "<div class='popup_background_wrapper'>\n";
		echo '<div>Use Popup Image as Slide Background:';
		$tooltip = 'Allows you to use the same image you defined as the popup image as the slide background image. You can use a smaller version of the popup image.';
		echo "<em class='sa_tooltip' href='' title='" . esc_attr( $tooltip ) . "'></em></div>\n";
		echo "<select id='" . esc_attr( $slide_data[ $i ]['popup_background'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_background'] ) . "' ";
		echo "onChange='change_slide_popup_background(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $image_size_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_popup_background === $image_size_arr[ $j ]['value'] ) {
				echo "<option value='" . esc_attr( $image_size_arr[ $j ]['value'] ) . "' selected>" . esc_html( $image_size_arr[ $j ]['desc'] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $image_size_arr[ $j ]['value'] ) . "'>" . esc_html( $image_size_arr[ $j ]['desc'] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n"; // .popup_background_wrapper
		echo "<div style='clear:both; float:none; width:100%; height:1px;'></div>\n";
		echo "<div id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_imagebg_popup' class='sa_slide_bg_popup'><div></div></div>\n";

		// SLIDE BACKGROUND IMAGE - THUMBNAIL AND 'SET IMAGE' BUTTON.
		// get WordPress media upload frame url.
		$upload_frame_url = esc_url( get_upload_iframe_src( 'image', $post->ID ) . '&slide=' . $slide_data[ $i ]['slide_no'] );
		// Get image src for slide background image.
		$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'medium' );
		// check if the slide background image id already exists.
		$image_exists = is_array( $slide_image_src );
		// slide backround image - thumbnail (and delete button).
		echo "<div id='" . esc_attr( $slide_data[ $i ]['thumb'] ) . "' class='sa_slide_thumb'>\n";
		if ( $image_exists ) {
			echo "<div style='background-image:url(\"" . esc_attr( $slide_image_src[0] ) . '"); background-size:' . esc_attr( $slide_image_size ) . '; ';
			echo 'background-repeat:' . esc_attr( $slide_image_repeat ) . '; background-color:' . esc_attr( $slide_image_color ) . '; ';
			echo 'background-position:' . esc_attr( $slide_image_pos ) . ";'></div>\n";
			echo "<span id='" . esc_attr( $slide_data[ $i ]['image_del'] ) . "' onClick='remove_slide_bg_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Delete the background image for this slide'>X</span>\n";
			echo "</div>\n";
		} else {
			if ( isset( $slide_data[ $i ]['popup_type'] ) ) {
				$slide_popup_type = get_post_meta( $post->ID, $slide_data[ $i ]['popup_type'], true );
				$popup_video_type = get_post_meta( $post->ID, $slide_data[ $i ]['popup_video_type'], true );
				$popup_video_id   = get_post_meta( $post->ID, $slide_data[ $i ]['popup_video_id'], true );
			} else {
				$slide_popup_type = 'NONE';
				$popup_video_type = '';
				$popup_video_id   = '';
			}
			if ( ( '99999999' === $slide_image_id ) && ( 'VIDEO' === $slide_popup_type ) && ( 'youtube' === $popup_video_type ) ) {
				$youtube_thumb = 'https://img.youtube.com/vi/' . $popup_video_id . '/maxresdefault.jpg';
				echo "<div style='background-image:url(\"" . esc_attr( $youtube_thumb ) . '"); background-size:' . esc_attr( $slide_image_size ) . '; ';
				echo 'background-repeat:' . esc_attr( $slide_image_repeat ) . '; background-color:' . esc_attr( $slide_image_color ) . '; ';
				echo 'background-position:' . esc_attr( $slide_image_pos ) . ";'></div>\n";
				echo "<span id='" . esc_attr( $slide_data[ $i ]['image_del'] ) . "' onClick='remove_slide_bg_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Delete the background image for this slide'>X</span>\n";
				echo "</div>\n";
			} else {
				echo "<div style='background-color:#ffffff; background-size:" . esc_attr( $slide_image_size ) . '; ';
				echo 'background-repeat:' . esc_attr( $slide_image_repeat ) . '; background-color:' . esc_attr( $slide_image_color ) . '; ';
				echo 'background-position:' . esc_attr( $slide_image_pos ) . ";'></div>\n";
				echo "<span id='" . esc_attr( $slide_data[ $i ]['image_del'] ) . "' class='sa_hidden' onClick='remove_slide_bg_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Delete the background image for this slide'>X</span>\n";
				echo "</div>\n";
			}
		}
		// slide background image - 'set image' button.
		echo "<a class='button button-secondary slide_image_add' id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_image_add' ";
		echo "href='" . esc_attr( $upload_frame_url ) . "' title='Set the background image for this slide'>Set Image</a>\n";
		// slide background image - image id hidden field.
		echo "<input type='hidden' id='" . esc_attr( $slide_data[ $i ]['image_id'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_id'] ) . "' value='" . esc_attr( $slide_image_id ) . "'/>\n";

		// SLIDE BACKGROUND IMAGE - BACKGROUND POSITION (dropdown box).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Position:</span>';
		$option_arr             = array();
		$option_arr[0]['desc']  = 'Top Left';
		$option_arr[0]['value'] = 'left top';
		$option_arr[1]['desc']  = 'Top Center';
		$option_arr[1]['value'] = 'center top';
		$option_arr[2]['desc']  = 'Top Right';
		$option_arr[2]['value'] = 'right top';
		$option_arr[3]['desc']  = 'Center Left';
		$option_arr[3]['value'] = 'left center';
		$option_arr[4]['desc']  = 'Center';
		$option_arr[4]['value'] = 'center center';
		$option_arr[5]['desc']  = 'Center Right';
		$option_arr[5]['value'] = 'right center';
		$option_arr[6]['desc']  = 'Bottom Left';
		$option_arr[6]['value'] = 'left bottom';
		$option_arr[7]['desc']  = 'Bottom Center';
		$option_arr[7]['value'] = 'center bottom';
		$option_arr[8]['desc']  = 'Bottom Right';
		$option_arr[8]['value'] = 'right bottom';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['image_pos'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_pos'] ) . "' onChange='change_slide_image_pos(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $option_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_image_pos === $option_arr[ $j ]['value'] ) {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "' selected>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "'>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";

		// SLIDE BACKGROUND IMAGE - BACKGROUND SIZE (dropdown box).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Size:</span>';
		$option_arr             = array();
		$option_arr[0]['value'] = 'auto';
		$option_arr[0]['desc']  = 'no resize';
		$option_arr[1]['value'] = 'contain';
		$option_arr[1]['desc']  = 'contain';
		$option_arr[2]['value'] = 'cover';
		$option_arr[2]['desc']  = 'cover';
		$option_arr[3]['value'] = '100% 100%';
		$option_arr[3]['desc']  = '100%';
		$option_arr[4]['value'] = '100% auto';
		$option_arr[4]['desc']  = '100% width';
		$option_arr[5]['value'] = 'auto 100%';
		$option_arr[5]['desc']  = '100% height';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['image_size'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_size'] ) . "' onChange='change_slide_image_size(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $option_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_image_size === $option_arr[ $j ]['value'] ) {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "' selected>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "'>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";

		// SLIDER BACKGROUND IMAGE - BACKGROUND REPEAT (dropdown box).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Repeat:</span>';
		$option_arr    = array();
		$option_arr[0] = 'no-repeat';
		$option_arr[1] = 'repeat';
		$option_arr[2] = 'repeat-x';
		$option_arr[3] = 'repeat-y';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['image_repeat'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_repeat'] ) . "' ";
		echo "onChange='change_slide_image_repeat(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $option_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_image_repeat === $option_arr[ $j ] ) {
				echo "<option value='" . esc_attr( $option_arr[ $j ] ) . "' selected>" . esc_html( $option_arr[ $j ] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $option_arr[ $j ] ) . "'>" . esc_html( $option_arr[ $j ] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";

		// SLIDER BACKGROUND IMAGE - BACKGROUND COLOR (color picker).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Color:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['image_color'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_color'] ) . "' value='" . esc_attr( $slide_image_color ) . "' ";
		echo "onChange='change_slide_image_color(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		echo "</div>\n";

		echo "<div style='clear:both; float:none; width:100%; height:1px;'></div>\n";
		echo "</div>\n";
		echo "</div>\n";

		/**
		 * ####### SLIDE TAB 2 - SLIDE LINK #######
		 */
		echo "<div id='slide" . esc_attr( $tabs_num ) . "_link_tab' class='sa_slide_tab'>\n";

		// GET SLIDE LINK DATA FOR THIS SLIDE FROM THE DATABASE.
		$slide_link_url    = get_post_meta( $post->ID, $slide_data[ $i ]['link_url'], true );
		$slide_link_target = get_post_meta( $post->ID, $slide_data[ $i ]['link_target'], true );
		if ( '' === $slide_link_target ) {
			$slide_link_target = '_self';
		}

		// DISPLAY INPUT FIELDS FOR SLIDE LINK SETTINGS.
		echo "<div class='slide_link_settings_wrapper'>";
		echo '<p>Specify a link URL that this slide opens</h3>';
		// LINK URL.
		echo '<div><span>Link URL:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['link_url'] ) . "' name='" . esc_attr( $slide_data[ $i ]['link_url'] ) . "' ";
		echo "value='" . esc_attr( $slide_link_url ) . "'/></div>\n";
		// LINK TARGET.
		echo '<div><span>Link Target:</span>';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['link_target'] ) . "' name='" . esc_attr( $slide_data[ $i ]['link_target'] ) . "'>";
		if ( '_blank' === $slide_link_target ) {
			echo "<option value='_self'>Same Tab/Window</option>";
			echo "<option value='_blank' selected>New Tab/Window</option>";
		} else {
			echo "<option value='_self' selected>Same Tab/Window</option>";
			echo "<option value='_blank'>New Tab/Window</option>";
		}
		echo '</select>';
		echo "</div>\n";

		echo "</div>\n";
		echo "</div>\n";

		/**
		 * ####### SLIDE TAB 3 - SLIDE POPUP #######
		 */
		echo "<div id='slide" . esc_attr( $tabs_num ) . "_popup_tab' class='sa_slide_tab'>\n";

		// GET SLIDE POPUP DATA FOR THIS SLIDE FROM THE DATABASE.
		$slide_popup_type = get_post_meta( $post->ID, $slide_data[ $i ]['popup_type'], true );
		if ( '' === $slide_popup_type ) {
			$slide_popup_type = 'NONE';
		}
		$popup_imageid    = intval( get_post_meta( $post->ID, $slide_data[ $i ]['popup_imageid'], true ) );
		$popup_video_id   = get_post_meta( $post->ID, $slide_data[ $i ]['popup_video_id'], true );
		$popup_video_type = get_post_meta( $post->ID, $slide_data[ $i ]['popup_video_type'], true );
		$popup_imagetitle = get_post_meta( $post->ID, $slide_data[ $i ]['popup_imagetitle'], true );
		$popup_html       = get_post_meta( $post->ID, $slide_data[ $i ]['popup_html'], true );
		$popup_shortcode  = get_post_meta( $post->ID, $slide_data[ $i ]['popup_shortcode'], true );
		$popup_bgcol      = get_post_meta( $post->ID, $slide_data[ $i ]['popup_bgcol'], true );
		$popup_width      = intval( get_post_meta( $post->ID, $slide_data[ $i ]['popup_width'], true ) );
		$css_id           = get_post_meta( $post->ID, 'sa_css_id', true );

		// POPUP TYPE.
		echo "<div class='slide_popup_settings_line'>";
		echo '<span>SA Popup Type:</span>';
		$option_arr    = array();
		$option_arr[0] = 'NONE';
		$option_arr[1] = 'IMAGE';
		$option_arr[2] = 'VIDEO';
		$option_arr[3] = 'HTML';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['popup_type'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_type'] ) . "' ";
		echo "onChange='change_slide_popup_type(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $option_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_popup_type === $option_arr[ $j ] ) {
				echo "<option value='" . esc_attr( $option_arr[ $j ] ) . "' selected>" . esc_html( $option_arr[ $j ] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $option_arr[ $j ] ) . "'>" . esc_html( $option_arr[ $j ] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";

		// A) IMAGE POPUP SETTINGS.
		$sl_num = ( $i + 1 );
		if ( 'IMAGE' === $slide_popup_type ) {
			echo "<div id='slide" . esc_attr( $sl_num ) . "_image_popup_wrapper' class='image_popup_wrapper'>\n";
		} else {
			echo "<div id='slide" . esc_attr( $sl_num ) . "_image_popup_wrapper' class='image_popup_wrapper' style='display:none;'>\n";
		}
		// get WordPress media upload frame url.
		$upload_popup_frame_url = esc_url( get_upload_iframe_src( 'image', $post->ID ) . '&popup=' . $slide_data[ $i ]['slide_no'] );
		// Get image src for slide popup image.
		$popup_image_src = wp_get_attachment_image_src( $popup_imageid, 'medium' );
		// check if the slide background image id already exists.
		$image_exists = is_array( $popup_image_src );
		echo "<div id='slide" . esc_attr( $sl_num ) . "_popup_thumb' class='slide_popup_thumb'>\n";
		$placeholder = SA_PLUGIN_PATH . 'images/image_placeholder.jpg';
		if ( $image_exists ) {
			// media library image id exists - display thumbnail image.
			echo "<div><img src='" . esc_attr( $popup_image_src[0] ) . "'/></div>";
			// display image delete button.
			echo "<span onClick='remove_popup_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . '", "' . esc_attr( $placeholder ) . "\");' ";
			echo "id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_popup_image_del' title='Delete the popup image for this slide'>X</span>\n";
			// get popup image info (size & dimensions).
			$popup_image_meta = wp_get_attachment_metadata( $popup_imageid );
			$image_width      = $popup_image_meta['width'];
			$image_height     = $popup_image_meta['height'];
			$info_dim         = $image_width . ' x ' . $image_height . ' pixels';
			$popup_image_full = wp_get_attachment_image_src( $popup_imageid, 'full' );
			$img_headers      = get_headers( $popup_image_full[0], 1 );
			$info_size        = $img_headers['Content-Length'];
			if ( '' !== $info_size ) {
				$size_unit = 'bytes';
				if ( $info_size > 1048576 ) {
					if ( ! is_array( $info_size ) ) {
						$info_size = round( $info_size / 1048576 ) . ' MB';
					} else {
						$info_size = '';
					}
				} elseif ( $info_size > 1024 ) {
					if ( ! is_array( $info_size ) ) {
						$info_size = round( $info_size / 1024 ) . ' kb';
					} else {
						$info_size = '';
					}
				}
			}
		} else {
			// no image selected yet - display placeholder image.
			$popup_image_id = 0;
			echo "<div><img src='" . esc_attr( $placeholder ) . "'/></div>";
			// display image delete button (hidden state).
			echo "<span class='sa_hidden' onClick='remove_popup_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . '", "' . esc_attr( $placeholder ) . "\");' ";
			echo "id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_popup_image_del' title='Delete the popup image for this slide'>X</span>\n";
			// reset popup image info (size & dimensions).
			$info_dim  = '';
			$info_size = '';
		}
		echo "</div>\n";
		// slide popup image - 'set image' button.
		echo "<a class='button button-secondary popup_image_add' href='" . esc_attr( $upload_popup_frame_url ) . "' ";
		echo "title='Set the background image for this slide'>Set Image</a>\n";
		// slide popup image - popup image id hidden field.
		echo "<input type='hidden' id='" . esc_attr( $slide_data[ $i ]['popup_imageid'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_imageid'] );
		echo "' value='" . esc_attr( $popup_imageid ) . "' />\n";
		// slide popup image - popup image info (title, dimensions & size).
		echo "<div class='slide_popup_info'>\n";
		// popup image title.
		echo "<input class='sa_slide_popup_imagetitle' type='text' id='" . esc_attr( $slide_data[ $i ]['popup_imagetitle'] ) . "' ";
		echo "name='" . esc_attr( $slide_data[ $i ]['popup_imagetitle'] ) . "' value='" . esc_attr( $popup_imagetitle ) . "' ";
		echo "onChange='change_popup_image_title(this.value, \"" . esc_attr( $preview_button ) . "\")' placeholder='Enter popup title'/>\n";
		// popup dimensions.
		echo "<div id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_popup_info_dim' class='slide_popup_info_dim'>";
		echo '<strong>Dimensions:</strong> ' . esc_html( $info_dim ) . "</div>\n";
		// popup file size.
		echo "<div id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_popup_info_size' class='slide_popup_info_size'>";
		if ( '' !== $info_size ) {
			echo '<strong>File Size:</strong> ' . esc_html( $info_size );
		}
		echo "</div>\n";
		echo "</div>\n";
		echo "<div style='clear:both; float:none; width:100%; height:1px;'></div>\n";
		echo "</div>\n";

		// B) VIDEO POPUP SETTINGS.
		$sl_num = ( $i + 1 );
		if ( 'VIDEO' === $slide_popup_type ) {
			echo "<div id='slide" . esc_attr( $sl_num ) . "_video_popup_wrapper' class='video_popup_wrapper'>\n";
		} else {
			echo "<div id='slide" . esc_attr( $sl_num ) . "_video_popup_wrapper' class='video_popup_wrapper' style='display:none;'>\n";
		}
		// set default video values.
		if ( ( 'youtube' !== $popup_video_type ) && ( 'vimeo' !== $popup_video_type ) ) {
			$popup_video_type = '';
			$popup_video_id   = '';
		}
		if ( '' === $popup_video_id ) {
			$popup_video_type = '';
		}
		// video preview.
		echo "<div id='slide" . esc_attr( $sl_num ) . "_video_thumb' class='slide_video_thumb'>\n";
		if ( '' !== $popup_video_id ) {
			if ( 'youtube' === $popup_video_type ) {
				echo "<iframe src='https://www.youtube.com/embed/" . esc_attr( $popup_video_id ) . "' frameborder='0' allowfullscreen></iframe>\n";
			} elseif ( 'vimeo' === $popup_video_type ) {
				echo "<iframe src='https://player.vimeo.com/video/" . esc_attr( $popup_video_id ) . "' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
			} else {
				echo "<img src='" . esc_attr( SA_PLUGIN_PATH ) . "images/video_placeholder.jpg'/>";
			}
		} else {
			echo "<img src='" . esc_attr( SA_PLUGIN_PATH ) . "images/video_placeholder.jpg'/>";
		}
		echo "<div style='float:none; clear:both; width:100%; height:1px;'></div>\n";
		echo "</div>\n";
		// video url (youtube/vimeo) input text box.
		echo "<div class='sa_slide_video_url'>";
		echo "<input type='text' id='sa_slide" . esc_attr( $sl_num ) . "_video_url' name='sa_slide" . esc_attr( $sl_num ) . "_video_url' ";
		echo "placeholder='Enter YouTube or Vimeo URL'/></div>\n";
		// 'update video' button.
		echo "<a class='button button-secondary' title='Update popup video using the above video URL' ";
		echo "onClick='update_popup_video(" . esc_attr( $sl_num ) . ");'>Set Video</a>\n";
		// invalid url error message.
		echo "<div id='sa_slide" . esc_attr( $sl_num ) . "_video_invalid_url' class='sa_popup_video_invalid_url'>";
		echo "URL entered is NOT a valid YouTube or Vimeo URL!</div>\n";
		// hidden video id text field.
		echo "<input type='hidden' id='" . esc_attr( $slide_data[ $i ]['popup_video_id'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_video_id'] ) . "' ";
		echo "value='" . esc_attr( $popup_video_id ) . "'/>\n";
		// hidden video type (youtube/vimeo) text field.
		echo "<input type='hidden' id='" . esc_attr( $slide_data[ $i ]['popup_video_type'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_video_type'] ) . "' ";
		echo "value='" . esc_attr( $popup_video_type ) . "'/>\n";
		echo "<div style='float:none; clear:both; width:100%; height:1px;'></div>\n";
		echo "</div>\n";

		// C) CONTENT POPUP SETTINGS.
		$sl_num = ( $i + 1 );
		if ( 'HTML' === $slide_popup_type ) {
			echo "<div id='slide" . esc_attr( $sl_num ) . "_html_popup_wrapper' class='html_popup_wrapper'>\n";
		} else {
			echo "<div id='slide" . esc_attr( $sl_num ) . "_html_popup_wrapper' class='html_popup_wrapper' style='display:none;'>\n";
		}
		// content popup - html.
		echo "<textarea id='" . esc_attr( $slide_data[ $i ]['popup_html'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_html'] ) . "' ";
		echo "placeholder='Enter HTML Code or WordPress Shortcode'>" . esc_attr( $popup_html ) . "</textarea>\n";
		// content popup - shortcode.
		if ( '' === $popup_shortcode ) {
			$popup_shortcode = '0';
		}
		echo "<div class='slide_popup_settings_line' style='margin:3px 0px 15px;'><span>Shortcode Content:</span>";
		if ( '1' === $popup_shortcode ) {
			echo "<input type='checkbox' id='" . esc_attr( $slide_data[ $i ]['popup_shortcode'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_shortcode'] ) . "' value='1' checked/>";
		} else {
			echo "<input type='checkbox' id='" . esc_attr( $slide_data[ $i ]['popup_shortcode'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_shortcode'] ) . "' value='1'/>";
		}
		echo "<em class='sa_tooltip' href='' title='Use a WordPress shortcode instead of HTML as your popup content'></em>\n";
		echo "</div>\n";
		// content popup - css id.
		$popup_id = $css_id . '_popup' . ( $i + 1 );
		echo "<div class='slide_popup_settings_line'>";
		echo "<span>Popup CSS ID:</span><div id='sa_slide" . esc_attr( $sl_num ) . "_popup_css' class='slide_popup_css'>#" . esc_html( $popup_id ) . '</div>';
		echo '<strong>(click to copy to clipboard)</strong></div>';
		// content popup - background color.
		if ( '' === $popup_bgcol ) {
			$popup_bgcol = '#ffffff';
		}
		echo "<div class='slide_popup_settings_line'>";
		echo '<span>Background Color:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['popup_bgcol'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_bgcol'] ) . "' ";
		echo "value='" . esc_attr( $popup_bgcol ) . "'>";
		echo "</div>\n";
		// content popup - width.
		if ( ( '' === $popup_width ) || ( 0 === $popup_width ) ) {
			$popup_width = '600';
		}
		echo "<div class='slide_popup_settings_line'>";
		echo '<span>Popup Width:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['popup_width'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_width'] ) . "' ";
		echo "value='" . esc_attr( $popup_width ) . "'><em>px</em>";
		echo "</div>\n";

		echo "</div>\n";
		echo "</div>\n";

		/**
		 * ####### SLIDE TAB 4 - SLIDE GOTO LINK #######
		 */
		$css_id     = get_post_meta( $post->ID, 'sa_css_id', true );
		$goto_class = $css_id . '_goto' . ( $i + 1 );
		$eg_link    = 'https://edgewebpages.com/slide-goto-links';
		echo "<div id='slide" . esc_attr( $tabs_num ) . "_goto_tab' class='sa_slide_tab'>\n";
		echo "<div class='slide_goto_link_content'>\n";
		echo "<p><strong>Create a link or button to link directly to this slide</strong></p>\n";
		echo "<p>To do this, give your link or button the following <strong>CSS Class:</strong></p>\n";
		echo "<div class='slide_goto_class'><span>" . esc_html( $goto_class ) . "</span></div>\n";
		echo "<p>To see an example of how a '<strong>Slide Goto Link</strong>' works ";
		echo "<a href='" . esc_attr( $eg_link ) . "' target='_blank'>CLICK HERE</a></p>\n";
		echo "</div>\n";
		echo "</div>\n";

		/**
		 * // ############################
		 * // ##### SLIDE TABS - END #####
		 * // ############################
		 */
		echo "</div>\n";

		// 3. DELETE STATUS FIELD (hidden) AND DELETE SLIDE BUTTON.
		echo "<input type='hidden' id='" . esc_attr( $slide_data[ $i ]['del_id'] ) . "' name='" . esc_attr( $slide_data[ $i ]['del_id'] ) . "' value='1'/>\n";
		echo "<div class='button button-secondary' onClick='delete_sa_slide(\"" . esc_attr( $slide_data[ $i ]['del_id'] ) . "\");' title='Delete this slide'>Delete Slide</div>\n";

		// 4. DUPLICATE SLIDE BUTTON.
		echo "<div class='button button-secondary' onClick='duplicate_slide(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Duplicate this slide'>Duplicate Slide</div>\n";

		// 5. MOVE SLIDE UP BUTTON.
		if ( 1 !== $slide_data[ $i ]['slide_no'] ) {
			echo "<div class='button button-secondary' onClick='move_slide_up(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Move this slide up within the slide order'>Move Slide Up</div>\n";
		}

		echo "</div>\n";
	}
	echo "</div>\n";

	// ADD SLIDE BUTTON.
	if ( $num_slides < 99 ) {
		// a maximum of 99 slides allowed.
		echo "<div id='sa_add_slide' class='button button-primary button-large' title='Add a new slide'>Add Slide</div>\n";
	}

	// JQUERY-UI DIALOG BOX DIV - FOR CONFIRMATION DIALOG BOXES.
	echo "<div id='sa_dialog_box'></div>\n";
}



/**
 * ##### META BOX CONTENT - 'Slider Preview/Shortcode' BOX #####
 *
 * @param array $post Custom Post 'sa_slider'.
 */
function cpt_slider_shortcode_content( $post ) {
	$post_status      = get_post_status( $post->ID );
	$allow_shortcodes = get_post_meta( $post->ID, 'sa_shortcodes', true );
	$shortcode        = '[slide-anything id="' . $post->ID . '"]';
	echo "<div id='sa_slider_shortcode'>" . esc_html( $shortcode ) . "</div>\n";
	echo "<div id='sa_shortcode_copy' class='button button-secondary'>Copy to Clipboard</div>\n";
}



/**
 * ##### META BOX CONTENT - 'Items Displayed' BOX #####
 *
 * @param array $post Custom Post 'sa_slider'.
 */
function cpt_slider_items_content( $post ) {
	$items_width1 = intval( get_post_meta( $post->ID, 'sa_items_width1', true ) );
	$items_width2 = intval( get_post_meta( $post->ID, 'sa_items_width2', true ) );
	$items_width3 = intval( get_post_meta( $post->ID, 'sa_items_width3', true ) );
	$items_width4 = intval( get_post_meta( $post->ID, 'sa_items_width4', true ) );
	$items_width5 = intval( get_post_meta( $post->ID, 'sa_items_width5', true ) );
	$items_width6 = intval( get_post_meta( $post->ID, 'sa_items_width6', true ) );
	if ( 0 === $items_width1 ) {
		$items_width1 = 1; }
	if ( 0 === $items_width2 ) {
		$items_width2 = 1; }
	if ( 0 === $items_width3 ) {
		$items_width3 = 1; }
	if ( 0 === $items_width4 ) {
		$items_width4 = 1; }
	if ( 0 === $items_width5 ) {
		$items_width5 = 1; }
	if ( 0 === $items_width6 ) {
		$items_width6 = $items_width5; }

	echo "<div id='items_displayed_metabox'>\n";
	echo "<h4>Browser/Device Width:</h4>\n";
	// items for browser width category 1.
	echo "<div><em class='sa_tooltip' href='' title='Up to 479 pixels'></em><span>Mobile Portrait</span><select name='sa_items_width1'>";
	for ( $i = 1; $i <= 12; $i++ ) {
		if ( $i === $items_width1 ) {
			echo "<option value='" . esc_attr( $i ) . "' selected>" . esc_html( $i ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $i ) . "'>" . esc_html( $i ) . '</option>';
		}
	}
	echo "</select></div>\n";
	// items for browser width category 2.
	echo "<div><em class='sa_tooltip' href='' title='480 to 767 pixels'></em><span>Mobile Landscape</span><select name='sa_items_width2'>";
	for ( $i = 1; $i <= 12; $i++ ) {
		if ( $i === $items_width2 ) {
			echo "<option value='" . esc_attr( $i ) . "' selected>" . esc_html( $i ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $i ) . "'>" . esc_html( $i ) . '</option>';
		}
	}
	echo "</select></div>\n";
	// items for browser width category 3.
	echo "<div><em class='sa_tooltip' href='' title='768 to 979 pixels'></em><span>Tablet Portrait</span><select name='sa_items_width3'>";
	for ( $i = 1; $i <= 12; $i++ ) {
		if ( $i === $items_width3 ) {
			echo "<option value='" . esc_attr( $i ) . "' selected>" . esc_html( $i ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $i ) . "'>" . esc_html( $i ) . '</option>';
		}
	}
	echo "</select></div>\n";
	// items for browser width category 4.
	echo "<div><em class='sa_tooltip' href='' title='980 to 1199 pixels'></em><span>Desktop Small</span><select name='sa_items_width4'>";
	for ( $i = 1; $i <= 12; $i++ ) {
		if ( $i === $items_width4 ) {
			echo "<option value='" . esc_attr( $i ) . "' selected>" . esc_html( $i ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $i ) . "'>" . esc_html( $i ) . '</option>';
		}
	}
	echo "</select></div>\n";
	// items for browser width category 5.
	echo "<div><em class='sa_tooltip' href='' title='1200 to 1499 pixels'></em><span>Desktop Large</span><select name='sa_items_width5'>";
	for ( $i = 1; $i <= 12; $i++ ) {
		if ( $i === $items_width5 ) {
			echo "<option value='" . esc_attr( $i ) . "' selected>" . esc_html( $i ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $i ) . "'>" . esc_html( $i ) . '</option>';
		}
	}
	echo "</select></div>\n";
	// items for browser width category 6.
	echo "<div><em class='sa_tooltip' href='' title='Over 1500 pixels'></em><span>Desktop X-Large</span><select name='sa_items_width6'>";
	for ( $i = 1; $i <= 12; $i++ ) {
		if ( $i === $items_width6 ) {
			echo "<option value='" . esc_attr( $i ) . "' selected>" . esc_html( $i ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $i ) . "'>" . esc_html( $i ) . '</option>';
		}
	}
	echo "</select></div>\n";
	// slide transition effect.
	$transition = get_post_meta( $post->ID, 'sa_transition', true );
	if ( '' === $transition ) {
		$transition = 'fade';
	}
	$option_arr     = array();
	$option_arr[0]  = 'Slide';
	$option_arr[1]  = 'Fade';
	$option_arr[2]  = 'Zoom In';
	$option_arr[3]  = 'Zoom Out';
	$option_arr[4]  = 'Flip Out X';
	$option_arr[5]  = 'Flip Out Y';
	$option_arr[6]  = 'Rotate Left';
	$option_arr[7]  = 'Rotate Right';
	$option_arr[8]  = 'Bounce Out';
	$option_arr[9]  = 'Roll Out';
	$option_arr[10] = 'Slide Down';
	if ( ( 1 === $items_width1 ) && ( 1 === $items_width2 ) && ( 1 === $items_width3 ) && ( 1 === $items_width4 ) && ( 1 === $items_width5 ) && ( 1 === $items_width6 ) ) {
		echo "<div class='sa_items_all_one' style='display:block;'>";
	} else {
		echo "<div class='sa_items_all_one' style='display:none;'>";
	}
	echo "<em class='sa_tooltip' href='' title='NOTE: Slide transitions only work when the above items displayed are ALL SET TO 1'></em>";
	echo "<span style='color:firebrick !important;'>Slide Transition</span><select style='max-width:100px !important;' name='sa_transition'>";
	$tot_opt = count( $option_arr );
	for ( $i = 0; $i < $tot_opt; $i++ ) {
		if ( $transition === $option_arr[ $i ] ) {
			echo "<option value='" . esc_attr( $option_arr[ $i ] ) . "' selected>" . esc_html( $option_arr[ $i ] ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $option_arr[ $i ] ) . "'>" . esc_html( $option_arr[ $i ] ) . '</option>';
		}
	}
	echo "</select></div>\n";

	// HERO SLIDER.
	$hero_slider = get_post_meta( $post->ID, 'sa_hero_slider', true );
	if ( '1' !== $hero_slider ) {
		$hero_slider = '0';
	}
	if ( ( 1 === $items_width1 ) && ( 1 === $items_width2 ) && ( 1 === $items_width3 ) && ( 1 === $items_width4 ) && ( 1 === $items_width5 ) && ( 1 === $items_width6 ) ) {
		echo "<div id='sa_hero_slider_wrapper' class='sa_items_all_one' style='display:block;'>";
	} else {
		echo "<div id='sa_hero_slider_wrapper' class='sa_items_all_one' style='display:none;'>";
	}
	echo '<span>Hero Slider</span>';
	// hero slider checkbox.
	if ( '1' === $hero_slider ) {
		echo "<input type='checkbox' id='sa_hero_slider' name='sa_hero_slider' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_hero_slider' name='sa_hero_slider' value='1'/>";
	}
	$hs_note1 = 'Most WP Theme &apos;Page Builders&apos; (Visual Composer, Divi, Elementor, SiteOrigin...) allow you create full-width sections in your content. If you are not using a page builder then you will have to manually create a PHP template file to include a full-width container.';
	$hs_note2 = 'The slider height is set to 100% screen/device height using CSS &apos;vh&apos; (viewport height). Just about all browsers now support CSS viewport units, except Opera Mini which was installed on the old &apos;button&apos; phones.';
	if ( '1' === $hero_slider ) {
		echo "<div id='sa_hero_slider_note' style='display:block;'>";
	} else {
		echo "<div id='sa_hero_slider_note' style='display:none;'>";
	}
	echo '<strong>Please Note:</strong>';
	echo "<ol><li>Shortcode should be inserted into a full-width section<em class='sa_tooltip' title='" . esc_attr( $hs_note1 ) . "'></em></li>";
	echo "<li>Only works on  browsers that support Viewport units - see <a href='https://caniuse.com/#feat=viewport-units' target='_blank'>here</a>";
	echo "<em class='sa_tooltip' title='" . esc_attr( $hs_note2 ) . "'></em></li></ol></div>";
	echo "</div>\n";

	// SHOWCASE SLIDER.
	if ( ( 1 === $items_width1 ) && ( 1 === $items_width2 ) && ( 1 === $items_width3 ) && ( 1 === $items_width4 ) && ( 1 === $items_width5 ) && ( 1 === $items_width6 ) ) {
		echo "<div id='sa_showcase_slider_wrapper' style='display:none;'>";
	} else {
		echo "<div id='sa_showcase_slider_wrapper' style='display:block;'>";
	}
	// showcase slider checkbox.
	$showcase_slider = get_post_meta( $post->ID, 'sa_showcase_slider', true );
	if ( '1' !== $showcase_slider ) {
		$showcase_slider = '0';
	}
	echo "<div class='sa_ss_line'><span><strong>Showcase Carousel</strong></span>";
	echo "<input type='checkbox' id='sa_showcase_slider' name='sa_showcase_slider' value='1'";
	if ( '1' === $showcase_slider ) {
		echo ' checked'; }
	echo ' />';
	echo '</div>';
	if ( '1' === $showcase_slider ) {
		echo "<div id='sa_showcase_slider_pro' style='display:block;'>";
	} else {
		echo "<div id='sa_showcase_slider_pro' style='display:none;'>";
	}
	// showcase slider - desktop width.
	$showcase_width = get_post_meta( $post->ID, 'sa_showcase_width', true );
	if ( '' === $showcase_width ) {
		$showcase_width = '120';
	}
	echo "<div class='sa_ss_line'><span>Desktop Width</span>";
	echo "<input type='text' id='sa_showcase_width' name='sa_showcase_width' value='" . esc_attr( $showcase_width ) . "'>";
	echo "<em>%</em></div>\n";
	// showcase slider - use on tablets.
	$showcase_tablet = get_post_meta( $post->ID, 'sa_showcase_tablet', true );
	if ( ( '0' !== $showcase_tablet ) && ( '1' !== $showcase_tablet ) ) {
		$showcase_tablet = '1';
	}
	echo "<div class='sa_ss_line'><span>Use on Tablets</span>";
	if ( '1' === $showcase_tablet ) {
		echo "<input type='checkbox' id='sa_showcase_tablet' name='sa_showcase_tablet' value='1' checked />";
	} else {
		echo "<input type='checkbox' id='sa_showcase_tablet' name='sa_showcase_tablet' value='1' />";
	}
	echo "</div>\n";
	// showcase slider - tablet width.
	$showcase_width_tab = get_post_meta( $post->ID, 'sa_showcase_width_tab', true );
	if ( '' === $showcase_width_tab ) {
		$showcase_width_tab = '130';
	}
	echo "<div class='sa_ss_line'><span>Tablet Width</span>";
	echo "<input type='text' id='sa_showcase_width_tab' name='sa_showcase_width_tab' value='" . esc_attr( $showcase_width_tab ) . "'>";
	echo "<em>%</em></div>\n";
	// showcase slider - use on mobiles.
	$showcase_mobile = get_post_meta( $post->ID, 'sa_showcase_mobile', true );
	if ( '1' !== $showcase_mobile ) {
		$showcase_mobile = '0';
	}
	echo "<div class='sa_ss_line'><span>Use on Mobiles</span>";
	if ( '1' === $showcase_mobile ) {
		echo "<input type='checkbox' id='sa_showcase_mobile' name='sa_showcase_mobile' value='1' checked />";
	} else {
		echo "<input type='checkbox' id='sa_showcase_mobile' name='sa_showcase_mobile' value='1' />";
	}
	echo "</div>\n";
	// showcase slider - mobile width.
	$showcase_width_mob = get_post_meta( $post->ID, 'sa_showcase_width_mob', true );
	if ( '' === $showcase_width_mob ) {
		$showcase_width_mob = '140';
	}
	echo "<div class='sa_ss_line'><span>Mobile Width</span>";
	echo "<input type='text' id='sa_showcase_width_mob' name='sa_showcase_width_mob' value='" . esc_attr( $showcase_width_mob ) . "'>";
	echo "<em>%</em></div>\n";
	// showcase slider - css to style left/rightmost slides.
	$css_id = get_post_meta( $post->ID, 'sa_css_id', true );
	echo "<div class='sa_ss_css_line'>CSS to target left+right partial slides:";
	echo "<div id='ss_css_value'>#" . esc_html( $css_id ) . ' .sc_partial</div>';
	echo "</div>\n";
	echo '</div>'; // #sa_showcase_slider_pro
	echo "</div>\n";

	echo "</div>\n";
}



/**
 * ##### META BOX CONTENT - 'Slider Style' BOX #####
 *
 * @param array $post Custom Post 'sa_slider'.
 */
function cpt_slider_style_content( $post ) {
	// CSS ID.
	$css_id = get_post_meta( $post->ID, 'sa_css_id', true );
	if ( '' === $css_id ) {
		$css_id = 'slider_' . $post->ID;
	}
	echo "<div id='slider_style_metabox'>\n";
	echo "<h4>CSS <span>#id</span> for Slider:</h4>\n";
	echo "<div style='padding-bottom:10px; color:#909090;'>Must consist of letters (upper/lowercase) or Underscore '_' characters <span style='color:firebrick;'>ONLY!</span></div>\n";
	echo "<input type='text' id='sa_css_id' name='sa_css_id' value='" . esc_attr( $css_id ) . "'/>\n";
	echo "<div id='css_note_text'>To style slides use CSS selector:</div>";
	echo "<div id='css_note_value'>#" . esc_html( $css_id ) . ' .owl-item</div>';
	echo "<div class='ca_style_hr'></div>\n";

	// SLIDER PADDING (TOP, RIGHT, BOTTOM, LEFT).
	$wrapper_padd_top = get_post_meta( $post->ID, 'sa_wrapper_padd_top', true );
	if ( '' === $wrapper_padd_top ) {
		$wrapper_padd_top = '0'; }
	$wrapper_padd_right = get_post_meta( $post->ID, 'sa_wrapper_padd_right', true );
	if ( '' === $wrapper_padd_right ) {
		$wrapper_padd_right = '0'; }
	$wrapper_padd_bottom = get_post_meta( $post->ID, 'sa_wrapper_padd_bottom', true );
	if ( '' === $wrapper_padd_bottom ) {
		$wrapper_padd_bottom = '0'; }
	$wrapper_padd_left = get_post_meta( $post->ID, 'sa_wrapper_padd_left', true );
	if ( '' === $wrapper_padd_left ) {
		$wrapper_padd_left = '0'; }
	$tooltip = 'Padding space around the entire carousel/slider';
	echo "<h4>Padding <span>(pixels)</span>:<em class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></em></h4>";
	echo "<div class='ca_style_padding'>";
	echo "<div id='padd_top'>";
	echo "<input type='text' id='sa_wrapper_padd_top' name='sa_wrapper_padd_top' value='" . esc_attr( $wrapper_padd_top ) . "'></div>";
	echo "<div id='padd_right'>";
	echo "<input type='text' id='sa_wrapper_padd_right' name='sa_wrapper_padd_right' value='" . esc_attr( $wrapper_padd_right ) . "'></div>";
	echo "<div type='text' id='padd_bottom'>";
	echo "<input type='text' id='sa_wrapper_padd_bottom' name='sa_wrapper_padd_bottom' value='" . esc_attr( $wrapper_padd_bottom ) . "'></div>";
	echo "<div id='padd_left'>";
	echo "<input type='text' id='sa_wrapper_padd_left' name='sa_wrapper_padd_left' value='" . esc_attr( $wrapper_padd_left ) . "'></div>";
	echo "</div>\n";
	echo "<div style='clear:both; float:none; width:100%; height:10px;'></div>";

	$tooltip = 'Style settings for the slider navigation arrows and slider pagination';
	echo "<h4>Slider Navigation:<em class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></em></h4>";

	// AUTOHIDE ARROWS.
	$autohide_arrows = get_post_meta( $post->ID, 'sa_autohide_arrows', true );
	if ( '' === $autohide_arrows ) {
		$autohide_arrows = '1';
	}
	echo "<div class='ca_style_setting_line'><span style='width:140px;'>Autohide Arrows</span>";
	if ( '1' === $autohide_arrows ) {
		echo "<input type='checkbox' id='sa_autohide_arrows' name='sa_autohide_arrows' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_autohide_arrows' name='sa_autohide_arrows' value='1'/>";
	}
	echo "</div>\n";

	// SHOW DOT PER SLIDE.
	$dot_per_slide = get_post_meta( $post->ID, 'sa_dot_per_slide', true );
	if ( '' === $dot_per_slide ) {
		$dot_per_slide = '0';
	}
	echo "<div class='ca_style_setting_line'><span style='width:140px;'>Show 1 Dot Per Slide</span>";
	if ( '1' === $dot_per_slide ) {
		echo "<input type='checkbox' id='sa_dot_per_slide' name='sa_dot_per_slide' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_dot_per_slide' name='sa_dot_per_slide' value='1'/>";
	}
	echo "</div>\n";

	$tooltip = 'The background color and border around the entire carousel/slider';
	echo "<h4>Background/Border:<em class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></em></h4>";

	// SLIDER BACKGROUND COLOR.
	$background_color = get_post_meta( $post->ID, 'sa_background_color', true );
	if ( '' === $background_color ) {
		$background_color = 'rgba(0,0,0,0)';
	}
	echo "<div class='ca_style_setting_line'><span>Background:</span>";
	echo "<input type='text' id='sa_background_color' name='sa_background_color' value='" . esc_attr( $background_color ) . "'></div>\n";

	// SLIDER BORDER (WIDTH & COLOR).
	$border_width = get_post_meta( $post->ID, 'sa_border_width', true );
	if ( '' === $border_width ) {
		$border_width = '0';
	}
	$border_color = get_post_meta( $post->ID, 'sa_border_color', true );
	if ( '' === $border_color ) {
		$border_color = 'rgba(0,0,0,0)';
	}
	echo "<div class='ca_style_setting_line'><span>Border Style:</span>";
	echo "<input type='text' id='sa_border_width' name='sa_border_width' value='" . esc_attr( $border_width ) . "'><em>px</em>";
	echo "<input type='text' id='sa_border_color' name='sa_border_color' value='" . esc_attr( $border_color ) . "'></div>\n";

	// SLIDER BORDER RADIUS.
	$border_radius = get_post_meta( $post->ID, 'sa_border_radius', true );
	if ( '' === $border_radius ) {
		$border_radius = '0';
	}
	echo "<div class='ca_style_setting_line'><span>Border Radius:</span>";
	echo "<input type='text' id='sa_border_radius' name='sa_border_radius' value='" . esc_attr( $border_radius ) . "'></div>\n";

	echo "<div class='ca_style_hr' style='margin-top:10px;'></div>\n";

	$tooltip = 'The style settings for all slides (within the slider/carousel)';
	echo "<h4>Slide Style:<em class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></em></h4>";

	// SLIDE - MINIMUM HEIGHT.
	$slide_min_height = get_post_meta( $post->ID, 'sa_slide_min_height_perc', true );
	if ( '' === $slide_min_height ) {
		$slide_min_height = '50';
	}
	echo "<div style='padding:5px 0px 10px;'>\n";
	$tooltip = 'The minimum height of each slide. Can be set to a percentage of the slide width, or for image sliders set to a 4:3 or 16:9 aspect ratio.';
	echo "<div class='ca_style_setting_line' id='ca_style_min_height' style='padding-bottom:7px !important;'>";
	echo "<span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'>Min Height:</span><br/>";
	if ( 'aspect43' === $slide_min_height ) {
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='percent' style='margin-left:20px !important;'/><em>%</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='px'/><em>px</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='43' checked/><em>4:3</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='169'/><em>16:9</em>";
	} elseif ( 'aspect169' === $slide_min_height ) {
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='percent' style='margin-left:20px !important;'/><em>%</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='px'/><em>px</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='43'/><em>4:3</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='169' checked/><em>16:9</em>";
	} elseif ( strpos( $slide_min_height, 'px' ) !== false ) {
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='percent' style='margin-left:20px !important;'/><em>%</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='px' checked/><em>px</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='43'/><em>4:3</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='169'/><em>16:9</em>";
	} else {
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='percent' style='margin-left:20px !important;' checked/><em>%</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='px'/><em>px</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='43'/><em>4:3</em>";
		echo "<input type='radio' name='sa_slide_min_height_type' class='sa_slide_min_height_type' value='169'/><em>16:9</em>";
	}
	echo "</div>\n";
	if ( ( 'aspect43' === $slide_min_height ) || ( 'aspect169' === $slide_min_height ) ) {
		$mh_suffix = '';
		echo "<div class='ca_style_setting_line' id='sa_slide_min_height_wrapper' style='display:none;'>";
		echo "<input type='text' id='sa_slide_min_height' name='sa_slide_min_height' value='" . esc_attr( $slide_min_height ) . "'/>";
		echo "<em id='mh_suffix'>" . esc_html( $mh_suffix ) . "</em></div>\n";
		echo "<input type='hidden' id='sa_slide_min_height_hidden' name='sa_slide_min_height_hidden' value='0'/>\n";
	} else {
		if ( strpos( $slide_min_height, 'px' ) !== false ) {
			$mh_value  = str_replace( 'px', '', $slide_min_height );
			$mh_suffix = 'px';
		} else {
			$mh_value  = $slide_min_height;
			$mh_suffix = '%';
		}
		echo "<div class='ca_style_setting_line' id='sa_slide_min_height_wrapper'><span style='width:20px;'>&nbsp;</span>";
		echo "<input type='text' id='sa_slide_min_height' name='sa_slide_min_height' value='" . esc_attr( $mh_value ) . "'/>";
		echo "<em id='mh_suffix'>" . esc_html( $mh_suffix ) . "</em></div>\n";
		echo "<input type='hidden' id='sa_slide_min_height_hidden' name='sa_slide_min_height_hidden' value='" . esc_attr( $mh_value ) . "'/>\n";
	}
	echo "</div>\n";

	// SLIDE - PADDING TOP/BOTTOM.
	$slide_padding_tb = get_post_meta( $post->ID, 'sa_slide_padding_tb', true );
	if ( '' === $slide_padding_tb ) {
		$slide_padding_tb = '5';
	}
	$tooltip = 'Padding space top/bottom for each individual slide';
	echo "<div class='ca_style_setting_line' id='ca_style_padding_top_bottom'><span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'>Padding:</span>";
	echo "<input type='text' id='sa_slide_padding_tb' name='sa_slide_padding_tb' value='" . esc_attr( $slide_padding_tb ) . "'><em>%</em></div>\n";

	// SLIDE - PADDING LEFT/RIGHT.
	$slide_padding_lr = get_post_meta( $post->ID, 'sa_slide_padding_lr', true );
	if ( '' === $slide_padding_lr ) {
		$slide_padding_lr = '5';
	}
	$tooltip = 'Padding space left/right for each individual slide';
	echo "<div class='ca_style_setting_line' id='ca_style_padding_left_right'><span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'>Padding:</span>";
	echo "<input type='text' id='sa_slide_padding_lr' name='sa_slide_padding_lr' value='" . esc_attr( $slide_padding_lr ) . "'><em>%</em></div>\n";

	// SLIDE - MARGIN LEFT/RIGHT.
	$slide_margin_lr = get_post_meta( $post->ID, 'sa_slide_margin_lr', true );
	if ( '' === $slide_margin_lr ) {
		$slide_margin_lr = '0';
	}
	$tooltip = 'Margin space left and right of each slide';
	echo "<div class='ca_style_setting_line' id='ca_style_margin_left_right'><span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'>Margin:</span>";
	echo "<input type='text' id='sa_slide_margin_lr' name='sa_slide_margin_lr' value='" . esc_attr( $slide_margin_lr ) . "'><em>%</em></div>\n";

	$tooltip = 'The link/popup buttons that appear on a slide';
	echo "<h4>Link/Popup Icons:<em class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></em></h4>";

	// LINK/POPUP ICONS - ICON LOCATION.
	$slide_icons_location = get_post_meta( $post->ID, 'sa_slide_icons_location', true );
	if ( '' === $slide_icons_location ) {
		$slide_icons_location = 'Center Center';
	}
	echo "<div class='ca_style_setting_line'><span>Icon Location</span>";
	echo "<select id='sa_slide_icons_location' name='sa_slide_icons_location'>";
	$option_arr    = array();
	$option_arr[0] = 'Center Center';
	$option_arr[1] = 'Top Left';
	$option_arr[2] = 'Top Center';
	$option_arr[3] = 'Top Right';
	$option_arr[4] = 'Bottom Left';
	$option_arr[5] = 'Bottom Center';
	$option_arr[6] = 'Bottom Right';
	$tot_opt       = count( $option_arr );
	for ( $i = 0; $i < $tot_opt; $i++ ) {
		if ( $option_arr[ $i ] === $slide_icons_location ) {
			echo "<option value='" . esc_attr( $option_arr[ $i ] ) . "' selected>" . esc_html( $option_arr[ $i ] ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $option_arr[ $i ] ) . "'>" . esc_html( $option_arr[ $i ] ) . '</option>';
		}
	}
	echo "</select></div>\n";

	// LINK/POPUP ICONS - ALWAYS VISIBLE.
	$slide_icons_visible = get_post_meta( $post->ID, 'sa_slide_icons_visible', true );
	if ( '1' !== $slide_icons_visible ) {
		$slide_icons_visible = '0';
	}
	echo "<div class='ca_style_setting_line'><span>Always Visible</span>";
	if ( '1' === $slide_icons_visible ) {
		echo "<input type='checkbox' id='sa_slide_icons_visible' name='sa_slide_icons_visible' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_slide_icons_visible' name='sa_slide_icons_visible' value='1'/>";
	}
	echo "</div>\n";

	// LINK/POPUP ICONS - COLOR SCHEME.
	$slide_icons_color = get_post_meta( $post->ID, 'sa_slide_icons_color', true );
	if ( '' === $slide_icons_color ) {
		$slide_icons_location = 'white';
	}
	echo "<div class='ca_style_setting_line'><span>Color Scheme</span>";
	echo "<select id='sa_slide_icons_color' name='sa_slide_icons_color'>";
	if ( 'black' === $slide_icons_color ) {
		echo "<option value='white'>White</option>";
		echo "<option value='black' selected>Black</option>";
	} else {
		echo "<option value='white selected'>White</option>";
		echo "<option value='black'>Black</option>";
	}
	echo "</select></div>\n";

	// LINK/POPUP ICONS - FULL SLIDE LINKS.
	$slide_icons_fullslide = get_post_meta( $post->ID, 'sa_slide_icons_fullslide', true );
	if ( '1' !== $slide_icons_fullslide ) {
		$slide_icons_fullslide = '0';
	}
	echo "<div class='ca_style_setting_line'><span>Full Slide Links</span>";
	if ( '1' === $slide_icons_fullslide ) {
		echo "<input type='checkbox' id='sa_slide_icons_fullslide' name='sa_slide_icons_fullslide' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_slide_icons_fullslide' name='sa_slide_icons_fullslide' value='1'/>";
	}
	$tooltip  = 'This makes the entire slide area a clickable link. NOTE: This feature is ';
	$tooltip .= 'disabled if you have both a slide link AND a popup link for a slide.';
	$tt_style = 'margin:0px 0px -3px 5px; cursor:help;';
	echo "<em class='sa_tooltip' style='" . esc_attr( $tt_style ) . "' title='" . esc_attr( $tooltip ) . "'></em>";
	echo "</div>\n";

	// ##### OTHER SETTINGS #####

	echo "<h4 style='margin-top:10px !important;'>Other Settings:</h4>";

	// FETCH OTHER SETTINGS POST META.
	$other_settings = get_post_meta( $post->ID, 'sa_other_settings', true );
	if ( '' !== $other_settings ) {
		$other_settings_arr = explode( '|', $other_settings );
	}
	// setting 1 - sa_window_onload.
	if ( isset( $other_settings_arr ) && ( '' !== $other_settings_arr[0] ) ) {
		$window_onload = $other_settings_arr[0];
	} else {
		$window_onload = get_post_meta( $post->ID, 'sa_window_onload', true );
		if ( '' === $window_onload ) {
			$window_onload = '0';
		}
	}
	// setting 2 - sa_strip_javascript.
	if ( isset( $other_settings_arr ) && ( '' !== $other_settings_arr[1] ) ) {
		$strip_javascript = $other_settings_arr[1];
	} else {
		$strip_javascript = get_post_meta( $post->ID, 'sa_strip_javascript', true );
		if ( '' === $strip_javascript ) {
			$strip_javascript = '0';
		}
	}
	// setting 3 - sa_lazy_load_images.
	if ( isset( $other_settings_arr ) && ( '' !== $other_settings_arr[2] ) ) {
		$lazy_load_images = $other_settings_arr[2];
	} else {
		$lazy_load_images = get_post_meta( $post->ID, 'sa_lazy_load_images', true );
		if ( '' === $lazy_load_images ) {
			$lazy_load_images = '0';
		}
	}
	// setting 4 - sa_ulli_containers.
	if ( isset( $other_settings_arr ) && ( '' !== $other_settings_arr[3] ) ) {
		$ulli_containers = $other_settings_arr[3];
	} else {
		$ulli_containers = get_post_meta( $post->ID, 'sa_ulli_containers', true );
		if ( '' === $ulli_containers ) {
			$ulli_containers = '0';
		}
	}
	// setting 5 - sa_rtl_slider.
	if ( isset( $other_settings_arr ) && ( '' !== $other_settings_arr[4] ) ) {
		$rtl_slider = $other_settings_arr[4];
	} else {
		$rtl_slider = '0';
	}
	// setting 7 - bg_image_size.
	$bg_image_size = 'full';
	if ( isset( $other_settings_arr ) && ( count( $other_settings_arr ) > 6 ) ) {
		if ( '' !== $other_settings_arr[6] ) {
			$bg_image_size = $other_settings_arr[6];
		}
	}
	// setting 8 - sa_disable_slide_ids.
	if ( isset( $other_settings_arr ) && ( count( $other_settings_arr ) > 7 ) ) {
		$disable_slide_ids = $other_settings_arr[7];
	} else {
		$disable_slide_ids = '0';
	}

	// USE 'DOMContentLoaded' EVENT (checkbox).
	$tooltip  = 'Load the Slide Anything JavaScript during the DOMContentLoaded event. Use this option if jQuery ';
	$tooltip .= 'is loading in your theme footer and you are getting the JavaScript error message ';
	$tooltip .= '&quot;Uncaught ReferenceError: jQuery is not defined&quot;.';
	echo "<div class='sa_window_onload_line'>";
	echo "<span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></span><span style='min-width:160px;'>DOMContentLoaded event:</span>";
	if ( '1' === $window_onload ) {
		echo "<input type='checkbox' id='sa_window_onload' name='sa_window_onload' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_window_onload' name='sa_window_onload' value='1'/>";
	}
	echo "</div>\n";

	echo "<div style='display:none !important;'>";
	echo "<input type='checkbox' id='sa_lazy_load_images' name='sa_lazy_load_images' value='0'/>";
	echo "</div>\n";

	// Use UL and LI Containers.
	$tooltip = 'Use &quot;UL&quot; as the DOM element for &quot;owl-stage&quot; and use &quot;LI&quot; as the DOM elements for &quot;owl-item&quot;.';
	echo "<div class='sa_window_onload_line'>";
	echo "<span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></span><span style='min-width:160px;'>Use UL and LI Containers:</span>";
	if ( '1' === $ulli_containers ) {
		echo "<input type='checkbox' id='sa_ulli_containers' name='sa_ulli_containers' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_ulli_containers' name='sa_ulli_containers' value='1'/>";
	}
	echo "</div>\n";

	// Right to Left Slider.
	$tooltip = 'Change the direction of the slider to be right to left.';
	echo "<div class='sa_window_onload_line'>";
	echo "<span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></span><span style='min-width:160px;'>Right to Left Slider:</span>";
	if ( '1' === $rtl_slider ) {
		echo "<input type='checkbox' id='sa_rtl_slider' name='sa_rtl_slider' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_rtl_slider' name='sa_rtl_slider' value='1'/>";
	}
	echo "</div>\n";

	// Don't use Slide IDs.
	$tooltip = 'Do not use a unique CSS ID to identify each slide container - use a unique CSS Class instead.';
	echo "<div class='sa_window_onload_line'>";
	echo "<span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></span><span style='min-width:160px;'>Don't use CSS IDs for slides:</span>";
	if ( '1' === $disable_slide_ids ) {
		echo "<input type='checkbox' id='sa_disable_slide_ids' name='sa_disable_slide_ids' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_disable_slide_ids' name='sa_disable_slide_ids' value='1'/>";
	}
	echo "</div>\n";

	// Start Position.
	$num_slides = intval( get_post_meta( $post->ID, 'sa_num_slides', true ) );
	if ( '' === $num_slides ) {
		$start_pos = 1;
	} else {
		$start_pos = intval( get_post_meta( $post->ID, 'sa_start_pos', true ) );
		if ( '' === $start_pos ) {
			$start_pos = 1;
		}
		$tooltip = 'Which slide number to start display first';
		echo "<div class='sa_window_onload_line'>";
		echo "<span class='sa_tooltip' title='" . esc_attr( $tooltip ) . "'></span><span style='min-width:160px;'>Starting Slide Number:</span>";
		echo "<select name='sa_start_pos'>";
		for ( $i = 1; $i <= $num_slides; $i++ ) {
			if ( $i === $start_pos ) {
				echo "<option value='" . esc_attr( $i ) . "' selected>" . esc_html( $i ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $i ) . "'>" . esc_html( $i ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";
	}

	// SLIDE BACKGROUND IMAGE SIZE.
	global $_wp_additional_image_sizes;
	$image_size_arr = array();
	// get WordPress image size data and save into and array.
	$image_size_arr[0]['value'] = 'full';
	$image_size_arr[0]['desc']  = 'Full Size';
	$count                      = 1;
	foreach ( get_intermediate_image_sizes() as $image_size ) {
		if ( in_array( $image_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
			$width  = get_option( "{$image_size}_size_w" );
			$height = get_option( "{$image_size}_size_h" );
		} elseif ( isset( $_wp_additional_image_sizes[ $image_size ] ) ) {
			$width  = $_wp_additional_image_sizes[ $image_size ]['width'];
			$height = $_wp_additional_image_sizes[ $image_size ]['height'];
		}
		if ( ( 0 !== $width ) && ( 0 !== $height ) ) {
			$image_size_arr[ $count ]['value'] = $image_size;
			$image_size_arr[ $count ]['desc']  = $image_size . ' (' . $width . '&times;' . $height . ')';
			$count++;
		}
	}
	// display the dropdown input box allowing user to select background image size.
	$tooltip = 'Allows you to set the WordPress image size to use for your slide background images.';
	echo "<div class='bg_image_size_wrapper'>\n<div>\n";
	echo "<em class='sa_tooltip' href='' title='" . esc_attr( $tooltip ) . "'></em>";
	echo '<span>Background Image Size:</span>';
	echo "<div style='float:none; clear:both; width:100%; height:1px; padding:0px !important;'></div>\n</div>\n";
	echo "<select name='bg_image_size'>";
	$tot_size_arr = count( $image_size_arr );
	for ( $j = 0; $j < $tot_size_arr; $j++ ) {
		if ( $bg_image_size === $image_size_arr[ $j ]['value'] ) {
			echo "<option value='" . esc_attr( $image_size_arr[ $j ]['value'] ) . "' selected>" . esc_html( $image_size_arr[ $j ]['desc'] ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $image_size_arr[ $j ]['value'] ) . "'>" . esc_html( $image_size_arr[ $j ]['desc'] ) . '</option>';
		}
	}
	echo "</select>\n";
	echo "</div>\n"; // .bg_image_size_wrapper

	echo "</div>\n";
}



/**
 * ##### META BOX CONTENT - 'Thumbnails (Pagination)' BOX #####
 *
 * @param array $post Custom Post 'sa_slider'.
 */
function cpt_slider_thumbs_content( $post ) {
	// get WordPress image size data and save into and array.
	global $_wp_additional_image_sizes;
	$image_size_arr = array();
	$count          = 0;
	foreach ( get_intermediate_image_sizes() as $image_size ) {
		if ( in_array( $image_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
			$width  = get_option( "{$image_size}_size_w" );
			$height = get_option( "{$image_size}_size_h" );
		} elseif ( isset( $_wp_additional_image_sizes[ $image_size ] ) ) {
			$width  = $_wp_additional_image_sizes[ $image_size ]['width'];
			$height = $_wp_additional_image_sizes[ $image_size ]['height'];
		}
		if ( ( 0 !== $width ) && ( 0 !== $height ) ) {
			$image_size_arr[ $count ]['value'] = $image_size;
			$image_size_arr[ $count ]['desc']  = $image_size . ' (' . $width . '&times;' . $height . ')';
			$count++;
		}
	}

	// Use thumbnail pagination (checkbox).
	$thumbs_active = get_post_meta( $post->ID, 'sa_thumbs_active', true );
	if ( '' === $thumbs_active ) {
		$thumbs_active = '0';
	}
	echo "<div class='sa_thumbs_line'><span>Use Thumbnail Pagination:</span>";
	if ( '1' === $thumbs_active ) {
		echo "<input type='checkbox' id='sa_thumbs_active' name='sa_thumbs_active' value='1' checked/>";
	} else {
		echo "<input type='checkbox' id='sa_thumbs_active' name='sa_thumbs_active' value='1'/>";
	}
	echo "</div>\n";

	if ( '1' === $thumbs_active ) {
		echo "<div id='sa_thumbs_settings' style='display:block;'>\n";
	} else {
		echo "<div id='sa_thumbs_settings' style='display:none;'>\n";
	}

	// Thumbs Location (dropdown).
	$thumbs_location = get_post_meta( $post->ID, 'sa_thumbs_location', true );
	if ( '' === $thumbs_location ) {
		$thumbs_location = 'inside_bottom';
	}
	echo "<div class='sa_thumbs_line'><span>Thumbs Location:</span>";
	echo "<select id='sa_thumbs_location' name='sa_thumbs_location'>";
	$option_arr    = array();
	$option_arr[0] = 'Inside Bottom';
	$option_arr[1] = 'Inside Top';
	$option_arr[2] = 'Inside Left';
	$option_arr[3] = 'Inside Right';
	$option_arr[4] = 'Outside Bottom';
	$tot_opt       = count( $option_arr );
	for ( $i = 0; $i < $tot_opt; $i++ ) {
		$value = strtolower( str_replace( ' ', '_', $option_arr[ $i ] ) );
		if ( $value === $thumbs_location ) {
			echo "<option value='" . esc_attr( $value ) . "' selected>" . esc_html( $option_arr[ $i ] ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $value ) . "'>" . esc_html( $option_arr[ $i ] ) . '</option>';
		}
	}
	echo "</select></div>\n";

	// Thumbnail Image Size (dropdown).
	$thumbs_image_size = get_post_meta( $post->ID, 'sa_thumbs_image_size', true );
	if ( '' === $thumbs_image_size ) {
		$thumbs_image_size = 'thumbnail';
	}
	echo "<div class='sa_thumbs_line'><span>Thumbnail Image Size:</span>";
	echo "<select id='sa_thumbs_image_size' name='sa_thumbs_image_size'>";
	$tot_img_arr = count( $image_size_arr );
	for ( $i = 0; $i < $tot_img_arr; $i++ ) {
		if ( $image_size_arr[ $i ]['value'] === $thumbs_image_size ) {
			echo "<option value='" . esc_attr( $image_size_arr[ $i ]['value'] ) . "' selected>" . esc_html( $image_size_arr[ $i ]['desc'] ) . '</option>';
		} else {
			echo "<option value='" . esc_attr( $image_size_arr[ $i ]['value'] ) . "'>" . esc_html( $image_size_arr[ $i ]['desc'] ) . '</option>';
		}
	}
	echo "</select></div>\n";

	// Container Padding.
	$thumbs_padding = get_post_meta( $post->ID, 'sa_thumbs_padding', true );
	if ( '' === $thumbs_padding ) {
		$thumbs_padding = '3';
	}
	echo "<div class='sa_thumbs_line'><span>Container Padding:</span>";
	echo "<input type='text' id='sa_thumbs_padding' name='sa_thumbs_padding' value='" . esc_attr( $thumbs_padding ) . "'><em>%</em>";
	echo "</div>\n";

	// Thumbs Width.
	$thumbs_width = get_post_meta( $post->ID, 'sa_thumbs_width', true );
	if ( '' === $thumbs_width ) {
		$thumbs_width = '150';
	}
	echo "<div class='sa_thumbs_line'><span>Thumbs Width:</span>";
	echo "<input type='text' id='sa_thumbs_width' name='sa_thumbs_width' value='" . esc_attr( $thumbs_width ) . "'><em>px</em>";
	echo "</div>\n";

	// Thumbs Height.
	$thumbs_height = get_post_meta( $post->ID, 'sa_thumbs_height', true );
	if ( '' === $thumbs_height ) {
		$thumbs_height = '85';
	}
	echo "<div class='sa_thumbs_line'><span>Thumbs Height:</span>";
	echo "<input type='text' id='sa_thumbs_height' name='sa_thumbs_height' value='" . esc_attr( $thumbs_height ) . "'><em>px</em>";
	echo "</div>\n";

	// Thumbs Opacity.
	$thumbs_opacity = get_post_meta( $post->ID, 'sa_thumbs_opacity', true );
	if ( '' === $thumbs_opacity ) {
		$thumbs_opacity = '50';
	}
	echo "<div class='sa_thumbs_line'><span>Thumbs Opacity:</span>";
	echo "<input type='text' id='sa_thumbs_opacity' name='sa_thumbs_opacity' value='" . esc_attr( $thumbs_opacity ) . "'><em>%</em>";
	echo "</div>\n";

	echo '<h4>Active Thumb Border Style</h4>';

	// Border Width.
	$thumbs_border_width = get_post_meta( $post->ID, 'sa_thumbs_border_width', true );
	if ( '' === $thumbs_border_width ) {
		$thumbs_border_width = '0';
	}
	echo "<div class='sa_thumbs_line'><span>Border Width:</span>";
	echo "<input type='text' id='sa_thumbs_border_width' name='sa_thumbs_border_width' value='" . esc_attr( $thumbs_border_width ) . "'><em>px</em>";
	echo "</div>\n";

	// Border Color.
	$thumbs_border_color = get_post_meta( $post->ID, 'sa_thumbs_border_color', true );
	if ( '' === $thumbs_border_color ) {
		$thumbs_border_color = '#ffffff';
	}
	echo "<div class='sa_thumbs_line'><span>Border Color:</span>";
	echo "<input type='text' id='sa_thumbs_border_color' name='sa_thumbs_border_color' value='" . esc_attr( $thumbs_border_color ) . "'></div>\n";

	echo '<h4>Responsive Thumb Sizes</h4>';

	// Tablet Thumb Size.
	$thumbs_resp_tablet = get_post_meta( $post->ID, 'sa_thumbs_resp_tablet', true );
	if ( '' === $thumbs_resp_tablet ) {
		$thumbs_resp_tablet = '75';
	}
	echo "<div class='sa_thumbs_line'><span>Tablet Thumb Size:</span>";
	echo "<input type='text' id='sa_thumbs_resp_tablet' name='sa_thumbs_resp_tablet' value='" . esc_attr( $thumbs_resp_tablet ) . "'><em>%</em>";
	echo "</div>\n";

	// Mobile Thumb Size.
	$thumbs_resp_mobile = get_post_meta( $post->ID, 'sa_thumbs_resp_mobile', true );
	if ( '' === $thumbs_resp_mobile ) {
		$thumbs_resp_mobile = '50';
	}
	echo "<div class='sa_thumbs_line'><span>Mobile Thumb Size:</span>";
	echo "<input type='text' id='sa_thumbs_resp_mobile' name='sa_thumbs_resp_mobile' value='" . esc_attr( $thumbs_resp_mobile ) . "'><em>%</em>";
	echo "</div>\n";

	echo "</div>\n"; // #sa_thumbs_settings
}



/**
 * // ##### ACTION HOOK - SAVE CUSTOM POST TYPE ('Slide Anything') DATA #####
 */
function cpt_slider_save_postdata() {
	global $post;

	// ### REMOVE XSS ATTACK VULNERABILITY FROM SLIDER POST TITLES ###
	global $wpdb;
	if ( isset( $post->ID ) && ( '' !== $post->ID ) ) {
		$post_title     = get_the_title( $post->ID );
		$sanitize_title = sanitize_text_field( $post_title );
		$where          = array( 'ID' => $post->ID );
		$wpdb->update( $wpdb->posts, array( 'post_title' => $sanitize_title ), $where ); // db call ok; no-cache ok.
	}

	// ### VERIFY 1) LOGGED-IN USER IS ADMINISTRATOR AND 2) VALID NONCE TO PREVENT CSRF HACKER ATTACKS ###
	if ( current_user_can( 'edit_pages' ) &&
		isset( $_POST['nonce_save_slider'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce_save_slider'] ) ), basename( __FILE__ ) ) ) {
		if ( isset( $_POST['sa_num_slides'] ) ) {
			$total_slides = intval( $_POST['sa_num_slides'] );
		} else {
			$total_slides = 1;
		}
		if ( isset( $_POST['sa_duplicate_slide'] ) ) {
			if ( ( '' === $_POST['sa_duplicate_slide'] ) || ( '0' === $_POST['sa_duplicate_slide'] ) ) {
				$duplicate_slide = 0;
			} else {
				// A SLIDE NEEDS TO BE DUPLICATED.
				$duplicate_slide = intval( $_POST['sa_duplicate_slide'] );
			}
		} else {
			$duplicate_slide = 0;
		}
		if ( isset( $_POST['sa_move_slide_up'] ) ) {
			if ( ( '' === $_POST['sa_move_slide_up'] ) || ( '0' === $_POST['sa_move_slide_up'] ) ) {
				$move_slide_up = 0;
			} else {
				// A SLIDE NEEDS TO BE MOVED.
				$move_slide_up = intval( $_POST['sa_move_slide_up'] );
			}
		} else {
			$move_slide_up = 0;
		}

		// UPDATE CONTENT FOR EACH SLIDE.
		$slides_saved = 0;
		for ( $i = 1; $i <= $total_slides; $i++ ) {
			$slide_edit_id          = 'sa_slide' . $i . '_content';
			$slide_image_id         = 'sa_slide' . $i . '_image_id';
			$slide_image_pos        = 'sa_slide' . $i . '_image_pos';
			$slide_image_size       = 'sa_slide' . $i . '_image_size';
			$slide_image_repeat     = 'sa_slide' . $i . '_image_repeat';
			$slide_image_color      = 'sa_slide' . $i . '_image_color';
			$slide_link_url         = 'sa_slide' . $i . '_link_url';
			$slide_link_target      = 'sa_slide' . $i . '_link_target';
			$slide_popup_type       = 'sa_slide' . $i . '_popup_type';
			$slide_popup_imageid    = 'sa_slide' . $i . '_popup_imageid';
			$slide_popup_imagetitle = 'sa_slide' . $i . '_popup_imagetitle';
			$slide_popup_video_id   = 'sa_slide' . $i . '_popup_video_id';
			$slide_popup_video_type = 'sa_slide' . $i . '_popup_video_type';
			$slide_popup_background = 'sa_slide' . $i . '_popup_background';
			$slide_popup_html       = 'sa_slide' . $i . '_popup_html';
			$slide_popup_shortcode  = 'sa_slide' . $i . '_popup_shortcode';
			$slide_popup_bgcol      = 'sa_slide' . $i . '_popup_bgcol';
			$slide_popup_width      = 'sa_slide' . $i . '_popup_width';
			$slide_content          = '';
			$slide_image_id_val     = 0;
			$slide_image_pos_val    = '';
			$slide_image_size_val   = '';
			$slide_image_repeat_val = '';
			$slide_image_color_val  = '';
			$slide_link_url_val     = '';
			$slide_link_target_val  = '';
			if ( isset( $_POST[ $slide_edit_id ] ) && ( '' !== $_POST[ $slide_edit_id ] ) ) {
				$slide_content = wp_kses_post( wp_unslash( $_POST[ $slide_edit_id ] ) );
			}
			if ( isset( $_POST[ $slide_image_id ] ) ) {
				$slide_image_id_val = abs( intval( $_POST[ $slide_image_id ] ) );
			}
			if ( isset( $_POST[ $slide_image_pos ] ) ) {
				$slide_image_pos_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_pos ] ) );
			}
			if ( isset( $_POST[ $slide_image_size ] ) ) {
				$slide_image_size_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_size ] ) );
			}
			if ( isset( $_POST[ $slide_image_repeat ] ) ) {
				$slide_image_repeat_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_repeat ] ) );
			}
			if ( isset( $_POST[ $slide_image_color ] ) ) {
				$slide_image_color_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_color ] ) );
			}
			if ( isset( $_POST[ $slide_link_url ] ) ) {
				$slide_link_url_val = sanitize_text_field( wp_unslash( $_POST[ $slide_link_url ] ) );
			}
			if ( isset( $_POST[ $slide_link_target ] ) ) {
				$slide_link_target_val = sanitize_text_field( wp_unslash( $_POST[ $slide_link_target ] ) );
			}
			$slide_popup_type_val       = '';
			$slide_popup_imageid_val    = 0;
			$slide_popup_imagetitle_val = '';
			$slide_popup_video_id_val   = '';
			$slide_popup_video_type_val = '';
			$slide_popup_background_val = '';
			$slide_popup_html_val       = '';
			$slide_popup_shortcode_val  = '';
			$slide_popup_bgcol_val      = '';
			$slide_popup_width_val      = 0;
			if ( isset( $_POST[ $slide_popup_type ] ) ) {
				$slide_popup_type_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_type ] ) );
			}
			if ( isset( $_POST[ $slide_popup_imageid ] ) ) {
				$slide_popup_imageid_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_imageid ] ) );
			}
			if ( isset( $_POST[ $slide_popup_imagetitle ] ) ) {
				$slide_popup_imagetitle_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_imagetitle ] ) );
			}
			if ( isset( $_POST[ $slide_popup_video_id ] ) ) {
				$slide_popup_video_id_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_video_id ] ) );
			}
			if ( isset( $_POST[ $slide_popup_video_type ] ) ) {
				$slide_popup_video_type_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_video_type ] ) );
			}
			if ( isset( $_POST[ $slide_popup_background ] ) ) {
				$slide_popup_background_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_background ] ) );
			}
			if ( isset( $_POST[ $slide_popup_html ] ) ) {
				$slide_popup_html_val = balanceTags( wp_kses_post( wp_unslash( $_POST[ $slide_popup_html ] ) ), true );
			}
			if ( isset( $_POST[ $slide_popup_shortcode ] ) ) {
				$slide_popup_shortcode_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_shortcode ] ) );
			}
			if ( isset( $_POST[ $slide_popup_bgcol ] ) ) {
				$slide_popup_bgcol_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_bgcol ] ) );
			}
			if ( isset( $_POST[ $slide_popup_width ] ) ) {
				$slide_popup_width_val = abs( intval( $_POST[ $slide_popup_width ] ) );
			}
			// check delete status for slide.
			$del_status_id = 'sa_slide' . $i . '_delete';
			if ( isset( $_POST[ $del_status_id ] ) && ( '' !== $_POST[ $del_status_id ] ) ) {
				$del_status = sanitize_text_field( wp_unslash( $_POST[ $del_status_id ] ) );
			} else {
				// a new slide has been added.
				$del_status    = '1';
				$slide_content = '';
			}
			if ( '1' === $del_status ) {
				// save slide content only if slide has not been marked for deletion.
				$slides_saved++;
				$slide_edit_id_save           = 'sa_slide' . $slides_saved . '_content';
				$slide_image_data_saved       = 'sa_slide' . $slides_saved . '_image_data';
				$slide_link_url_saved         = 'sa_slide' . $slides_saved . '_link_url';
				$slide_link_target_saved      = 'sa_slide' . $slides_saved . '_link_target';
				$slide_popup_type_saved       = 'sa_slide' . $slides_saved . '_popup_type';
				$slide_popup_imageid_saved    = 'sa_slide' . $slides_saved . '_popup_imageid';
				$slide_popup_imagetitle_saved = 'sa_slide' . $slides_saved . '_popup_imagetitle';
				$slide_popup_video_id_saved   = 'sa_slide' . $slides_saved . '_popup_video_id';
				$slide_popup_video_type_saved = 'sa_slide' . $slides_saved . '_popup_video_type';
				$slide_popup_background_saved = 'sa_slide' . $slides_saved . '_popup_background';
				$slide_popup_html_saved       = 'sa_slide' . $slides_saved . '_popup_html';
				$slide_popup_shortcode_saved  = 'sa_slide' . $slides_saved . '_popup_shortcode';
				$slide_popup_bgcol_saved      = 'sa_slide' . $slides_saved . '_popup_bgcol';
				$slide_popup_width_saved      = 'sa_slide' . $slides_saved . '_popup_width';
				update_post_meta( $post->ID, $slide_edit_id_save, $slide_content );
				$slide_image_data_val = $slide_image_id_val . '~' . $slide_image_pos_val . '~' . $slide_image_size_val . '~' . $slide_image_repeat_val . '~' . $slide_image_color_val;
				update_post_meta( $post->ID, $slide_image_data_saved, $slide_image_data_val );
				update_post_meta( $post->ID, $slide_link_url_saved, $slide_link_url_val );
				update_post_meta( $post->ID, $slide_link_target_saved, $slide_link_target_val );
				update_post_meta( $post->ID, $slide_popup_type_saved, $slide_popup_type_val );
				update_post_meta( $post->ID, $slide_popup_imageid_saved, $slide_popup_imageid_val );
				update_post_meta( $post->ID, $slide_popup_imagetitle_saved, $slide_popup_imagetitle_val );
				update_post_meta( $post->ID, $slide_popup_video_id_saved, $slide_popup_video_id_val );
				update_post_meta( $post->ID, $slide_popup_video_type_saved, $slide_popup_video_type_val );
				update_post_meta( $post->ID, $slide_popup_background_saved, $slide_popup_background_val );
				update_post_meta( $post->ID, $slide_popup_html_saved, $slide_popup_html_val );
				update_post_meta( $post->ID, $slide_popup_shortcode_saved, $slide_popup_shortcode_val );
				update_post_meta( $post->ID, $slide_popup_bgcol_saved, $slide_popup_bgcol_val );
				update_post_meta( $post->ID, $slide_popup_width_saved, $slide_popup_width_val );
				if ( $i === $duplicate_slide ) {
					// the 'duplicate slide' button has been click for this slide - create a new slide that is an exact copy of previous slide.
					$slides_saved++;
					$slide_edit_id_save           = 'sa_slide' . $slides_saved . '_content';
					$slide_image_data_saved       = 'sa_slide' . $slides_saved . '_image_data';
					$slide_link_url_saved         = 'sa_slide' . $slides_saved . '_link_url';
					$slide_link_target_saved      = 'sa_slide' . $slides_saved . '_link_target';
					$slide_popup_type_saved       = 'sa_slide' . $slides_saved . '_popup_type';
					$slide_popup_imageid_saved    = 'sa_slide' . $slides_saved . '_popup_imageid';
					$slide_popup_imagetitle_saved = 'sa_slide' . $slides_saved . '_popup_imagetitle';
					$slide_popup_video_id_saved   = 'sa_slide' . $slides_saved . '_popup_video_id';
					$slide_popup_video_type_saved = 'sa_slide' . $slides_saved . '_popup_video_type';
					$slide_popup_background_saved = 'sa_slide' . $slides_saved . '_popup_background';
					$slide_popup_html_saved       = 'sa_slide' . $slides_saved . '_popup_html';
					$slide_popup_shortcode_saved  = 'sa_slide' . $slides_saved . '_popup_shortcode';
					$slide_popup_bgcol_saved      = 'sa_slide' . $slides_saved . '_popup_bgcol';
					$slide_popup_width_saved      = 'sa_slide' . $slides_saved . '_popup_width';
					update_post_meta( $post->ID, $slide_edit_id_save, $slide_content );
					$slide_image_data_val = $slide_image_id_val . '~' . $slide_image_pos_val . '~' . $slide_image_size_val . '~' . $slide_image_repeat_val . '~' . $slide_image_color_val;
					update_post_meta( $post->ID, $slide_image_data_saved, $slide_image_data_val );
					update_post_meta( $post->ID, $slide_link_url_saved, $slide_link_url_val );
					update_post_meta( $post->ID, $slide_link_target_saved, $slide_link_target_val );
					update_post_meta( $post->ID, $slide_popup_type_saved, $slide_popup_type_val );
					update_post_meta( $post->ID, $slide_popup_imageid_saved, $slide_popup_imageid_val );
					update_post_meta( $post->ID, $slide_popup_imagetitle_saved, $slide_popup_imagetitle_val );
					update_post_meta( $post->ID, $slide_popup_video_id_saved, $slide_popup_video_id_val );
					update_post_meta( $post->ID, $slide_popup_video_type_saved, $slide_popup_video_type_val );
					update_post_meta( $post->ID, $slide_popup_background_saved, $slide_popup_background_val );
					update_post_meta( $post->ID, $slide_popup_html_saved, $slide_popup_html_val );
					update_post_meta( $post->ID, $slide_popup_shortcode_saved, $slide_popup_shortcode_val );
					update_post_meta( $post->ID, $slide_popup_bgcol_saved, $slide_popup_bgcol_val );
					update_post_meta( $post->ID, $slide_popup_width_saved, $slide_popup_width_val );
				}
			}
		}

		if ( 0 !== $move_slide_up ) {
			// A SLIDE NEEDS TO BE MOVED (TWO SLIDES ARE SWAPPED).
			$slide2              = $move_slide_up;
			$slide1              = intval( $move_slide_up ) - 1;
			$slide1_content      = '';
			$slide1_image_id     = 0;
			$slide1_image_pos    = '';
			$slide1_image_size   = '';
			$slide1_image_repeat = '';
			$slide1_image_color  = '';
			$slide1_link_url     = '';
			$slide1_link_target  = '';
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_content' ] ) ) {
				$slide1_content = wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_content' ] ) );
				// $slide1_content = balanceTags( sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_content' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_id' ] ) ) {
				$slide1_image_id = abs( intval( $_POST[ 'sa_slide' . $slide1 . '_image_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_pos' ] ) ) {
				$slide1_image_pos = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_pos' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_size' ] ) ) {
				$slide1_image_size = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_size' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_repeat' ] ) ) {
				$slide1_image_repeat = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_repeat' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_color' ] ) ) {
				$slide1_image_color = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_color' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_link_url' ] ) ) {
				$slide1_link_url = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_link_url' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_link_target' ] ) ) {
				$slide1_link_target = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_link_target' ] ) );
			}
			$slide1_popup_type       = '';
			$slide1_popup_imageid    = '';
			$slide1_popup_imagetitle = '';
			$slide1_popup_video_id   = '';
			$slide1_popup_video_type = '';
			$slide1_popup_background = '';
			$slide1_popup_html       = '';
			$slide1_popup_shortcode  = '';
			$slide1_popup_bgcol      = '';
			$slide1_popup_width      = 0;
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_type' ] ) ) {
				$slide1_popup_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_imageid' ] ) ) {
				$slide1_popup_imageid = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_imageid' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_imagetitle' ] ) ) {
				$slide1_popup_imagetitle = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_imagetitle' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_video_id' ] ) ) {
				$slide1_popup_video_id = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_video_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_video_type' ] ) ) {
				$slide1_popup_video_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_video_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_background' ] ) ) {
				$slide1_popup_background = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_background' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_html' ] ) ) {
				$slide1_popup_html = balanceTags( wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_html' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_shortcode' ] ) ) {
				$slide1_popup_shortcode = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_shortcode' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_bgcol' ] ) ) {
				$slide1_popup_bgcol = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_bgcol' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_width' ] ) ) {
				$slide1_popup_width = abs( intval( $_POST[ 'sa_slide' . $slide1 . '_popup_width' ] ) );
			}
			$slide2_content      = '';
			$slide2_image_id     = 0;
			$slide2_image_pos    = '';
			$slide2_image_size   = '';
			$slide2_image_repeat = '';
			$slide2_image_color  = '';
			$slide2_link_url     = '';
			$slide2_link_target  = '';
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_content' ] ) ) {
				$slide2_content = wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_content' ] ) );
				// $slide2_content = balanceTags( sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_content' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_id' ] ) ) {
				$slide2_image_id = abs( intval( $_POST[ 'sa_slide' . $slide2 . '_image_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_pos' ] ) ) {
				$slide2_image_pos = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_pos' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_size' ] ) ) {
				$slide2_image_size = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_size' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_repeat' ] ) ) {
				$slide2_image_repeat = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_repeat' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_color' ] ) ) {
				$slide2_image_color = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_color' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_link_url' ] ) ) {
				$slide2_link_url = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_link_url' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_link_target' ] ) ) {
				$slide2_link_target = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_link_target' ] ) );
			}
			$slide2_popup_type       = '';
			$slide2_popup_imageid    = '';
			$slide2_popup_imagetitle = '';
			$slide2_popup_video_id   = '';
			$slide2_popup_video_type = '';
			$slide2_popup_background = '';
			$slide2_popup_html       = '';
			$slide2_popup_shortcode  = '';
			$slide2_popup_bgcol      = '';
			$slide2_popup_width      = 0;
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_type' ] ) ) {
				$slide2_popup_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_imageid' ] ) ) {
				$slide2_popup_imageid = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_imageid' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_imagetitle' ] ) ) {
				$slide2_popup_imagetitle = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_imagetitle' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_video_id' ] ) ) {
				$slide2_popup_video_id = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_video_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_video_type' ] ) ) {
				$slide2_popup_video_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_video_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_background' ] ) ) {
				$slide2_popup_background = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_background' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_html' ] ) ) {
				$slide2_popup_html = balanceTags( wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_html' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_shortcode' ] ) ) {
				$slide2_popup_shortcode = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_shortcode' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_bgcol' ] ) ) {
				$slide2_popup_bgcol = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_bgcol' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_width' ] ) ) {
				$slide2_popup_width = abs( intval( $_POST[ 'sa_slide' . $slide2 . '_popup_width' ] ) );
			}
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_content', $slide1_content );
			$slide1_image_data = $slide1_image_id . '~' . $slide1_image_pos . '~' . $slide1_image_size . '~' . $slide1_image_repeat . '~' . $slide1_image_color;
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_image_data', $slide1_image_data );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_link_url', $slide1_link_url );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_link_target', $slide1_link_target );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_type', $slide1_popup_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_imageid', $slide1_popup_imageid );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_imagetitle', $slide1_popup_imagetitle );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_video_id', $slide1_popup_video_id );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_video_type', $slide1_popup_video_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_background', $slide1_popup_background );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_html', $slide1_popup_html );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_shortcode', $slide1_popup_shortcode );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_bgcol', $slide1_popup_bgcol );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_width', $slide1_popup_width );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_content', $slide2_content );
			$slide2_image_data = $slide2_image_id . '~' . $slide2_image_pos . '~' . $slide2_image_size . '~' . $slide2_image_repeat . '~' . $slide2_image_color;
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_image_data', $slide2_image_data );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_link_url', $slide2_link_url );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_link_target', $slide2_link_target );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_type', $slide2_popup_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_imageid', $slide2_popup_imageid );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_imagetitle', $slide2_popup_imagetitle );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_video_id', $slide2_popup_video_id );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_video_type', $slide2_popup_video_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_background', $slide2_popup_background );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_html', $slide2_popup_html );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_shortcode', $slide2_popup_shortcode );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_bgcol', $slide2_popup_bgcol );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_width', $slide2_popup_width );
		}

		// UPDATE SLIDE CONTENT CHARACTER COUNT.
		$total_slides = get_post_meta( $post->ID, 'sa_num_slides', true );
		for ( $i = 1; $i <= $total_slides; $i++ ) {
			$slide_content = get_post_meta( $post->ID, 'sa_slide' . $i . '_content', true );
			$char_count    = strlen( $slide_content );
			update_post_meta( $post->ID, 'sa_slide' . $i . '_char_count', $char_count );
		}

		// UPDATE SLIDER SETTINGS.
		update_post_meta( $post->ID, 'sa_num_slides', abs( intval( $slides_saved ) ) );
		if ( isset( $_POST['sa_disable_visual_editor'] ) && ( '1' === $_POST['sa_disable_visual_editor'] ) ) {
			update_post_meta( $post->ID, 'sa_disable_visual_editor', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_disable_visual_editor', '0' );
		}
		if ( isset( $_POST['sa_info_added'] ) ) {
			update_post_meta( $post->ID, 'sa_info_added', abs( intval( $_POST['sa_info_added'] ) ) );
		}
		if ( isset( $_POST['sa_info_deleted'] ) ) {
			update_post_meta( $post->ID, 'sa_info_deleted', abs( intval( $_POST['sa_info_deleted'] ) ) );
		}
		if ( isset( $_POST['sa_duplicate_slide'] ) ) {
			update_post_meta( $post->ID, 'sa_duplicate_slide', abs( intval( $_POST['sa_duplicate_slide'] ) ) );
		}
		if ( isset( $_POST['sa_info_duplicated'] ) ) {
			update_post_meta( $post->ID, 'sa_info_duplicated', abs( intval( $_POST['sa_info_duplicated'] ) ) );
		}
		if ( isset( $_POST['sa_move_slide_up'] ) ) {
			update_post_meta( $post->ID, 'sa_move_slide_up', abs( intval( $_POST['sa_move_slide_up'] ) ) );
		}
		if ( isset( $_POST['sa_info_moved'] ) ) {
			update_post_meta( $post->ID, 'sa_info_moved', abs( intval( $_POST['sa_info_moved'] ) ) );
		}
		if ( isset( $_POST['sa_slide_duration'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_duration', abs( floatval( $_POST['sa_slide_duration'] ) ) );
		}
		if ( isset( $_POST['sa_slide_transition'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_transition', abs( floatval( $_POST['sa_slide_transition'] ) ) );
		}
		if ( isset( $_POST['sa_slide_by'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_by', abs( floatval( $_POST['sa_slide_by'] ) ) );
		}
		if ( isset( $_POST['sa_loop_slider'] ) && ( '1' === $_POST['sa_loop_slider'] ) ) {
			update_post_meta( $post->ID, 'sa_loop_slider', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_loop_slider', '0' );
		}
		if ( isset( $_POST['sa_stop_hover'] ) && ( '1' === $_POST['sa_stop_hover'] ) ) {
			update_post_meta( $post->ID, 'sa_stop_hover', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_stop_hover', '0' );
		}
		if ( isset( $_POST['sa_nav_arrows'] ) && ( '1' === $_POST['sa_nav_arrows'] ) ) {
			update_post_meta( $post->ID, 'sa_nav_arrows', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_nav_arrows', '0' );
		}
		if ( isset( $_POST['sa_pagination'] ) && ( '1' === $_POST['sa_pagination'] ) ) {
			update_post_meta( $post->ID, 'sa_pagination', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_pagination', '0' );
		}
		if ( isset( $_POST['sa_random_order'] ) && ( '1' === $_POST['sa_random_order'] ) ) {
			update_post_meta( $post->ID, 'sa_random_order', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_random_order', '0' );
		}
		if ( isset( $_POST['sa_reverse_order'] ) && ( '1' === $_POST['sa_reverse_order'] ) ) {
			update_post_meta( $post->ID, 'sa_reverse_order', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_reverse_order', '0' );
		}
		if ( isset( $_POST['sa_shortcodes'] ) && ( '1' === $_POST['sa_shortcodes'] ) ) {
			update_post_meta( $post->ID, 'sa_shortcodes', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_shortcodes', '0' );
		}
		if ( isset( $_POST['sa_mouse_drag'] ) && ( '1' === $_POST['sa_mouse_drag'] ) ) {
			update_post_meta( $post->ID, 'sa_mouse_drag', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_mouse_drag', '0' );
		}
		if ( isset( $_POST['sa_touch_drag'] ) && ( '1' === $_POST['sa_touch_drag'] ) ) {
			update_post_meta( $post->ID, 'sa_touch_drag', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_touch_drag', '0' );
		}
		if ( isset( $_POST['sa_mousewheel'] ) && ( '1' === $_POST['sa_mousewheel'] ) ) {
			update_post_meta( $post->ID, 'sa_mousewheel', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_mousewheel', '0' );
		}
		if ( isset( $_POST['sa_click_advance'] ) && ( '1' === $_POST['sa_click_advance'] ) ) {
			update_post_meta( $post->ID, 'sa_click_advance', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_click_advance', '0' );
		}
		if ( isset( $_POST['sa_auto_height'] ) && ( '1' === $_POST['sa_auto_height'] ) ) {
			update_post_meta( $post->ID, 'sa_auto_height', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_auto_height', '0' );
		}
		if ( isset( $_POST['sa_vert_center'] ) && ( '1' === $_POST['sa_vert_center'] ) ) {
			update_post_meta( $post->ID, 'sa_vert_center', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_vert_center', '0' );
		}

		// UPDATE SLIDER ITEMS DISPLAYED.
		if ( isset( $_POST['sa_items_width1'] ) ) {
			update_post_meta( $post->ID, 'sa_items_width1', abs( intval( $_POST['sa_items_width1'] ) ) );
		}
		if ( isset( $_POST['sa_items_width2'] ) ) {
			update_post_meta( $post->ID, 'sa_items_width2', abs( intval( $_POST['sa_items_width2'] ) ) );
		}
		if ( isset( $_POST['sa_items_width3'] ) ) {
			update_post_meta( $post->ID, 'sa_items_width3', abs( intval( $_POST['sa_items_width3'] ) ) );
		}
		if ( isset( $_POST['sa_items_width4'] ) ) {
			update_post_meta( $post->ID, 'sa_items_width4', abs( intval( $_POST['sa_items_width4'] ) ) );
		}
		if ( isset( $_POST['sa_items_width5'] ) ) {
			update_post_meta( $post->ID, 'sa_items_width5', abs( intval( $_POST['sa_items_width5'] ) ) );
		}
		if ( isset( $_POST['sa_items_width6'] ) ) {
			update_post_meta( $post->ID, 'sa_items_width6', abs( intval( $_POST['sa_items_width6'] ) ) );
		}
		if ( isset( $_POST['sa_transition'] ) ) {
			update_post_meta( $post->ID, 'sa_transition', sanitize_text_field( wp_unslash( $_POST['sa_transition'] ) ) );
		}
		if ( isset( $_POST['sa_hero_slider'] ) && ( '1' === $_POST['sa_hero_slider'] ) ) {
			update_post_meta( $post->ID, 'sa_hero_slider', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_hero_slider', '0' );
		}
		if ( isset( $_POST['sa_showcase_slider'] ) && ( '1' === $_POST['sa_showcase_slider'] ) ) {
			update_post_meta( $post->ID, 'sa_showcase_slider', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_showcase_slider', '0' );
		}
		if ( isset( $_POST['sa_showcase_width'] ) ) {
			update_post_meta( $post->ID, 'sa_showcase_width', abs( intval( $_POST['sa_showcase_width'] ) ) );
		}
		if ( isset( $_POST['sa_showcase_tablet'] ) && ( '1' === $_POST['sa_showcase_tablet'] ) ) {
			update_post_meta( $post->ID, 'sa_showcase_tablet', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_showcase_tablet', '0' );
		}
		if ( isset( $_POST['sa_showcase_width_tab'] ) ) {
			update_post_meta( $post->ID, 'sa_showcase_width_tab', abs( intval( $_POST['sa_showcase_width_tab'] ) ) );
		}
		if ( isset( $_POST['sa_showcase_mobile'] ) && ( '1' === $_POST['sa_showcase_mobile'] ) ) {
			update_post_meta( $post->ID, 'sa_showcase_mobile', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_showcase_mobile', '0' );
		}
		if ( isset( $_POST['sa_showcase_width_mob'] ) ) {
			update_post_meta( $post->ID, 'sa_showcase_width_mob', abs( intval( $_POST['sa_showcase_width_mob'] ) ) );
		}

		// UPDATE SLIDER STYLE.
		if ( isset( $_POST['sa_css_id'] ) ) {
			$post_css_id = str_replace( '-', '_', sanitize_text_field( wp_unslash( $_POST['sa_css_id'] ) ) );
			update_post_meta( $post->ID, 'sa_css_id', sanitize_text_field( $post_css_id ) );
		}
		if ( isset( $_POST['sa_background_color'] ) ) {
			update_post_meta( $post->ID, 'sa_background_color', sanitize_text_field( wp_unslash( $_POST['sa_background_color'] ) ) );
		}
		if ( isset( $_POST['sa_border_width'] ) ) {
			update_post_meta( $post->ID, 'sa_border_width', abs( intval( $_POST['sa_border_width'] ) ) );
		}
		if ( isset( $_POST['sa_border_color'] ) ) {
			update_post_meta( $post->ID, 'sa_border_color', sanitize_text_field( wp_unslash( $_POST['sa_border_color'] ) ) );
		}
		if ( isset( $_POST['sa_border_radius'] ) ) {
			update_post_meta( $post->ID, 'sa_border_radius', abs( intval( $_POST['sa_border_radius'] ) ) );
		}
		if ( isset( $_POST['sa_wrapper_padd_top'] ) ) {
			update_post_meta( $post->ID, 'sa_wrapper_padd_top', abs( intval( $_POST['sa_wrapper_padd_top'] ) ) );
		}
		if ( isset( $_POST['sa_wrapper_padd_right'] ) ) {
			update_post_meta( $post->ID, 'sa_wrapper_padd_right', abs( intval( $_POST['sa_wrapper_padd_right'] ) ) );
		}
		if ( isset( $_POST['sa_wrapper_padd_bottom'] ) ) {
			update_post_meta( $post->ID, 'sa_wrapper_padd_bottom', abs( intval( $_POST['sa_wrapper_padd_bottom'] ) ) );
		}
		if ( isset( $_POST['sa_wrapper_padd_left'] ) ) {
			update_post_meta( $post->ID, 'sa_wrapper_padd_left', abs( intval( $_POST['sa_wrapper_padd_left'] ) ) );
		}
		if ( isset( $_POST['sa_slide_min_height_type'] ) && isset( $_POST['sa_slide_min_height'] ) ) {
			if ( 'px' === $_POST['sa_slide_min_height_type'] ) {
				update_post_meta( $post->ID, 'sa_slide_min_height_perc', sanitize_text_field( wp_unslash( $_POST['sa_slide_min_height'] ) ) . 'px' );
			} else {
				update_post_meta( $post->ID, 'sa_slide_min_height_perc', sanitize_text_field( wp_unslash( $_POST['sa_slide_min_height'] ) ) );
			}
		}
		if ( isset( $_POST['sa_slide_padding_tb'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_padding_tb', abs( floatval( $_POST['sa_slide_padding_tb'] ) ) );
		}
		if ( isset( $_POST['sa_slide_padding_lr'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_padding_lr', abs( floatval( $_POST['sa_slide_padding_lr'] ) ) );
		}
		if ( isset( $_POST['sa_slide_margin_lr'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_margin_lr', abs( floatval( $_POST['sa_slide_margin_lr'] ) ) );
		}
		if ( isset( $_POST['sa_slide_icons_location'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_icons_location', sanitize_text_field( wp_unslash( $_POST['sa_slide_icons_location'] ) ) );
		}
		if ( isset( $_POST['sa_slide_icons_color'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_icons_color', sanitize_text_field( wp_unslash( $_POST['sa_slide_icons_color'] ) ) );
		}
		if ( isset( $_POST['sa_autohide_arrows'] ) && ( '1' === $_POST['sa_autohide_arrows'] ) ) {
			update_post_meta( $post->ID, 'sa_autohide_arrows', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_autohide_arrows', '0' );
		}
		if ( isset( $_POST['sa_dot_per_slide'] ) && ( '1' === $_POST['sa_dot_per_slide'] ) ) {
			update_post_meta( $post->ID, 'sa_dot_per_slide', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_dot_per_slide', '0' );
		}
		if ( isset( $_POST['sa_slide_icons_visible'] ) && ( '1' === $_POST['sa_slide_icons_visible'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_icons_visible', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_slide_icons_visible', '0' );
		}
		if ( isset( $_POST['sa_slide_icons_fullslide'] ) && ( '1' === $_POST['sa_slide_icons_fullslide'] ) ) {
			update_post_meta( $post->ID, 'sa_slide_icons_fullslide', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_slide_icons_fullslide', '0' );
		}

		// OTHER SETTINGS.
		$other_settings = '';
		if ( isset( $_POST['sa_window_onload'] ) && ( '1' === $_POST['sa_window_onload'] ) ) {
			$other_settings .= '1';
		} else {
			$other_settings .= '0';
		}
		$_POST['sa_strip_javascript'] = 0;
		if ( isset( $_POST['sa_strip_javascript'] ) && ( '1' === $_POST['sa_strip_javascript'] ) ) {
			$other_settings .= '|1';
		} else {
			$other_settings .= '|0';
		}
		if ( isset( $_POST['sa_lazy_load_images'] ) && ( '1' === $_POST['sa_lazy_load_images'] ) ) {
			$other_settings .= '|1';
		} else {
			$other_settings .= '|0';
		}
		if ( isset( $_POST['sa_ulli_containers'] ) && ( '1' === $_POST['sa_ulli_containers'] ) ) {
			$other_settings .= '|1';
		} else {
			$other_settings .= '|0';
		}
		if ( isset( $_POST['sa_rtl_slider'] ) && ( '1' === $_POST['sa_rtl_slider'] ) ) {
			$other_settings .= '|1';
		} else {
			$other_settings .= '|0';
		}
		// disable preview setting (now removed & permanently disabled).
		$other_settings .= '|1';
		if ( isset( $_POST['bg_image_size'] ) && ( '' !== $_POST['bg_image_size'] ) ) {
			$other_settings .= '|' . sanitize_text_field( wp_unslash( $_POST['bg_image_size'] ) );
		} else {
			$other_settings .= '|full';
		}
		if ( isset( $_POST['sa_disable_slide_ids'] ) && ( '1' === $_POST['sa_disable_slide_ids'] ) ) {
			$other_settings .= '|1';
		} else {
			$other_settings .= '|0';
		}
		update_post_meta( $post->ID, 'sa_other_settings', $other_settings );
		// starting slide number.
		if ( isset( $_POST['sa_start_pos'] ) ) {
			update_post_meta( $post->ID, 'sa_start_pos', abs( intval( $_POST['sa_start_pos'] ) ) );
		}

		// THUMBNAIL PAGINATION.
		if ( isset( $_POST['sa_thumbs_active'] ) && ( '1' === $_POST['sa_thumbs_active'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_active', '1' );
		} else {
			update_post_meta( $post->ID, 'sa_thumbs_active', '0' );
		}
		if ( isset( $_POST['sa_thumbs_location'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_location', sanitize_text_field( wp_unslash( $_POST['sa_thumbs_location'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_image_size'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_image_size', sanitize_text_field( wp_unslash( $_POST['sa_thumbs_image_size'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_padding'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_padding', abs( floatval( $_POST['sa_thumbs_padding'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_width'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_width', abs( intval( $_POST['sa_thumbs_width'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_height'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_height', abs( intval( $_POST['sa_thumbs_height'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_opacity'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_opacity', abs( intval( $_POST['sa_thumbs_opacity'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_border_width'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_border_width', abs( intval( $_POST['sa_thumbs_border_width'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_border_color'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_border_color', sanitize_text_field( wp_unslash( $_POST['sa_thumbs_border_color'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_resp_tablet'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_resp_tablet', abs( intval( $_POST['sa_thumbs_resp_tablet'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_resp_mobile'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_resp_mobile', abs( intval( $_POST['sa_thumbs_resp_mobile'] ) ) );
		}
	}
}



/**
 * ###################################################################################
 * ### FUNCTION DISPLAYS THE 'RE-ORDER SLIDES' SUB-PAGE IN THE WordPress DASHBOARD ###
 * ###################################################################################
 */
function cpt_slider_extra_sa_menu_pages() {
	add_submenu_page(
		'edit.php?post_type=sa_slider',
		__( 'Re-Order Slides', 'menu-sa-order' ),
		__( 'Re-Order Slides', 'menu-sa-order' ),
		'manage_options',
		'reorderslides',
		'cpt_slider_sa_reorder_slides_page'
	);
}

/**
 * ### FUNCTION CONTAINING THE 'RE-ORDER' SLIDES FUNCTIONALITY ###
 */
function cpt_slider_sa_reorder_slides_page() {
	$page_url          = get_admin_url() . 'edit.php?post_type=sa_slider&page=reorderslides';
	$placeholder_image = get_site_url() . '/wp-content/plugins/slide-anything/images/bg_placeholder.png';

	echo "<div id='sa_reorder_slides'>\n";
	echo '<h1>Slide Anything - Re-Order Slides</h1>';

	if ( isset( $_SERVER['REQUEST_METHOD'] ) && ( 'POST' === $_SERVER['REQUEST_METHOD'] )
		&& isset( $_POST['reorder_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['reorder_nonce'] ) ), 'reorder_action' ) ) {
		// A POST VARIABLE FOR 'SLIDER ID' HAS BEEN PASSED.
		if ( isset( $_POST['sar_slider_id'] ) ) {
			$slider_id    = sanitize_text_field( wp_unslash( $_POST['sar_slider_id'] ) );
			$slider_title = get_the_title( $slider_id );
		} else {
			exit();
		}

		if ( isset( $_POST['sar_sort_order'] ) && ( '' !== $_POST['sar_sort_order'] ) ) {
			// CHANGE THE ORDER OF SLIDE DATA FOR THE SLIDER AND RE-SAVE METADATA.
			$sort_order   = sanitize_text_field( wp_unslash( $_POST['sar_sort_order'] ) );
			$data_in_arr  = array();
			$data_out_arr = array();

			// 1) SAVE SLIDES METADATA TO AN 'IN' ARRAY (ONLY SLIDES MEATDATA AND NO SETTINGS DATA SAVED!).
			$metadata   = get_metadata( 'post', $slider_id );
			$num_slides = $metadata['sa_num_slides'][0];
			foreach ( $metadata as $key => $value_arr ) {
				$value = $value_arr[0];
				for ( $i = 1; $i <= $num_slides; $i++ ) {
					$key_prefix = 'sa_slide' . $i . '_';
					if ( strpos( $key, $key_prefix ) === 0 ) {
						// metadata key starts with the key prefix ('sa_slide??').
						$data_in_arr[ $key ] = $value;
					}
				}
			}

			// 2) CREATE THE NEW SLIDES 'OUT' ARRAY (WITH THE NEW SLIDE ORDER).
			$sort_order_arr  = explode( ',', $sort_order );
			$count_order_arr = count( $sort_order_arr );
			for ( $i = 0; $i < $count_order_arr; $i++ ) {
				$loop_prefix  = 'sa_slide' . ( $i + 1 ) . '_'; // ascending loop order (1, 2, 3...).
				$order_prefix = 'sa_slide' . $sort_order_arr[ $i ] . '_'; // slide number to be stored in this slot.
				foreach ( $data_in_arr as $key => $value ) {
					if ( strpos( $key, $order_prefix ) === 0 ) {
						// metakey key value starts with the order prefix.
						$new_key                  = str_replace( $order_prefix, $loop_prefix, $key );
						$data_out_arr[ $new_key ] = $value;
					}
				}
			}

			// 3) LOOP THROUGH SLIDES 'OUT' ARRAY UPDATING POST METADATA.
			foreach ( $data_out_arr as $key => $value ) {
				update_post_meta( $slider_id, $key, $value );
			}

			echo "<h3 id='sar_success_message'>SLIDE ORDER HAS BEEN UPDATED</h3>";
		} else {
			if ( isset( $_POST['sar_del_slides'] ) && ( '' !== $_POST['sar_del_slides'] ) ) {
				// DELETE ALL SLIDES WITH THE 'DELETE SLIDE' CHECKBOX CHECKED.
				$del_slides     = sanitize_text_field( wp_unslash( $_POST['sar_del_slides'] ) );
				$del_slides_arr = explode( ',', $del_slides );
				$data_in_arr    = array();
				$data_out_arr   = array();

				// 1) SAVE SLIDES METADATA TO AN 'IN' ARRAY (ONLY SLIDES MEATDATA AND NO SETTINGS DATA SAVED!).
				$metadata   = get_metadata( 'post', $slider_id );
				$num_slides = $metadata['sa_num_slides'][0];
				foreach ( $metadata as $key => $value_arr ) {
					$value = $value_arr[0];
					for ( $i = 1; $i <= $num_slides; $i++ ) {
						$key_prefix = 'sa_slide' . $i . '_';
						if ( strpos( $key, $key_prefix ) === 0 ) {
							// metadata key starts with the key prefix ('sa_slide??').
							$data_in_arr[ $i ][ $key ] = $value;
						}
					}
				}

				// 2) CREATE THE NEW SLIDES 'OUT' ARRAY (WITH THE DELETED SLIDES REMOVED)
				$curr_index = 0;
				$tot_del    = 0;
				for ( $i = 1; $i <= $num_slides; $i++ ) {
					$loop_prefix   = 'sa_slide' . $i . '_';
					$delete_yn     = 0;
					$count_del_arr = count( $del_slides_arr );
					for ( $j = 0; $j < $count_del_arr; $j++ ) {
						if ( $i === $del_slides_arr[ $j ] ) {
							$delete_yn = 1;
						}
					}
					if ( 0 === $delete_yn ) {
						// current slide is NOT to be deleted - copy to 'out' array.
						$curr_index++;
						$curr_prefix = 'sa_slide' . $curr_index . '_';
						foreach ( $data_in_arr[ $i ] as $key => $value ) {
							$new_key                  = str_replace( $loop_prefix, $curr_prefix, $key );
							$data_out_arr[ $new_key ] = $value;
						}
					} else {
						$tot_del++;
					}
				}

				// 3) LOOP THROUGH SLIDES 'OUT' ARRAY UPDATING POST METADATA.
				update_post_meta( $slider_id, 'sa_num_slides', $curr_index );
				foreach ( $data_out_arr as $key => $value ) {
					update_post_meta( $slider_id, $key, $value );
				}

				if ( 1 === $tot_del ) {
					echo "<h3 id='sar_success_message'>" . esc_html( $tot_del ) . ' SLIDE HAS BEEN DELETED</h3>';
				} else {
					echo "<h3 id='sar_success_message'>" . esc_html( $tot_del ) . ' SLIDES HAVE BEEN DELETED</h3>';
				}
			}
		}

		// GET REQUIRED SLIDER METADATA AND SAVE WITHIN AN ARRAY.
		$num_slides = 0;
		$slide_arr  = array();
		$metadata   = get_metadata( 'post', $slider_id );
		if ( count( $metadata ) > 0 ) {
			$num_slides = $metadata['sa_num_slides'][0];
		}
		if ( 0 !== $num_slides ) {
			// SLIDER CONTAINS SLIDES - DISPLAY SORTABLE LIST OF SLIDES.
			for ( $i = 1; $i <= $num_slides; $i++ ) {
				$image_data                  = $metadata[ 'sa_slide' . $i . '_image_data' ][0];
				$image_data_arr              = explode( '~', $image_data );
				$slide_arr[ $i ]['image_id'] = $image_data_arr[0];
				$slide_arr[ $i ]['content']  = $metadata[ 'sa_slide' . $i . '_content' ][0];
				// cater for popup images used as the slide background.
				$popup_type       = '';
				$popup_background = '';
				if ( isset( $metadata[ 'sa_slide' . $i . '_popup_type' ][0] ) ) {
					$popup_type = $metadata[ 'sa_slide' . $i . '_popup_type' ][0];
				}
				if ( isset( $metadata[ 'sa_slide' . $i . '_popup_background' ][0] ) ) {
					$popup_background = $metadata[ 'sa_slide' . $i . '_popup_background' ][0];
				}
				if ( 'IMAGE' === $popup_type ) {
					if ( ( '' !== $popup_background ) && ( 'no' !== $popup_background ) ) {
							$slide_arr[ $i ]['image_id'] = $metadata[ 'sa_slide' . $i . '_popup_imageid' ][0];
					}
				}
			}

			// DISPLAY THE SORTABLE GRID OF SLIDES.
			echo "<h2 id='sar_slider_title'>" . esc_html( $slider_title ) . "</h2>\n";
			echo "<h3 id='sar_drag_message'>Drag slides to re-order...</h3>\n";
			echo "<ul id='sar_sortable'>\n";
			for ( $i = 1; $i <= $num_slides; $i++ ) {
				$bg_image        = $placeholder_image;
				$slide_image_src = wp_get_attachment_image_src( $slide_arr[ $i ]['image_id'], 'thumbnail' );
				if ( ! empty( $slide_image_src[0] ) ) {
					$bg_image = $slide_image_src[0];
				}
				echo "<li id='sar" . esc_attr( $i ) . "' class='ui-state-default'>\n";
				echo "<div class='sar_image' style='background-image:url(\"" . esc_url( $bg_image ) . "\");'></div>\n";
				echo "<div class='sar_content'>\n";
				echo "<h4 class='sar_slide_num'>SLIDE " . esc_html( $i ) . "</h4>\n";
				echo "<div class='sar_del_slide'>DELETE <span>SLIDE</span>";
				echo "<input type='checkbox' id='sar_del" . esc_attr( $i ) . "' name='sar_del" . esc_attr( $i ) . "' class='sar_del_checkbox'/>";
				echo "</div>\n";
				echo "<div class='sar_slide_html'>" . esc_html( nl2br( htmlentities( $slide_arr[ $i ]['content'] ) ) ) . "</div>\n";
				echo '</div>';
				echo "</li>\n";
			}
			echo "</ul>\n";

			// DISPLAY THE HTML FORM CONTAINING THE SORT ORDER INPUT ELEMENT.
			echo "<form method='post' id='sar_order_form'>\n";
			wp_nonce_field( 'reorder_action', 'reorder_nonce' );
			echo "<input type='hidden' name='sar_slider_id' value='" . esc_attr( $slider_id ) . "'/>";
			echo "<input type='hidden' id='sar_sort_order' name='sar_sort_order'/>";
			echo "<input type='hidden' id='sar_del_slides' name='sar_del_slides'/>";
			echo "<input type='submit' id='sar_update_but' value='UPDATE ORDER'/>";
			echo "<input type='submit' id='sar_delete_but' value='DELETE SLIDES'/>";
			echo "</form>\n";

		} else {
			// SLIDER CONTAINS NO SLIDES - DISPLAY MESSAGE.
			echo "<h3 id='sar_no_slides_found'>This slider contains NO slides!</h3>\n";
			echo "<a class='sar_back_button' href='" . esc_url( $page_url ) . "'>BACK</a>";
		}
	} else {
		// ##### NO POST VARIABLE FOR 'SLIDER ID' HAS BEEN PASSED #####
		// WP QUERY TO GET ARRAY OF SA SLIDERS (ID & TITLE) THAT EXIST.
		$slider_arr = array();
		$count      = 0;
		$args       = array(
			'post_type'      => 'sa_slider',
			'post_status'    => array( 'publish', 'draft' ),
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'posts_per_page' => -1,
		);
		$sliders    = new WP_Query( $args );
		if ( $sliders->have_posts() ) {
			while ( $sliders->have_posts() ) {
				$sliders->the_post();
				$slider_arr[ $count ]['id']    = get_the_ID();
				$slider_arr[ $count ]['title'] = get_the_title();
				$count++;
			}
		}
		wp_reset_postdata();

		if ( count( $slider_arr ) > 0 ) {
			// DISPLAY FORM CONTAINING SA SLIDER SELECT DROPDOWN.
			echo "<form method='post' id='sar_slider_form'>\n";
			wp_nonce_field( 'reorder_action', 'reorder_nonce' );
			echo "<p>This tool allows you to change the order of slides within a Slide Anything slider.</p>\n";
			echo "<p>Select the slider you would like to re-order, then just drag-and-drop slides for your new slide order.</p>\n";
			echo "<div style='padding-top:10px;'>Select Slider to Re-Order:<br/>";
			echo "<select id='sar_slider_id' name='sar_slider_id'>\n";
			$count_slider_arr = count( $slider_arr );
			for ( $i = 0; $i < $count_slider_arr; $i++ ) {
				echo '<h4>|' . esc_html( $slider_arr[ $i ]['id'] ) . '|' . esc_html( $slider_arr[ $i ]['title'] ) . '|</h4>';
				echo "<option value='" . esc_attr( $slider_arr[ $i ]['id'] ) . "'>" . esc_html( $slider_arr[ $i ]['title'] ) . ' (#' . esc_html( $slider_arr[ $i ]['id'] ) . ")</option>\n";
			}
			echo "<select></div>\n";
			echo "<div><input type='submit' value='Select Slider'/></div>\n";
			echo "</form>\n";
		} else {
			// NO SA SLIDERS FOUND - DISPLAY MESSAGE.
			echo "<h3 id='sar_no_sliders_found'>No Slide Anything sliders found!</h3>\n";
		}
	}

	echo "</div>\n";
}


/**
 * ### FUNCTION CALLED BY 'template_include' FILTER TO USE A CUSTOM PAGE TERMPLATE FOR SA PREVIEW PAGE ###
 *
 * @param string $template Page Template.
 */
function cpt_slider_sa_preview_page_template( $template ) {
	if ( is_page( 'Slide Anything Popup Preview' ) ) {
		$template = dirname( __FILE__ ) . '/single-page.php';
	}
	return $template;
}


/**
 * ### FILTER TO ALLOW IFRAMES WITHIN SLIDE CONTENT ###
 *
 * @param array $allowedposttags Allowed Post Tags.
 */
function cpt_slider_allow_iframes_filter( $allowedposttags ) {
	// Only change for users who can publish posts.
	if ( ! current_user_can( 'publish_posts' ) ) {
		return $allowedposttags;
	}

	// Allow iframes and the following attributes.
	$allowedposttags['iframe'] = array(
		'align'           => true,
		'width'           => true,
		'height'          => true,
		'frameborder'     => true,
		'name'            => true,
		'src'             => true,
		'title'           => true,
		'allow'           => true,
		'allowfullscreen' => true,
		'id'              => true,
		'class'           => true,
		'style'           => true,
		'scrolling'       => true,
		'marginwidth'     => true,
		'marginheight'    => true,
	);
	return $allowedposttags;
}
?>
