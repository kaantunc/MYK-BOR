var Datatable_bootstrap =  function () {
       return {
        init: function (options) {
			 var oTable = jQuery('#'+options['id']).dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "Hepsi"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
				"bInfo": true,
				"bPaginate": options['paging'],
				"bFilter": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ öğe göster",
                    "oPaginate": {
                        "sPrevious": "Geri",
                        "sNext": "İleri",
                    },
					"sZeroRecords": "Veri bulunamadı !",
					"sSearch": "Ara",
					"sInfo": "_START_ ile _END_ arası gösteriliyor.(Toplam _TOTAL_ öğe)",
					"sInfoEmpty": "Kayıt Sayısı: 0"
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ],
				"aaSorting": []
            });
			
			jQuery('#'+options['id']+'_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#'+options['id']+'_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown
			// jQuery('#'+id+' thead tr').append("<th>Hareket</th>");
			// jQuery('#'+id+' tbody tr').append("<td>"+
												// "<a href='javascript:void(0);' class='uprow'>"+
													// "<img src='images/arrow_up.png'/>"+
												// "</a>   "+
												// "<a href='javascript:void(0);' class='downrow'>"+
													// "<img src='images/arrow_down.png'/>"+
												// "</a>"+
											  // "</td>");
			// jQuery('#'+id+' tbody tr:eq(0)').find(".uprow").hide();
			return oTable;
		}
   };
}();