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
                            <h3 class="panel-title">Data Supir</h3>
                        </div>
                        <div class="panel-body">
                            <p class="demo-button">
                                <button type="button" onclick="buka_modal()" class="btn btn-primary">Tambah</button>
                            </p>
                            <table class="table table-bordered" id="dataSupir">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Supir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Mulai Kerja</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach($daftarSupir->result() as $data): ?>
                                    <tr>
                                        <td><?= $data->no_induk ?></td>
                                        <td><?= $data->nama_lengkap ?></td>
                                        <td><?= $data->tempat_lahir ?></td>
                                        <td><?= $data->tgl_lahir ?></td>
                                        <td><?= $data->alamat_sekarang ?></td>
                                        <td><?= $data->mulai_kerja ?></td>
                                        <td><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_supir('<?= $data->no_induk ?>')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger hapusSupir" data-id="<?= $data->no_induk ?>" href="#" title="Edit"> <i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Supir</h4>
      </div>
      <div class="modal-body">
      <!-- <?php echo form_open('supir/proses', ['id' => 'formSupir']);?> -->
        <form id="formSupir">
          <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <div class="input-group hidden">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="no_induk" class="form-control" placeholder="No Induk" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="no_ktp" class="form-control" placeholder="No KTP" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="alamat_sekarang" class="form-control" placeholder="Alamat Sekarang" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="kabupaten_kota" class="form-control" placeholder="Kabupaten Kota" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="provinsi" class="form-control" placeholder="Provinsi" type="text">
        </div>
        <br>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        &nbsp;
            <label class="radio-inline">
            <input name="jenis_kelamin" value="Laki-Laki" type="radio">
            Laki-Laki
			<!-- <span><i></i>Male</span> -->
			</label>
			<label class="radio-inline ">
			<input name="jenis_kelamin" value="Perempuan" type="radio">
			<!-- <span><i></i>Female</span> -->Perempuan
			</label>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
            <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control datepicker" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="no_telephone" class="form-control" placeholder="No Telephone" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="status_perkawinan" class="form-control" placeholder="Status Perkawinan" type="text">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input name="mulai_kerja" placeholder="Mulai Kerja" class="form-control datepicker" type="text">
        </div>
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
    table = $('#dataSupir').DataTable();
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

$('.hapusSupir').on('click', function(e){
  var r=confirm("Apakah Anda yakin ingin menghapus data ini?")
  if (r==true) {
    $.ajax({
          url : "<?php echo site_url('SupirController/hapusSupir')?>",
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
    $('#formSupir')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data Supir'); // Set Title to Bootstrap modal title
}

function edit_supir(id)
{
    // save_method = 'update';
    console.log(id)
    // $('#formSupir')[0].reset(); // reset form on modals
    // $('.form-group').removeClass('has-error'); // clear error class
    // $('.help-block').empty(); // clear error string
    save_method = 'ubah';
    $('#formSupir')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ubah Data Supir'); // Set Title to Bootstrap modal title

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('SupirController/getSupirById')?>",
        type: "POST",
        data: {"id": id},
        dataType: "JSON",
        success: function(data)
        {
          console.log(data, data[0]['no_induk'])
            $('[name="no_induk"]').val(data[0]['no_induk']);
            $('[name="no_ktp"]').val(data[0]['no_ktp']);
            $('[name="nama_lengkap"]').val(data[0]['nama_lengkap']);
            $('[name="provinsi"]').val(data[0]['Provinsi']);
            $('[name="kabupaten_kota"]').val(data[0]['kabupaten_kota']);
            $('[name="no_telephone"]').val(data[0]['no_telp']);
            $('[name="tanggal_lahir"]').val(data[0]['tgl_lahir']);
            $('[name="tempat_lahir"]').val(data[0]['tempat_lahir']);
            $('[name="mulai_kerja"]').val(data[0]['mulai_kerja']);
            $('[name="status_perkawinan"]').val(data[0]['status_perkawinan']);
            $('[name="alamat_sekarang"]').val(data[0]['alamat_sekarang']);
            $("input[value='" + data[0]['jenis_kelamin'] + "']").prop('checked', true);
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
        url = "<?php echo site_url('SupirController/tambahSupir')?>";
    } else {
        url = "<?php echo site_url('SupirController/ubahSupir')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formSupir').serialize(),
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
