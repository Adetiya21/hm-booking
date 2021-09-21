<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.laporan').addClass('active');
      $('.semua').addClass('active');
  	});

    function check_int(evt) {
      var charCode = ( evt.which ) ? evt.which : event.keyCode;
      return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    };
</script>

    <!-- konten -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>LAPORAN</h4>
                                        <span>Berikut semua data laporan.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?= site_url('admin/home') ?>"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="<?= site_url('admin/laporan') ?>">Laporan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Laporan</h5>
                                <span><!-- use class <code>table</code> inside table element --></span>
                                <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
                            </div>
                            <div class="card-block">
                                <div class="row">                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Pilih Bulan</label>
                                            <div class="col-md-6">           
                                                <select class="form-control" onchange="location = this.value;">
                                                    <option>Pilih Bulan</option>
                                                    <option value="<?= site_url('admin/laporan')?>" selected>Semua</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/01')?>">January</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/02')?>">February</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/03')?>">March</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/04')?>">April</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/05')?>">Mey</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/06')?>">June</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/07')?>">July</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/08')?>">August</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/09')?>">September</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/10')?>">October</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/11')?>">November</option>
                                                    <option value="<?= site_url('admin/laporan/bulan/12')?>">December</option>
                                                </select>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                    <hr>
                                <div class="dt-responsive">
                                    <table id="compact" class="table table-responsive table-bordered table-hover nowrap" width="100%">
                                        <thead>
                                            <tr><th width="1%">No</th>
                                            <th width="100px">Tanggal Acara</th>
                                            <th>Nama Catin</th>
                                            <th>Paket</th>
                                            <th>DP</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th width="10%">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr><th colspan="6" class="text-right"><h5>Total</h5></th><th colspan="2"></th></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- DataTables -->
<script src="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/assets/pages/data-table/js/jszip.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/assets/pages/data-table/js/pdfmake.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/assets/pages/data-table/js/vfs_fonts.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">

    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    var table = $('#compact').DataTable({
        oLanguage: {
            sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {"url": "<?= base_url() ?>admin/laporan/json/", "type": "POST"},
        columns: [
        {
            "data": "id",
            "orderable": false
        },
        {"data": "tgl_acara",
            render: function(data) {
                const d = new Date(data);

                // const monthNames = ["Januari", "Februari", "Maret", "April", "Mai", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                
                const month1 = d.toLocaleString('default', { month: 'long' })

                var datePart = data.match(/\d+/g),
                year = datePart[0].substring(0), // get only four digits
                month = datePart[1], day = datePart[2];

                return ttgl =  day+' '+month1+' '+year;                
                // return day+' '+monthNames[d.getMonth()]+' '+year;
                // return day+' '+month1+' '+year;
            }, 
            defaultContent: 'Tanggal Acara'
        },
        {"data": "nama"},
        {"data": "nama_paket"},
        {"data": "dp",
            render: function(data) { 
                var reverse = data.toString().split('').reverse().join(''),
                ribuan  = reverse.match(/\d{1,3}/g);
                ribuan  = ribuan.join('.').split('').reverse().join('');
                      return 'Rp. '+ribuan+',-';
                },
                defaultContent: 'dp'
        },
        {"data": "total",
            render: function(data) { 
                var reverse = data.toString().split('').reverse().join(''),
                ribuan  = reverse.match(/\d{1,3}/g);
                ribuan  = ribuan.join('.').split('').reverse().join('');
                      return 'Rp. '+ribuan+',-';
                },
                defaultContent: 'total'
        },
        {"data": "status",
            render: function(data) { 
                if (data=='Belum Selesai') {
                    return '<label class="label label-sm label-warning text-center" style="width:90%">'+data+'</label>'
                } else if (data=='Selesai') {
                    return '<label class="label label-sm label-info text-center" style="width:90%">'+data+'</label>'
                }
            },
            defaultContent: 'status'
        },
        {"data": "view","orderable": false}
        ],
        order: [[1, 'desc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        },
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
               return typeof i === 'string' ?
               i.replace(/[\$,]/g, '')*1 :
               typeof i === 'number' ?
               i : 0;
           };

            // Total over all pages
            total = api
            .column(5)
            .data()
            .reduce( function (a, b) {
               return intVal(a) + intVal(b);
           }, 0 );

            // Total over this page
            pageTotal = api
            .column( 5, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
               return intVal(a) + intVal(b);
           }, 0 );

            var number_string = pageTotal.toString(),
            sisa    = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            var number_string = total.toString(),
            sisa1    = number_string.length % 3,
            rupiah1  = number_string.substr(0, sisa1),
            ribuan1  = number_string.substr(sisa1).match(/\d{3}/g);

            if (ribuan1) {
                separator1 = sisa1 ? '.' : '';
                rupiah1 += separator1 + ribuan1.join('.');
            }


            // Update footer
            $( api.column( 5 ).footer() ).html(
               'Rp. '+rupiah +' (Rp. '+ rupiah1 +' total)'
               );
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }, 'print'
        ],
    });

    //fun reload
    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    function refreshTokens() {
        var url = "<?= base_url()."i/get_tokens" ?>";
        $.get(url, function(theResponse) {
          /* you should do some validation of theResponse here too */
          $('#csrfHash').val(theResponse);;
      });
    }
</script>