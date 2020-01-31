$(document).ready(function(){
  var year = '', crop = '';
  crop = $('#crop-selector-for-urea').val();
  year = $('#year-selector-for-urea').val();
  // console.log(crop + year);
  $.ajax({
    url: "charts_php/urea_chart.php",
    method: "POST",
    data:{crop_selector_for_urea: crop, year_selector_for_urea: year},  
    success: function(data) {
      // console.log(data);
      var location = [];
      var total = [];

      for(var i in data) {
        location.push(data[i].Location);
        total.push(data[i].Value);
      }

      var chartdata = {
        labels: location,
        datasets : [
        {
          label: 'Total Urea requirement Comparison of All areas for ' + crop + ' (Maximum Requirement to Minimum)',
          backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],         
          borderColor: 'rgba(0, 0, 0)',
          hoverBackgroundColor: 'rgba(0, 0, 0)',
          hoverBorderColor: 'rgba(0, 100, 0)',
          data: total
        }
        ]
      };

      $("#urea_chart").remove();
      $("#area_of_urea_chart").append('<canvas id="urea_chart"></canvas>');

      var ctx = $("#urea_chart");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
          scaleShowValues: true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              },
              scaleLabel: {
                display: true,
                labelString: 'Total Urea in (Mon Unit)'
              }
            }],
            xAxes: [{
              ticks: {
               beginAtZero: true,
               autoSkip: false
             },
              /*scaleLabel: {
                display: true,
                labelString: 'Location'
              }*/
            }]
          }
        }
      });
    },
    error: function(data) {
      // console.log(data);
    }
  });

  $('#crop-selector-for-urea').change(function(){

    crop = $(this).val();
    year = $('#year-selector-for-urea').val();
    // console.log(crop + year);
    $.ajax({
      url: "charts_php/urea_chart.php",
      method: "POST",
      data:{crop_selector_for_urea: crop, year_selector_for_urea: year},  
      success: function(data) {
        // console.log(data);
        var location = [];
        var total = [];

        for(var i in data) {
          location.push(data[i].Location);
          total.push(data[i].Value);
        }

        var chartdata = {
          labels: location,
          datasets : [
          {
            label: 'Total Urea requirement Comparison of All areas for ' + crop + ' (Maximum Requirement to Minimum)',
            backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],         
            borderColor: 'rgba(0, 0, 0)',
            hoverBackgroundColor: 'rgba(0, 0, 0)',
            hoverBorderColor: 'rgba(0, 100, 0)',
            data: total
          }
          ]
        };

        $("#urea_chart").remove();
        $("#area_of_urea_chart").append('<canvas id="urea_chart"></canvas>');

        var ctx = $("#urea_chart");

        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata,
          options: {
            scaleShowValues: true,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Total Urea in (Mon Unit)'
                }
              }],
              xAxes: [{
                ticks: {
                  beginAtZero: true,
                  autoSkip: false
                },
              /*scaleLabel: {
                display: true,
                labelString: 'Location'
              }*/
            }]
          }
        }
      });
      },
      error: function(data) {
        // console.log(data);
      }
    });
  });

  $('#year-selector-for-urea').change(function(){

    year = $(this).val();
    crop = $('#crop-selector-for-urea').val();
    // console.log(crop + year);
    $.ajax({
      url: "charts_php/urea_chart.php",
      method: "POST",
      data:{crop_selector_for_urea: crop, year_selector_for_urea: year},  
      success: function(data) {
        // console.log(data);
        var location = [];
        var total = [];

        for(var i in data) {
          location.push(data[i].Location);
          total.push(data[i].Value);
        }

        var chartdata = {
          labels: location,
          datasets : [
          {
            label: 'Total Urea requirement Comparison of All areas for ' + crop + ' (Maximum Requirement to Minimum)',
            backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],         
            hoverBackgroundColor: 'rgba(0, 0, 0)',
            hoverBorderColor: 'rgba(0, 100, 0)',
            data: total
          }
          ]
        };

        $("#urea_chart").remove();
        $("#area_of_urea_chart").append('<canvas id="urea_chart"></canvas>');

        var ctx = $("#urea_chart");

        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata,
          options: {
            scaleShowValues: true,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Value Urea in (Mon Unit)'
                }
              }],
              xAxes: [{
                ticks: {
                  beginAtZero: true,
                  autoSkip: false
                },
              /*scaleLabel: {
                display: true,
                labelString: 'Location'
              }*/
            }]
          }
        }
      });
      },
      error: function(data) {
        // console.log(data);
      }
    });

  });
  




});