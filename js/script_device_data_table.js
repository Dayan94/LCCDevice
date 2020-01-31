
$(document).ready(function() {

/*   $('.input-daterange').datepicker({
      todayBtn:'linked',
      format: "yyyy-mm-dd",
      autoclose: true
  });

   fetch_data('no');

   function fetch_data(is_date_search, start_date='', end_date='')
   {
      var dataTable = $('#order_data').DataTable({
         "processing" : true,
         "serverSide" : true,
         "order" : [],
         "ajax" : {
            url:"write_l.php",
            type:"POST",
            data:{
               is_date_search:is_date_search, start_date:start_date, end_date:end_date
           }
       }
   });
  }

  $('#search').click(function(){
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();
      if(start_date != '' && end_date !='')
      {
         $('#order_data').DataTable().destroy();
         fetch_data('yes', start_date, end_date);
     }
     else
     {
         alert("Both Date is Required");
     }
   });*/


   





    // main DataTable
    

    
    /*setTimeout(function() {
       table.clear().draw();
     }, 2000);*/
 var table =   $('.device-data-table').DataTable( {
  order: [[0, 'desc']],
         // to show entries as user select option
         "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
         // to use copy, csv, excel, pdf, print etc button
         "dom": 'lBfrtip',
         buttons: [
         {extend: 'copy', className: 'btn-table fas fa-copyright'},
         {extend: 'csv', className: 'btn-table fas fa-file-csv'},
         {extend: 'excel', className: 'btn-table fas fa-file-excel'},
         {extend: 'pdf', className: 'btn-table fas fa-file-pdf'},
         {extend: 'print', className: 'btn-table fas fa-print'},
         ] ,

         // searching: false, 
         // paging: false, 
         // info: false             
       } );


    //converting th to input so that those inputs can be used for searching each column
    $('.device-data-table tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<div class="md-form mt-0" style="align-items:center"><input type="text"  placeholder="'+title+'" /></div>' );
    } );


    // Apply the search in each column
    table.columns().every( function () {
      var that = this;
      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that.search( this.value ).draw();
          console.log(that.search( this.value ).draw());
                // that.data().sum();
              }
            } );
    } );



    /*// DataTable for contact form data for admin 
    var table = $('#example2').DataTable();       

    // Apply the search in each column
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                .search( this.value )
                .draw();
                // that.data().sum();
            }
        } );
      } );*/
      
    // to bring every column search input in top of the column
    /*$('#example thead th').each(function () {
            var title = $(this).text();
            $(this).html(title+' <div class="md-form mt-0" style="display:flex; align-items:center"><input type="text" placeholder="Search" /></div>');
        });

        // // DataTable
        var table = $('.dataTable').DataTable();

        table.columns().every(function () {
            var table = this;
            $('input', this.header()).on('keyup change', function () {
                if (table.search() !== this.value) {
                       table.search(this.value).draw();
                }
            });
          });*/


// to implement date range search on the top 
/*$('.input-daterange').datepicker({
todayBtn:'linked',
format: "yyyy-mm-dd",
autoclose: true
});

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"fetch.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('.dataTable').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
}); */

} );


