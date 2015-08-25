jQuery(window).on("load", function() {
	"use strict";

	/* -----------------------------------------
	 FlexSlider Init
	 ----------------------------------------- */
	var $slider = jQuery(".flexslider");
	$slider.flexslider({
		'controlNav': false,
		'animation': ThemeOption.slider_effect,
		'direction': ThemeOption.slider_direction,
		'slideshow': Boolean(ThemeOption.slider_autoslide),
		'slideshowSpeed': Number(ThemeOption.slider_speed),
		'animationSpeed': Number(ThemeOption.slider_duration),
		'nextText': '',
		'prevText': ''
	});

});

jQuery(document).ready(function($) {
	"use strict";

	/* -----------------------------------------
	 Responsive Menus Init with mmenu
	 ----------------------------------------- */
	var mainNav = $("#navigation"),
			mobileNav = $("#mobilemenu");
	mainNav.clone().removeAttr('id').removeClass().appendTo(mobileNav);
	mobileNav.find('li').removeAttr('id');

	mobileNav.mmenu({
		offCanvas: {
			position : 'top',
			zposition: 'front'
		}
	});

	/* -----------------------------------------
	 Main Navigation Init
	 ----------------------------------------- */
	mainNav.superfish({
		delay:       300,
		animation:   { opacity:'show', height:'show' },
		speed:       'fast',
		dropShadows: false
	});

	/* -----------------------------------------
	 Map Init
	 ----------------------------------------- */
	if ( $("#map").length ) {
		gmap_initialize('map');
	}

	/* -----------------------------------------
	 Fancybox Init
	 ----------------------------------------- */
	$(".fb").fancybox();

	/* -----------------------------------------
	 Responsive Videos
	 ----------------------------------------- */
	$("body").fitVids();
});

/* -----------------------------------------
 Map Config
 ----------------------------------------- */
function gmap_initialize(map_element) {
	if ( typeof google === 'object' && typeof google.maps === 'object' ) {
		myLatlng = new google.maps.LatLng( ThemeOption.map_coords_lat, ThemeOption.map_coords_long );

		var mapOptions = {
			zoom       : parseInt( ThemeOption.map_zoom_level ),
			center     : myLatlng,
			mapTypeId  : google.maps.MapTypeId.ROADMAP,
			scrollwheel: false
		};

		var map = new google.maps.Map( document.getElementById( map_element ), mapOptions );
		if ( map_element == 'panel_map' )
			panel_map = map;

		var contentString = '<div id="content">' + ThemeOption.map_tooltip + '</div>';

		var infowindow = new google.maps.InfoWindow( {
			content: contentString
		} );

		var marker = new google.maps.Marker( {
			position: myLatlng, map: map, title: ''
		} );
		google.maps.event.addListener( marker, 'click', function() {
			infowindow.open( map, marker );
		} );
	}
}