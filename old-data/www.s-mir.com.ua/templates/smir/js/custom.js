$(document).ready(function() {
	
var idd=0;

function mycarousel_itemVisibleInCallbackBeforeAnimation(carousel, item, idx, state) {
    // No animation on first load of the carousel
    if (state == 'init')     return;

  //  jQuery('img', item).fadeIn('slow');
};

/**
 * This is the callback function which receives notification
 * when an item becomes the first one in the visible range.
 * Triggered after animation.
 */
function mycarousel_itemVisibleInCallbackAfterAnimation(carousel, item, idx, state) {
  //  alert('Item #' + idx + ' is now visible');

if (state == 'init')     return;


var ind=carousel.index(idx);
ind--;
jQuery('.jcarousel-control a').removeClass('active');
jQuery('.jcarousel-control a').eq(ind).addClass('active');

	
};



function mycarousel_initCallback(carousel) {
    jQuery('.jcarousel-control a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
		
		//jQuery('.jcarousel-control a').css('background','url(img/cerk1.png) no-repeat 0 0');
		//jQuery(this).css('background','url(img/cerk2.png) no-repeat 0 0');
jQuery('.jcarousel-control a').removeClass('active');
jQuery(this).addClass('active');

        return false;
    });



    jQuery('#mycarousel-next').bind('click', function() {
var $active=jQuery('.jcarousel-control a.active');		
jQuery('.jcarousel-control a').removeClass('active');
$active.next().addClass('active');

var nextind=jQuery('.jcarousel-control a.active').index();
if (nextind==-1) jQuery('.jcarousel-control a').eq(0).addClass('active');


        carousel.next();
        return false;
    });


    jQuery('#mycarousel-prev').bind('click', function() {
		
var $active=jQuery('.jcarousel-control a.active');		
jQuery('.jcarousel-control a').removeClass('active');
$active.prev().addClass('active');

var size=jQuery('.jcarousel-control a').size();
var nextind=jQuery('.jcarousel-control a.active').index();
if (nextind==-1) jQuery('.jcarousel-control a').eq(size-1).addClass('active');

		
        carousel.prev(); 
        return false;
    });
};

 jQuery("#mycarousel").jcarousel({
        scroll: 1,
		auto:5,
		
      initCallback: mycarousel_initCallback,
        itemVisibleInCallback: {
            onBeforeAnimation: mycarousel_itemVisibleInCallbackBeforeAnimation,
            onAfterAnimation:  mycarousel_itemVisibleInCallbackAfterAnimation
        },

		wrap: 'circular'



    });



 setToggleInputs();
			
			
function setToggleInputs () {

jQuery("[class*='toggle-inputs']").each(function (i) {
var defaultValue = jQuery(this).val();

jQuery(this).bind("click", function(){
if (jQuery(this).val() == defaultValue) {
jQuery(this).val('');
}
});

jQuery(this).bind("focus", function(){
if (jQuery(this).val() == defaultValue) {
jQuery(this).val('');
}
});

jQuery(this).bind("blur", function(){
if (jQuery(this).val() == '') {
jQuery(this).val(defaultValue);
}
});

});

return true;
}		


$(".block").hover(
  function () {
var $rel=$(this).attr("rel");
$(this).css('background','url('+$rel+') no-repeat 0 0');

  },
  function () {
$(this).css('background','none');
  }
);  

$('.rel .link').mouseenter(function(e) {
	$(this).addClass('upar').parent().find("div").show();		
  });

$('.window').mouseleave(function() {
	$(this).parent().find(".link").removeClass('upar');
	$(this).parent().find("div").hide();	
  });


 $(".tabshift a").click(function (event) { 

    $(".tabshift a").removeClass("active");
   $(this).addClass("active");
   
var idd=$(this).attr("rel");

//$("div.tabsulators").fadeOut(2000);
// $("#"+idd).fadeIn(2000);
$("div.tabsulators").hide();
 $("#"+idd).show();
    });
/* Shopping cart Counter NEW */
	//$('.shoppingCart .cartlist .item .counter .left').click(function() {
	$(document).on('click','.shoppingCart .cartlist .item .counter .left',function() {
	  var currCount = $(this).parent('.counter').children('.amount').val();
	  $(this).parent('.counter').children('.amount').val(+currCount - 1);
	  goAjax();
	});

	//$('.shoppingCart .cartlist .item .counter .right').click(function() {
	$(document).on('click','.shoppingCart .cartlist .item .counter .right',function() {
	  var currCount = $(this).parent('.counter').children('.amount').val();
	  $(this).parent('.counter').children('.amount').val(+currCount + 1);
	  goAjax();
	});
   
	function goAjax() {
		$.ajax({
			url: '/catalog/basket.html',
			type:'GET',
			data: $('#basket-items .amount').serialize()+'&action=recalcbasket',
			success:function(data){
				$('#basket-items').html(data);
			}
		});	
	}
 });

function msg(txt){
  $.notification(txt,"Внимание!", {
    className: "jquery-notification",
    duration: 5000,
    freezeOnHover: true,
    hideSpeed: 250,
    position: "center",
    showSpeed: 250,
    zIndex: 99999
  }); 
}