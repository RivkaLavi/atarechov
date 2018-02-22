<p class="field-custom description ">
	<label for="edit-menu-item-subtitle-<?php echo esc_attr( $item_id ); ?>">
		<input type="checkbox" id="edit-menu-item-subtitle-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom" name="<?php echo esc_attr(  jvbpd_admin()->getNavField(  $item_id, '_wide_menu' ) );?>" value="yes" <?php echo checked( 'yes' == $item->wide_menu ); ?>" />
		<?php esc_html_e( "Wide menu (for Only top-level menu)", 'listopia' ); ?>
	</label>
</p>