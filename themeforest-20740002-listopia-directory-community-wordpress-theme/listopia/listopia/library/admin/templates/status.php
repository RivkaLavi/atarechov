<div class="about-wrap jv-admin-wrap">
	<h1><?php echo$objTheme->name; ?> <?php esc_html_e( "System Status", 'listopia' ); ?></h1>
	<p style="margin:20px 0;"></p>
	<?php
    /*  ----------------------------------------------------------------------------
        Theme config
     */

    // Theme name
    default_settings_status::add(esc_html__('Theme config','listopia'), array(
        'check_name' => esc_html__('Theme name','listopia'),
        'tooltip' => '',
        'value' =>  $objTheme->get( 'Name' ),
        'status' => 'info'
    ));

    // Theme version
    default_settings_status::add(esc_html__('Theme config','listopia'), array(
        'check_name' => esc_html__('Theme version','listopia'),
        'tooltip' => '',
        'value' =>  $objTheme->get( 'Version' ),
        'status' => 'info'
    ));

    /*  ----------------------------------------------------------------------------
        Server status
     */

    // server info
    default_settings_status::add(esc_html__('php.ini configuration','listopia'), array(
        'check_name' => esc_html__('Server software','listopia'),
        'tooltip' => '',
        'value' =>  esc_html( $_SERVER['SERVER_SOFTWARE'] ),
        'status' => 'info'
    ));

    // php version
    default_settings_status::add(esc_html__('php.ini configuration','listopia'), array(
        'check_name' => esc_html__('PHP Version','listopia'),
        'tooltip' => '',
        'value' => phpversion(),
        'status' => 'info'
    ));

    // post_max_size
    default_settings_status::add(esc_html__('php.ini configuration','listopia'), array(
        'check_name' => esc_html__('post_max_size','listopia'),
        'tooltip' => '',
        'value' =>  ini_get('post_max_size') . '<span class="jv-status-small-text"> - '. esc_html__('You cannot upload images, themes and plugins that have a size bigger than this value.','listopia').'</span>',
        'status' => 'info'
    ));

    // php time limit
    $max_execution_time = ini_get('max_execution_time');
    if ($max_execution_time == 0 or $max_execution_time >= 60) {
        default_settings_status::add(esc_html__('php.ini configuration','listopia'), array(
            'check_name' => esc_html__('max_execution_time','listopia'),
            'tooltip' => '',
            'value' =>  $max_execution_time,
            'status' => 'green'
        ));
    } else {
        default_settings_status::add(esc_html__('php.ini configuration','listopia'), array(
            'check_name' => esc_html__('max_execution_time','listopia'),
            'tooltip' => '',
            'value' =>  $max_execution_time . '<span class="jv-status-small-text"> - '. esc_html__('the execution time should be bigger than 60 if you plan to use the demos','listopia') .'</span>',
            'status' => 'yellow'
        ));
    }


    // php max input vars
    $max_input_vars = ini_get('max_input_vars');
    if ($max_input_vars == 0 or $max_input_vars >= 2000) {
        default_settings_status::add(esc_html__('php.ini configuration','listopia'), array(
            'check_name' => esc_html__('max_input_vars','listopia'),
            'tooltip' => '',
            'value' =>  $max_input_vars,
            'status' => 'green'
        ));
    } else {
        default_settings_status::add(esc_html__('php.ini configuration','listopia'), array(
            'check_name' => esc_html__('max_input_vars','listopia'),
            'tooltip' => '',
            'value' =>  $max_input_vars . '<span class="jv-status-small-text"> - '.esc_html__('the max_input_vars should be bigger than 2000, otherwise it can cause incomplete saves in the menu panel in WordPress','listopia').'</span>',
            'status' => 'yellow'
        ));
    }

    /*  ----------------------------------------------------------------------------
        WordPress
    */
    // home url
    default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
        'check_name' => esc_html__('WP Home URL','listopia'),
        'tooltip' => '',
        'value' => esc_url( home_url( '/' ) ),
        'status' => 'info'
    ));

    // site url
    default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
        'check_name' => esc_html__('WP Site URL','listopia'),
        'tooltip' => '',
        'value' => site_url(),
        'status' => 'info'
    ));

    // home_url == site_url
    if (home_url() != site_url()) {
        default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
            'check_name' => esc_html__('Home URL - Site URL','listopia'),
            'tooltip' => esc_html__('Home URL not equal to Site URL, this may indicate a problem with your WordPress configuration.','listopia'),
            'value' => esc_html__('Home URL != Site URL','listopia'). '<span class="jv-status-small-text">'.esc_html__('Home URL not equal to Site URL, this may indicate a problem with your WordPress configuration.','listopia').'</span>',
            'status' => 'yellow'
        ));
    }

    // version
    default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
        'check_name' => esc_html__('WP version','listopia'),
        'tooltip' => '',
        'value' => get_bloginfo('version'),
        'status' => 'info'
    ));


    // is_multisite
    default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
        'check_name' => esc_html__('WP multisite enabled','listopia'),
        'tooltip' => '',
        'value' => is_multisite() ? esc_html__('Yes','listopia') : esc_html__('No','listopia'),
        'status' => 'info'
    ));


    // language
    default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
        'check_name' => esc_html__('WP Language','listopia'),
        'tooltip' => '',
        'value' => get_locale(),
        'status' => 'info'
    ));



    // memory limit
    $memory_limit = default_settings_status::wp_memory_notation_to_number(WP_MEMORY_LIMIT);
    if ( $memory_limit < 67108864 ) {
        default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
            'check_name' => esc_html__('WP Memory Limit','listopia'),
            'tooltip' => '',
            'value' => size_format( $memory_limit ) . esc_html__('/request','listopia'). '<span class="jv-status-small-text">- '. esc_html__('We recommend setting memory to at least 64MB. The theme is well tested with a 40MB/request limit, but if you are using multiple plugins that may not be enough. See:','listopia'). '<a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">'.esc_html__('Increasing memory allocated to PHP','listopia').'</a></span>',
            'status' => 'yellow'
        ));
    } else {
        default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
            'check_name' => esc_html__('WP Memory Limit','listopia'),
            'tooltip' => '',
            'value' => size_format( $memory_limit ) . '/request',
            'status' => 'green'
        ));
    }


    // wp debug
    if (defined('WP_DEBUG') and WP_DEBUG === true) {
        default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
            'check_name' => esc_html__('WP_DEBUG','listopia'),
            'tooltip' => '',
            'value' => esc_html__('WP_DEBUG is enabled','listopia'),
            'status' => 'yellow'
        ));
    } else {
        default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
            'check_name' => esc_html__('WP_DEBUG','listopia'),
            'tooltip' => '',
            'value' => esc_html__('False','listopia'),
            'status' => 'green'
        ));
    }






    // caching
    $caching_plugin_list = array(
        'wp-super-cache/wp-cache.php' => array(
            'name' => esc_html__('WP super cache','listopia'),
            'status' => 'green',
        ),
        'w3-total-cache/w3-total-cache.php' => array(
            'name' => esc_html__('W3 total cache (we recommend WP super cache)','listopia'),
            'status' => 'yellow',
        ),
        'wp-fastest-cache/wpFastestCache.php' => array(
            'name' => esc_html__('WP Fastest Cache (we recommend WP super cache)','listopia'),
            'status' => 'yellow',
        ),
    );
    $active_plugins = get_option('active_plugins');
    $caching_plugin = esc_html__('No caching plugin detected','listopia');
    $caching_plugin_status = 'yellow';
    foreach ($active_plugins as $active_plugin) {
        if (isset($caching_plugin_list[$active_plugin])) {
            $caching_plugin = $caching_plugin_list[$active_plugin]['name'];
            $caching_plugin_status = $caching_plugin_list[$active_plugin]['status'];
            break;
        }
    }
    default_settings_status::add(esc_html__('WordPress and plugins','listopia'), array(
        'check_name' => esc_html__('Caching plugin','listopia'),
        'tooltip' => '',
        'value' =>  $caching_plugin,
        'status' => $caching_plugin_status
    ));

    default_settings_status::render_tables();
    ?>




</div>



<?php
class default_settings_status {

   static $system_status = array();

   static function add($section, $status_array) {
	   self::$system_status[$section] []= $status_array;
   }

   static function render_tables() {
	   foreach (self::$system_status as $section_name => $section_statuses) {
			?>
			<table class="widefat jv-system-status-table" cellspacing="0">
				<thead>
					<tr>
					   <th colspan="4"><?php echo esc_html( $section_name ); ?></th>
					</tr>
				</thead>
				<tbody>
			<?php

				foreach ($section_statuses as $status_params) {
					?>
					<tr>
						<td class="jv-system-status-name"><?php echo esc_html( $status_params['check_name'] ); ?></td>
						<td class="jv-system-status-help"></td>
						<td class="jv-system-status-status">
							<?php
								switch ($status_params['status']) {
									case 'green':
										echo '<div class="jv-system-status-led jv-system-status-green jv-tooltip" data-position="right" title="'.esc_attr__('Green status: this check passed our system status test!','listopia').'"></div>';
										break;
									case 'yellow':
										echo '<div class="jv-system-status-led jv-system-status-yellow jv-tooltip" data-position="right" title="'.esc_attr__('Yellow status: this setting may affect the backend of the site. The front end should still run as expected. We recommend that you fix this.','listopia').'"></div>';
										break;
									case 'red' :
										echo '<div class="jv-system-status-led jv-system-status-red jv-tooltip" data-position="right" title="'.esc_attr__('Red status: the site may not work as expected with this option.','listopia').'"></div>';
										break;
									case 'info':
										echo '<div class="jv-system-status-led jv-system-status-info jv-tooltip" data-position="right" title="'.esc_attr__('Info status: this is just for information purposes and easier debug if a problem appears','listopia').'">i</div>';
										break;
								}
							?>
						</td>
						<td class="jv-system-status-value"><?php echo ent2ncr( $status_params['value'] ); ?></td>
					</tr>
					<?php
				}
			?>
				</tbody>
			</table>
			<?php
	   }
   }

   static function wp_memory_notation_to_number( $size ) {
	   $l   = substr( $size, -1 );
	   $ret = substr( $size, 0, -1 );
	   switch ( strtoupper( $l ) ) {
		   case 'P':
			   $ret *= 1024;
		   case 'T':
			   $ret *= 1024;
		   case 'G':
			   $ret *= 1024;
		   case 'M':
			   $ret *= 1024;
		   case 'K':
			   $ret *= 1024;
	   }
	   return $ret;
   }

}