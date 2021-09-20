<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // menu aktif
    $(document).ready(function() {
      $('.header').addClass('active');
      $('.landscape').addClass('active');
    });
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
                                        <h4>HEADER LANDSCAPE</h4>
                                        <span>Berikut data header landscape.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?= site_url('admin/home') ?>"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="<?= site_url('admin/header-landscape') ?>">Header Landscape</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Daftar Gambar Header Landscape</h5>
                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive">
                                            <table id="compact" class="table table-responsive table-hover nowrap" width="100%">
                                                <thead>
                                                    <tr><th width="1%">No</th>
                                                    <th width="300px">Gambar</th>
                                                    <th width="80px">Status</th>
                                                    <th>#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Tambah Gambar Landscape</h5>
                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive">
                                            <?= $this->session->flashdata('pesan'); ?>
                                            <?= $this->session->flashdata('error'); ?>
                                            <?php $arb = array('enctype' => "multipart/form-data", );?>
                                            <?= form_open('admin/header/proses_landscape',$arb); ?>
                                            <div class="form-group">
                                              <label class="col-form-label">Gambar Header</label><br>
                                              
                                                <input type="file" name="gambar[]" class="form-control" id="chooseFile" multiple>
                                                <p class="help-block">JPG, PNG, JPEG - Max. 2MB</p> 
                                                <div class="imgGallery">
                                                  <!-- Image preview -->
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                              <div class="col-sm-12 text-right">
                                                <button class="btn btn-primary m-b-0 btn-round" style="color: #fff"><i class="fa fa-edit"></i> Simpan Data</abutton>
                                              </div>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>
                                    </div>
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
        ajax: {"url": "<?= base_url() ?>admin/header/jsonLandscape", "type": "POST"},
        columns: [
        {
            "data": "id",
            "orderable": false
        },
        {"data": "gambar","orderable": false,
            render: function(data) { 
                if(data!==null) {
                  return '<img class="img-thumbnail" width="100%" src="<?= base_url('assets/images/header/') ?>'+data+'">'
                } else {
                    return '<i>(Tidak ada foto)</i>'
                }},
              defaultContent: 'Gambar'
        },
        {"data": "status",
            render: function(data) { 
                if (data=='Non Active') {
                    return '<label class="label label-sm label-inverse text-center" style="width:90%">'+data+'</label>'
                } else if (data=='Active') {
                    return '<label class="label label-sm label-info text-center" style="width:90%">'+data+'</label>'
                }
            },
            defaultContent: 'status'
        },
        {"data": "view","orderable": false}
        ],
        order: [[2, 'desc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
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
                url : '<?php echo site_url("admin/header/hapus_landscape/'+id+'") ?>',
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

    //fun edit
    function edit(id)
    {
        save_method = 'update';
        $('#form_edit')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $.ajax({
            url : '<?php echo site_url("admin/header/edit_landscape/'+id+'") ?>',
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

        url = "<?php echo site_url('admin/header/update_landscape')?>";
        formData = new FormData($('#form_edit')[0]);

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

<!-- script multiple gambar -->
<script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {
        $('.imgGallery').empty();
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img style="padding: 5px; max-width: 100%;" class="img-thumbnail">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });    
</script>

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
                                        <option value="Non Active">Non Active</option>
                                        <option value="Active">Active</option>
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