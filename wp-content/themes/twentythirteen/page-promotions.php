<?php
/**
* Template Name: Page of Promotion
*
* Selectable from a dropdown menu on the edit page screen.
*/

get_header();  
$query = new WP_Query(array('post_type' => 'student', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC')); 
$posts = get_field('relationship_promotion');

?>

<div id="primary" class="content-area">
 <div id="content" class="site-content" role="main">
   <article style="width:100%;margin:20px auto;max-width:604px;">
     <h1>List of students</h1>

     <table>
       <th>Name</th>
       <th>Surname</th>
       <th>Formation</th>
       <?php while ( $query->have_posts() ) : $query->the_post(); ?>
         <tr>
             <td>
               <?php the_field('name'); ?>
             </td>
             <td>
               <?php the_field('surname'); ?>
             </td>
             <td>
              <?php $posts = get_field('promotion'); ?>
              <?php if( $posts ): ?>
                  <?php foreach( $posts as $post): ?>
                      <?php setup_postdata($post); ?>
                          <?php $posts = get_field('formation'); ?>
                          <?php foreach( $posts as $post): ?>
                            <?php setup_postdata($post); ?>
                            <span><?php the_field('name'); ?></span>
                          <?php endforeach; ?>
                            <?php wp_reset_postdata();?>
                  <?php endforeach; ?>
                      <?php wp_reset_postdata(); ?>
              <?php endif; ?>
             </td>
         </tr>
       <?php endwhile; // end of the loop. ?>
     </table>
   </article>
 </div><!-- #content -->
</div><!-- #primary -->
 
<?php get_footer(); ?>