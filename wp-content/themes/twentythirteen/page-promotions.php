<?php
/**
* Template Name: Page of Promotion
*
* Selectable from a dropdown menu on the edit page screen.
*/

get_header();  
$query = new WP_Query(array('post_type' => 'promotion', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC')); 
$posts = get_field('relationship_promotion');

?>

<div id="primary" class="content-area">
 <div id="content" class="site-content" role="main">
   <article style="width:100%;margin:20px auto;max-width:604px;">
     <h1>List of promotions</h1>

     <table>
       <th>Title</th>
       <th>Year</th>
       <?php while ( $query->have_posts() ) : $query->the_post(); ?>
         <tr>
             <td>
              <a href="<?php the_permalink(); ?>"><?php the_field('title'); ?></a>
             </td>
             <td>
               <?php the_field('year'); ?>
             </td>
         </tr>
       <?php endwhile; // end of the loop. ?>
     </table>
   </article>
 </div><!-- #content -->
</div><!-- #primary -->
 
<?php get_footer(); ?>