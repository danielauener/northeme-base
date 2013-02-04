			</div>
			
			<footer class="site-footer">
                <div class="widgets <?php echo northeme_widget_count_classes( 'widgets-footer' ); ?>">
                    <?php dynamic_sidebar( 'widgets-footer' ); ?>
                </div>
			</footer>
		</div>
  
        <?php wp_footer(); ?>
        
        <!-- Google Analytics (TODO: do we want this to be in the theme settings?) -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>