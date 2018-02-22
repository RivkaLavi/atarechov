<?php if( !empty( $sectionMeta[ 'passed' ] ) ) : ?>
<h4>
	<i class="jv-helper-icon success"></i>
	<?php esc_html_e( "Widgets have been setup properly.", 'listopia' ); ?>
</h4>
<?php else: ?>
<p>
	<?php esc_html_e( "We recommend you to add some widgets for proper functionality", 'listopia' ); ?>
</p>
<p><a href="<?php echo admin_url( 'widgets.php' ); ?>" class="button button-primary"><?php esc_html_e( "Go to Widgets Settings", 'listopia' ); ?></a></p>
<?php endif; ?>
<hr>
<h4><?php esc_html_e( "Widget Setting Documentation", 'listopia' ); ?></h4>
<a href="<?php echo esc_url( apply_filters( 'jvbpd_doc_url', '' ) ); ?>" target="_blank" class="button"><?php esc_html_e( "Documentation", 'listopia' ); ?></a>
<a href="<?php echo admin_url( 'widgets.php' ); ?>" class="button button-primary"><?php esc_html_e( "Setup Again", 'listopia' ); ?></a>