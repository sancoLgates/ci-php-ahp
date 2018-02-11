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
                            <h3 class="panel-title">Bordered Table</h3>
                        </div>
                        <div class="panel-body">
                            <p class="demo-button">
                                <button type="button" onclick="buka_modal()" class="btn btn-primary">Tambah</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
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
        <form id="formSupir">
        <div class="input-group">
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
var save_method;
function buka_modal()
{
    save_method = 'tambah';
    $('#formSupir')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Supir'); // Set Title to Bootstrap modal title
}

function edit_supir(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('person/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="firstName"]').val(data.firstName);
            $('[name="lastName"]').val(data.lastName);
            $('[name="gender"]').val(data.gender);
            $('[name="address"]').val(data.address);
            $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
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
        url = "<?php echo site_url('person/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formSupir').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status === 'ok') //if success close modal and reload ajax table
            {
                $('#myModal').modal('hide');
                //reload_table();
                location.reload()
                
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
