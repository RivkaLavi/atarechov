<div class="jvbpd_ts_tab javo-opts-group-tab hidden" tar="custom">
	<h2> <?php esc_html_e("Javo Customization Settings", 'listopia' ); ?> </h2>
	<table class="form-table">
	<tr><th>
		<?php esc_html_e( "CSS Stylesheet", 'listopia' );?>
		<span class="description"><?php esc_html_e('Please Add Your Custom CSS Code Here.', 'listopia' );?></span>
	</th><td>
		<h4><?php esc_html_e('Code:', 'listopia' );?></h4>
		<?php esc_html_e( '<style type="text/css">', 'listopia' );?>
		<fieldset>
			<textarea name="jvbpd_ts[custom_css]" class='large-text code' rows='15'><?php echo stripslashes( $jvbpd_tso->get( 'custom_css', '' ) );?></textarea>
		</fieldset>
		<?php esc_html_e( '</style>', 'listopia' );?>
	</td></tr><tr><th>
		<?php esc_html_e('Custom Script', 'listopia' );?>
		<span class="description">
			<?php esc_html_e(' If you have additional script, please add here.', 'listopia' );?>
		</span>
	</th><td>
		<h4><?php esc_html_e('Code:', 'listopia' );?></h4>
		<?php esc_html_e( '<script type="text/javascript">', 'listopia' );?>
		<fieldset>
			<textarea name="jvbpd_ts[custom_js]" class="large-text code" rows="15"><?php echo stripslashes( $jvbpd_tso->get('custom_js', ''));?></textarea>
		</fieldset>
		<?php esc_html_e( '</script>', 'listopia' );?>
		<div><?php esc_html_e('(Note : Please make sure that your scripts are NOT conflict with our own script or ajax core)', 'listopia' );?></div>
	</td></tr>
	</table>
</div>