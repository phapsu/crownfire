$(document).ready(function() {
	$("select:not(.default_select),input:radio,input:checkbox,#search").uniform();
	$("#same_as_shipping").change(function() {
		if($(this).is(":checked")) {
			$(this).parents("form").find(".formitem:not(.checkboxitem)").fadeTo(300,0.5).find("input,select").attr("disabled","disabled").val("");
		}
		else {
			$(this).parents("form").find(".formitem").fadeTo(300,1).find("input,select").removeAttr("disabled");
		}
	});
});

function initialize() {
    var latlng = new google.maps.LatLng(43.78461,-79.56257);
    var myOptions = {
      zoom: 14,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
    var marker = new google.maps.Marker({
        position: latlng, 
        map: map,
        title:"Crownfire Toronto"
    });

    var latlng = new google.maps.LatLng(43.157496,-80.260882);
    var myOptions = {
      zoom: 14,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas2"),myOptions);
    var marker = new google.maps.Marker({
        position: latlng, 
        map: map,
        title:"Crownfire Brantford"
    });
  }



$(document).ready(function() {
	 // toggles the slickbox on clicking the noted link
	  $('a#slick-toggle').click(function() {
	 $('#infoMessage1').toggle(400);
	 return false;
	  });
});