<?php
if( !isset( jvbpd_admin()->cache_categories ) ) {
	jvbpd_admin()->cache_categories = get_terms( array( 'taxonomy' => 'category', 'fields' => 'id=>name', 'empty_hide' => false ) );
} ?>

<p class="description description-wide">
	<label for="wide-menu-categories-<?php echo esc_attr( $item_id ); ?>">
		<span><?php esc_html_e( "Mega menu categories", 'listopia' ); ?></span>
		<select id="wide-menu-categories-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom" name="<?php echo esc_attr( jvbpd_admin()->getNavField(  $item_id, '_wide_menu_category' ) );?>">
			<option value=""><?php esc_html_e( "Disabled", 'listopia' ); ?></option>
			<option value="all" <?php selected( 'all' == $item->wide_menu_category ); ?>><?php esc_html_e( "All Category", 'listopia' ); ?></option>
			<?php
			foreach( jvbpd_admin()->cache_categories as $intTermID => $strTermName ) {
				printf( '<option value="%1$s"%3$s>%2$s</option>', $intTermID, $strTermName, selected( $intTermID == $item->wide_menu_category, true, false ) );
			} ?>
		</select>
	</label>
</p>