var globalMap = null;

function createWorldHeroReportsMap(){
	var mapLayer = new OpenLayers.Layer.CloudMade("CloudMade", { 
		key: "3bb82639a274433fb30120279ea08c76",
		styleId: 4993,
		sphericalMercator:true
		}); 
	globalMap = new OpenLayers.Map("hr-map", { controls: [ ] });
	globalMap.addLayer( mapLayer );
	globalMap.zoomTo(2);

	var normalProjection = new OpenLayers.Projection("EPSG:4326");
				
	// create the features
	var cities = [
		{ name: "Juárez, México", 
			lonlat: new OpenLayers.LonLat(-106.48333, 31.73333),
			radius: 20, 
			color:'#e7298A'
		},
		{ name: "Kazakhstan", 
			lonlat: new OpenLayers.LonLat(68, 48), 
			radius: 10, 
			color:'#D95F02'
		},
		{ name: "Monterrey, México", 
			lonlat: new OpenLayers.LonLat(-100.316666, 25.66666), 
			radius: 4, 
			color:'#7570B3'
		},
		{ name: "Tijuana, México - San Diego, USA", 
			lonlat: new OpenLayers.LonLat(-117.0166667, 32.533333), 
			radius: 10, 
			color:'#1B9E77'
		},
		{ name: "Detroit, USA", 
			lonlat: new OpenLayers.LonLat(-83.0458333, 42.3313889), 
			radius: 5, 
			color:'#66A61E'
		},
		{ name: "New York City, USA", 
			lonlat: new OpenLayers.LonLat(-74.0063889, 40.7141667), 
			radius: 5, 
			color:'#e6ab02'
		},
		{ name: "Boston, USA", 
			lonlat: new OpenLayers.LonLat(-71.0602778, 42.3583333), 
			radius: 5, 
			color:'#a6761d'
		}
	];
	var features = [];
	var i=0;
	for(idx in cities){
		var mapPoint = cities[idx].lonlat.transform(normalProjection, globalMap.getProjectionObject());
		var mapFeature = new OpenLayers.Feature.Vector(
				new OpenLayers.Geometry.Point(mapPoint.lon,mapPoint.lat),
				{size: cities[idx].radius, color: cities[idx].color}
				);
		features[i] = mapFeature;
		i++;
	}

	//set up styles
	var styles = new OpenLayers.StyleMap({
		"default": {
			pointRadius: '${size}',
			fillColor: '${color}',
			strokeWidth: 1.5,
			fillOpacity: 0.9,
			strokeColor: '#000000',
			strokeWidth: 1
		},
		"select": {
			strokeWidth: 2,
			fillOpacity: 1
		}
	});

	// Create a vector layer and give it your style map
	var featureLayer = new OpenLayers.Layer.Vector("Locations", { styleMap: styles });
	featureLayer.addFeatures(features);
	globalMap.addLayer(featureLayer);
	
	// Create a select feature control and add it to the map.
	 var select = new OpenLayers.Control.SelectFeature(featureLayer, {
		hover: true
	});
	globalMap.addControl(select);
	select.activate(); 
	
	var mapCenter = new OpenLayers.LonLat(-20, 30);
	mapCenter = mapCenter.transform(normalProjection,globalMap.getProjectionObject());
	globalMap.setCenter(mapCenter,2);

}