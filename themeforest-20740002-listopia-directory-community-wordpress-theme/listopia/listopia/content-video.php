<?php
/**
 * The Audio template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Javo
 * @since Javo Themes 1.0
 */

$jvbpd_author	= new WP_User( get_the_author_meta( 'ID' ) ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('jv-single-post-layout-1'); ?> >
	<div class="jv-single-post-article-header">
		<?php if ( ! is_single() ) : ?>
		<h3 class="hidden"><?php the_title();?></h3>
		<?php endif;
		if( has_post_thumbnail() && !is_single() ) : ?>
			<div class="row">
				<div class="col-md-12">
					<section class="jv-single-post-thumbnail text-center">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', Array( 'class' => 'img-responsive' ) ); ?>
						<div class="filter-overlay"></div>
						</a>
					</section><!-- .entry-header -->
				</div><!-- col-md-4 -->
			</div>
		<?php endif; ?>

		<?php if ( ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>">
				<h2 class="jv-single-post-title"><?php the_title(); ?></h2>
			</a>
			<?php if( jvbpd_layout()->getThemeType() == 'jvd-lk' ){ ?>
			<div class="jv-single-post-meta-wrap">
				<span class="jv-single-post-date">
					<?php
						esc_html_e('Posted at','listopia' );
					?>
					<a href="<?php the_permalink(); ?>">
						<?php
							 echo ' '.esc_html( get_the_date( get_option( 'date_format') ) );
						?>
					</a>
				</span>

				<span class="jv-single-post-category">
					<?php
						esc_html_e('in','listopia' );
						echo ' ';
						the_category( ', ' );
					?>
				</span>

				<span class="jv-single-post-author">
					<?php esc_html_e( 'by', 'listopia' ); ?>
					<?php 
						$post_author_link = '';
						if ( function_exists('bp_is_active') ) 
							$post_author_link = home_url('members/'.$jvbpd_author->user_login . '/' );
						else
							$post_author_link = home_url('author/'.$jvbpd_author->user_login . '/' ) ;
					?>
					<a href="<?php echo esc_url( $post_author_link ); ?>">
						<?php echo esc_html( $jvbpd_author->display_name ); ?>
					</a>
				</span>

				<span class="jv-single-post-category">
					<i class="fa fa-comment"></i>
					<?php comments_popup_link( 0, 1, '%' ); ?>
				</span>

			</div>
		<?php } // if(theme type check)
			endif; ?>

		<?php if(is_single()) : ?>
			<div class="row">
				<div class="col-md-12">
					<section class="jv-single-post-thumbnail text-center">
						<?php the_post_thumbnail( 'full', Array( 'class' => 'img-responsive' ) ); ?>
					</section><!-- .entry-header -->
				</div><!-- col-md-4 -->
			</div>
		<?php endif; ?>
	</div><!-- /.jv-single-post-article-header -->


	<section class="jv-single-post-contents">
		<?php do_action( 'jvbpd_post_content_inner_before' ); ?>

		<?php if(is_single()) : ?>
			<h2 class="jv-single-post-title"><?php the_title(); ?></h2>
			<div class="jv-single-post-meta-wrap">
				<span class="jv-single-post-date">
					<?php
						esc_html_e('Posted at','listopia' );
						 echo ' '.esc_html( get_the_date( get_option( 'date_format') ) );
					?>
				</span>

				<span class="jv-single-post-category">
					<?php
						esc_html_e('in','listopia' );
						echo ' ';
						the_category( ', ' );
					?>
				</span>

				<span class="jv-single-post-author">
					<?php esc_html_e( 'by', 'listopia' ); ?>
					<?php 
						$post_author_link = '';
						if ( function_exists('bp_is_active') ) 
							$post_author_link = home_url('members/'.$jvbpd_author->user_login . '/' );
						else
							$post_author_link = home_url('author/'.$jvbpd_author->user_login . '/' );
					?>
					<a href="<?php echo esc_url( $post_author_link ); ?>">
						<?php echo esc_html( $jvbpd_author->display_name ); ?>
					</a>
				</span>

				<span class="jv-single-post-comments">
					<i class="fa fa-comment"></i>
					<?php comments_popup_link( 0, 1, '%' ); ?>
				</span>

				<?php
				if( function_exists( 'pvc_get_post_views' ) ) {
					printf( "<span class=\"jv-single-post-views\"><i class='%1\$s'></i></span> " . esc_html__( "%2\$s Views", 'listopia' ), 'jvbpd-icon3-pie-chart', pvc_get_post_views() );
				} ?>

			</div>
		<?php endif; ?>

		<?php if ( is_search() || is_archive() || is_home() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
			<?php
			the_content( sprintf(
				wp_kses(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'listopia' ), jvbpd_allow_tags()),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'listopia' ), 'after' => '</div>' ) );
			?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php
					the_content( sprintf(
						wp_kses(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'listopia' ), jvbpd_allow_tags() ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
					wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'listopia' ), 'after' => '</div>' ) );
				 ?>
			</div><!-- .entry-content -->
		<?php endif; ?>
		<?php do_action( 'jvbpd_post_content_inner_after' ); ?>
	</section><!-- /. jv-single-post-contents -->

	<footer class="jv-single-post-footer">

		<?php
		if( jvbpd_layout()->getThemeType() == 'jvd-lp' ) : ?>
		<div class="jv-single-post-meta-wrap">
			<span class="jv-single-post-category">
				<?php
					esc_html_e('Category: ','listopia' );
					the_category( ', ' );
				?>
			</span>

			<span class="jv-single-post-author">
				<?php esc_html_e( 'By', 'listopia' ); ?>
				<?php
					$post_author_link = '';
					if ( function_exists('bp_is_active') )
						$post_author_link = home_url('members/'.$jvbpd_author->user_login . '/' );
					else
						$post_author_link = home_url('author/'.$jvbpd_author->user_login . '/' );
				?>
				<a href="<?php echo esc_url( $post_author_link ); ?>">
					<?php echo esc_html( $jvbpd_author->display_name ); ?>
				</a>
			</span>

			<span class="jv-single-post-date">
				<?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ); ?>
			</span>

			<span class="jv-single-post-comments">
				<i class="fa fa-comment"></i>
				<?php comments_popup_link( 0, 1, '%' ); ?>
			</span>

			<?php
			if( function_exists( 'pvc_get_post_views' ) ) {
				printf( "<span class=\"jv-single-post-views\"><i class='%1\$s'></i></span> " . esc_html__( "%2\$s Views", 'listopia' ), 'jvbpd-icon3-pie-chart', pvc_get_post_views() );
			} ?>
		</div>

		<?php endif; ?>

		<div class="jv-single-post-tags text-left">
			<ul class="jv-single-post-tags-item-container list-inline no-margin">
				<?php
				printf("<li>%s</li>", esc_html__('Tags:','listopia' ));
				the_tags( "<li><span class=\"jv-single-post-tags-item\">",
					',</span></li><li><span class="jv-single-post-tags-item">',
					'</span></li>'
				); ?>
			</ul><!-- /.jv-single-post-tags-item-container -->
		</div><!-- /.jv-single-post-tags -->
		<?php
		edit_post_link(
			sprintf( "%s", esc_html__( 'Edit', 'listopia' ) ),
			'<h5 class="edit-link">',
			'</h5>'
		); ?>

	</footer><!-- /. jv-single-post-footer -->
</article><!-- #post -->
