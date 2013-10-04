var WPmap = {

    // HTML Elements we'll use later!
    mapContainer   : document.getElementById('map-container'),
    dirContainer   : document.getElementById('dir-container'),
    toInput        : document.getElementById('map-config-address'),
    fromInput      : document.getElementById('from-input'),
    unitInput      : document.getElementById('unit-input'),
    geoDirections  : document.getElementById('geo-directions'),
    nativeLinkElem : document.getElementById('native-link'),
    startLatLng    : null,
    destination    : null,
    geoLocation    : null,
    geoLat         : null,
    geoLon         : null,

    // Google Maps API Objects
    dirService     : new google.maps.DirectionsService(),
    dirRenderer    : new google.maps.DirectionsRenderer(),
    map:null,

    /**
     *
     * Determine if the geolocation API is available in the browser.
     *
     */
    getGeo : function(){
        if (!! navigator.geolocation)
            return navigator.geolocation;
        else
            return undefined;
    },

    /**
     * Get the Current Position
     */
    getGeoCoords : function (){
        
        WPmap.geoLoc.getCurrentPosition(WPmap.setGeoCoords, WPmap.geoError)
    },

    /**
     * Set the Lat/Lon Values to the object.
     * Set extra buttons for users with Geo Capabilities
     */
    setGeoCoords : function (position){

        WPmap.geoLat = position.coords.latitude;
        WPmap.geoLon = position.coords.longitude;
        WPmap.showGeoButton();
        WPmap.setNativeMapLink();
    },

    /**
     * Geo Errors - Useful for Dev - Hidden in production.
     */
    geoError : function(error) {
        var message = "";
        // Check for known errors
        switch (error.code) {
            case error.PERMISSION_DENIED:
                message = "Não conseguimos autorização do seu navegador para usar" +
                    "a geolocalização.";
                break;
            case error.POSITION_UNAVAILABLE:
                message = "Desculpe, não conseguimos determinar sua posição exata.";
                break;
            case error.PERMISSION_DENIED_TIMEOUT:
                message = "Desculpe, estamos com problemas para determinar sua localização. Por favor, tente novamente.";
                break;
        }
        // If it's an unknown error, build a message that includes
        // information that helps identify the situation, so that
        // the error handler can be updated.
        if (message == "")
        {
            var strErrorCode = error.code.toString();
            message = "Sua posição não pode ser determinada devido a um" +
                "erro desconhecido (Codigo: " + strErrorCode + ").";
        }
       console.log(message);
    },

    /**
     * Show the 'use current location' button
     */
    showGeoButton : function(){

        var geoContainer = document.getElementById('geo-directions');
        geoContainer.removeClass('hidden');
    },

    /*  Show the 'open in google maps' button */
    setNativeMapLink: function(){

        var locString   = WPmap.geoLat + ',' + WPmap.geoLon;
        var destination = WPmap.toInput.value;
        var newdest     = destination.replace(' ', '');
        WPmap.nativeLinkElem.innerHTML = ('<a  class="semfade" target="_blank" href="http://maps.google.com/maps?mrsp=0' 
            + '&amp;daddr='
            + newdest 
            + '&amp;saddr=' 
            + locString
            + '" class="map-button">Abrir no Google Maps</a>');
    },

    /* Determine whether an Admin has entered lat/lon values or a regular address. */
    getDestination:function() {

        var toInput = WPmap.toInput.value;
        var isLatLon  = (/^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/.test(toInput));

        if (isLatLon){
            var n = WPmap.toInput.value.split(",");
            WPmap.destination = new google.maps.LatLng(n[0], n[1]);
            WPmap.setupMap();
        }
        else {

            geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'address': WPmap.toInput.value}, function(results, status){

                WPmap.destination = results[0].geometry.location;
                WPmap.setupMap();
            });
        }
    },

    /* Initialize the map */
    setupMap : function() {
        
    	var mapInfo = [-16.692368,-49.235102];
		var latlng = new google.maps.LatLng(mapInfo[0],mapInfo[1]);
        //get the content
        // var infoWindowContent = WPmap.mapContainer.getAttribute('data-map-infowindow');
        var infoWindowContent = '<span class="infoWindow"><img class="icobigo" src="http://192.168.2.108/nomac/wp-content/themes/nomac/images/logo-mapa.png"/></span>';
        // var infoWindowContent = '<span class="spninfowindows"><span class="bold">SARTRE GUMO</span> <br /> Av. T4, n.1478, Ed. Absolut Business - Setor Bueno</span>';
        var initialZoom       = WPmap.mapContainer.getAttribute('data-map-zoom');

        WPmap.map = new google.maps.Map(WPmap.mapContainer, {
            zoom:parseInt(initialZoom),     //ensure it comes through as an Integer
            center: latlng,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        });

        marker = new google.maps.Marker({
            map:WPmap.map,
            position:WPmap.destination,
            draggable:false
        });

        //set the infowindow content
        infoWindow = new google.maps.InfoWindow({
            content:infoWindowContent
        });
        infoWindow.open(WPmap.map, marker);

    },

    getSelectedUnitSystem:function () {
        return WPmap.unitInput.options[WPmap.unitInput.selectedIndex].value == 'metric' ?
            google.maps.DirectionsUnitSystem.METRIC :
            google.maps.DirectionsUnitSystem.IMPERIAL;
    },

    /**
     * Get the directions
     * Check if the user has selected a Geo option & use that instead
     */
    getDirections:function (request) {

        //Get the postcode that was entered
        var fromStr = WPmap.fromInput.value;

        var dirRequest = {
            origin      : fromStr,
            destination : WPmap.destination,
            travelMode  : google.maps.DirectionsTravelMode.DRIVING,
            unitSystem  : WPmap.getSelectedUnitSystem()
        };

        //check if user clicked 'use current location'
        if (request == 'geo'){
            var geoLatLng = new google.maps.LatLng( WPmap.geoLat , WPmap.geoLon );
            dirRequest.origin = geoLatLng;
        }

        WPmap.dirService.route(dirRequest, WPmap.showDirections);
    },

    /**
     * Output the Directions into the page.
     */
    showDirections:function (dirResult, dirStatus) {
        if (dirStatus != google.maps.DirectionsStatus.OK) {
            switch (dirStatus){
                case "ZERO_RESULTS" : alert ('Desculpe, não conseguimos traçar uma rota para esse endereço. Tente novamente.')
                    break;
                case "NOT_FOUND" : alert('Não encontramos esse endereço. Tente novamente.');
                    break;
                default : alert('Desculpe, existe algum erro comprometendo as rotas. Tente novamente.')
            }
            return;
        }
        // Show directions
        WPmap.dirRenderer.setMap(WPmap.map);
        WPmap.dirRenderer.setPanel(WPmap.dirContainer);
        WPmap.dirRenderer.setDirections(dirResult);
    },

    init:function () {

        if (WPmap.geoLoc = WPmap.getGeo()){
            //things to do if the browser supports GeoLocation.
            WPmap.getGeoCoords();
        }

        WPmap.getDestination();

        //listen for when Directions are requested
        google.maps.event.addListener(WPmap.dirRenderer, 'directions_changed', function () {

            infoWindow.close();         //close the first infoWindow
            marker.setVisible(false);   //remove the first marker

            //setup strings to be used.
            var distanceString = WPmap.dirRenderer.directions.routes[0].legs[0].distance.text;

            //set the content of the infoWindow before we open it again.
            infoWindow.setContent('<span class="infowindow">Obrigado!<br /> Você está apenas <strong> ' + distanceString + '</strong> de nós!. <br />A rota esta traçada no mapa. Te esperamos aqui!</span>');

            //re-open the infoWindow
            infoWindow.open(WPmap.map, marker);
            setTimeout(function () {
                infoWindow.close()
            }, 8000); //close it after 8 seconds.

        });
    }//init
};

google.maps.event.addDomListener(window, 'load', WPmap.init);


/* Function to easily remove any class from an element. */
HTMLElement.prototype.removeClass = function(remove) {
    var newClassName = "";
    var i;
    var classes = this.className.split(" ");
    for(i = 0; i < classes.length; i++) {
        if(classes[i] !== remove) {
            newClassName += classes[i] + " ";
        }
    }
    this.className = newClassName;
}