(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

var myMapArgs = '';
var infowindowclosingruns = false;
function new_map( $el ) {

	// var
	var $markers = $el.find('.marker');
	// console.log($markers);
	// vars
	var args = {
		mapzoom : 14,
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		scrollwheel	: false,
		navigationControl	: false,
		mapTypeControl	: false,
		scaleControl	: false,
		draggable	: false,
		setDefaultZoom : null,
		infowindows : [],
		styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#6195a0"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":"0"},{"saturation":"0"},{"color":"#f5f5f2"},{"gamma":"1"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"lightness":"-3"},{"gamma":"1.00"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#bae5ce"},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#fac9a9"},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#787878"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.airport","elementType":"labels.icon","stylers":[{"hue":"#0a00ff"},{"saturation":"-77"},{"gamma":"0.57"},{"lightness":"0"}]},{"featureType":"transit.station.rail","elementType":"labels.text.fill","stylers":[{"color":"#43321e"}]},{"featureType":"transit.station.rail","elementType":"labels.icon","stylers":[{"hue":"#ff6c00"},{"lightness":"4"},{"gamma":"0.75"},{"saturation":"-68"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#eaf6f8"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#abe1f6"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":"-49"},{"saturation":"-53"},{"gamma":"0.79"}]}]
	};

	if('map_zoom' in rm_map_data){
		args.mapzoom = parseInt(rm_map_data.map_zoom);
	}

	if('scalable' in rm_map_data){
		args.scrollwheel = true;
	}

	if('dragable' in rm_map_data){
		args.draggable = true;
	}

	if('map_styling' in rm_map_data){
		args.styles = rm_map_data.map_styling;
	}

	myMapArgs = args;

	// create map
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(i,o){
		add_marker( $(this), map , $markers.length , args);
		if((i+1) == $markers.length){
			setTimeout(function() {
				center_map( map );
				args.mapCenter = map.getCenter();
				args.setDefaultZoom = map.getZoom();
			}, 1000);
		}
	});

	// center map
	google.maps.event.addListener(map, 'bounds_changed', function() {
		var bounds = map.getBounds();
		//console.log(bounds);
	});

	// return
	return map;

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function closeAllInfoWindows(infowindow){
	if(infowindow.length > 0){
		$.each(infowindow, function(i,o){
			o.close();
			if(infowindow.length == (i+1)){
				infowindowclosingruns = false;
			}
		});
	}else{
		infowindowclosingruns = false;
	}
}

function add_marker( $marker, map , length , args) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') ),
    defaulticon = 'http://rosemontdev.com/allstarortho/wp-content/uploads/2018/03/icon-pindrop.png';

	if(length > 1){
		defaulticon = 'http://rosemontdev.com/allstarortho/wp-content/uploads/2018/03/icon-pindrop.png';
	}
	var theMarkerId = $marker.data('markerCount');
		 theMarkerId = "mapMarker-"+theMarkerId;

	// create marker
	var marker = new google.maps.Marker({
		position: latlng,
		map: map,
		animation: google.maps.Animation.DROP,
		icon: defaulticon // null = default icon
	});


	marker.metadata = {type: "point", markerID: theMarkerId };
	marker.setValues({type: "point", markerID: theMarkerId });

	if('map_marker' in rm_map_data){
		marker.icon = rm_map_data.map_marker;
	}

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html(),
		});
		//we save our info windows into an array so we can use them later.
		args.infowindows.push(infowindow);

		if(length == 1){
			window.setTimeout(function() {infowindow.open( map, marker );},1500);
		}else{
			google.maps.event.addListener(marker,'click',function(e) {
			  infowindow.open( map, marker );
			  map.setZoom(15);
			  map.setCenter(marker.getPosition());
			  map.panBy(0, -170);

				$('.zoom-out').on('click',function() {
					map.setCenter(args.mapCenter);
					map.setZoom(args.setDefaultZoom);
					infowindow.close( map );
				});
			});
		}

		if(marker.markerID ==  theMarkerId ){

			$('#'+theMarkerId).on('click',function(e){
				e.preventDefault(e);

				//run our close function for infowindow
				infowindowclosingruns = true;
				closeAllInfoWindows(args.infowindows);

				//wait before opening new window (shouldn't take long)
				var waitforclose = setInterval(function(){//wait for all our infowindows to close
					if(infowindowclosingruns == false){// all are closed :)
						clearInterval(waitforclose);
						//same as 'google.maps.event.addListener'
						//all other windows are closed! let's open this one :)
						infowindow.open( map, marker );
						map.setZoom(15);
						map.setCenter(marker.getPosition());
						map.panBy(0, -170);

						$('.zoom-out').on('click',function() {
							map.setCenter(args.mapCenter);
							map.setZoom(args.setDefaultZoom);
							infowindow.close( map );
						});

					}
				},100);

			});
		}

	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( myMapArgs.mapzoom );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}


/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var



var map = null;

$(document).ready(function(){
	// console.log( $('.acf-map').length );
	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );
	});
});

})(jQuery);

$(function() {

	// $('#search').hideseek({
	// 	highlight: true,
	// 	nodata: 'No Results',
	// });

	// $('.show-location-list').click(function() {
	// 	$('.acf-map, .show-location-list').toggleClass('slide-over');
	// 	$('.acf-location-list').toggleClass('make-visible');
	// });

});