<?php
/**
* Template Name: Page of Formation
*
* Selectable from a dropdown menu on the edit page screen.
*/

get_header();  
$query = new WP_Query(array('post_type' => 'student')); 

global $current_user;
get_currentuserinfo();
?>

<div id="primary" class="content-area">
 <div id="content" class="site-content" role="main">
   <article style="width:100%;margin:20px auto;max-width:604px;">
     <h1>List of courses</h1>

     <table>
       <th>Title</th>
       <th>Diploma</th>
       <th>Conditions of acceptance</th>
       <?php if ($current_user->user_login == 'buitonii') {echo '<th></th>';} ?>
       <?php while ( $query->have_posts() ) : $query->the_post(); ?>
         <tr>
             <td>
               <?php the_field('name'); ?>
             </td>
             <td>
               <?php the_field('surname'); ?>
             </td>
             <td>
               <?php the_field('promotion'); ?>
             </td>
             <?php if ($current_user->user_login == 'buitonii') {echo '<td><a href="/intraUniversity/wp-admin/edit.php?post_type=formation">EDIT</a></td>';} ?>
         </tr>
       <?php endwhile; // end of the loop. ?>
     </table>
   </article>
 </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>