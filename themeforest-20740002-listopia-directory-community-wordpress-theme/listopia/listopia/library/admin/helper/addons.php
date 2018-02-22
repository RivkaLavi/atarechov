<h1><?php esc_html_e( 'Addons setup', 'listopia' ); ?></h1>

<?php
tgmpa_load_bulk_installer();
// install plugins with TGM.
if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
	die( 'Failed to find TGM' );
}
$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'envato-setup' );

$method = '';
$fields = array_keys( $_POST );

if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
	return true;
}

if ( ! WP_Filesystem( $creds ) ) {
	request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
	return true;
} ?>
<h1><?php esc_html_e( "Install and activate Addons", 'listopia' ); ?></h1>
<form method="post">

	<?php
	$addons = $helper->_get_addons();
	if ( count( $addons['all'] ) ) {
		?>
		<p><?php esc_html_e( 'You will get free addons during an event. It will automatically install and activate in you site.', 'listopia' ); ?></p>
		<ul class="envato-wizard-plugins">
			<?php foreach ( $addons['all'] as $plugin ) { ?>
				<li data-slug="<?php echo esc_attr( $plugin[ 'slug' ] ); ?>"><?php echo esc_html( $plugin['name'] ); ?>
					<span>
						<?php
						$keys = array();
						if ( isset( $addons[ 'install' ][ $plugin[ 'slug' ] ] ) ) {
							$keys[] = 'Installation';
						}
						if ( isset( $addons[ 'update' ][ $plugin[ 'slug' ] ] ) ) {
							$keys[] = 'Update';
						}
						if ( isset( $addons[ 'activate' ][ $plugin[ 'slug' ] ] ) ) {
							$keys[] = 'Activation';
						}
						echo implode( ' and ', $keys ) . ' required';
						?>
					</span>
					<div class="spinner"></div>
				</li>
			<?php } ?>
		</ul>
		<?php
	} else {
		echo '<p><strong>' . esc_html_e( 'Good news! All addons are already installed and up to date. Please continue.', 'listopia' ) . '</strong></p>';
	} ?>

	<p>
		<?php esc_html_e( "If it's failed, it's mostly from a plugin folder permission issue.", 'listopia' ); ?><br>
		<span style="color:red;"><?php esc_html_e( "Please click to have a look how to get a license for updates.", 'listopia' ); ?></span>
	</p>


	<p class="jvbpd-wizard-actions step">
		<a href="<?php echo esc_url( $helper->get_next_step_link() ); ?>" id="jvbpd-wizard-plugins" data-type="addons" class="button button-primary button-next button-large"><?php esc_html_e( 'Continue', 'listopia' ); ?></a>
		<a href="<?php echo esc_url( 'doc.wpjavo.com/listopia/how-do-i-get-a-license-for-addons/' ); ?>" class="button button-large" target="_blank"><?php esc_html_e( "How do i get a license for addons", 'jvfrmtd' ); ?></a>
	</p>
</form>