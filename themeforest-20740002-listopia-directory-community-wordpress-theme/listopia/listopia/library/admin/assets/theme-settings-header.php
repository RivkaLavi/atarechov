<?php
$jvbpd_options = Array(
	'header_type' => apply_filters( 'jvbpd_options_header_types', Array() ),
	'header_skin' => Array(
		esc_html__("Light", 'listopia' ) => "",
		esc_html__("Dark", 'listopia' ) => "dark"
	),
	'able_disable' => Array(
		esc_html__("Disable", 'listopia' ) => "disabled",
		esc_html__("Able", 'listopia' ) => "enable"
	),
	'sticky_able_disable' => Array(
		esc_html__("Able", 'listopia' ) => "enable",
		esc_html__("Disable", 'listopia' ) => "disabled"
	),
	'header_fullwidth' => Array(
		esc_html__("Center Left", 'listopia' ) => "fixed",
		esc_html__("Center Right", 'listopia' ) => "fixed-right",
		esc_html__("Wide", 'listopia' ) => "full"
	),
	'header_relation' => Array(
		esc_html__("Transparency menu", 'listopia' )	=> "absolute",
		esc_html__("Default menu", 'listopia' ) => "relative"
	),
	'default_header_relation' => Array(
		esc_html__("Default menu", 'listopia' )	=> "relative",
		esc_html__("Transparency menu", 'listopia' )	=> "absolute"
	),
); ?>

<div class="jvbpd_ts_tab javo-opts-group-tab hidden" tar="header">
	<h2><?php esc_html_e("Heading Settings", 'listopia' ); ?> </h2>
	<table class="form-table">

	<tr><th>
		<?php esc_html_e( "Default Style", 'listopia' );?>
		<span class="description"></span>
	</th><td>

		<?php if( jvbpd_layout()->getThemeType() == 'jvd-lk' ) : ?>

			<h4 class="pull-left"><?php esc_html_e( "Topbar", 'listopia' );?></h4>
			<fieldset class="inner margin-10-0">

				<select name="jvbpd_ts[topbar_use]" data-show-field='<?php echo json_encode( Array( 'enable' => Array( '#topbar_height_field', '#topbar_color_field', '#topbar_text_color_field', '#topbar_logo_field' ) ) ); ?>'>
					<?php
					foreach(
						Array(
							'enable' => esc_html__( "Enable", 'listopia' ),
							'disable' => esc_html__( "Disable", 'listopia' ),
						) as $strValue => $strLabel
					) printf(
						'<option value="%1$s"%3$s>%2$s</option>',
						$strValue, $strLabel,
						selected( $strValue == jvbpd_tso()->get( 'topbar_use', 'disable' ), true, false )
					); ?>
				</select>

			</fieldset>

			<dl id="topbar_height_field" class="hidden">
				<dt><?php esc_html_e( "Topbar Height", 'listopia' );?></dt>
				<dd><input type="number" name="jvbpd_ts[hd][topbar_height]" value="<?php echo esc_attr( jvbpd_tso()->header->get( 'topbar_height', '0' ));?>"></dd>
			</dl>

			<dl id="topbar_color_field" class="hidden">
				<dt><?php esc_html_e( "Topbar Background Color", 'listopia' );?></dt>
				<dd><input type="text" name="jvbpd_ts[hd][topbar_bg_color]" value="<?php echo esc_attr( jvbpd_tso()->header->get( 'topbar_bg_color', '#ffffff' ));?>" class="wp_color_picker" data-default-color="#ffffff"></dd>
			</dl>

			<dl id="topbar_text_color_field" class="hidden">
				<dt><?php esc_html_e( "Topbar Text Color", 'listopia' );?></dt>
				<dd><input type="text" name="jvbpd_ts[hd][topbar_text_color]" value="<?php echo esc_attr( jvbpd_tso()->header->get( 'topbar_text_color', '#000000' ));?>" class="wp_color_picker"></dd>
			</dl>

			<dl id="topbar_logo_field" class="hidden">
				<dt><?php esc_html_e( "Topbar Logo", 'listopia' );?></dt>
				<dd style="width:70%;">
					<fieldset>
						<input type="text" name="jvbpd_ts[hd][topbar_logo]" value="<?php echo esc_attr( jvbpd_tso()->header->get( 'topbar_logo' ) );?>" tar="topbar_logo">
						<input type="button" class="button button-primary fileupload" value="<?php esc_attr_e('Select Image', 'listopia' );?>" tar="topbar_logo">
						<input class="fileuploadcancel button" tar="topbar_logo" value="<?php esc_attr_e('Delete', 'listopia' );?>" type="button">
						<p>
							<?php esc_html_e("Preview",'listopia' ); ?><br>
							<img src="<?php echo esc_attr( jvbpd_tso()->header->get( 'topbar_logo' ) ); ?>" tar="topbar_logo">
						</p>
					</fieldset>
				</dd>
			</dl>

			<?php
			foreach(
				Array(
					'sidebar_left' => Array(
						'label' => esc_html__( "Left Sidebar", 'listopia' ),
						'note' => esc_html__( "It shows when there is at least one menu. otherwise, it doesn't show.", 'listopia' ),
					),
					'sidebar_member' => Array(
						'label' => esc_html__( "Member Sidebar", 'listopia' ),
						'note' => esc_html__( "It works when required plugins ('Core', 'BuddyPress') are actived. For groups, group component in BuddyPress needs to be actived.", 'listopia' ),
					),
				) as $strOptionName => $strOptionMeta
			) {
				?>
				<h4 class="pull-left"><?php echo esc_html( $strOptionMeta[ 'label' ] ); ?></h4>
				<fieldset class="inner margin-20-0 <?php if($strOptionMeta[ 'label' ]=='Member Sidebar') echo 'margin-custom-28-0'; ?>">
					<select name="jvbpd_ts[<?php echo esc_attr( $strOptionName ); ?>]">
						<?php
						foreach(
							Array(
								'enabled' => esc_html__( "Enable", 'listopia' ),
								'disabled' => esc_html__( "Disabled", 'listopia' ),
							) as $strOption => $strOptionLabel
						) {
							printf(
								'<option value="%1$s"%3$s>%2$s</option>',
								$strOption, $strOptionLabel,
								selected( $strOption == jvbpd_tso()->get( $strOptionName, apply_filters( 'jvbpd_theme_option_' . $strOptionName . '_default', '' ) ), true, false )
							);
						} ?>
					</select>
					<?php printf( '<div class="description">%1$s : %2$s</div>', esc_html__( "Note", 'listopia' ), $strOptionMeta[ 'note' ] ); ?>
				</fieldset>
				<?php
			}
		endif; ?>

		<h4><?php esc_html_e( "General", 'listopia' );?></h4><hr>
		<fieldset>
			<?php if( jvbpd_layout()->getThemeType() == 'jvd-lk' ) : ?>
				<dl>
					<dt><?php esc_html_e( "Header Menu Type", 'listopia' );?></dt>
					<dd>
						<select name="jvbpd_ts[hd][header_type]" data-show-field='{"jv-nav-row-2":["#header_banner_field"]}'>
							<?php
							foreach( $jvbpd_options['header_type'] as $label => $value ) {
								printf(
									"<option value='{$value}' %s>{$label}</option>",
									selected( $value == jvbpd_tso()->header->get(
										'header_type', apply_filters( 'jvbpd_theme_option_header_type_default', 'dashboard-style', jvbpd_tso() )
									), true, false
								) );
							} ?>
						</select>
					</dd>
				</dl>
			<?php endif; ?>

			<dl class="hidden" id="header_banner_field">
				<dt><?php esc_html_e( "Header Banner", 'listopia' );?></dt>
				<dd style="width:70%;">
					<fieldset>
						<input type="text" name="jvbpd_ts[hd][header_banner]" value="<?php echo esc_attr( jvbpd_tso()->header->get( 'header_banner' ) );?>" tar="header_banner">
						<input type="button" class="button button-primary fileupload" value="<?php esc_attr_e('Select Image', 'listopia' );?>" tar="header_banner">
						<input class="fileuploadcancel button" tar="header_banner" value="<?php esc_attr_e('Delete', 'listopia' );?>" type="button">
						<p>
							<?php esc_html_e("Preview",'listopia' ); ?><br>
							<img src="<?php echo esc_attr( jvbpd_tso()->header->get( 'header_banner' ) ); ?>" tar="header_banner">
						</p>
					</fieldset>
					<div class="description"><?php esc_html_e("Note: This banner is for only 2 Row type - Right banner menu type.", 'listopia' );?></div>
				</dd>
			</dl>

			<dl>
				<dt><?php esc_html_e( "Navi Type", 'listopia' );?></dt>
				<dd>
					<select name="jvbpd_ts[hd][header_relation]">
						<?php
						foreach( $jvbpd_options['default_header_relation'] as $label => $value )
						{
							printf( "<option value='{$value}' %s>{$label}</option>", selected( $value == jvbpd_tso()->header->get("header_relation"), true, false ) );
						} ?>
					</select>
					<div class="description"><?php esc_html_e("Caution: If you choose transparent menu type, page's main text contents ascends as much as menu's height to make menu transparent.", 'listopia' );?></div>
				</dd>
			</dl>

			<dl>
				<dt><?php esc_html_e( "Header Menu Skin ( Logo, Text )", 'listopia' );?></dt>
				<dd>
					<select name="jvbpd_ts[hd][header_skin]">
						<?php
						foreach( $jvbpd_options['header_skin'] as $label => $value )
						{
							printf( "<option value='{$value}' %s>{$label}</option>", selected( $value == jvbpd_tso()->header->get("header_skin"), true, false ) );
						} ?>
					</select>
					<div class="description"><?php esc_html_e("Depends on this option, logo changes to the color appropriate to the skin and if selected logo of skin option is not uploaded, theme's basic logo will be shown.", 'listopia' );?></div>
				</dd>
			</dl>
			<dl>
				<dt><?php esc_html_e( "Initial Header Background Color", 'listopia' );?></dt>
				<dd><input type="text" name="jvbpd_ts[hd][header_bg]" value="<?php echo esc_attr( jvbpd_tso()->header->get( 'header_bg', '#506ac5' ));?>" class="wp_color_picker" data-default-color="#506ac5"></dd>
			</dl>
			<dl>
				<dt><?php esc_html_e( "Header Memu Link Color", 'listopia' );?></dt>
				<dd><input type="text" name="jvbpd_ts[hd][db_menu_link_color]" value="<?php echo esc_attr( jvbpd_tso()->header->get("db_menu_link_color", "#ffffff"));?>" class="wp_color_picker" data-default-color="#ffffff">
				<div class="description"><?php esc_html_e("It's for only Dashboard menu type.", 'listopia' );?></div>

				</dd>
			</dl>

			<dl>
				<dt><?php esc_html_e( "Initial Header Transparency", 'listopia' );?></dt>
				<dd>
					<input type="text" name="jvbpd_ts[hd][header_opacity]" value="<?php echo (float)jvbpd_tso()->header->get("header_opacity", 1); ?>">
					<div class="description"><?php esc_html_e("Please enter numerical value from 0.0 to 1.0. The higher the value you enter, the more opaque it will be. Ex. 1=opaque, 0= invisible.", 'listopia' );?></div>
				</dd>
			</dl>

			<dl>
				<dt><?php esc_html_e( "Navi Shadow", 'listopia' );?></dt>
				<dd>
					<select name="jvbpd_ts[hd][header_shadow]">
						<?php
						foreach( $jvbpd_options['able_disable'] as $label => $value )
						{
							printf( "<option value='{$value}' %s>{$label}</option>", selected( $value == jvbpd_tso()->header->get("header_shadow"), true, false ) );
						} ?>
					</select>
				</dd>
			</dl>
			<dl>
				<dt><?php esc_html_e( "Navi Position", 'listopia' );?></dt>
				<dd>
					<select name="jvbpd_ts[hd][header_fullwidth]">
						<?php
						foreach( $jvbpd_options['header_fullwidth'] as $label => $value ) {
							printf( "<option value='{$value}' %s>{$label}</option>", selected( $value == jvbpd_tso()->header->get( 'header_fullwidth', 'full' ), true, false ) );
						} ?>
					</select>
				</dd>
			</dl>
		</fieldset>

	</td></tr>
	</table>
</div>