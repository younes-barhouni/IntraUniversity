<?php
/**
 * Template Name: Page of Formation
 *
 * Selectable from a dropdown menu on the edit page screen.
 */

get_header();  
$query = new WP_Query(array('post_type' => 'formation')); 

global $current_user;
get_currentuserinfo();
?>

<?php get_header(); ?>
 
<div id="primary" class="content-area">
  <div id="content" class="site-content" role="main">
    <article style="width:100%;margin:20px auto;max-width:604px;">
      <h1>List of courses</h1>

      <table>
        <th>Title</th>
        <th>Diploma</th>
        <th>Conditions of acceptance</th>
        <?php if ($current_user->user_login == 'nuwandi') {echo '<th></th>';} ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <tr>
              <td>
                <a href="<?php the_permalink(); ?>"><?php the_field('title'); ?></a>
              </td>
              <td>
                <?php the_field('diploma'); ?>
              </td>
              <td>
                <?php the_field('condition'); ?>
              </td>
              <?php if ($current_user->user_login == 'nuwandi') {echo '<td><a href="/intraUniversity/wp-admin/edit.php?post_type=formation">EDIT</a></td>';} ?>
          </tr>
        <?php endwhile; // end of the loop. ?>
      </table>
    </article>
  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>