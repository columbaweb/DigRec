<aside id="sidebar" class="column4">
   <div class="widget-box">
      <?php include (TEMPLATEPATH . '/searchform.php'); ?>
   </div>
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?><?php endif; ?>
</aside>