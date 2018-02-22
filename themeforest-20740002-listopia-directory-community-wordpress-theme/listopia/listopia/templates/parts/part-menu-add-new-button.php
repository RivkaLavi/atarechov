<?php
$strAddNewButtons = Array();
foreach(
	Array(
		'add_listing' => esc_html__( "Listing", 'listopia' ),
		'bp_permalink' => esc_html__( "Forum", 'listopia' ),
		'lvbpp_permalink' => esc_html__( "Post", 'listopia' ),
	) as $addNewKey => $addNewMeta
) {
	$addNewPageID = jvbpd_tso()->get( $addNewKey, 0 );
	$addNewPage = get_post( $addNewPageID );
	if( 0 < $addNewPageID && $addNewPage instanceof WP_Post ) {
		$strAddNewButtons[] = sprintf(
			'<li><a href="%1$s" target="_self"><i class="%2$s"></i> %3$s</a></li>',
			get_permalink( $addNewPage->ID ), 'jvbpd-icon-basic_sheet_pencil', $addNewMeta
		);
	}
} ?>
	<!-- Add New Button -->
	<div class="btn btn-group hidden-xs hidden-sm">
		<button type="button" class="btn btn-sm btn-primary pull-right btn-rounded dropdown-toggle admin-color-setting" data-toggle="dropdown" aria-expanded="true">
			<i class="fa fa-plus"></i>
			<span class="hidden-sm hidden-xs"><?php echo strtoupper( esc_html__( "New", 'listopia' ) ); ?></span>
			<i class="fa fa-angle-down"></i>
		</button>
		<ul class="dropdown-menu drop-right triangle-arrow-right" role="menu"><?php echo join( '', $strAddNewButtons ); ?></ul>
	</div>
	<!-- Add New button end -->
<?php
//endif;