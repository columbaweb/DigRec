<?php get_header(); ?>

<div id="content">
   <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <div id="banner" class="column12">
         <h1 class="column8 alpha"><?php the_title(); ?></h1>
         <div class="bcr column4 omega"><?php if(function_exists('bcn_display')){bcn_display();}?></div>          
      </div>
      
      <article id="post-<?php the_ID(); ?>" class="page column8">
         <?php the_content(); ?>
      </article>
   <?php endwhile; endif; ?>
   
   <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>