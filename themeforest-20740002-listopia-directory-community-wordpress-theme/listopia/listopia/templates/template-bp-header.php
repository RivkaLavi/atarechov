<?php

$strTitleString = esc_html__( "Page Title", 'listopia' );
if( jvbpd_bp()->is_bp_page( Array( 'member' ), true ) ) {
	$strTitleString = esc_html__( "Total Member Title", 'listopia' );
}elseif( jvbpd_bp()->is_bp_page( Array( 'group' ), true ) ) {
	$strTitleString = esc_html__( "Total Group Title", 'listopia' );
}elseif( jvbpd_bp()->is_bp_page( Array( 'activity' ), true ) ) {
	$strTitleString = esc_html__( "Total Activity Title", 'listopia' );
}elseif( jvbpd_bp()->is_bp_page( Array( 'register' ) ) ) {
	$strTitleString = esc_html__( "Register Title", 'listopia' );
} ?>
<div class="page-header" style="background-color:#e8e8e8;">
	<div class="container">
		<div class="ph-inner">
			<div class="pull-left"><h1><?php echo esc_html( $strTitleString ); ?></h1></div>
			<div class="pull-right">
				<?php echo jvbpd_layout()->getBreadcrumb(); ?>
			</div>
		</div>
	</div><!-- container -->
</div><!--page-header-->