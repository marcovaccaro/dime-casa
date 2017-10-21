jQuery(document).ready(function() {
	jQuery('ul.sf-menu').superfish({ delay: 300, animation: { height:'show' }, speed: 'fast' });

	jQuery("<select />").appendTo("#navigation");
	jQuery("<option />", { "selected": "selected", "value": "", "text": "Seleziona pagina..." }).appendTo("#navigation select");
	var deep = 1,
		deep_text = "",
		is_sub = false;
	jQuery("#navigation a").each(function() {
		var el = jQuery(this);
		if(el.parent("li").parent("ul").hasClass('sub-menu')) {
			deep_text = "";
			for(var i=1; i<=deep; i++)
				deep_text += "--";
			deep_text += " ";
			if(el.hasClass("sf-with-ul")) {
				deep++;
				is_sub = true;
			}
		}
		else {
			if(is_sub) {
				deep--;
				is_sub = false;
			}
			deep_text = "";
		}
		jQuery("<option />", { "value": el.attr("href"), "text": deep_text+el.text() }).appendTo("#navigation select");
	});
	jQuery("#navigation select").change(function() { window.location = jQuery(this).find("option:selected").val(); });
	
	var wpadminbar = jQuery('#wpadminbar');

	jQuery(".toggle_title").toggle(
		function() {
			jQuery(this).addClass('toggle_active');
			jQuery(this).next('.toggle_content').slideDown("fast");
		},
		function() {
			jQuery(this).removeClass('toggle_active');
			jQuery(this).next('.toggle_content').slideUp("fast");
		}
	);
	jQuery(".accordion_title").click(
		function() {
			jQuery(this).siblings('.accordion_content').slideUp("fast");
			jQuery(this).siblings('.accordion_title').removeClass('accordion_active');
			if(jQuery(this).hasClass('accordion_active')) {
				jQuery(this).removeClass('accordion_active');
			} else {
				jQuery(this).addClass('accordion_active');
				jQuery(this).next('.accordion_content').slideDown("fast");
			}
		}
	);
	jQuery('a.tab').each(function(index) {
		jQuery(this).attr('id', 'tab' + index);
		jQuery('div.tab_content').eq(index).attr('id', 'tab' + index);
		if(jQuery(this).parent('li').hasClass('current')) {
			jQuery('div.tab_content').eq(index).css('left', '0');
			jQuery('div.tab_content').eq(index).css('position', 'relative');
			jQuery('div.tab_content').eq(index).show();
		}
	});
	jQuery("a.tab").click(
		function(event) {
			event.preventDefault();
			jQuery(this).parents('ul').children('li.current').removeClass('current');
			jQuery(this).parent('li').addClass('current');
			jQuery(this).parents('ul').children('li').each(function() { jQuery('div#' + jQuery(this).children('a').attr('id')).hide(); });
			jQuery('div#' + jQuery(this).attr('id')).css('left', '0');
			jQuery('div#' + jQuery(this).attr('id')).css('position', 'relative');
			jQuery('div#' + jQuery(this).attr('id')).show();
		}
	);
	jQuery("div.works-scroller").hover(
		function() {
			if(jQuery.browser.msie && jQuery.browser.version < "9.0") {
				jQuery(this).find('ul.fancy_nav').show();
			}
			else {
				jQuery(this).find('ul.fancy_nav').fadeIn();
			}
		},
		function() {
			if(jQuery.browser.msie && jQuery.browser.version < "9.0") {
				jQuery(this).find('ul.fancy_nav').hide();
			}
			else {
				jQuery(this).find('ul.fancy_nav').fadeOut();
			}
		}
	);
	jQuery('#search_btn').toggle(
		function() {
			jQuery('#search').animate({
				right: 0
			});
		},
		function() {
			jQuery('#search').animate({
				right: -jQuery('#search_wrapper').outerWidth()
			});
		}
	);
	jQuery('.menu-item').each(function() {
		if(jQuery(this).children('ul').length) {
			jQuery(this).addClass('sf-with-ul');
		}
	});
	init_like_this();
    jQuery('.tiptip').tipsy({ offset: 0 });
	jQuery('.fvideo').fitVids();
	jQuery('.search-btn').toggle(
		function() {
			jQuery('#search-input').show().animate({ width: 116 });
		},
		function() {
			jQuery('#search-input').animate({ width: 0 }, function() { jQuery(this).hide(); });
		}
	);
});

// source: http://www.quirksmode.org/js/cookies.html
function createCookie(name, value, days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000));
		var expires = "; expires=" + date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}
function eraseCookie(name) {
	createCookie(name, "", -1);
}

function init_like_this() {
	jQuery(".like_this").click(function(event) {
		event.preventDefault();
		if(typeof $qsdata == 'undefined') {
			var qs = false;
		}
		else {
			var qs = true;
		}
		var id = jQuery(this).attr("id");
		var cookie = readCookie(id);
		if(cookie == null) {
			var mode = 'update';
			jQuery(this).removeClass('fancy_likes');
			jQuery(this).addClass('fancy_likes_you_like');
			if(qs) {
				$qsdata.find('#'+id).removeClass('fancy_likes');
				$qsdata.find('#'+id).addClass('fancy_likes_you_like');
			}
			createCookie(id, id, 9999);
		}
		else {
			var mode = 'delete';
			jQuery(this).removeClass('fancy_likes_you_like');
			jQuery(this).addClass('fancy_likes');
			if(qs) {
				$qsdata.find('#'+id).addClass('fancy_likes');
				$qsdata.find('#'+id).removeClass('fancy_likes_you_like');
			}
			eraseCookie(id);
		}
		id = id.split("like-");
		jQuery.ajax({
			type: "POST",
			url: "index.php",
			data: "likepost=" + id[1] + "&mode=" + mode,
			success: function(data) {
				data = data.split("|");
				jQuery("#like-" + id[1]).attr('title', data[0]);
				jQuery("#like-" + id[1]).html('<span>'+data[1]+'</span>');
				if(qs) {
					$qsdata.find('#like-'+id[1]).attr('title', data[0]);
				}
			}
		});
		return false;
	});
}
