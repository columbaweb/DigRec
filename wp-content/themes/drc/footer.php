</div> <!-- wrap end -->

<footer>
   <div class="wrap container12">
      <div class="column8 alpha">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?><?php endif; ?>
      </div>
      <div class="column4">
         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?><?php endif; ?>
         <h2>Subscribe To Our Newsletter</h2>
      </div>
   </div>
   <div id="footer-copy">
      <div class="wrap container12">
         <p class="column6">© Copyright <?php echo date('Y'); ?> Reynolds Digital Ltd. All Rights Reserved</p>
         <div class="column6">
            <?php wp_nav_menu( array( 'theme_location' => 'footnav' ) ); ?>
         </div>
      </div>
   </div>
</footer>

<?php wp_footer(); ?>


<!-- Put this right before the </body> closing tag -->
<script>
   var navigation = responsiveNav("#megaMenu", { // Selector: The ID of the wrapper
  animate: true, // Boolean: Use CSS3 transitions, true or false
  transition: 400, // Integer: Speed of the transition, in milliseconds
  label: "Menu", // String: Label for the navigation toggle
  insert: "before", // String: Insert the toggle before or after the navigation
  customToggle: "", // Selector: Specify the ID of a custom toggle
  openPos: "relative", // String: Position of the opened nav, relative or static
  jsClass: "js", // String: 'JS enabled' class which is added to <html> el
  init: function(){}, // Function: Init callback
  open: function(){}, // Function: Open callback
  close: function(){} // Function: Close callback
});
</script>


</body>
</html>