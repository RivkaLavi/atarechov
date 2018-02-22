<?php

/**
 * Anonymous User
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( bbp_current_user_can_access_anonymous_user_form() ) : ?>

	<?php do_action( 'bbp_theme_before_anonymous_form' ); ?>

	<fieldset class="bbp-form">
		<legend><?php ( bbp_is_topic_edit() || bbp_is_reply_edit() ) ? esc_html_e( 'Author Information', 'listopia' ) : esc_html_e( 'Your information:', 'listopia' ); ?></legend>

		<?php do_action( 'bbp_theme_anonymous_form_extras_top' ); ?>

		<p>
			<label for="bbp_anonymous_author"><?php esc_html_e( 'Name (required):', 'listopia' ); ?></label><br />
			<input type="text" id="bbp_anonymous_author" value="<?php echo esc_attr( bbp_get_author_display_name() ); ?>" size="40" name="bbp_anonymous_name" />
		</p>

		<p>
			<label for="bbp_anonymous_email"><?php esc_html_e( 'Mail (will not be published) (required):', 'listopia' ); ?></label><br />
			<input type="text" id="bbp_anonymous_email" value="<?php echo esc_attr( bbp_get_author_email() ); ?>" size="40" name="bbp_anonymous_email" />
		</p>

		<p>
			<label for="bbp_anonymous_website"><?php esc_html_e( 'Website:', 'listopia' ); ?></label><br />
			<input type="text" id="bbp_anonymous_website" value="<?php echo esc_attr( bbp_get_author_url() ); ?>" size="40" name="bbp_anonymous_website" />
		</p>

		<?php do_action( 'bbp_theme_anonymous_form_extras_bottom' ); ?>

	</fieldset>

	<?php do_action( 'bbp_theme_after_anonymous_form' ); ?>

<?php endif;
