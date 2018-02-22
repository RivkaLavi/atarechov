<?php
$arrPages = jvbpd_tso()->getPages(); ?>
<div class="jvbpd_ts_tab javo-opts-group-tab hidden" tar="post">
	<h2> <?php esc_html_e('Post Settings', 'listopia' ); ?> </h2>
	<table class="form-table">
	<tr><th>
		<?php esc_html_e( "Page Setting", 'listopia' );?>
	</th><td>

		<h4><?php esc_html_e( "Post submit page", 'listopia' );?>: </h4>
		<fieldset  class="inner">
			<select name="jvbpd_ts[blog_list_page_id]">
				<option value=""><?php esc_html_e( "Select a page", 'listopia' ); ?></option>
				<?php
				foreach( $arrPages as $objPage ) {
					printf(
						'<option value="%1$s"%3$s>%2$s</option>',
						$objPage->ID, $objPage->post_title,
						selected( jvbpd_tso()->get( 'blog_list_page_id' ) == $objPage->ID, true, false )
					);
				} ?>
			</select>
			<div class="description"><?php esc_html_e( "A blog list page to be moved when list button (or icon) is pressed on single post pages.", 'listopia' );?></div>
		</fieldset>

	</td></tr><tr><th>
		<?php esc_html_e( "Header", 'listopia' );?>
	</th><td>

		<h4><?php esc_html_e( "Post Header Setting", 'listopia' ); ?></h4>
		<fieldset class="inner">
			<dl>
				<dt><?php esc_html_e( "Initial Header Background Color", 'listopia' );?></dt>
				<dd><input type="text" name="jvbpd_ts[hd][post_header_bg]" value="<?php echo esc_attr( jvbpd_tso()->header->get( 'post_header_bg', '#506ac5' ));?>" class="wp_color_picker" data-default-color="#506ac5"></dd>
			</dl>
		</fieldset>

	</td></tr>
	</table>
</div>