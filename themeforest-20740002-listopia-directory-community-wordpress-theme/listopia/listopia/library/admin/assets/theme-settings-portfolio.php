<?php
$jvbpd_options = Array(
	'header_type' => apply_filters( 'jvbpd_options_header_types', Array() )
	, 'header_skin' => Array(
		esc_html__("Dark", 'listopia' )							=> ""
		, esc_html__("Light", 'listopia' )						=> "light"
	)
	, 'able_disable' => Array(
		esc_html__("Disable", 'listopia' )					=> "disabled"
		,esc_html__("Able", 'listopia' )							=> "enable"

	)
	, 'header_fullwidth' => Array(
		esc_html__("Center Left", 'listopia' )						=> "fixed"
		, esc_html__("Center Right", 'listopia' )			=> "fixed-right"
		, esc_html__("Wide", 'listopia' )						=> "full"
	)
	, 'header_relation' => Array(
		esc_html__("Transparency menu", 'listopia' )	=> "absolute"
		,esc_html__("Default menu", 'listopia' )				=> "relative"
	)
	, 'portfolio_detail_page_head_style' => Array(
		esc_html__("Featured image with Title", 'listopia' )	=> "featured_image"
		,esc_html__("Title on the top", 'listopia' )	=> "title_on_top"
		,esc_html__("Title upper content ", 'listopia' )				=> "title_upper_content"
	)

	, 'portfolio_detail_page_layout' => Array(
		esc_html__("Full Width - Content After", 'listopia' )					=> "fullwidth-content-after"
		,esc_html__("Full Width - Content Before", 'listopia' )					=> "fullwidth-content-before"
		,esc_html__("Right - Side Bar", 'listopia' )					=> "quick-view"

	)
); ?>

<div class="jvbpd_ts_tab javo-opts-group-tab hidden" tar="portfolio">
	<h2><?php esc_html_e("Portfolio Page Settings", 'listopia' ); ?> </h2>
	<table class="form-table">

	<tr><th>
		<?php esc_html_e( "Header / Menu", 'listopia' );?>
		<span class="description"></span>
	</th><td>

		<h4><?php esc_html_e( "Header Style", 'listopia' ); ?></h4>
		<fieldset class="inner">
			<dl>
				<dt><?php esc_html_e("Header type", 'listopia' ); ?></dt>
				<dd>
					<select name="jvbpd_ts[hd][portfolio_detail_page_head_style]">
						<?php
						foreach( $jvbpd_options['portfolio_detail_page_head_style'] as $label => $value )
						{
							printf( "<option value='{$value}' %s>{$label}</option>", selected( $value == jvbpd_tso()->header->get("portfolio_detail_page_head_style"), true, false ) );
						} ?>
					</select>
					<div class="description"><?php esc_html_e("Caution: If you choose transparent menu type, page's main text contents ascends as much as menu's height to make menu transparent.", 'listopia' );?></div>
				</dd>
			</dl>
		</fieldset>
	</td></tr>


	<tr>
		<th>
			<?php esc_html_e( "Default Style", 'listopia' );?>
			<span class="description"></span>
		</th>
		<td>
			<h4><?php esc_html_e( "Default Page Layout", 'listopia' ); ?></h4>
			<fieldset class="inner">
				<select name="jvbpd_ts[hd][portfolio_detail_page_layout]">
							<?php
							foreach( $jvbpd_options['portfolio_detail_page_layout'] as $label => $value )
							{
								printf( "<option value='{$value}' %s>{$label}</option>", selected( $value == jvbpd_tso()->header->get("portfolio_detail_page_layout"), true, false ) );
							} ?>
						</select>
						<div class="description"><?php esc_html_e("Caution: If you choose transparent menu type, page's main text contents ascends as much as menu's height to make menu transparent.", 'listopia' );?></div>
			</fieldset>
		</td>
	</tr>
	</table>
</div>