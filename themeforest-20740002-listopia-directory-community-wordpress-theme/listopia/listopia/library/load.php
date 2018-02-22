<?php

require_once( JVBPD_SYS_DIR . '/layout.php' );

// bootstrap navigation walker for menus
require_once( JVBPD_FUC_DIR . '/wp_bootstrap_navwalker.php' );
require_once( JVBPD_FUC_DIR . '/class-tgm-plugin-activation.php' ); // intergrated plugins TGM
require_once( JVBPD_FUC_DIR . '/activate-plugins.php' ); // get pluginsd
require_once( JVBPD_FUC_DIR . '/class-ajax.php' ); // get pluginsd

/** Classes **/
require_once( JVBPD_CLS_DIR . '/class-array.php' );
require_once( JVBPD_CLS_DIR . '/javo-get-option.php' );
require_once( JVBPD_CLS_DIR . '/class-basic-shortcode.php' );
require_once( JVBPD_CLS_DIR . '/class-buddypress-dir.php' );

/** Admin Panel **/
require_once( JVBPD_ADM_DIR . '/class-admin.php' );
require_once( JVBPD_ADM_DIR . '/class-admin-metabox.php' );
require_once( JVBPD_ADM_DIR . '/class-admin-helper.php' );

require_once( JVBPD_ADM_DIR . '/functions-nav.php' );

/** Header */
require_once( JVBPD_HDR_DIR . '/class-header.php' );

/** Widgets **/
require_once( JVBPD_WG_DIR . '/wg-javo-recent-photos.php' );
require_once( JVBPD_WG_DIR . '/wg-javo-recent-post.php' );
require_once( JVBPD_WG_DIR . '/wg-javo-contact-us.php' );