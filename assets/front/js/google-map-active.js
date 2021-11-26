//-----------Google Map-----------
function initialize() {
    var mapOptions = {
      zoom: 10,
      scrollwheel: false,
      center: new google.maps.LatLng(40.6976701,-74.259875)
    };

    var map = new google.maps.Map(document.getElementById('googleMap'),
        mapOptions);


    var marker = new google.maps.Marker({
      position: map.getCenter(),
      animation:google.maps.Animation.BOUNCE,
      icon: 'assets/images/map-market.png',
      map: map
    });

  }

  google.maps.event.addDomListener(window, 'load', initialize);