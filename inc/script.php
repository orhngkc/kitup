    <script src="<?php echo $folderPath ; ?>assets/js/jquery.js"></script>
	<script src="<?php echo $folderPath ; ?>assets/js/plugins.min.js"></script>
	<script src="https://kit.fontawesome.com/6618ab4347.js" crossorigin="anonymous"></script>
	<script src="<?php echo $folderPath ; ?>assets/js/functions.js"></script>
	<script src="<?php echo $folderPath ; ?>assets/js/star-rating.js"></script>


	<script>
		function myFunction() {
		var inpObj = document.getElementById("register-form-name");
		if (!inpObj.checkValidity()) {
			document.getElementById("deneme").innerHTML = inpObj.validationMessage;
		}
		}	
	</script>

	<script>
		jQuery(window).on( 'load', function(){
		    var swiper = new Swiper('.swiper-scroller', {
		    	slidesPerView: 'auto',
		    	spaceBetween: 50,
				freeMode: true,
				grabCursor: true,
				navigation: {
				    nextEl: '.slider-arrow-right-1',
				    prevEl: '.slider-arrow-left-1',
				},
				scrollbar: {
				el: '.swiper-scrollbar',
				},
				mousewheel: true,
				breakpoints: {
			        768: {
			          spaceBetween: 20,
			        },
			        576: {
			          spaceBetween: 15,
			        }
			      }
		    });
		});

		jQuery(document).ready( function($){
			function modeSwitcher( elementCheck, elementParent ) {
				if( elementCheck.filter(':checked').length > 0 ) {
					elementParent.addClass('dark');
					$('.mode-switcher').toggleClass('pts-switch-active');
				} else {
					elementParent.removeClass('dark');
					$('.mode-switcher').toggleClass('pts-switch-active', false);
				}
			}

			$('.pts-switcher').each( function(){
				var element = $(this),
					elementCheck = element.find(':checkbox'),
					elementParent = $('body');

				modeSwitcher( elementCheck, elementParent );

				elementCheck.on( 'change', function(){
					modeSwitcher( elementCheck, elementParent );
				});
			});
		});
	</script>

<script>

		$("#input-7").rating({
			containerClass: 'is-heart',
			filledStar: '<i class="icon-heart3"></i>',
			emptyStar: '<i class="icon-heart-empty"></i>',
			starCaptions: {0: "Not Rated",1: "Very Poor", 2: "Poor", 3: "Ok", 4: "Good", 5: "Very Good"},
			starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
		});

		$("#input-8").rating({
			containerClass: '',
			filledStar: '<i class="icon-flag21"></i>',
			emptyStar: '<i class="icon-flag-alt"></i>',
			starCaptions: {0: "Not Rated",1: "1 Flags", 2: "2 Flags", 3: "3 Flags", 4: "4 Flags", 5: "5 Flags"},
			starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
		});

		$("#input-11").rating({
			starCaptions: {0: "Not Rated",1: "Very Poor", 2: "Poor", 3: "Ok", 4: "Good", 5: "Very Good"},
			starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
		});

		$("#input-13").on("rating.clear", function(event) {
			$('#rating-notification-message').attr('data-notify-type','error').attr('data-notify-msg', 'Your rating is reset');
			SEMICOLON.widget.notifications({ el: jQuery('#rating-notification-message') });
		});
		$("#input-13").on("rating.change", function(event, value, caption) {
			$('#rating-notification-message').attr('data-notify-msg', 'You rated: ' + value + ' Stars');
			SEMICOLON.widget.notifications({ el: jQuery('#rating-notification-message') });
		});

		$("#input-14").on("rating.change", function(event, value, caption) {
			$("#input-14").rating("refresh", {disabled: true, showClear: false});
		});

	</script>