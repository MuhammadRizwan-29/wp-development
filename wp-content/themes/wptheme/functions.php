<?php 
    // Importing Style Files
    function wpt_resource(){
        wp_enqueue_style("wpt-stylefile", get_stylesheet_uri());
        wp_enqueue_script( "wpt_scriptfile", get_template_directory_uri() ."/js/index.js");
    }

    // Calling Function
    add_action("wp_enqueue_scripts", "wpt_resource");

    // Register Menu
    function wpt_nav_menu(){
        register_nav_menus(
            array(
                'main_menu' => __('Main Menu')
            )
        );
    }
    add_action( 'init', 'wpt_nav_menu');

    /* Provide Custom Support */
    // --> Header
    function wpt_add_widget_support(){
        $args = array(
            // 'default-image' => get_template_directory_uri(  ) . 'img/default-image.jpg',
            // 'default-text-color' => '000',
            'width' => 1000,
            'height' => 250,
            'flex-width' => true,
            'flex-height' => true,
        );
        add_theme_support('custom-header', $args);
    }
    add_action('after_setup_theme', 'wpt_add_widget_support');

    // --> Logo
    function wpt_logo_setup_widget(){
        $args = array(
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('site-title', 'site-description'),
            'unlink-homepage-logo' => true,
        );
        add_theme_support( 'custom-logo', $args );
    }
    add_action( 'after_setup_theme', 'wpt_logo_setup_widget' );

    // --> Widgets
    function wpt_widget_support(){
        // Primary Sidebar Widget
        register_sidebar(
            array(
                'name' => __('Primary Sidebar', 'theme_name'),
                'id'   => 'sidebar-1',
            )
        );
        // Secondary Sidebar Widget
        register_sidebar(
            array(
                'name' => __('Secondary Sidebar', 'theme_name'),
                'id'   => 'sidebar-2',
            )
        );
    }
    add_action('widgets_init', 'wpt_widget_support');
	
	// --> Wheather API
	function wpt_wheather_api(){
		// Fetching API
		$api_key = '87454217f1dd4f710134ecf260a44402';
		$cityID = 'Karachi,pk';
		$api_endpoint = 'https://api.openweathermap.org/data/2.5/weather?q=Karachi,pk&appid=87454217f1dd4f710134ecf260a44402';
		//$api_endpoint = 'https://api.openweathermap.org/data/2.5/weather?q={$cityID}&appid={$api_key}';
		
		// Check for errors
		if (is_wp_error($response)) {
			echo "Error: " . $response->get_error_message();
			return;
		}
		
		// Consume API
		$response = wp_remote_get($api_endpoint);
		$header = $response['header']; 
		$body = $response['body'];
		$decoded_response = json_decode($body);
		
		// Display Data of API in view
		
		if($decoded_response){
			// print_r(decoded_response);
			?>
			<div class="wpt_wheather--info">
				<div class="city--wheather">
				
					<div class="cwapi__data wheather__city--name">
						<div class="cwapi__data--row">
							<span><b>Location</b></span>
							<span><?php echo $decoded_response->name;?></span>
						</div>
					</div>
					
					<div class="cwapi__data city--lat_long">
						<div class="cwapi__data--row">
							<span><b>Latitude</b></span>
							<span><?php echo $decoded_response->coord->lat;?></span>
						</div>
						<div class="cwapi__data--row">
							<span><b>Longitude</b></span>
							<span><?php echo $decoded_response->coord->lon;?></span>
						</div>
					</div>
					
					<div class="cwapi__data wheather__city--details">
						<div class="cwapi__data--row">
							<span><b>Temperature</b></span>
							<span><?php echo $decoded_response->main->temp;?></span>
						</div>
						<div class="cwapi__data--row">
							<span><b>Temp: Feel Like</b></span>
							<span><?php echo $decoded_response->main->feels_like;?></span>
						</div>
						<div class="cwapi__data--row">
							<span><b>Max Temperature</b></span>
							<span><?php echo $decoded_response->main->temp_max;?></span>
						</div>
						<div class="cwapi__data--row">
							<span><b>Min Temperature</b></span>
							<span><?php echo $decoded_response->main->temp_min;?></span>
						</div>
						<div class="cwapi__data--row">
							<span><b>Humidity</b></span>
							<span><?php echo $decoded_response->main->humidity;?></span>
						</div>
						<div class="cwapi__data--row">
							<span><b>Pressure</b></span>
							<span><?php echo $decoded_response->main->pressure;?></span>
						</div>
					</div>
					<div class="cwapi__data wheather__city--about">
						<div class="cwapi__data--row">
							<span><b>Status</b></span>
							<span><?php echo $decoded_response->weather[0]->main;?></span>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		else{
			echo "Error, Decoding JSON response.";
		}
	}
	add_shortcode('wpt_wheather', 'wpt_wheather_api');
?>