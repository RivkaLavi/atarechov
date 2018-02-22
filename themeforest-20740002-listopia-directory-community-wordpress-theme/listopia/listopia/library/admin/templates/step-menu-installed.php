<?php if( !empty( $sectionMeta[ 'passed' ] ) ) : ?>
<h4>
	<i class="jv-helper-icon success"></i>
	<?php esc_html_e( "Menu has been setup properly.", 'listopia' ); ?>
</h4>
<?php else: ?>
<p>
	<div><?php esc_html_e( "You have not added any menus.", 'listopia' ); ?></div>
	<div><?php esc_html_e( "Please setup menus", 'listopia' ); ?> <a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php esc_html_e( "here", 'listopia' ); ?></a>.</div>
</p>
<p><a href="<?php echo admin_url( 'nav-menus.php' ); ?>" class="button button-primary"><?php esc_html_e( "Go Menu Settings", 'listopia' ); ?></a></p>
<?php endif; ?>
<hr>
<h4><?php esc_html_e( "Menu Setting Documentation", 'listopia' ); ?></h4>
<a href="<?php echo esc_url( apply_filters( 'jvbpd_doc_url', '' ) ); ?>" target="_blank" class="button"><?php esc_html_e( "Documentation", 'listopia' ); ?></a>
<a href="<?php echo admin_url( 'nav-menus.php' ); ?>" class="button button-primary"><?php esc_html_e( "Setup Again", 'listopia' ); ?></a>