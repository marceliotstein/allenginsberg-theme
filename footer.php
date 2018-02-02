<?php
	/**
 * @package Apostrophe
 *
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
		<div class="widget-area">
			<div id="footer-sidebar">
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</div>
		</div>
		<?php endif; ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div class="ag-sharing-box">
  <div class="addthis_inline_share_toolbox"></div>
</div>
<div id="footer">
  <div id="footer-container" class="container">
     <div id="allen-watermark"></div>
     <div id="siteinfo">
  	<div>&copy; 2005-2016 Allen Ginsberg Project. All rights reserved. <a href="/contact">Contact us</a> for more information.</div>
     </div>
     <div id="footer-sitemap">
    	<ul>Site Links<br />
		<li><a href="/biography">Biography</a></li>
		<li><a href="/works">Published Works</a></li>
		<li><a href="/links">Links</a></li>
	</ul>
     </div>
     <div id="footer-archive">
	<ul>Collections<br />
		<li><a href="/category/lectures">Lectures</a></li>
		<li><a href="/category/interviews">Interviews</a></li>
		<li><a href="/category/photos">Photos</a></li>
	</ul>
    </div>
    <div id="footer-external-links">
	<ul>External Links<br />
		<li><a href="http://www.facebook.com/therealallenginsberg" target="_blank">Facebook</a></li>
		<li><a href="https://twitter.com/Ginsbergpoem" target="_blank">Twitter</a></li>
		<li><a href="http://allenginsberg.colortestmerch.com" target="_blank">Merchandise</a></li>
		<li><a href="http://ginsbergblog.blogspot.com" target="_blank">Blogger site</a></li>
	</ul>
    </div>
  </div>
</div>
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-6633533-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- AddThis -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58163fcb358e59c0"></script> 
</body>
</html>
