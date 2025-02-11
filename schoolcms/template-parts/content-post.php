<div class="bodyContent">
	<!-- page title -->
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<p class="date"><span>Posted: <?php the_time('jS F Y');?></span></p>
	<?php if(has_post_thumbnail()):?>
	<div class="postThumb">
		<?php the_post_thumbnail('landscape'); ?>
	</div>
	<?php endif;?>
	<!-- main content -->
	<?php $raw_content = get_the_content(); 
	?>
		<div class="row body-text">
			<div class="col-md">
				<?php the_content(); ?>				
			</div>
		</div>
		<div class="row">
			<div class="col">
			<?php wp_link_pages(); ?>
				
				<?php
				$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo 'Categories: ';
					echo trim( $output, $separator );
				}?>
			</div>
		</div>


	<?php 
	if ( ! post_password_required() ) {
	the_dynamic_content('column_content');
	}?>
</div>