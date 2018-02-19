<!doctype html>
<html lang="en">


<head>
  <title>SPK AHP Supir Terbaik PT.Tri Mulya Logistics</title>
  <?php $this->view('element/head')?> 
</head>
<body>
  <!-- WRAPPER -->
  <div id="wrapper">
  <?php $this->view('element/navbar')?>
  <?php $this->view('element/sidebar')?>
    <!-- MAIN -->
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <!-- BORDERED TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Seleksi</h3>
                        </div>
                        <div class="panel-body">
                            <p class="demo-button">
                                <button type="button" onclick="buka_modal()" class="btn btn-primary">Tambah</button>
                            </p>
                            <table class="table table-bordered" id="dataSeleksi">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Seleksi</th>
                                        <th>Periode</th>
                                        <th>Catatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach($daftarSeleksi->result() as $data): ?>
                                    <tr>
                                        <td><?= $data->seleksi_id ?></td>
                                        <td><?= $data->nama_seleksi ?></td>
                                        <td><?= $data->periode_seleksi ?></td>
                                        <td><?= $data->catatan ?></td>
                                        <td><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kriteria('<?= $data->seleksi_id ?>')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger hapusKriteria" data-id="<?= $data->seleksi_id ?>" href="#" title="Edit"> <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE -->
                </div>               
                
            </div>      
          
        </div>
      </div>
      <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    
  </div>
  <!-- END WRAPPER -->
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Seleksi</h4>
      </div>
      <div class="modal-body">
        <form id="formSeleksi">
          <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <div class="input-group hidden">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="seleksi_id" class="form-control" placeholder="Seleksi Id" type="text">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="nama_seleksi" class="form-control" placeholder="Seleksi" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="periode_seleksi" placeholder="Periode Seleksi" class="form-control datepicker" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <textarea name="catatan" id="" cols="30" rows="10" class="form-control" placeholder="catatan"></textarea>
        </div>
        <br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <?php $this->view('element/footer')?>
  <!-- Javascript -->
  <?php $this->view('element/script')?>


<script>
var table;
$(document).ready(function() {
    table = $('#dataSeleksi').DataTable();
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
    
});

$('.hapusKriteria').on('click', function(e){
  var r=confirm("Apakah Anda yakin ingin menghapus data ini?")
  if (r==true) {
    $.ajax({
          url : "<?php echo site_url('SeleksiController/hapusSeleksi')?>",
          type: "POST",
          data: {"seleksi_id": $(this).data('id')},
          dataType: "JSON",
          success: function(data)
          {
              alert(data.success);
              location.reload()
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert(data.gagal);
          }
      });
  } else {
    return false;
  }
});
var save_method;
function buka_modal()
{
    save_method = 'tambah';
    $('#formSeleksi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data Seleksi'); // Set Title to Bootstrap modal title
}

function edit_kriteria(id)
{
    // save_method = 'update';
    console.log(id)
    // $('#formSeleksi')[0].reset(); // reset form on modals
    // $('.form-group').removeClass('has-error'); // clear error class
    // $('.help-block').empty(); // clear error string
    save_method = 'ubah';
    $('#formSeleksi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ubah Data Seleksi'); // Set Title to Bootstrap modal title

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('SeleksiController/getSeleksiById')?>",
        type: "POST",
        data: {"id": id},
        dataType: "JSON",
        success: function(data)
        {
            $('[name="seleksi_id"]').val(data[0]['seleksi_id']);
            $('[name="nama_seleksi"]').val(data[0]['nama_seleksi']);
            $('[name="periode_seleksi"]').val(data[0]['periode_seleksi']);
            $('[name="catatan"]').val(data[0]['catatan']);
            // $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            // $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error get data from ajax');
            console.log(data);
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'tambah') {
        url = "<?php echo site_url('SeleksiController/tambahSeleksi')?>";
    } else {
        url = "<?php echo site_url('SeleksiController/ubahSeleksi')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formSeleksi').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if($.isEmptyObject(data.error)){
              $(".print-error-msg").css('display','none');
              alert(data.success);
              $('#myModal').modal('hide');
                // reload_table();
                location.reload()
            }else{
              $(".print-error-msg").css('display','block');
              $(".print-error-msg").html(data.error);
              $("#myModal, html, body").animate({ scrollTop: 0 }, 600);
            }

            $('#btnSave').text('Save changes'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('Save changes'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

</script> 
</body>
</html>
