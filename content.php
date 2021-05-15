<?php
/**
 * @package Hemingway Metro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( '' != get_the_post_thumbnail() && is_sticky() ) : ?>
		<div class="featured-image">
			<span class="flag"><?php _e( 'Featured', 'hemingway-metro' ); ?></span>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'hemingway-metro-featured' ); ?>
			</a>
		</div>
		<?php else : ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'hemingway-metro-featured' ); ?>
			</a>
		</div>
		<?php endif; ?>
		<?php if ( 'link' == get_post_format() ) : ?>
			<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( hemingway_metro_get_link_url() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php endif; ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php hemingway_metro_posted_on(); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><span class="sep"> / </span><?php comments_popup_link( __( 'Leave a comment', 'hemingway-metro' ), __( '1 Comment', 'hemingway-metro' ), __( '% Comments', 'hemingway-metro' ) ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'hemingway-metro' ), '<span class="edit-link"><span class="sep"> / </span>', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_archive() || is_home() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hemingway-metro' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hemingway-metro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
