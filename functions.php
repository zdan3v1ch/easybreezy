<?php 
	function mytemplate_scripts() {
		wp_enqueue_style('reset',get_template_directory_uri().'/css/reset.css');
		wp_enqueue_style('catalog',get_template_directory_uri().'/css/catalog.css');
		wp_enqueue_style('footer',get_template_directory_uri().'/css/footer.css');
		wp_enqueue_style('for_form',get_template_directory_uri().'/css/for_form.css');
		wp_enqueue_style('form-constr',get_template_directory_uri().'/css/form-constr.css');
		wp_enqueue_style('o-nas',get_template_directory_uri().'/css/o-nas.css');
		wp_enqueue_style('otherpage',get_template_directory_uri().'/css/otherpage.css');
		wp_enqueue_style('call',get_template_directory_uri().'/css/call.css');
		wp_enqueue_style('header',get_template_directory_uri().'/css/header.css');
		wp_enqueue_style('style',get_stylesheet_uri());
		wp_enqueue_style('media1',get_template_directory_uri().'/css/media1.css');
			
		wp_enqueue_script('script',get_template_directory_uri().'/js/script.js');
		wp_enqueue_script('send',get_template_directory_uri().'/js/send.js');
		wp_enqueue_script('jq',get_template_directory_uri().'/js/jq.js');
}

// убирает автоматическое перенаправление после регистрации
add_filter( 'woocommerce_registration_auth_new_customer', '__return_false' );
// убирает автоматические теги <p> <br>
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


// Добавление чекбокса в форме заказа
add_action( 'woocommerce_review_order_before_submit', 'custom_privacy_checkbox', 25 );
 
function custom_privacy_checkbox() {
 
	woocommerce_form_field( 'privacy_policy_checkbox', array(
		'type'          => 'checkbox',
		'class'         => array( 'form-row' ),
		'label_class'   => array( 'woocommerce-form__label-for-checkbox' ),
		'input_class'   => array( 'woocommerce-form__input-checkbox' ),
		'required'      => true,
		'label'         => 'Принимаю <a href="' . get_privacy_policy_url() . '">Политику конфиденциальности</a>',
	));
 
}
 
// Валидация в форме заказа
add_action( 'woocommerce_checkout_process', 'custom_privacy_checkbox_error', 25 );
 
function custom_privacy_checkbox_error() {
 
	if ( empty( $_POST[ 'privacy_policy_checkbox' ] ) ) {
		wc_add_notice( 'Ваш нужно принять политику конфиденциальности.', 'error' );
	}
 
}



add_action( 'woocommerce_register_form', 'custom_registration_privacy_checkbox', 25 );
 
function custom_registration_privacy_checkbox() {
 
	woocommerce_form_field(
		'privacy_policy_reg',
		array(
			'type'          => 'checkbox',
			'class'         => array( 'form-row' ),
			'label_class'   => array( 'woocommerce-form__label-for-checkbox' ),
			'input_class'   => array( 'woocommerce-form__input-checkbox' ),
			'required'      => true,
			'label'         => 'Принимаю <a href="' . get_privacy_policy_url() . '">Политику конфиденциальности</a>',
		)
	);
 
}
 
// Валидация
add_filter( 'woocommerce_registration_errors', 'custom_registration_privacy_checkbox_error', 25 );
 
function custom_registration_privacy_checkbox_error( $errors ) {
 
	if( is_checkout() ) {
		return $errors;
	}
 
	if ( empty( $_POST[ 'privacy_policy_reg' ] ) ) {
		$errors->add( 'privacy_policy_reg_error', 'Ваш нужно принять политику конфиденциальности.' );
	}
 
	return $errors;
 
}

// убирает проверки при регистрации заказа
add_filter( 'woocommerce_billing_fields', 'filter_billing_fields', 20, 1 );
function filter_billing_fields( $billing_fields ) {
  
    if( ! is_checkout() ) return $billing_fields;
	$billing_fields['billing_company']['required'] = false;
	$billing_fields['billing_address_2']['required'] = false;
// 	$billing_fields['billing_country']['required'] = false;
	$billing_fields['billing_state']['required'] = false;
	$billing_fields['billing_postcode']['required'] = false;
//     $billing_fields['billing_phone']['required'] = false;
//     $billing_fields['billing_email']['required'] = false;
    return $billing_fields;
}

//убирает поля в форме при регистрации заказа
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
  
function custom_override_checkout_fields( $fields ) {
  //unset($fields['billing']['billing_first_name']);// имя
  //unset($fields['billing']['billing_last_name']);// фамилия
  unset($fields['billing']['billing_company']); // компания
//   unset($fields['billing']['billing_address_1']);//
  unset($fields['billing']['billing_address_2']);//
//   unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
//   unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_state']);
  //unset($fields['billing']['billing_phone']);
//   unset($fields['order']['order_comments']);
  //unset($fields['billing']['billing_email']);
//   unset($fields['account']['account_username']);
//   unset($fields['account']['account_password']);
//   unset($fields['account']['account_password-2']);

 
    return $fields;
}


// добавляет свою валюту
add_filter( 'woocommerce_currencies', 'add_my_currency' );
function add_my_currency( $currencies ) {
		$currencies['ABC'] = __( 'Норм BYNы', 'woocommerce' );
		return $currencies;
}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
	switch( $currency ) {
		case 'ABC': $currency_symbol = 'BYN'; break;
	}
	 return $currency_symbol;
}


// изменяет положение блоков на странице товара
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_share', 'woocommerce_output_product_data_tabs', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action ( 'woocommerce_after_single_product_summary','woocommerce_output_related_products', 0);

add_action('wp_enqueue_scripts', 'mytemplate_scripts');

add_action('get_header', 'my_filter_head');
		function my_filter_head() {
		remove_action('wp_head', '_admin_bar_bump_cb');
		}
	



	if(function_exists('register_nav_menus')) {
		register_nav_menus(array(
			'custom-menu' => __('custom_menu', 'mytemplate'),
			'footer-menu' => __('footer_menu', 'mytemplate')
		));
}




function change_return_shop_url() {
    return home_url();
}
add_filter( 'woocommerce_return_to_shop_redirect', 'change_return_shop_url' );



//меняет название в ЛК и убирает лишние
function my_account_menu_order() {
 	$menuOrder = array(
// 		'dashboard'          => __( 'Консоль', 'woocommerce' ),
 		'orders'             => __( 'Заказы', 'woocommerce' ),
//  		'downloads'          => __( 'Загрузки', 'woocommerce' ),
//  		'edit-address'       => __( 'Адреса', 'woocommerce' ),
 		'edit-account'       => __( 'Личные данные', 'woocommerce' ),
 		'customer-logout'    => __( 'Выйти', 'woocommerce' ),
 	);
 	return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


function custom_menu() {
	echo '<ul>';
	wp_list_pages('title_li=&');
	echo '</ul>';
}
function footer_menu() {
	echo '<ul>';
	wp_list_pages('title_li=&');
	echo '</ul>';
}
// добавляем скидку авторизованным  клиентам 5%
add_filter( 'woocommerce_get_price_html', 'custom_display_price', 25, 2 );
 
function custom_display_price( $price_html, $product ) {
 
	
	if ( is_admin() ) {
		return $price_html;
	}
 
	
	if ( '' === $product->get_price() ) {
		return $price_html;
	}
 
	
	if ( wc_current_user_has_role( 'customer' ) ) {
		$price_html = wc_price( wc_get_price_to_display( $product ) * 0.95 );
	}
 
	return $price_html;
 
}
 
 
add_action( 'woocommerce_before_calculate_totals', 'custom_alter_price', 25 );
 
function custom_alter_price( $cart ) {
 
	
	if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
		return;
	}
 
	
	if ( ! wc_current_user_has_role( 'customer' ) ) {
		return;
	}
 
	foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
		$price = $cart_item['data']->get_price();
		$cart_item['data']->set_price( $price * 0.95 );
	}
 
}



 add_action( 'woocommerce_login_form_end', 'custom_add_login_text', 25 );
 
function custom_add_login_text() {
 
	if ( is_checkout() ) {
		return;
	}
 
	echo '<p class="go-to-admin">Возникли проблемы со входом? Обратитесь к администратору сайта.</p>';
 
}



// попытка добавить больше одного товара
// для страницы самого товара
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_single_product_btn_text' );
 
function custom_single_product_btn_text( $text ) {
 
	if( WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( get_the_ID() ) ) ) {
		$text = 'Уже в корзине, добавить снова?';
	}
 
	return $text;
 
}
 
// для страниц каталога товаров, категорий товаров и т д
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_product_btn_text', 20, 2 );
 
function custom_product_btn_text( $text, $product ) {
 
	if( 
	   $product->is_type( 'simple' )
	   && $product->is_purchasable()
	   && $product->is_in_stock()
	   && WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->get_id() ) )
	) {
 
		$text = 'Уже в корзине, добавить снова?';
 
	}
 
	return $text;
 
}


?>