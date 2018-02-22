<?php
$arrImageURL = wp_get_attachment_image_src( $item->nav_bg );
$arrImageURL = is_array( $arrImageURL ) ?  $arrImageURL[0] : ''; ?>
<p class="field-custom description ">
	<div class="field-header"> <?php esc_html_e( "Background Image", 'listopia' ); ?></div>
	<div class="field-body jv-media-uploader-hepler" data-handle-title="<?php esc_html_e( "Mega menu background", 'listopia' ); ?>" data-select-button="<?php esc_html_e( "Select", 'listopia' ); ?>">
		<div class="field-preview preview-container" style="background-image:url(<?php echo esc_url_raw( $arrImageURL ); ?>);"></div>
		<div class="field-action">
			<button type="button" class="button button-primary upload">
				<i class="dashicons dashicons-admin-appearance"></i>
				<?php esc_html_e( "Select", 'listopia' ); ?>
			</button>
			<button type="button" class="button remove">
				<?php esc_html_e( "Cancel", 'listopia' ); ?>
			</button>
			<input type="hidden" id="edit-menu-item-subtitle-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-custom" name="<?php echo esc_attr( jvbpd_admin()->getNavField(  $item_id, '_nav_bg' ) );?>" value="<?php echo esc_attr( $item->nav_bg ); ?>">
		</div>
	</div>
</p>