// JavaScript Document


jQuery(document).ready(function() {
	
	"use strict";
		 
	// FLEXY MENU SETTING
	$(".flexy-menu").flexymenu({
		type: "vertical",
		indicator: true
	});
	
	// STICKY MENU
	var stickyNavTop = $('.header-section').offset().top;
  
	var stickyNav = function(){
		var scrollTop = $(window).scrollTop();

		if (scrollTop > stickyNavTop) {
			$('.header-section').addClass('sticky');
		} else {
			$('.header-section').removeClass('sticky');
		}
	};
	  
	stickyNav();
	  
	$(window).scroll(function() {
		stickyNav();
	});
	
	// FIX VIDEO IFRAME Z-INDEX
	$('iframe').each(function(){
        var url = $(this).attr("src");
        if ($(this).attr("src").indexOf("?") > 0) {
        	$(this).attr({
        		"src" : url + "&wmode=transparent",
        		"wmode" : "Opaque"
        	});
        }
        else {
        	$(this).attr({
        		"src" : url + "?wmode=transparent",
        		"wmode" : "Opaque"
        	});
        }
    });
		
	// GO TO TOP SETTING
	var top_offset = 220;
	var top_duration = 500;
	$(window).scroll(function() {
		if ($(this).scrollTop() > top_offset) {
			$('.back-to-top').fadeIn(top_duration);
		} else {
			$('.back-to-top').fadeOut(top_duration);
		}
	});
	
	$('.back-to-top').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, top_duration);
		return false;
	})

	$('.flexy-menu a').click(function() {
		var element = $(this).attr('data-target').replace('#', '');
		var top = $('#' + element).offset().top;
	    $('html, body').animate({
	        scrollTop: top
	    }, 500);
	    return false;
	});
});

//Buget operating Donut Chart
new Morris.Donut({
    element: 'budget-donut',
    data: [
        {value: 55.8, label: 'Tuition Fee', formatted: '$6,700' },
        {value: 4.2, label: 'Emergency Expenses', formatted: '$500' },
        {value: 20.8, label: 'Personal Expenses', formatted: '$2,500' },
        {value: 8.3, label: 'Flight Ticket', formatted: '$1,000' },
        {value: 10.8, label: 'GoFundMe Fee', formatted: '$1,300' }
    ],
    resize: 'true',
    backgroundColor: '#fff',
    labelColor: '#7a7a7a',
    colors: [
        '#fa8564', '#9972B5', '#1fb5ac', '#A9D86E', '#4D5360'
    ],
    formatter: function (x, data) { return data.formatted; }
});

//maps
function initialize() {
	"use strict";

	var mapOptions = {
		zoom: 5,
		center: new google.maps.LatLng(41.0154709, -91.9669335),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		panControl: true,
		streetViewControl: false,
		mapTypeControl: false
	};
	
	var map = new google.maps.Map(document.getElementById('mum-map'), mapOptions);
	
	var marker = new google.maps.Marker({
		position: map.getCenter(),
		map: map
	});

	var infowindow = new google.maps.InfoWindow({
		content: "Maharishi University of Management, Fairfield, IA, USA"
		});
	infowindow.open(map, marker);
	
	google.maps.event.addListener(marker, 'click', function() {
		map.setZoom(10);
		map.setCenter(marker.getPosition());
	});
}
google.maps.event.addDomListener(window, 'load', initialize);