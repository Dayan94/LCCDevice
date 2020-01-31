$(document).ready(function() {

    $('#admin_request_table').DataTable( {
         // to show entries as user select option
         "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
         // to use copy, csv, excel, pdf, print etc button
         "dom": 'lBfrtip',
         "buttons": [
         'copy', 'csv', 'excel', 'pdf', 'print'
         ] ,
         // searching: false, 
         // paging: false, 
         // info: false             
     } );


    //converting th to input so that those inputs can be used for searching each column
    $('#admin_request_table tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<div class="md-form mt-0" style="align-items:center"><input type="text"  placeholder="'+title+'" /></div>' );
    } );


    // main DataTable
    var table2 = $('#admin_request_table').DataTable();    


    // Apply the search in each column
    table2.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                .search( this.value )
                .draw();
                // that.data().sum();
            }
        } );
    } );

} );


