/*price range*/

 $('#sl2').slider();

$('.catalog').dcAccordion({
	speed: 300
});

  function showCart(cart){
      $('#cart .modal-body').html(cart);
	  $('#cart').modal();//show method in bootstrap method
  }



  function getCart(){
	  $.ajax({
		  url: '/cart/show',
		  type: 'GET',
		  success: function(res){
			  if(!res) alert('Ошибка!');
			  //console.log(res);
			  showCart(res);
		  },
		  error: function(){
			  alert('Error!');
		  }
	  });
	  return false;//Or create e and e.preventDefault() for cancel link
  }

     //delegate - it will work anly in yhis way parent item , after current element, because this element create before our main code
	$('#cart .modal-body').on('click','.del-item', function (){
		var id = $(this).data('id');//data is attribute in html , example data-id = "2"
		var qty = $(this).data('count');
		$.ajax({
			url: '/cart/del-item',//in action will be actionDelItem
			data: {id: id},
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				//console.log(res);
				showCart(res);

				if(typeof qty == "undefined"){
					var count_product = parseInt($('#count-product').text());//or -parseInt(1)
					--count_product;
					$('#count-product').text(count_product);
				}else{
					var count_product = parseInt($('#count-product').text())-parseInt(qty);
					$('#count-product').text(count_product);
				}
			},
			error: function(){
				alert('Error!');
			}
		});
	});

		$('.del-item').on('click', function (){
			var id = $(this).data('id');
			var qty = $('#qty').val();
			alert(qty);
			$.ajax({
				url: '/cart/del-item-basket',
				data: {id: id},
				type: 'GET',
				success: function(res){
					if(!res) alert('Ошибка!');
					//console.log(res);
					//showCart(res);
					 location.reload();
				},
				error: function(){
					 location.reload();
					/*var cart = '#cart_checkout tr.cart_checkout'+id;
					$(cart).hide();*/
				}
			});
		});


function clearCart(){
	  $.ajax({
		  url: '/cart/clear',
		  type: 'GET',
		  success: function(res){
			  if(!res) alert('Ошибка!');
			  //console.log(res);
			  showCart(res);
			  $('#count-product').text(0);

		  },
		  error: function(){
			  alert('Error!');
		  }
	  });
  }

     $('.add-to-cart').on('click', function (e){
			e.preventDefault();//we are canceled default link or we can write return false
			var id = $(this).data('id'),//this - it is current element in our example tag a with class add-to-cart,in tag a we will write data-id="" and his value we get
				qty = $('#qty').val();
			$.ajax({
				url: '/cart/add',
				data: {id: id,qty: qty},
				type: 'GET',
				success: function(res){
					if(!res) alert('Ошибка!');
					//console.log(res);
					showCart(res);
					if(typeof qty == "undefined"){
						var count_product = parseInt($('#count-product').text());//or +parseInt(1)
						++count_product;
						$('#count-product').text(count_product);
					}else{
						var count_product = parseInt($('#count-product').text())+parseInt(qty);
						$('#count-product').text(count_product);
					}

				},
				error: function(){
					alert('Error!');
				}
			});
		});


	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});
