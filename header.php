<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>EasyBreezy - магазин по продаже украшений из бисера и жемчуга.</title>
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>
		
		<!-- Yandex.Metrika counter -->
		
			<script type="text/javascript">
				
				(function(m,e,t,r,i,k,a)
					{
						m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
						m[i].l=1*new Date();
						k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
					}
				)(window, document,'script','//mc.yandex.ru/metrika/tag.js', 'ym');

				ym(88428504, 'init', {accurateTrackBounce:true, trackLinks:true, clickmap:true, params: {__ym: {isFromApi: 'yesIsFromApi'}}});
				
			</script>
		
			<noscript>
				<div><img src="https://mc.yandex.ru/watch/88428504" style="position:absolute; left:-9999px;" alt="" />
				</div>
			</noscript>
		
		<!-- /Yandex.Metrika counter -->
		
		<div id="wrapper-page" class="wrapper">
				
			<header>
								
				<div class="header-logo">
					
					<a href="<?php echo get_option('home'); ?>">
						
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
						
					</a>
					
				</div>
				
				<div class="burger-menu">
										
  					<input id="menu-toggle" type="checkbox" />
					
   					<label class="menu-btn" for="menu-toggle">
							 
						<span></span>
							 
    				</label>
 
						<ul class="menubox">
							
							<li>
								<a class="menu-item-burger" href="http://easybreezy.h1n.ru">Главная</a>
							</li>
							
            				<li>
								<a class="menu-item-burger" href="http://easybreezy.h1n.ru/catalog/">Каталог</a>
							</li>
							
           					<li>
								<a class="menu-item-burger" href="http://easybreezy.h1n.ru/onlajn-konstruktor/">Онлайн-конструктор</a>
							</li>
							
            				<li>
								<a class="menu-item-burger" href="http://easybreezy.h1n.ru/oplata-i-dostavka/">Оплата и доставка</a>
							</li>
							
            				<li>
								<a class="menu-item-burger" href="http://easybreezy.h1n.ru/o-nas/">О нас</a>
							</li>
							
						</ul>
  				</div>
				
				<nav>
					
				<?php
					if(function_exists('wp_nav_menu'))
						wp_nav_menu(
							array(
								'theme_location' => 'custom-menu',
								'fallback_cb' => 'custom_menu',
								'container' => 'ul',
								'menu_id' => 'top-nav',
								'menu_class' => 'top-nav'
								));
					else custom_menu();	?>
				</nav>
				
				<div class="per-acc">
					
					<div class="user">
						
						<a href="http://easybreezy.h1n.ru/my-account/">
						</a>
						
					</div>
					
					<div class="basket">
						
						<a href="http://easybreezy.h1n.ru/cart/">
						</a>
						
					</div>
				</div>
				
			</header>
				
