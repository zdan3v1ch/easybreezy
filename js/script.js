function go() {
	let div = document.createElement('div');
  		div.className = "down";
	let el = document.querySelector("#menu-item-236 a:first-child");
	el.append(div);
	
	let jora = document.querySelectorAll('.per-acc div a');
			jora.forEach((elem)=>{ if (elem.getAttribute('href') == window.location.href)
					elem.classList.add('test');
								  
})
	
}
  	


window.onscroll = function () {
	var elemTopMenu = document.querySelector('header');
	var scrolled = window.pageYOffset;
	if (scrolled > 300) {
		elemTopMenu.classList.add('menu-scroll');
		}
	else {		
			elemTopMenu.classList.remove('menu-scroll');			
		}
	
	}

addEventListener('load', go);