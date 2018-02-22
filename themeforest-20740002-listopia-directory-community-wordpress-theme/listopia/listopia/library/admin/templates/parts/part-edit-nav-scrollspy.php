<p class="field-custom description ">
	<label for="edit-menu-item-scrollspy-<?php echo esc_attr( $item_id ); ?>">
		<br>
		<input type="checkbox" id="edit-menu-item-scrollspy-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom" name="<?php echo esc_attr(  jvbpd_admin()->getNavField( $item_id, '_menu_item_scrollspy' ) );?>" value="1" <?php checked( '1' == $item->scrollspy ); ?> />
		<?php esc_html_e( "Use as a scrollspy menu", 'listopia' ); ?>
	</label>
</p>
<p class="field-custom description ">
	<label for="edit-menu-item-scrollspy-author-<?php echo esc_attr( $item_id ); ?>">
		<?php esc_html_e( "Scrollspy Anchor", 'listopia' ); ?><br />
		<input type="text" id="edit-menu-item-scrollspy-author-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom" name="<?php echo esc_attr( jvbpd_admin()->getNavField(  $item_id, '_menu_item_anchor' ) );?>" value="<?php echo esc_attr( $item->anchor ); ?>" />
	</label>
</p>