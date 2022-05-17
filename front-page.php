<?php get_header(); ?>
			
<button class="pulse-button myLinkModal2" ><span class="call"></span></button>
		
<div id="myModal2">
				                
	<form id="two_form" enctype="multipart/form-data" method="post" onsubmit="send(event, 'send.php')">
                    
		<div class="container">
                        
			<p>Мы можем вам перезвонить, заполните эту форму и наш специалист свяжется с вами</p>	
                        
			<hr>
                        
			<div>
                            
				<label for="login2">Имя</label>
                            
				<input type="text" placeholder="Введите имя" required id="login2" name="name" />
                        
			</div>
                       
			<div>
                            
				<label for="telephone2">Телефон</label>
                            
				<input type="text" placeholder="Введите номер телефона" required id="telephone2" name="phone" >
                        
			</div>
                 
			<button type="submit" class="registerbtn">Отправить</button>
                    
		</div>
                
	</form>
                
	<span id="myModal__close2" class="close"></span>
          
</div>

            
<div id="myOverlay2">
</div>
			
<div class="article-post">
				
	<div class="wrap">
		
		<div class="main-left">
	
			<div class="main-left-text">
			
				<p>Добавь <span>ярких красок</span> в повседневность</p>
	
			</div>
		
			<div class="main-left-catalog">
						
				<a href="http://easybreezy.h1n.ru/catalog/">Каталог</a>
					
			</div>

			<div></div>

		</div> <!--main-left-->

		<div class="main-right"></div>
		
	</div> <!--end wrap -->

</div> <!--posts-->

<?php get_footer(); ?>
