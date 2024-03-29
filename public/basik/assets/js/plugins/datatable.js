(function ($) {
	"use strict";

  var init = function(){
    var table = $('#datatable').DataTable({
    	columnDefs: [
	       { "orderable": false, "targets": 7 }
	    ]
    });
    $('#datatable tbody').on( 'click', '.trash', function () {
	    table
	        .row( $(this).closest('tr') )
	        .remove()
	        .draw();
	} );
  }

  // for ajax to init again
  $.fn.dataTable.init = init;

})(jQuery);
