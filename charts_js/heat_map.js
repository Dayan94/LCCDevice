$(document).ready(function(){

  var analysis = '', year = '', crop = '';
  analysis = $('#heatmap-analysis-selector').val();
  crop = $('#heatmap-crop-selector').val();
  year = $('#heatmap-year-selector').val();
  // console.log(crop + year);
  $.ajax({
    url: "charts_php/query_for_heatmap.php",
    method: "POST",
    data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},  
    success: function(data) {
      console.log('used data');
      console.log(data);
      var myLatlng = new google.maps.LatLng(23.685000, 90.356300);

      var myOptions = {
        zoom: 6.7,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: false,
        scrollwheel: true,
        draggable: true,
        navigationControl: true,
        mapTypeControl: true,
        scaleControl: true,
        disableDoubleClickZoom: false
      };

      var map = new google.maps.Map($("#heatmapArea")[0], myOptions);

      heatmap = new HeatmapOverlay(map,
      {
            // radius should be small ONLY if scaleRadius is true (or small radius is intended)
            "radius": 17,
            "maxOpacity": 1,
            // scales the radius based on map zoom
            "scaleRadius": false,
            // if set to false the heatmap uses the global maximum for colorization
            // if activated: uses the data maximum within the current map boundaries.
            //   (there will always be a red spot with useLocalExtremas true)
            "useLocalExtrema": true,
            // which field name in your data represents the lat - default "lat"
            latField: 'latitude',
            // which field name in your data represents the lng - default "lng"
            lngField: 'longitude',
            // which field name in your data represents the data Value - default "Value"
            valueField: 'Value'
          }
          );

      var testData = {
        // max: 8,
        data : data
      };
      // console.log(testData);

      heatmap.setData(testData);

    },
    error: function(data) {
      console.log(data);
    }
  });

  $('#heatmap-analysis-selector').change(function(){
    analysis = $(this).val();
    year = $('#heatmap-year-selector').val();
    crop = $('#heatmap-crop-selector').val();
    // console.log(crop + year);
    $.ajax({
      url: "charts_php/query_for_heatmap.php",
      method: "POST",
      data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},  
      success: function(data) {
        // console.log('used data');
        // console.log(data);
        var myLatlng = new google.maps.LatLng(23.685000, 90.356300);

        var myOptions = {
          zoom: 6.7,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: false,
          scrollwheel: true,
          draggable: true,
          navigationControl: true,
          mapTypeControl: true,
          scaleControl: true,
          disableDoubleClickZoom: false
        };

        var map = new google.maps.Map($("#heatmapArea")[0], myOptions);

        heatmap = new HeatmapOverlay(map,
        {
            // radius should be small ONLY if scaleRadius is true (or small radius is intended)
            "radius": 17,
            "maxOpacity": 1,
            // scales the radius based on map zoom
            "scaleRadius": false,
            // if set to false the heatmap uses the global maximum for colorization
            // if activated: uses the data maximum within the current map boundaries.
            //   (there will always be a red spot with useLocalExtremas true)
            "useLocalExtrema": true,
            // which field name in your data represents the lat - default "lat"
            latField: 'latitude',
            // which field name in your data represents the lng - default "lng"
            lngField: 'longitude',
            // which field name in your data represents the data Value - default "Value"
            valueField: 'Value'
          }
          );

        var testData = {
        // max: 8,
        data : data
      };
      // console.log(testData);

      heatmap.setData(testData);

    },
    error: function(data) {
      // console.log(data);
    }
  });
  });

  $('#heatmap-crop-selector').change(function(){
    analysis = $('#heatmap-analysis-selector').val();
    crop = $(this).val();
    year = $('#heatmap-year-selector').val();
    // console.log(crop + year);
    $.ajax({
      url: "charts_php/query_for_heatmap.php",
      method: "POST",
      data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},  
      success: function(data) {
        // console.log('used data');
        // console.log(data);
        var myLatlng = new google.maps.LatLng(23.685000, 90.356300);

        var myOptions = {
          zoom: 6.7,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: false,
          scrollwheel: true,
          draggable: true,
          navigationControl: true,
          mapTypeControl: true,
          scaleControl: true,
          disableDoubleClickZoom: false
        };

        var map = new google.maps.Map($("#heatmapArea")[0], myOptions);

        heatmap = new HeatmapOverlay(map,
        {
            // radius should be small ONLY if scaleRadius is true (or small radius is intended)
            "radius": 17,
            "maxOpacity": 1,
            // scales the radius based on map zoom
            "scaleRadius": false,
            // if set to false the heatmap uses the global maximum for colorization
            // if activated: uses the data maximum within the current map boundaries.
            //   (there will always be a red spot with useLocalExtremas true)
            "useLocalExtrema": true,
            // which field name in your data represents the lat - default "lat"
            latField: 'latitude',
            // which field name in your data represents the lng - default "lng"
            lngField: 'longitude',
            // which field name in your data represents the data Value - default "Value"
            valueField: 'Value'
          }
          );

        var testData = {
        // max: 8,
        data : data
      };
      // console.log(testData);

      heatmap.setData(testData);

    },
    error: function(data) {
      // console.log(data);
    }
  });
  });


  $('#heatmap-year-selector').change(function(){
    analysis = $('#heatmap-analysis-selector').val();
    year = $(this).val();
    crop = $('#heatmap-crop-selector').val();
    // console.log(crop + year);
    $.ajax({
      url: "charts_php/query_for_heatmap.php",
      method: "POST",
      data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},  
      success: function(data) {
        // console.log('used data');
        // console.log(data);
        var myLatlng = new google.maps.LatLng(23.685000, 90.356300);

        var myOptions = {
          zoom: 6.7,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: false,
          scrollwheel: true,
          draggable: true,
          navigationControl: true,
          mapTypeControl: true,
          scaleControl: true,
          disableDoubleClickZoom: false
        };

        var map = new google.maps.Map($("#heatmapArea")[0], myOptions);

        heatmap = new HeatmapOverlay(map,
        {
            // radius should be small ONLY if scaleRadius is true (or small radius is intended)
            "radius": 17,
            "maxOpacity": 1,
            // scales the radius based on map zoom
            "scaleRadius": false,
            // if set to false the heatmap uses the global maximum for colorization
            // if activated: uses the data maximum within the current map boundaries.
            //   (there will always be a red spot with useLocalExtremas true)
            "useLocalExtrema": true,
            // which field name in your data represents the lat - default "lat"
            latField: 'latitude',
            // which field name in your data represents the lng - default "lng"
            lngField: 'longitude',
            // which field name in your data represents the data Value - default "Value"
            valueField: 'Value'
          }
          );

        var testData = {
        // max: 8,
        data : data
      };
      // console.log(testData);

      heatmap.setData(testData);

    },
    error: function(data) {
      // console.log(data);
    }
  });
  });





});