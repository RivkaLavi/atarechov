<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Get the statistics
$stats = bbp_get_statistics(); ?>

<dl role="main">

	<?php do_action( 'bbp_before_statistics' ); ?>

	<dt><?php esc_html_e( 'Registered Users', 'listopia' ); ?></dt>
	<dd>
		<strong><?php echo esc_html( $stats['user_count'] ); ?></strong>
	</dd>

	<dt><?php esc_html_e( 'Forums', 'listopia' ); ?></dt>
	<dd>
		<strong><?php echo esc_html( $stats['forum_count'] ); ?></strong>
	</dd>

	<dt><?php esc_html_e( 'Topics', 'listopia' ); ?></dt>
	<dd>
		<strong><?php echo esc_html( $stats['topic_count'] ); ?></strong>
	</dd>

	<dt><?php esc_html_e( 'Replies', 'listopia' ); ?></dt>
	<dd>
		<strong><?php echo esc_html( $stats['reply_count'] ); ?></strong>
	</dd>

	<dt><?php esc_html_e( 'Topic Tags', 'listopia' ); ?></dt>
	<dd>
		<strong><?php echo esc_html( $stats['topic_tag_count'] ); ?></strong>
	</dd>

	<?php if ( ! empty( $stats['empty_topic_tag_count'] ) ) : ?>

		<dt><?php esc_html_e( 'Empty Topic Tags', 'listopia' ); ?></dt>
		<dd>
			<strong><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></strong>
		</dd>

	<?php endif; ?>

	<?php if ( ! empty( $stats['topic_count_hidden'] ) ) : ?>

		<dt><?php esc_html_e( 'Hidden Topics', 'listopia' ); ?></dt>
		<dd>
			<strong>
				<abbr title="<?php echo esc_attr( $stats['hidden_topic_title'] ); ?>"><?php echo esc_html( $stats['topic_count_hidden'] ); ?></abbr>
			</strong>
		</dd>

	<?php endif; ?>

	<?php if ( ! empty( $stats['reply_count_hidden'] ) ) : ?>

		<dt><?php esc_html_e( 'Hidden Replies', 'listopia' ); ?></dt>
		<dd>
			<strong>
				<abbr title="<?php echo esc_attr( $stats['hidden_reply_title'] ); ?>"><?php echo esc_html( $stats['reply_count_hidden'] ); ?></abbr>
			</strong>
		</dd>

	<?php endif; ?>

	<?php do_action( 'bbp_after_statistics' ); ?>

</dl>

<?php unset( $stats );