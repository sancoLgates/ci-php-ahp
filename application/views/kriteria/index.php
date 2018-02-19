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
                            <h3 class="panel-title">Data Kriteria</h3>
                        </div>
                        <div class="panel-body">
                            <p class="demo-button">
                                <button type="button" onclick="buka_modal()" class="btn btn-primary">Tambah</button>
                            </p>
                            <table class="table table-bordered" id="dataKriteria">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kriteria</th>
                                        <th>Deskripsi</th>
                                        <th>Aktif</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach($daftarKriteria->result() as $data): ?>
                                    <tr>
                                        <td><?= $data->kriteria_id ?></td>
                                        <td><?= $data->nama_kriteria ?></td>
                                        <td><?= $data->deskripsi ?></td>
                                        <td>
                                          <span id="editkriteriastatus<?= $data->kriteria_id ?>" class="textnya updateStts btn btn-<?= $data->status == 1 ? "success" : "warning" ?>" data-status="<?=$data->status?>" data-id="<?= $data->kriteria_id?>"><?= $data->status == 1 ? "Ya" : "Tidak" ?></span>
                                        </td>
                                        <td><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kriteria('<?= $data->kriteria_id ?>')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger hapusKriteria" data-id="<?= $data->kriteria_id ?>" href="#" title="Edit"> <i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Kriteria</h4>
      </div>
      <div class="modal-body">
        <form id="formKriteria">
          <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <div class="input-group hidden">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="kriteria_id" class="form-control" placeholder="Kriteria Id" type="text">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="nama_kriteria" class="form-control" placeholder="Kriteria" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi"></textarea>
        </div>
        <br>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        &nbsp;
            <label class="radio-inline">
            <input name="status" value="1" type="radio">
            Aktif
      <!-- <span><i></i>Male</span> -->
      </label>
      <label class="radio-inline ">
      <input name="status" value="0" type="radio">
      <!-- <span><i></i>Female</span> -->Tidak Aktif
      </label>
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
    table = $('#dataKriteria').DataTable();
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
          url : "<?php echo site_url('KriteriaController/hapusKriteria')?>",
          type: "POST",
          data: {"no_induk": $(this).data('id')},
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
    $('#formKriteria')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data Kriteria'); // Set Title to Bootstrap modal title
}

function edit_kriteria(id)
{
    // save_method = 'update';
    console.log(id)
    // $('#formKriteria')[0].reset(); // reset form on modals
    // $('.form-group').removeClass('has-error'); // clear error class
    // $('.help-block').empty(); // clear error string
    save_method = 'ubah';
    $('#formKriteria')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ubah Data Kriteria'); // Set Title to Bootstrap modal title

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('KriteriaController/getKriteriaById')?>",
        type: "POST",
        data: {"id": id},
        dataType: "JSON",
        success: function(data)
        {
            $('[name="kriteria_id"]').val(data[0]['kriteria_id']);
            $('[name="nama_kriteria"]').val(data[0]['nama_kriteria']);
            $('[name="deskripsi"]').val(data[0]['deskripsi']);
            $("input[value='" + data[0]['status'] + "']").prop('checked', true);
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
        url = "<?php echo site_url('KriteriaController/tambahKriteria')?>";
    } else {
        url = "<?php echo site_url('KriteriaController/ubahKriteria')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formKriteria').serialize(),
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
