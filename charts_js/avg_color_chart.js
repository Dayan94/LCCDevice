
$(document).ready(function(){
	var year = '', crop = '';
  year = $('#year-selector-for-color').val();
  crop = $('#crop-selector-for-color').val();
  // console.log(crop + year);
  $.ajax({  
    url:"charts_php/avg_color_chart.php",  
    method:"POST",  
    data:{crop_selector_for_color: crop, year_selector_for_color: year},   
    success:function(data)  
    {  
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
                       label: 'Greenness Comparison of All areas for ' + crop + ' (Highest Green Location to Lowest)',
                       backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],                                   
                       borderColor: 'rgba(0, 0, 0)',
                       hoverBackgroundColor: 'rgba(0, 0, 0)',
                       hoverBorderColor: 'rgba(0, 100, 0)',
                       data: total
                     }
                     ]
                   };

                   $("#avg_color_chart").remove();
                   $("#area_of_avg_color_chart").append('<canvas id="avg_color_chart"></canvas>');

                   var ctx = $("#avg_color_chart");


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
                            labelString: 'Average of (Total Average Leaf Color)'
                          }
                        }],
                        xAxes: [{
                         ticks: {
                          beginAtZero: true,
                          autoSkip: false
                        },
                        scaleLabel: {
                         display: true,
                         labelString: 'Location'
                       },

                     }],
                   }

                 }
               });
                 }  
               });
  $('#year-selector-for-color').change(function(){
    year = $(this).val();
    crop = $('#crop-selector-for-color').val();
    // console.log(crop + year);
    $.ajax({  
     url:"charts_php/avg_color_chart.php",  
     method:"POST",  
     data:{crop_selector_for_color: crop, year_selector_for_color: year},   
     success:function(data)  
     {  
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
                       label: 'Greenness Comparison of All areas for ' + crop + ' (Highest Green Location to Lowest)',
                       backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],                                   
                       borderColor: 'rgba(0, 0, 0)',
                       hoverBackgroundColor: 'rgba(0, 0, 0)',
                       hoverBorderColor: 'rgba(0, 100, 0)',
                       data: total
                     }
                     ]
                   };

                   $("#avg_color_chart").remove();
                   $("#area_of_avg_color_chart").append('<canvas id="avg_color_chart"></canvas>');

                   var ctx = $("#avg_color_chart");


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
                            labelString: 'Average of (Total Average Leaf Color)'
                          }
                        }],
                        xAxes: [{
                         ticks: {
                           beginAtZero: true,
                           autoSkip: false
                         },
                         scaleLabel: {
                           display: true,
                           labelString: 'Location'
                         },

                       }],
                     }

                   }
                 });
                 }  
               });
  });
  $('#crop-selector-for-color').change(function(){
    year = $('#year-selector-for-color').val();
    crop = $(this).val();
    // console.log(crop + year);
    $.ajax({  
     url:"charts_php/avg_color_chart.php",  
     method:"POST",  
     data:{crop_selector_for_color: crop, year_selector_for_color: year},   
     success:function(data)  
     {  
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
                    		label: 'Greenness Comparison of All areas for ' + crop + ' (Highest Green Location to Lowest)',
                       backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],                           
                       borderColor: 'rgba(0, 0, 0)',
                       hoverBackgroundColor: 'rgba(0, 0, 0)',
                       hoverBorderColor: 'rgba(0, 100, 0)',
                       data: total
                     }
                     ]
                   };

                   $("#avg_color_chart").remove();
                   $("#area_of_avg_color_chart").append('<canvas id="avg_color_chart"></canvas>');

                   var ctx = $("#avg_color_chart");


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
                            labelString: 'Average of (Total Average Leaf Color)'
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
                 }  
               });
  });


});




