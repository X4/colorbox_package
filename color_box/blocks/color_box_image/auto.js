	colorboxTabSetup = function() {
		$('ul#ccm-colorbox-tabs li a').each( function(num,el){
			el.onclick=function(){
				var pane=this.id.replace('ccm-colorbox-tab-','');
				colorboxShowPane(pane);
			}
		});
		colorboxShowPane('internal');
	}

	colorboxShowPane = function (pane){
		$('ul#ccm-colorbox-tabs li').each(function(num,el){ $(el).removeClass('ccm-nav-active') });
		$(document.getElementById('ccm-colorbox-tab-'+pane).parentNode).addClass('ccm-nav-active');
		$('div.ccm-colorboxBlockPane').each(function(num,el){ el.style.display='none'; });
		$('#ccm-colorboxBlockPane-'+pane).css('display','block');
	}

	$(function() {
		colorboxTabSetup();
	});


// var colorbox ={
	// init: function(){
			// this.tabSetup();
		// }
	// tabSetup: function(){
		// $('ul#ccm-colorbox-tabs li a').each( function(num,el){
			// el.onclick=function(){
				// var pane=this.id.replace('ccm-colorbox-tab-','');
				// colorbox.showPane(pane);
			// }
		// });
	// },
	// showPane:function(pane){
		// $('ul#ccm-colorbox-tabs li').each(function(num,el){ $(el).removeClass('ccm-nav-active') });
		// $(document.getElementById('ccm-colorbox-tab-'+pane).parentNode).addClass('ccm-nav-active');
		// $('div.ccm-colorboxBlockPane').each(function(num,el){ el.style.display='none'; });
		// $('#ccm-colorboxBlockPane-'+pane).css('display','block');
	// },
	// validate:function() {
		// if ($("#ccm-b-image-fm-value").val() == '' || $("#ccm-b-image-fm-value").val() == 0) {
			// ccm_addError(ccm_t('image-required'));
		// }
		// return false;
	// }
// }
// ccmValidateColorbox = function() { return colorbox.validate(); }

// $(document).ready(function(){
	// colorbox.init();
// });
