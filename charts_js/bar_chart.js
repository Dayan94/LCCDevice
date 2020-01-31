
$(document).ready(function(){
	var analysis = '', year = '', crop = '';

  analysis = $('#barchart-analysis-selector').val();
  year = $('#barchart-year-selector').val();
  crop = $('#barchart-crop-selector').val();
  chart_yaxes_label = '';
  // console.log(crop + year);
  $.ajax({  
    url:"charts_php/query_for_barchart.php",  
    method:"POST",  
    data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},   
    success:function(data)  
    {  
                    // console.log(data);
                    var location = [];
                    var total = [];
                    var rank_increment = 0;
                    for(var i in data) {
                      rank_increment++;
                      location.push("(" + rank_increment + ") " + data[i].Location);
                      total.push(data[i].Value);
                    }
                    label = analysis + ' Comparison Bart Chart of All Areas for ' + crop;
                    if(year == 'All Years') label += ' of All Years';
                    else label += ' of Year ' + year;
                    if(analysis == 'Greenness')
                    {
                      label += ' (from maximum Green Area to minimum)';
                      chart_yaxes_label = 'Average of (Total Average Leaf Color)';
                    }
                    else if(analysis == 'Urea Requirement')
                    {
                      label += '  (From Maximum Urea Requirement to Minimum)';
                      chart_yaxes_label = 'Total Urea in (Mon Unit)';
                    }
                    else {
                      label += '  (from Maximum Device Usage Counts to Minimum)';
                      chart_yaxes_label = 'Device Usage Counts in number';
                    }

                    var chartdata = {
                      labels: location,
                      datasets : [
                      {
                       label: label,
                       backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],                                   
                       borderColor: 'rgba(0, 0, 0)',
                       hoverBackgroundColor: 'rgba(0, 0, 0)',
                       hoverBorderColor: 'rgba(0, 100, 0)',
                       data: total
                     }
                     ]
                   };

                   $("#bar_chart").remove();
                   $("#area_of_bar_chart").append('<canvas id="bar_chart"></canvas>');

                   var ctx = $("#bar_chart");


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
                            labelString: chart_yaxes_label
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

  $('#barchart-analysis-selector').change(function(){
    analysis = $(this).val();
    year = $('#barchart-year-selector').val();
    crop = $('#barchart-crop-selector').val();
    $.ajax({  
      url:"charts_php/query_for_barchart.php",  
      method:"POST",  
      data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},   
      success:function(data)  
      {  
                    // console.log(data);
                    var location = [];
                    var total = [];
                    var rank_increment = 0;

                    for(var i in data) {
                      rank_increment++;
                      location.push("(" + rank_increment + ") " + data[i].Location);
                      total.push(data[i].Value);
                    }
                    label = analysis + ' Comparison Bart Chart of All Areas for ' + crop;
                    if(year == 'All Years') label += ' of All Years';
                    else label += ' of Year ' + year;
                    if(analysis == 'Greenness')
                    {
                      label += ' (from maximum Green Area to minimum)';
                      chart_yaxes_label = 'Average of (Total Average Leaf Color)';
                    }
                    else if(analysis == 'Urea Requirement')
                    {
                      label += '  (From Maximum Urea Requirement to Minimum)';
                      chart_yaxes_label = 'Total Urea in (Mon Unit)';
                    }
                    else {
                      label += '  (from Maximum Device Usage Counts to Minimum)';
                      chart_yaxes_label = 'Device Usage Counts in number';
                    }

                    var chartdata = {
                      labels: location,
                      datasets : [
                      {
                       label: label,
                       backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],                                   
                       borderColor: 'rgba(0, 0, 0)',
                       hoverBackgroundColor: 'rgba(0, 0, 0)',
                       hoverBorderColor: 'rgba(0, 100, 0)',
                       data: total
                     }
                     ]
                   };

                   $("#bar_chart").remove();
                   $("#area_of_bar_chart").append('<canvas id="bar_chart"></canvas>');

                   var ctx = $("#bar_chart");


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
                            labelString: chart_yaxes_label
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


  $('#barchart-crop-selector').change(function(){
    analysis = $('#barchart-analysis-selector').val();
    year = $('#barchart-year-selector').val();
    crop = $(this).val();
    // console.log(crop + year);
    $.ajax({  
      url:"charts_php/query_for_barchart.php",  
      method:"POST",  
      data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},   
      success:function(data)  
      {  
                    // console.log(data);
                    var location = [];
                    var total = [];
                    var rank_increment = 0;

                    for(var i in data) {
                      rank_increment++;
                      location.push("(" + rank_increment + ") " + data[i].Location);
                      total.push(data[i].Value);
                    }
                    label = analysis + ' Comparison Bart Chart of All Areas for ' + crop;
                    if(year == 'All Years') label += ' of All Years';
                    else label += ' of Year ' + year;
                    if(analysis == 'Greenness')
                    {
                      label += ' (from maximum Green Area to minimum)';
                      chart_yaxes_label = 'Average of (Total Average Leaf Color)';
                    }
                    else if(analysis == 'Urea Requirement')
                    {
                      label += '  (From Maximum Urea Requirement to Minimum)';
                      chart_yaxes_label = 'Total Urea in (Mon Unit)';
                    }
                    else {
                      label += '  (from Maximum Device Usage Counts to Minimum)';
                      chart_yaxes_label = 'Device Usage Counts in number';
                    }

                    var chartdata = {
                      labels: location,
                      datasets : [
                      {
                       label: label,
                       backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],                                   
                       borderColor: 'rgba(0, 0, 0)',
                       hoverBackgroundColor: 'rgba(0, 0, 0)',
                       hoverBorderColor: 'rgba(0, 100, 0)',
                       data: total
                     }
                     ]
                   };

                   $("#bar_chart").remove();
                   $("#area_of_bar_chart").append('<canvas id="bar_chart"></canvas>');

                   var ctx = $("#bar_chart");


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
                            labelString: chart_yaxes_label
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


  $('#barchart-year-selector').change(function(){
    analysis = $('#barchart-analysis-selector').val();
    year = $(this).val();
    crop = $('#barchart-crop-selector').val();
    // console.log(crop + year);
    $.ajax({  
      url:"charts_php/query_for_barchart.php",  
      method:"POST",  
      data:{analysis_selector: analysis, crop_selector: crop, year_selector: year},   
      success:function(data)  
      {  
                    // console.log(data);
                    var location = [];
                    var total = [];
                    var rank_increment = 0;
                    
                    for(var i in data) {
                      rank_increment++;
                      location.push("(" + rank_increment + ") " + data[i].Location);
                      total.push(data[i].Value);
                    }
                    label = analysis + ' Comparison Bart Chart of All Areas for ' + crop;
                    if(year == 'All Years') label += ' of All Years';
                    else label += ' of Year ' + year;
                    if(analysis == 'Greenness')
                    {
                      label += ' (from maximum Green Area to minimum)';
                      chart_yaxes_label = 'Average of (Total Average Leaf Color)';
                    }
                    else if(analysis == 'Urea Requirement')
                    {
                      label += '  (From Maximum Urea Requirement to Minimum)';
                      chart_yaxes_label = 'Total Urea in (Mon Unit)';
                    }
                    else {
                      label += '  (from Maximum Device Usage Counts to Minimum)';
                      chart_yaxes_label = 'Device Usage Counts in number';
                    }

                    var chartdata = {
                      labels: location,
                      datasets : [
                      {
                       label: label,
                       backgroundColor: ['rgba(0, 60, 0)','rgba(0, 65, 0)', 'rgba(0, 70, 0)','rgba(0, 80, 0)', 'rgba(0, 90, 0)','rgba(0, 105, 0)', 'rgba(0, 115, 0)', 'rgba(0, 130, 0)', 'rgba(0, 155, 0)', 'rgba(0, 180, 0)', 'rgba(0, 190, 0)','rgba(0, 205, 0)', 'rgba(0, 220, 0)', 'rgba(0, 235, 0)', 'rgba(0, 255, 0)'],                                   
                       borderColor: 'rgba(0, 0, 0)',
                       hoverBackgroundColor: 'rgba(0, 0, 0)',
                       hoverBorderColor: 'rgba(0, 100, 0)',
                       data: total
                     }
                     ]
                   };

                   $("#bar_chart").remove();
                   $("#area_of_bar_chart").append('<canvas id="bar_chart"></canvas>');

                   var ctx = $("#bar_chart");


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
                            labelString: chart_yaxes_label
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

});




