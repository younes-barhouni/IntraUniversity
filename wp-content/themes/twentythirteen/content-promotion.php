<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width:100%;margin:20px auto;max-width:604px;">
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
		
		<?php $title = get_the_title(); ?>
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php echo $title; ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $title; ?></a>
		</h1>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->
	<table>
		<th>Name</th>
		<th>Surname</th>
		<?php $query = new WP_Query(array('post_type' => 'student')); ?>
		<?php while($query->have_posts()): $query->the_post(); ?>
		<?php $term = wp_get_post_terms($post->ID, 'promotion', array("fields" => "names"))[0]; ?>
			<?php if($term == $title): ?>
				<tr><td><?php the_field('name'); ?></td>
				<td><?php the_field('surname'); ?></td></tr>
			<?php endif; ?>
		<?php endwhile; ?>
	</table>
	<?php wp_reset_postdata(); ?>
</article><!-- #post -->

