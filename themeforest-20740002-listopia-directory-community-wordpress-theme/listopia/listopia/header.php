<?php
/**
 * The Header template for Javo Theme
 *
 * @package WordPress
 * @subpackage Javo
 * @since Javo Themes 1.0
 */
// Get Options
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php echo esc_attr( get_bloginfo( 'pingback_url' ) ); ?>" />

<?php wp_head(); ?>
</head>
<body <?php body_class();?>>

<?php do_action( 'jvbpd_after_body_tag' );?>
<?php if( defined('ICL_LANGUAGE_CODE') ){ ?>
	<input type="hidden" name="jvbpd_cur_lang" value="<?php echo esc_attr( ICL_LANGUAGE_CODE );?>">
<?php }; ?>

<?php if(jvbpd_tso()->get( 'preloader_hide' ) == 'use'){ ?>
<div class="loading-page hidden <?php echo jvbpd_tso()->get( 'preloader_hide' ) !== 'use'? 'hidden': false;?>">
	<div id="status" class="bulat">
			<div id="dalbulat">
				<?php
				echo join( "\n", Array(
					"<span>",
					join( "</span>\n\t<span>", preg_split( '//u', strtoupper( esc_html__( "Loading", 'listopia' ) ), -1 ) ),
					'</span>',
				) ); ?>
			</div>
			<div class="luarbulat"></div>
	</div>
</div><!-- /.loading-page -->
<?php } ?>

<div><?php do_action( 'lava_navi_logo_after' ); ?></div>

<?php
if( 'enable' == jvbpd_tso()->get( 'preloader', false ) ) {
	printf(
		'<div class="%1$s"><div class="loader-thick-cycle"></div></div>',
		'preloader',
		'jvbpd-icon-cross',
		esc_html__( "Close", 'listopia' )
	);
} ?>

<?php
$jvbpdHeaderFile = apply_filters( 'jvbpd_load_header_file_name', null );
get_template_part( 'library/header/header', $jvbpdHeaderFile );

if( apply_filters( 'jvbpd_left_sidebar_display', true ) ) {
	get_template_part('library/header/left', 'sidebar');
} ?>

<div id="page-style">
	<div id="content-page-wrapper">
		<div class="container-fluid">
			<?php do_action( 'jvbpd_output_header', get_the_ID() ); ?>
