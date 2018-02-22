<?php
$arrPageSettings			= Array(
	'page-option-general'	=> Array(
		'label'						=> esc_html__( "General", 'listopia' ),
		'icon'						=> 'fa fa-bookmark-o',
		'post_type'				=> Array( 'page' ),
		'active'					=> true,
	),
	'page-option-sidebar'	=> Array(
		'label'						=> esc_html__( "Sidebar", 'listopia' ),
		'icon'						=> 'fa fa-columns',
		'post_type'				=> Array( 'post', 'page' ),
	),
	'page-option-header'	=> Array(
		'label'						=> esc_html__( "Header", 'listopia' ),
		'icon'						=> 'fa fa-film',
		'post_type'				=> Array( 'page' ),
	),
	'page-option-navi'		=> Array(
		'label'						=> esc_html__( "Menu", 'listopia' ),
		'icon'						=> 'fa fa-navicon',
		'post_type'				=> Array( 'page' ),
	),
	'page-option-footer'	=> Array(
		'label'						=> esc_html__( "Footer", 'listopia' ),
		'icon'						=> 'fa fa-file',
		'post_type'				=> Array( 'post', 'page' ),
	)
);
$arrPageSettings				= apply_filters(
	'jvbpd_admin_page_options'
	, $arrPageSettings
);
$arrPageSettingNav			= $arrPageSettingContents = Array();
$hasActiveNav					= false;

if( !empty( $arrPageSettings ) ) : foreach( $arrPageSettings as $option => $optionMeta ) {

	if( !in_Array( get_post_type( get_the_ID() ), $optionMeta[ 'post_type' ] ) )
		continue;

	$hasActiveNav			= isset( $optionMeta[ 'active' ] ) || $hasActiveNav;
	$arrPageSettingNav[]	= Array(
		'ID'				=> $option
		, 'label'			=> $optionMeta[ 'label' ]
		, 'icon'			=> $optionMeta[ 'icon' ]
		, 'active'			=> isset( $optionMeta[ 'active' ] )
		, 'require'		=> isset( $optionMeta[ 'require' ] )? $optionMeta[ 'require' ] : false

	);
	$arrPageSettingContents[]	= Array(
		'ID'				=> $option
		, 'label'			=> $optionMeta[ 'label' ]
		, 'file'				=> apply_filters(
			'jvbpd_admin_page_options_template'
			, self::$instance->template_part . '/' . $option . '.php'
			, $option
		)
		, 'active'		=> isset( $optionMeta[ 'active' ] )
	);
} endif;

if( !$hasActiveNav )
{
	$keyFirstNav	= Array_Keys( $arrPageSettingNav );
	$keyFirstNav	= isset( $keyFirstNav[0] ) ? $keyFirstNav[0] : false;
	if( $keyFirstNav  !== false) {
		if( isset( $arrPageSettingNav[ $keyFirstNav ] ) )
			$arrPageSettingNav[ $keyFirstNav ][ 'active' ]			= true;
		if( isset( $arrPageSettingContents[ $keyFirstNav ] ) )
			$arrPageSettingContents[ $keyFirstNav ][ 'active' ]	= true;
	}
}

if( false === ( $jvbpd_header_option = get_post_meta( get_the_ID(), 'jvbpd_hd_post', true ) ) )
$jvbpd_header_option = Array();
$GLOBALS[ 'jvbpd_query' ] = new jvbpd_array( $jvbpd_header_option );
$jvbpd_options = Array(
	'header_type' => apply_filters(
			'jvbpd_options_header_types'
			, Array(
				esc_html__( "Default as theme settings", 'listopia' )	=> '',
				esc_html__( "Disable header", 'listopia' )	=> 'disable-header',

			)
	)
	, 'footer_layout' => Array(
		esc_html__( "Default as theme settings", 'listopia' )	=> ''
		, esc_html__( "Wide", 'listopia' )						=> 'wide'
		, esc_html__( "Boxed", 'listopia' )						=> 'active'
		, esc_html__( "Disable footer", 'listopia' )			=> 'disable-footer'
	)
	, 'header_skin' => Array(
		esc_html__( "Default as theme settings", 'listopia' )	=> ""
		, esc_html__( "Light", 'listopia' )						=> "light"
		, esc_html__( "Dark", 'listopia' )						=> "dark"
	)
	, 'able_disable' => Array(
		esc_html__( "Default as theme settings", 'listopia' )	=> ""
		, esc_html__( "Able", 'listopia' )						=> "enable"
		, esc_html__( "Disable", 'listopia' )					=> "disabled"
	)
	, 'default_able' => Array(
		esc_html__( "Default as theme settings", 'listopia' )	=> ""
		, esc_html__( "Custom setting for this page", 'listopia' )	=> "enable"
	)
	, 'header_fullwidth' => Array(
		esc_html__("Default as theme settings", 'listopia' )		=> ""
		, esc_html__("Center Left", 'listopia' )						=> "fixed"
		, esc_html__("Center Right", 'listopia' )				=> "fixed-right"
		, esc_html__("Wide", 'listopia' )						=> "full"
	)
	, 'header_relation' => Array(
		esc_html__("Default as theme settings", 'listopia' )		=> ""
		, esc_html__("Default menu", 'listopia' )				=> "relative"
		, esc_html__("Transparency menu", 'listopia' )			=> "absolute"
	)
);
?>
<div class="jv-page-settings-wrap">

	<ul class="jv-page-settings-nav">
		<?php
		if( !empty( $arrPageSettingNav ) ) : foreach( $arrPageSettingNav as $nav ) :
			$isActive				= (boolean) $nav[ 'active' ];
			$activeClass			= $isActive ? ' active' : null;
			$reqTemplate		= '';
			if( $templateName = $nav[ 'require' ] ){
				$activeClass		.= ' hidden require-template';
				$reqTemplate	= " data-require='{$templateName}'";
			}
			echo "<li class=\"jv-page-settings-nav-item {$nav[ 'ID' ]}{$activeClass}\"{$reqTemplate}" . ' ';
			echo "data-content=\".{$nav[ 'ID' ]}\"><i class=\"{$nav[ 'icon' ]}\"></i> {$nav[ 'label' ]}";
		endforeach; else:
			echo "<li></li>";
		endif ?>
	</ul>

	<div class="jv-page-settings-contents">
		<?php
		if( !empty( $arrPageSettingContents ) ) : foreach( $arrPageSettingContents as $content ) :
			$isActive		= (boolean) $content[ 'active' ];
			$activeClass	= $isActive ? ' active' : null;
			echo "<div class=\"jv-page-settings-content {$content[ 'ID' ]}{$activeClass}\">";
			printf( "<h3 class=\"jv-page-settings-content-label\">{$content[ 'label' ]} %s</h3>", esc_html__( "Settings", 'listopia' ) );
				if( file_exists( $content[ 'file' ] ) ) {
					require_once( $content[ 'file' ] );
				}
			echo "</div>";
		endforeach; else:
			printf( "<h3 class='jv-page-settings-content-label'>%s</h3>", esc_html__( "Not found settings.", 'listopia' ) );
		endif; ?>
	</div>
</div>