// Copiamos el DIV de los calculos.
var copiaCalculosWS = jQuery(".pewc-total-field-wrapper").clone();

// Los mostramos en la class result-ws-extra.
// Esta clase la hemos creado anteriormente en el archivo extra-product-ws.php linea 32
jQuery(".result-ws-extra").html(copiaCalculosWS);

// Ocultamos los calculos y el boton por defecto de Woocommerce.
jQuery("form.cart .pewc-total-field-wrapper").hide();
jQuery("form.cart .quantity, form.cart .single_add_to_cart_button").hide();

// Creamos un evento llamado click en forma de function: cuando se haga click en el boton customizado añadir al carrito
// hacemos que no ocurra nada de manera por defecto gracias al preventDefault y NO utilizmaos la funcion submit de JS
// ya que de esa manera no se enviaria el ajax. Trabajamos con la function click para simular un click en el submit real del woocommerce.
jQuery("#add_cart_ws").click(function(e){
    e.preventDefault();
    $(".single_add_to_cart_button").click();
});