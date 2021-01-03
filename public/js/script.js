
(function($) { "use strict";

	$(function() {
		var header = $(".start-style");
		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
		
			if (scroll >= 10) {
				header.removeClass('start-style').addClass("scroll-on");
			} else {
				header.removeClass("scroll-on").addClass('start-style');
			}
		});
	});		
		
	
	$(document).ready(function() {
		$('body.hero-anime').removeClass('hero-anime');
	});

	//Menu On Hover
		
	$('body').on('mouseenter mouseleave','.nav-item',function(e){
			if ($(window).width() > 750) {
				var _d=$(e.target).closest('.nav-item');_d.addClass('show');
				setTimeout(function(){
				_d[_d.is(':hover')?'addClass':'removeClass']('show');
				},1);
			}
	});	
	
	
  })(jQuery); 
//tag cripts
var seen = {};
$('.tags-main a').each(function() {
    var txt = $(this).text();
    if (seen[txt])
        $(this).remove();
    else
        seen[txt] = true;
});

$(document).on('click', '#button', function(){
  var txtSearch = $("#input").val();
  if(txtSearch == ""){}
  else{var url = '{{ route("search.tag", ":slug") }}';
  url = url.replace(':slug', txtSearch);
  window.location.href=url;
  }
 });
 $("#input").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
      var txtSearch = $("#input").val();
      if(txtSearch == ""){}
  else{var url = '{{ route("search.tag", ":slug") }}';
  url = url.replace(':slug', txtSearch);
  window.location.href=url;
  }
    }
});

//end tag cripts
//scroll on click
$(document).ready(function(){
	$("a").on('click', function(event) {
	  if (this.hash !== "") {
		event.preventDefault();
		var hash = this.hash;
   $('html, body').animate({
		  scrollTop: $(hash).offset().top
		}, 800, function(){
		window.location.hash = hash;
		});
	  }
	});
  });
//scroll on click
window.addEventListener&&window.addEventListener('load',function(){'use strict';var e=document.body;if(e.getElementsByClassName&&e.querySelector&&e.classList&&e.getBoundingClientRect){var t,n='replace',i='preview',s='reveal',r=document.getElementsByClassName('progressive '+n),o=window.requestAnimationFrame||function(e){e()};['pageshow','scroll','resize'].forEach(function(e){window.addEventListener(e,a,{passive:!0})}),window.MutationObserver&&new MutationObserver(a).observe(e,{subtree:!0,childList:!0,attributes:!0}),c()}function a(){t=t||setTimeout(function(){t=null,c()},300)}function c(){r.length&&o(function(){for(var e,t,n=window.innerHeight,i=0;i<r.length;)0<(t=(e=r[i].getBoundingClientRect()).top)+e.height&&n>t?u(r[i]):i++})}function u(e,t){e.classList.remove(n);var r=e.getAttribute('data-href')||e.href,a=e.querySelector('img.'+i);if(r&&a){var c=new Image,l=e.dataset;l&&(l.srcset&&(c.srcset=l.srcset),l.sizes&&(c.sizes=l.sizes)),c.onload=function(){r===e.href&&(e.style.cursor='default',e.addEventListener('click',function(e){e.preventDefault()}));var t=c.classList;c.className=a.className,t.remove(i),t.add(s),c.alt=a.alt||'',o(function(){e.insertBefore(c,a.nextSibling).addEventListener('animationend',function(){e.removeChild(a),t.remove(s)})})},(t=1+(t||0))<3&&(c.onerror=function(){setTimeout(function(){u(e,t)},3e3*t)}),c.src=r}}},!1);