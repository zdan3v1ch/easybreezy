<?php get_header(); ?>

<div class="content-404">
	
	<button class="pulse-button myLinkModal2" ><span class="call"></span></button>

	<div id="myModal2">
		
		<form id="two_form" enctype="multipart/form-data" method="post" onsubmit="send(event, 'send.php')">
			
			<div class="container">
				
				<p>Мы можем вам перезвонить, заполните эту форму и наш специалист свяжется с вами</p>

                <hr>

				<div>

					<label for="login2">Имя</label>

					<input type="text" placeholder="Введите имя" id="login2" name="name" />

				</div>
                       
				<div>
                            
					<label for="telephone2">Телефон</label>
                            
					<input type="text" placeholder="Введите номер мобильного телефона" id="telephone2" name="phone" />
                        
				</div>
                                              
				<button type="submit" class="registerbtn">Отправить</button>
                    
			</div>
                
		</form>

		<span id="myModal__close2" class="close"></span>
                
            
	</div>

            
	<div id="myOverlay2">
	</div>
	
	<div class="main-404">
		
		<h2> Ошибка 404</h2>
		
		<p> К сожалению, запрашиваемая страница не найдена. Возможно, вы перешли по ссылке, в которой была допущена ошибка, или ресурс был удален.</p>
		
		<p>Попробуйте перейти на 
			
			<a href="<?php echo get_option('home'); ?>">главную страницу</a>.
			
		</p>
		
	</div>
</div>

<?php get_footer(); ?>