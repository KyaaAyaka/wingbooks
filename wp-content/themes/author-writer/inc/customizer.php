<?php
/**
 * Author Writer: Customizer
 *
 * @package Author Writer
 * @subpackage author_writer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function author_writer_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Author_Writer_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Author_Writer_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'author_writer_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'author-writer' ),
	    'description' => __( 'Description of what this panel does.', 'author-writer' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('author_writer_tp_general_settings',array(
      'title' => __('TP General Option', 'author-writer'),
      'priority' => 1,
      'panel' => 'author_writer_panel_id'
    ) );
 	$wp_customize->add_setting('author_writer_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'author_writer_sanitize_choices'
	));
 	$wp_customize->add_control('author_writer_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'author-writer'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'author-writer'),
		'section' => 'author_writer_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','author-writer'),
		'Container' => __('Container','author-writer'),
		'Container Fluid' => __('Container Fluid','author-writer')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('author_writer_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'author-writer'),
     'description'   => __('This option work for blog page, archive page and search page.', 'author-writer'),
     'section' => 'author_writer_tp_general_settings',
     'choices' => array(
         'full' => __('Full','author-writer'),
         'left' => __('Left','author-writer'),
         'right' => __('Right','author-writer'),
         'three-column' => __('Three Columns','author-writer'),
         'four-column' => __('Four Columns','author-writer'),
         'grid' => __('Grid Layout','author-writer')
     ),
	) );

	// Add Settings and Controls for Post sidebar Layout
	$wp_customize->add_setting('author_writer_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'author-writer'),
        'description'   => __('This option work for single blog page', 'author-writer'),
        'section' => 'author_writer_tp_general_settings',
        'choices' => array(
            'full' => __('Full','author-writer'),
            'left' => __('Left','author-writer'),
            'right' => __('Right','author-writer'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('author_writer_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'author-writer'),
     'description'   => __('This option work for pages.', 'author-writer'),
     'section' => 'author_writer_tp_general_settings',
     'choices' => array(
         'full' => __('Full','author-writer'),
         'left' => __('Left','author-writer'),
         'right' => __('Right','author-writer')
     ),
	) );
	$wp_customize->add_setting( 'author_writer_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Option', 'author-writer' ),
		'section'     => 'author_writer_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'author_writer_sticky',
	) ) );

	//tp typography option
	$author_writer_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('author_writer_typography_option',array(
		'title'         => __('TP Typography Option', 'author-writer'),
		'priority' => 1,
		'panel' => 'author_writer_panel_id'
   	));

   	$wp_customize->add_setting('author_writer_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'author_writer_sanitize_choices',
	));
	$wp_customize->add_control(	'author_writer_heading_font_family', array(
		'section' => 'author_writer_typography_option',
		'label'   => __('heading Fonts', 'author-writer'),
		'type'    => 'select',
		'choices' => $author_writer_font_array,
	));

	$wp_customize->add_setting('author_writer_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'author_writer_sanitize_choices',
	));
	$wp_customize->add_control(	'author_writer_body_font_family', array(
		'section' => 'author_writer_typography_option',
		'label'   => __('Body Fonts', 'author-writer'),
		'type'    => 'select',
		'choices' => $author_writer_font_array,
	));

	//TP Color Option
	$wp_customize->add_section('author_writer_color_option',array(
        'title' => __('TP Color Option', 'author-writer'),
        'panel' => 'author_writer_panel_id',
        'priority' => 1,
    ) );
	$wp_customize->add_setting( 'author_writer_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_writer_tp_color_option', array(
  		'label'     => __('Theme First Color', 'author-writer'),
	    'description' => __('It will change the complete theme color in one click.', 'author-writer'),
	    'section' => 'author_writer_color_option',
	    'settings' => 'author_writer_tp_color_option',
  	)));
  	$wp_customize->add_setting( 'author_writer_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_writer_tp_color_option_link', array(
  		'label'     => __('Theme Second Color', 'author-writer'),
	    'description' => __('It will change the complete theme hover link color in one click.', 'author-writer'),
	    'section' => 'author_writer_color_option',
	    'settings' => 'author_writer_tp_color_option_link',
  	)));

  	//TP Preloader Option
	$wp_customize->add_section('author_writer_prealoader_option',array(
		'title' => __('TP Preloader Option', 'author-writer'),
		'panel' => 'author_writer_panel_id',
		'priority' => 1,
 	) );
	$wp_customize->add_setting( 'author_writer_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'author-writer' ),
		'section'     => 'author_writer_prealoader_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_preloader_show_hide',
	) ) );
  	$wp_customize->add_setting( 'author_writer_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_writer_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'author-writer'),
	    'section' => 'author_writer_prealoader_option',
	    'settings' => 'author_writer_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'author_writer_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_writer_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'author-writer'),
	    'section' => 'author_writer_prealoader_option',
	    'settings' => 'author_writer_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'author_writer_tp_preloader_bg_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_writer_tp_preloader_bg_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'author-writer'),
	    'section' => 'author_writer_prealoader_option',
	    'settings' => 'author_writer_tp_preloader_bg_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('author_writer_blog_option',array(
		'title' => __('TP Blog Option', 'author-writer'),
		'priority' => 1,
		'panel' => 'author_writer_panel_id'
	) );

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'author_writer_sanitize_sortable',
    ));
    $wp_customize->add_control(new Author_Writer_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'author-writer'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'author-writer') ,
        'section' => 'author_writer_blog_option',
        'choices' => array(
            'date' => __('date', 'author-writer') ,
            'author' => __('author', 'author-writer') ,
            'comment' => __('comment', 'author-writer') ,
            'category' => __('category', 'author-writer') ,
        ) ,
    )));
    $wp_customize->add_setting( 'author_writer_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'author_writer_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'author_writer_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','author-writer' ),
		'section'     => 'author_writer_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
    $wp_customize->add_setting('author_writer_read_more_text',array(
		'default'=> __('Read More','author-writer'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_read_more_text',array(
		'label'	=> __('Edit Button Text','author-writer'),
		'section'=> 'author_writer_blog_option',
		'type'=> 'text'
	));
    $wp_customize->add_setting( 'author_writer_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'author-writer' ),
		'section'     => 'author_writer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_remove_read_button',
	) ) );
	$wp_customize->add_setting( 'author_writer_remove_read_button', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_read_button', array(
	 'label'       => esc_html__( 'Show / Hide Read More Button', 'author-writer' ),
	 'section'     => 'author_writer_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'author_writer_remove_read_button',
    ) ) );
    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_read_button',
	));
    $wp_customize->add_setting( 'author_writer_remove_tags', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_tags', array(
		 'label'       => esc_html__( 'Show / Hide Tags Option', 'author-writer' ),
		 'section'     => 'author_writer_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'author_writer_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_tags',
	));
	$wp_customize->add_setting( 'author_writer_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'author-writer' ),
		'section'     => 'author_writer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'author_writer_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'author_writer_customize_partial_author_writer_remove_category',
	));
	$wp_customize->add_setting( 'author_writer_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'author_writer_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'author-writer' ),
	 'section'     => 'author_writer_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'author_writer_remove_comment',
	) ) );

	$wp_customize->add_setting( 'author_writer_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'author_writer_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'author-writer' ),
	 'section'     => 'author_writer_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'author_writer_remove_related_post',
	) ) );

	$wp_customize->add_setting('author_writer_related_post_heading',array(
		'default'=> __('Related Posts','author-writer'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_related_post_heading',array(
		'label'	=> __('Related Posts Title','author-writer'),
		'section'=> 'author_writer_blog_option',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting( 'author_writer_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'author_writer_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'author_writer_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','author-writer' ),
		'section'     => 'author_writer_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	$wp_customize->add_setting( 'author_writer_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'author_writer_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'author_writer_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','author-writer' ),
		'section'     => 'author_writer_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );
	
	$wp_customize->add_setting('author_writer_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'author-writer'),
        'description' => __( 'Control Works only for full,left and right sidebar position in archieve posts', 'business-meetup-conference' ),
        'section' => 'author_writer_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','author-writer'),
            'content-image' => __('Content-Media','author-writer'),
        ),
	) );

  	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'author_writer_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'author-writer' ),
    	'priority' => 2,
		'panel' => 'author_writer_panel_id'
	) );
	$wp_customize->add_setting('author_writer_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'author_writer_sanitize_choices',
	));
	$wp_customize->add_control(	'author_writer_menu_font_family', array(
		'section' => 'author_writer_menu_typography',
		'label'   => __('Menu Fonts', 'author-writer'),
		'type'    => 'select',
		'choices' => $author_writer_font_array,
	));

	$wp_customize->add_setting('author_writer_menu_font_weight',array(
        'default' => '600',
        'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'author-writer'),
     'section' => 'author_writer_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','author-writer'),
         '200' => __('200','author-writer'),
         '300' => __('300','author-writer'),
         '400' => __('400','author-writer'),
         '500' => __('500','author-writer'),
         '600' => __('600','author-writer'),
         '700' => __('700','author-writer'),
         '800' => __('800','author-writer'),
         '900' => __('900','author-writer')
     ),
	) );
	
	$wp_customize->add_setting('author_writer_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'author_writer_sanitize_choices'
 	));
 	$wp_customize->add_control('author_writer_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','author-writer'),
		'section' => 'author_writer_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','author-writer'),
		   'Lowercase' => __('Lowercase','author-writer'),
		   'Capitalize' => __('Capitalize','author-writer'),
		),
	) );
	$wp_customize->add_setting('author_writer_menu_font_size', array(
	    'default' => 12,
        'sanitize_callback' => 'author_writer_sanitize_number_range',
	));
	$wp_customize->add_control(new Author_Writer_Range_Slider($wp_customize, 'author_writer_menu_font_size', array(
        'section' => 'author_writer_menu_typography',
        'label' => esc_html__('Font Size', 'author-writer'),
        'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));
	
	// Top Bar
	$wp_customize->add_section( 'author_writer_topbar', array(
    	'title'      => __( 'Contact Details', 'author-writer' ),
    	'priority' => 2,
    	'description' => __( 'Add your contact details', 'author-writer' ),
		'panel' => 'author_writer_panel_id'
	) );
	$wp_customize->add_setting('author_writer_announcement_bar',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_announcement_bar',array(
		'label'	=> __('Add Announcement Text','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('author_writer_announcement_icon',array(
		'default'	=> 'fas fa-bullhorn',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Author_Writer_Icon_Changer(
        $wp_customize,'author_writer_announcement_icon',array(
		'label'	=> __('Announcement Icon','author-writer'),
		'transport' => 'refresh',
		'section'	=> 'author_writer_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'author_writer_announcement_bar', array(
		'selector' => '.top-header p',
		'render_callback' => 'author_writer_customize_partial_author_writer_announcement_bar',
	) );
	$wp_customize->add_setting('author_writer_sign_in_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_sign_in_button',array(
		'label'	=> __('Add Sign In Button Text','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'author_writer_sign_in_button', array(
		'selector' => '.register-btn',
		'render_callback' => 'author_writer_customize_partial_author_writer_sign_in_button',
	) );
	$wp_customize->add_setting('author_writer_sign_in_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_sign_in_link',array(
		'label'	=> __('Add Sign In Page Link','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'url'
	));
	$wp_customize->add_setting('author_writer_bar_icon_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_bar_icon_link',array(
		'label'	=> __('Add Additional Link','author-writer'),
		'section'=> 'author_writer_topbar',
		'type'=> 'url'
	));

	// Social Media
	$wp_customize->add_section( 'author_writer_social_media', array(
    	'title'      => __( 'Social Media Links', 'author-writer' ),
    	'priority' => 2,
    	'description' => __( 'Add your Social Links', 'author-writer' ),
		'panel' => 'author_writer_panel_id'
	) );
	$wp_customize->add_setting( 'author_writer_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'author-writer' ),
		'section'     => 'author_writer_social_media',
		'type'        => 'toggle',
		'settings'    => 'author_writer_header_fb_new_tab',
	) ) );
	$wp_customize->add_setting('author_writer_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_facebook_url',array(
		'label'	=> __('Facebook Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));
	$wp_customize->selective_refresh->add_partial( 'author_writer_facebook_url', array(
		'selector' => '.media-links',
		'render_callback' => 'author_writer_customize_partial_author_writer_facebook_url',
	) );
	$wp_customize->add_setting('author_writer_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Author_Writer_Icon_Changer(
        $wp_customize,'author_writer_facebook_icon',array(
		'label'	=> __('Facebook Icon','author-writer'),
		'transport' => 'refresh',
		'section'	=> 'author_writer_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'author_writer_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'author-writer' ),
		'section'     => 'author_writer_social_media',
		'type'        => 'toggle',
		'settings'    => 'author_writer_header_twt_new_tab',
	) ) );
	$wp_customize->add_setting('author_writer_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_twitter_url',array(
		'label'	=> __('Twitter Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('author_writer_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Author_Writer_Icon_Changer(
        $wp_customize,'author_writer_twitter_icon',array(
		'label'	=> __('Twitter Icon','author-writer'),
		'transport' => 'refresh',
		'section'	=> 'author_writer_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'author_writer_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'author-writer' ),
		'section'     => 'author_writer_social_media',
		'type'        => 'toggle',
		'settings'    => 'author_writer_header_ins_new_tab',
	) ) );
	$wp_customize->add_setting('author_writer_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_instagram_url',array(
		'label'	=> __('Instagram Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('author_writer_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Author_Writer_Icon_Changer(
        $wp_customize,'author_writer_instagram_icon',array(
		'label'	=> __('Twitter Icon','author-writer'),
		'transport' => 'refresh',
		'section'	=> 'author_writer_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'author_writer_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'author-writer' ),
		'section'     => 'author_writer_social_media',
		'type'        => 'toggle',
		'settings'    => 'author_writer_header_ut_new_tab',
	) ) );
	$wp_customize->add_setting('author_writer_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('author_writer_youtube_url',array(
		'label'	=> __('YouTube Link','author-writer'),
		'section'=> 'author_writer_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('author_writer_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Author_Writer_Icon_Changer(
        $wp_customize,'author_writer_youtube_icon',array(
		'label'	=> __('Youtube Icon','author-writer'),
		'transport' => 'refresh',
		'section'	=> 'author_writer_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('author_writer_social_icon_fontsize',array(
		'default'=> '14',
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','author-writer'),
		'type'=> 'number',
		'section'=> 'author_writer_social_media',
		'input_attrs' => array(
      'step' => 1,
			'min'  => 0,
			'max'  => 30,
        ),
	));

	//home page slider
	$wp_customize->add_section( 'author_writer_slider_section' , array(
    	'title'      => __( 'Slider Section', 'author-writer' ),
    	'priority' => 3,
		'panel' => 'author_writer_panel_id'
	) );
	$wp_customize->add_setting( 'author_writer_slider_arrows', array(
		'default'           => false,
		'priority'          => 1,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Slider', 'author-writer' ),
		'priority' => 1,
		'section'     => 'author_writer_slider_section',
		'type'        => 'toggle',
		'settings'    => 'author_writer_slider_arrows',
	) ) );
	$wp_customize->selective_refresh->add_partial( 'author_writer_slider_arrows', array(
		'selector' => '.inner_carousel h2',
		'render_callback' => 'author_writer_customize_partial_author_writer_slider_arrows',
	) );
	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'author_writer_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'author_writer_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'author_writer_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'author-writer' ),
			'priority' => 1,
			'description' => __('Image Size ( 1835 x 700 ) px','author-writer'),
			'section'  => 'author_writer_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}
	$wp_customize->add_setting( 'author_writer_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'author-writer' ),
		'priority' => 1,
		'section'     => 'author_writer_slider_section',
		'type'        => 'toggle',
		'settings'    => 'author_writer_slider_button',
	) ) );

    $wp_customize->add_setting('author_writer_slider_content_layout',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'author-writer'),
        'section' => 'author_writer_slider_section',
        'choices' => array(
        	'LEFT-ALIGN' => __('LEFT-ALIGN','author-writer'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','author-writer'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','author-writer'),
        ),
	) );

	//footer
	$wp_customize->add_section('author_writer_footer_section',array(
		'title'	=> __('Footer Text','author-writer'),
		'description'	=> __('Add copyright text.','author-writer'),
		'panel' => 'author_writer_panel_id',
		'priority' => 4,
	));
	$wp_customize->add_setting('author_writer_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_footer_text',array(
		'label'	=> __('Copyright Text','author-writer'),
		'section'	=> 'author_writer_footer_section',
		'type'		=> 'text'
	));
	//footer column
    $wp_customize->add_setting('author_writer_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_footer_columns',array(
		'label'	=> __('Footer Widget Columns','author-writer'),
		'section'	=> 'author_writer_footer_section',
		'setting'	=> 'author_writer_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'author_writer_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_writer_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'author-writer'),
			'description' => __('It will change the complete footer widget backgorund color.', 'author-writer'),
			'section' => 'author_writer_footer_section',
			'settings' => 'author_writer_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('author_writer_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'author_writer_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','author-writer'),
        'section' => 'author_writer_footer_section'
	)));
	$wp_customize->add_setting('author_writer_return_to_header',array(
		'default' => true,
		'sanitize_callback'	=> 'author_writer_sanitize_checkbox'
	));
	$wp_customize->add_control('author_writer_return_to_header',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Return to header','author-writer'),
		'section' => 'author_writer_footer_section',
	));
	$wp_customize->add_setting( 'author_writer_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to Header', 'author-writer' ),
		'section'     => 'author_writer_footer_section',
		'type'        => 'toggle',
		'settings'    => 'author_writer_return_to_header',
	) ) );
	$wp_customize->selective_refresh->add_partial( 'author_writer_return_to_header', array(
		'selector' => '.site-info a',
		'render_callback' => 'author_writer_customize_partial_author_writer_return_to_header',
	) );
	$wp_customize->add_setting('author_writer_return_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Author_Writer_Icon_Changer(
        $wp_customize,'author_writer_return_icon',array(
		'label'	=> __('Return Icon','author-writer'),
		'transport' => 'refresh',
		'section'	=> 'author_writer_footer_section',
		'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('author_writer_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'author-writer'),
     'description'   => __('This option work for scroll to top', 'author-writer'),
     'section' => 'author_writer_footer_section',
     'choices' => array(
         'Right' => __('Right','author-writer'),
         'Left' => __('Left','author-writer'),
         'Center' => __('Center','author-writer')
     ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'author_writer_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'author_writer_customize_partial_blogdescription',
	) );

	//Mobile Seetings
	$wp_customize->add_section('author_writer_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'author-writer'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'author-writer'),
		'priority' => 5,
		'panel' => 'author_writer_panel_id'
	) );
	$wp_customize->add_setting( 'author_writer_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'author-writer' ),
		'section'     => 'author_writer_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'author_writer_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'author-writer' ),
		'section'     => 'author_writer_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_slider_buttom_mob',
	) ) );
	$wp_customize->add_setting( 'author_writer_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'author-writer' ),
		'section'     => 'author_writer_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'author_writer_related_post_mob',
	) ) );

    //site identity
	$wp_customize->add_setting( 'author_writer_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'author-writer' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'author_writer_site_title',
	) ) );

	// logo site title size
	$wp_customize->add_setting('author_writer_site_title_font_size',array(
		'default'	=> 20,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','author-writer'),
		'section'	=> 'title_tagline',
		'setting'	=> 'author_writer_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
	$wp_customize->add_setting( 'author_writer_site_tagline', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Tagline', 'author-writer' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'author_writer_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('author_writer_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','author-writer'),
		'section'	=> 'title_tagline',
		'setting'	=> 'author_writer_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
    $wp_customize->add_setting('author_writer_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','author-writer'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));
	$wp_customize->add_setting('author_writer_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'author_writer_sanitize_choices'
	));
    $wp_customize->add_control('author_writer_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'author-writer'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'author-writer'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','author-writer'),
            'Same Line' => __('Same Line','author-writer')
        ),
	) );

    //woo commerce
	$wp_customize->add_setting('author_writer_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_per_columns',array(
		'label'	=> __('Product Per Row','author-writer'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('author_writer_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'author_writer_sanitize_number_absint'
	));
	$wp_customize->add_control('author_writer_product_per_page',array(
		'label'	=> __('Product Per Page','author-writer'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting( 'author_writer_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'author-writer' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'author_writer_product_sidebar',
	) ) );

	$wp_customize->add_setting('author_writer_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'author_writer_sanitize_choices'
	));
	$wp_customize->add_control('author_writer_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'author-writer'),
        'description'   => __('This option work for Archieve Products', 'author-writer'),
        'section' => 'woocommerce_product_catalog',
        'choices' => array(
            'left' => __('Left','author-writer'),
            'right' => __('Right','author-writer'),
        ),
	) );
	
	$wp_customize->add_setting( 'author_writer_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'author-writer' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'author_writer_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'author_writer_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'author_writer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Author_Writer_Toggle_Control( $wp_customize, 'author_writer_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'author-writer' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'author_writer_related_product',
	) ) );

	// 404 PAGE
	$wp_customize->add_section('author_writer_404_page_section',array(
		'title'         => __('404 Page', 'author-writer'),
		'description'   => 'Here you can customize 404 Page content.',
	) );
	$wp_customize->add_setting('author_writer_not_found_title',array(
		'default'=> __('Oops! That page can not be found.','author-writer'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_not_found_title',array(
		'label'	=> __('Edit Title','author-writer'),
		'section'=> 'author_writer_404_page_section',
		'type'=> 'text'
	));
	$wp_customize->add_setting('author_writer_not_found_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','author-writer'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('author_writer_not_found_text',array(
		'label'	=> __('Edit Text','author-writer'),
		'section'=> 'author_writer_404_page_section',
		'type'=> 'text'
	));
}
add_action( 'customize_register', 'author_writer_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Author Writer 1.0
 * @see author_writer_customize_register()
 *
 * @return void
 */
function author_writer_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Author Writer 1.0
 * @see author_writer_customize_register()
 *
 * @return void
 */
function author_writer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_NAME' ) ) {
	define( 'AUTHOR_WRITER_PRO_THEME_NAME', esc_html__( 'Author Writer Pro', 'author-writer' ));
}
if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_URL' ) ) {
	define( 'AUTHOR_WRITER_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/author-writer-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Author_Writer_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Author_Writer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Author_Writer_Customize_Section_Pro(
				$manager,
				'author_writer_section_pro',
				array(
					'priority'   => 9,
					'title'    => AUTHOR_WRITER_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'author-writer' ),
					'pro_url'  => esc_url( AUTHOR_WRITER_PRO_THEME_URL, 'author-writer' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Author_Writer_Customize_Section_Pro(
				$manager,
				'author_writer_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'author-writer' ),
					'pro_text' => esc_html__( 'Click Here', 'author-writer' ),
					'pro_url'  => esc_url( AUTHOR_WRITER_DOCS_URL, 'author-writer'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'author-writer-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'author-writer-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Author_Writer_Customize::get_instance();
