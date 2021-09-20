<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.booking').addClass('active');
  	});

    // fun numerik
    function check_int(evt) {
        var charCode = ( evt.which ) ? evt.which : event.keyCode;
        return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    };

    // fun image preview
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
          document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
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
                                        <h4>DATA BOOKING <?= strtoupper($blnn) ?></h4>
                                        <span>Berikut data booking wedding.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?= site_url('admin/home') ?>"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="<?= site_url('admin/booking') ?>">Booking</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="page-body" style="margin-top: -20px;margin-bottom:12px">
                        <div class="row">
                        	<div class="col-md-2">
                        		<button class="btn btn-primary btn-round" onclick="tambah()"><span class="fa fa-edit"></span> Tambah Data</button>
                        		<br><br>
                        	</div>
                        	<div class="col-md-3">
                        		<select class="form-control" onchange="location = this.value;">
                        			<option>-- Pilih Bulan --</option>
                        			<option value="<?= site_url('admin/booking')?>">Semua</option>
                        			<option value="<?= site_url('admin/booking/perbulan/1')?>">January</option>
                        			<option value="<?= site_url('admin/booking/perbulan/2')?>">February</option>
                        			<option value="<?= site_url('admin/booking/perbulan/3')?>">March</option>
                        			<option value="<?= site_url('admin/booking/perbulan/4')?>">April</option>
                        			<option value="<?= site_url('admin/booking/perbulan/5')?>">Mey</option>
                        			<option value="<?= site_url('admin/booking/perbulan/6')?>">June</option>
                        			<option value="<?= site_url('admin/booking/perbulan/7')?>">July</option>
                        			<option value="<?= site_url('admin/booking/perbulan/8')?>">August</option>
                        			<option value="<?= site_url('admin/booking/perbulan/9')?>">September</option>
                        			<option value="<?= site_url('admin/booking/perbulan/10')?>">October</option>
                        			<option value="<?= site_url('admin/booking/perbulan/11')?>">November</option>
                        			<option value="<?= site_url('admin/booking/perbulan/12')?>">December</option>
                        		</select>
                        	</div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Booking perBulan <?= $blnn ?></h5>
                                <span><!-- use class <code>table</code> inside table element --></span>
                                <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive">
                                    <table id="compact" class="table table-responsive table-hover table-xs nowrap" width="100%">
                                        <thead>
                                            <tr><th width="1%">No</th>
                                            <th>Tanggal Acara</th>
                                            <th>Paket</th>
                                            <th>Nama Capin</th>
                                            <th>No HP</th>
                                            <th>Alamat Acara</th>
                                            <th>Status</th>
                                            <th width="10%">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
        ajax: {"url": "<?= base_url() ?>admin/booking/json_perbulan/<?= $bln ?>", "type": "POST"},
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

                return ttgl =  day+'-'+month+'-'+year;                
                // return day+' '+monthNames[d.getMonth()]+' '+year;
                // return day+' '+month1+' '+year;
            }, 
            defaultContent: 'tgl_acara'
        },
        {"data": "nama_paket"},
        {"data": "nama"},
        {"data": "no_hp"},
        {"data": "alamat_acara"},
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
        ]
    });

    //fun reload
    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    //Fun Hapus
    function hapus(id)
    {
        if(confirm('Anda yakin ingin menghapus data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : '<?php echo site_url("admin/booking/hapus/'+id+'") ?>',
                type: "POST",
                dataType: "JSON",
                data: { <?= $this->security->get_csrf_token_name(); ?> : function () {
                  refreshTokens();
                  return $( "#csrfHash" ).val();
              }},
              success: function(data)
              {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }

    //fun tambah
    function tambah()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Data Booking'); // Set Title to Bootstrap modal title
    }

    //fun edit
    function edit(id)
    {
        save_method = 'update';
	    $('#form_edit')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	    $.ajax({
	        url : '<?php echo site_url("admin/booking/edit/'+id+'") ?>',
	        type: "GET",
	        dataType: "JSON",
	        success: function(data)
	        {
	            $('[name="id"]').val(data.id);
	            $('[name="status"]').val(data.status);
	            $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
	            $('.modal-title').text('Edit Status'); // Set title to Bootstrap modal title
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	}

    //fun simpan
    function save()
    {
        refreshTokens();
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;
        var formData;

        if(save_method == 'add') {
            url = "<?php echo site_url('admin/booking/tambah')?>";
            formData = new FormData($('#form')[0]);
        } else {
            url = "<?php echo site_url('admin/booking/update')?>";
            formData = new FormData($('#form_edit')[0]);
        }

        // ajax adding data to database
        
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",

            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    $('#modal_form_edit').modal('hide');
                    reload_table();
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
            }
        });
    }

    function refreshTokens() {
        var url = "<?= base_url()."i/get_tokens" ?>";
        $.get(url, function(theResponse) {
          /* you should do some validation of theResponse here too */
          $('#csrfHash').val(theResponse);;
      });
    }
</script>


<!--modal tambah -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" id="csrfHash" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
	                        	<div class="form-group">
		                            <label >Paket</label>
		                            <select name="id_paket" class="form-control" required />
                                        <option>--- Pilih Paket ---</option>
                                        <?php foreach($paket->result() as $key) { ?>
                                        <option value="<?= $key->id ?>"><?= $key->nama ?></option>
	                                    <?php } ?>
                                    </select>
                                    <span class="help-block"></span>
		                        </div>
		                        <div class="form-group">
		                            <label >Nama Catin</label>
		                            <input type="text" class="form-control" name="nama" placeholder="Nama Catin" required />
                                    <span class="help-block"></span>
		                        </div>
		                        <div class="form-group">
		                            <label >No HP</label>
		                            <input type="text" class="form-control" name="no_hp" placeholder="No HP" required />
                                    <span class="help-block"></span>
		                        </div>
		                        <div class="form-group">
		                            <label >Email</label>
		                            <input type="text" class="form-control" name="email" placeholder="Email" required />
                                    <span class="help-block"></span>
		                        </div>
		                        <div class="form-group">
		                            <label >Alamat Tinggal</label>
		                            <textarea name="alamat_tinggal" class="form-control" placeholder="Alamat Tempat Tinggal" required /></textarea>
                                    <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                    	<div class="form-group">
		                            <label >Tanggal Acara</label>
		                            <input type="date" class="form-control" name="tgl_acara" required />
                                    <span class="help-block"></span>
		                        </div>
		                        <div class="form-group">
		                            <label >Alamat Acara</label>
		                            <textarea name="alamat_acara" class="form-control" placeholder="Alamat Acara" required /></textarea>
                                    <span class="help-block"></span>
		                        </div>
	                        	<div class="form-group">
		                            <label >Status</label>
		                            <select name="status" class="form-control" required/>
			                            <option>--- Pilih Status ---</option>
                                        <option value="Belum Selesai">Belum Selesai</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                    <span class="help-block"></span>
		                        </div>
		                        <div class="form-group">
                                    <label for="exampleInputEmail1">Foto</label><br>
                                    <input id="uploadImage" type="file" name="bukti_transfer" onchange="PreviewImage();" class="form-control" accept='image/*' />
                                    <p style="font-size: 0.7em; padding: 5px;">JPG, JPEG, PNG Max. 2MB</p>
                                    <div class="form-group" id="photo-preview">
                                        <div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="photo">
                                        <div>
                                            <img id="uploadPreview" style="max-width:200px;" class="img-thumbnail" />
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
	                        </div>
		                </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fa fa-edit "></i> Simpan</button>
                </div>
                <div class="pull-left">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--modal edit -->
<div class="modal fade" id="modal_form_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_edit" class="form-horizontal">
                    <input type="hidden" id="csrfHash" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id" required/>
	                        <div class="col-md-12">
	                        	<div class="form-group">
		                            <label >Status</label>
		                            <select name="status" class="form-control" required />
                                        <option value="Belum Selesai">Belum Selesai</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                    <span class="help-block"></span>
		                        </div>
	                        </div>
		                </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fa fa-edit "></i> Simpan</button>
                </div>
                <div class="pull-left">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->