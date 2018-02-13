<div class="col-md-4">
  <div class="my-4">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><?php echo anchor('','Home')?></li>
      <li class="breadcrumb-item">Daftar</li>
    </ol>
  </div>
     <?php echo validation_errors('<font color=red>', '</font>'); ?>
   <?php
    if($this->session->flashdata('pesan')==TRUE):
    echo'<div class="alert alert-warning" role="alert">';
    echo $this->session->flashdata('pesan');
    echo "</div>";
    endif;?>
   <div class="card">
  <div class="card-body">

<?php echo form_open('daftar/proses');?>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nama">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div></div>
</div>