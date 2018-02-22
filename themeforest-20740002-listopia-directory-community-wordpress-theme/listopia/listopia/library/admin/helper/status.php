<h2><?php esc_html_e( 'Check your server status', 'listopia' ); ?></h2>

<?php
$arrCheckLists = Array(
	'php_ver' => Array(
		'label' => esc_html__( "PHP Version", 'listopia' ),
		'desc' => esc_html__( "5.4.x", 'listopia' ),
		'value' => phpversion(),
		'state' => version_compare( '5.4.0', phpversion(), '<=' ),
	),
	'post_max' => Array(
		'label' => esc_html__( "Post Max Size", 'listopia' ),
		'desc' => esc_html__( "128M", 'listopia' ),
		'value' => ini_get( 'post_max_size' ),
		'state' =>
			intVal( apply_filters( 'jvbpd_memory_unit_conversion', '128M' ) ) <=
			intVal( apply_filters( 'jvbpd_memory_unit_conversion', ini_get( 'post_max_size' ) ) ),
	),
	'limit_memory' => Array(
		'label' => esc_html__( "WP MEMORY LIMIT", 'listopia' ),
		'desc' => esc_html__( "128M", 'listopia' ),
		'value' => WP_MEMORY_LIMIT,
		'state' =>
			intVal( apply_filters( 'jvbpd_memory_unit_conversion', '128M' ) ) <=
			intVal( apply_filters( 'jvbpd_memory_unit_conversion', WP_MEMORY_LIMIT ) ),
	),
	'wp_debug' => Array(
		'label' => esc_html__( "WP DEBUG", 'listopia' ),
		'desc' => esc_html__( "Off", 'listopia' ),
		'value' => ( WP_DEBUG ? esc_html__( "On", 'listopia' ) : esc_html__( "Off", 'listopia' ) ),
		'state' => defined( 'WP_DEBUG' ) && ! WP_DEBUG
	),
); ?>

<table width="100%">
	<thead>
		<tr>
			<th></th>
			<th style="text-align:center;"><?php esc_html_e( "Recommended", 'listopia' ); ?></th>
			<th style="text-align:center;"><?php esc_html_e( "Your Server", 'listopia' ); ?></th>
			<th style="text-align:center;"><?php esc_html_e( "Status", 'listopia' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
			if( !empty( $arrCheckLists ) ) {
				foreach( $arrCheckLists as $strKey => $arrMeta ) {
					?>
					<tr>
						<th style="text-align:left;"><?php echo esc_html( $arrMeta[ 'label' ] ); ?></th>
						<td style="text-align:center;"><span><?php echo esc_html( $arrMeta[ 'desc' ] ); ?></span></td>
						<td style="text-align:center;"><?php echo esc_html($arrMeta[ 'value' ] ); ?></td>
						<td style="text-align:center;"><span class="dashicons <?php echo $arrMeta[ 'state' ] ? esc_attr( 'dashicons-yes' )  : esc_attr( 'dashicons-no' ); ?>"></span></td>
					</tr>
					<?php
				}
			} ?>
		</tr>
	</tbody>
</table>


<p class="jvbpd-wizard-actions step">
	<a href="<?php echo esc_url( $helper->get_next_step_link() ); ?>" class="button button-primary button-next button-large button-next"><?php esc_html_e( 'Next', 'listopia' ); ?></a>
</p>