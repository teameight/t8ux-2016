<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 */
?>

	<footer id="colophon"  class="footer" role="contentinfo">
		<div class="wrap">
			<div class="left">
				<h4>Lurk Us</h4>
				<ul class="nav-social">
					<li><a href="https://www.instagram.com/shoutforthings/" class="instagram">
						<svg class="social-icon">
							<use xlink:href="#instagram-icon"></use>
						</svg>
					</a></li>
					<li><a href="https://www.facebook.com/teameightrva" class="facebook">
						<svg class="social-icon">
							<use xlink:href="#facebook-icon"></use>
						</svg>
					</a></li>
					<li><a href="https://www.linkedin.com/company/team-eight-llc" class="linkedin">
						<svg class="social-icon">
							<use xlink:href="#linkedin-icon"></use>
						</svg>
					</a></li>
					<li><a href="https://twitter.com/shoutforthings" class="twitter">
						<svg class="social-icon">
							<use xlink:href="#twitter-icon"></use>
						</svg>
					</a></li>
					<li><a href="https://dribbble.com/TeamEight" class="dribbble">
						<svg class="dribbble-icon">
							<use xlink:href="#dribbble-icon"></use>
						</svg>
					</a></li>
				</ul>
			</div>
			<div class="right">
				<!-- Begin MailChimp Signup Form -->
				<form action="https://team-eight.us5.list-manage.com/subscribe/post?u=b27e0b88c8dcc2a4d49d9fd36&amp;id=34d5690b8c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate inline-form newsletter-form" target="_blank" novalidate>
				    <fieldset>
					    <h4>Keep Up</h4>
					    <div class="inline-container">
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="your e-mail..." required>
						    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						    <div style="position: absolute; left: -5000px;"><input type="text" name="b_b27e0b88c8dcc2a4d49d9fd36_34d5690b8c" value=""></div>
							<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
						</div>
				    </fieldset>
				</form>
				<!--End mc_embed_signup-->
			</div>
		</div>
		<div class="bott">
			<div class="wrap">
				<p class="copyright">&copy; <?php echo date('Y'); ?> Team Eight. All rights reserved.</p>
				<p class="email"><a href="mailto:communicate@team-eight.com">communicate@team-eight.com</a>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-20271174-1', 'team-eight.com');
	  ga('send', 'pageview');
	</script>
</body>
</html>