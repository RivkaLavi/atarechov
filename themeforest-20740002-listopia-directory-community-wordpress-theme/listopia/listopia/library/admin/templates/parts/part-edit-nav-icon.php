<p class="field-custom description ">
	<label for="edit-menu-item-icon-<?php echo esc_attr( $item_id ); ?>">
		<?php esc_html_e( "Icon Class (For Parent Menu on Left Sidebar Only)", 'listopia' ); ?><br />
		<input type="text" id="edit-menu-item-icon-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom" name="<?php echo esc_html(  jvbpd_admin()->getNavField(  $item_id, '_menu_item_icon' ) );?>" value="<?php echo esc_attr( $item->nav_icon ); ?>" />
	</label>
	<?php
	printf(
		'<div><a href="%1$s" target="_blank">%3$s</a>, <a href="%2$s" target="_blank">%4$s</a> <br>%5$s</div>',
		esc_url_raw( 'http://fontawesome.io/icons/' ),
		esc_url_raw( 'wpjavo.com/a/jvbpd-icon1/icon1-list.html' ),
		esc_html__( "Font awsome", 'listopia' ),
		esc_html__( "Javo custom icons", 'listopia' ),
		esc_html__( "Ex) jvbpd-icon1-shop2", 'listopia' )
	); ?>
</p>