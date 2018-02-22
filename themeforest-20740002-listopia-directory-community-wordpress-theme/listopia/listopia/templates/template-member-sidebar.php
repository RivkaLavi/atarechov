<?php
global $members_template;

if( apply_filters( 'jvbpd_member_sidebar_display', true  ) ) {
	 ?>

	<div class="jvbpd-member-sidebar-overlay"></div>
	<div class="jvbpd-member-sidebar widget">

		<div class="opener">
			<i class="show-close jvbpd-icon2-arrow-left"></i>
			<i class="show-open jvbpd-icon2-none"></i>
		</div>

		<?php if( shortcode_exists( 'jvbpd_bp_member_list' ) && shortcode_exists( 'jvbpd_bp_group_list' ) ) : ?>
			<div class="sections-group">
				<div class="section bp-member">
					<?php echo do_shortcode( sprintf( '[jvbpd_bp_member_list max="5" title="%s" filter_type="dropdown"]', esc_html__( "Members", 'listopia' ) ) ); ?>
				</div>
				<div class="section bp-group">
					<?php echo do_shortcode( sprintf( '[jvbpd_bp_group_list max="5" title="%s" filter_type="dropdown"]', esc_html__( "Groups", 'listopia' ) ) ); ?>
				</div>
			</div><!-- section-group -->
		<?php
		else:
			printf( '<div class="alert show-open bg-faded">%s</a>', esc_html__( "Please activate 'Core Plugin'", 'listopia' ) );
		endif;?>
	</div>
<?php
}