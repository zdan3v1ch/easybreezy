<footer class="footer-content">
	
	<div class="wrap-footer">
		
		<div class="col-left">
			
			<?php
			if ( has_nav_menu( 'footer-menu' )):
				wp_nav_menu(
				array(
				'theme_location' => 'footer-menu',
				'fallback_cb' => 'footer_menu',
				'container' => 'ul',
				'menu_id' => 'footer-nav',
				'menu_class' => 'footer-nav'
				)
			);
			endif; ?>		
		
		</div>
		
		<div class="col-right">
			
			<div>
				
				<span class="phone">
					
					<a href="tel:+370000000001">+375(00) 000-00-01</a>
					
				</span>
			</div>
			
			<ul class="social">
				
				<li>
					<a href="https://vk.com/" target="_blank">
					
						<span class="ca-icon vk"></span>
						
					</a>
				</li>
				
				<li>
					<a href="https://www.instagram.com/easybreezy_store/" target="_blank">
						
						<span class="ca-icon instagram"></span>
					
					</a>
				</li>				
				
				<li>
					<a href="https://t.me/easybreezy_store" target="_blank">
						
						<span class="ca-icon telegram"></span>
						
					</a>
				
				</li>				
			
			</ul>
			
			<div class="logo-bot">
			</div>
		
		</div>
		
	</div>  <!-- wrap-footer-->

</footer> <!-- end footer-->

<?php wp_footer(); ?>

</div>
</body>
</html>