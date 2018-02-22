<?php if( !empty( $sectionMeta[ 'passed' ] ) ) : ?>
<h4>
	<i class="jv-helper-icon success"></i>
	<?php esc_html_e( "Permalink has been setup properly.", 'listopia' ); ?>
</h4>
<?php else: ?>
<p>
	<div><?php esc_html_e( "Our theme is compatible with permalink structure. it's also good for SEO.", 'listopia' ); ?></div>
	<div><?php esc_html_e( "Please setup permalink to 'Post name'.", 'listopia' ); ?></div>
</p>
<p>
	<a href="<?php echo admin_url( 'options-permalink.php' ); ?>" class="button button-primary">
		<?php esc_html_e( "Go Permalink Settings", 'listopia' ); ?>
	</a>
</p>
<?php endif; ?>
<hr>
<h4><?php esc_html_e( "Permalink Documentation", 'listopia' ); ?></h4>
<a href="<?php echo esc_url( apply_filters( 'jvbpd_doc_url', '' ) ); ?>" target="_blank" class="button"><?php esc_html_e( "Documentation", 'listopia' ); ?></a>
<a href="<?php echo admin_url( 'options-permalink.php' ); ?>" class="button button-primary"><?php esc_html_e( "Setup Again", 'listopia' ); ?></a>