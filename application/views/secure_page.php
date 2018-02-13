<div class="col-md-8">
  <div class="my-4">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><?php echo anchor('','Home')?></li>
      <li class="breadcrumb-item">Dashboard</li>
    </ol>
  </div>
     <?php echo validation_errors('<font color=red>', '</font>'); ?>
   <?php
   var_dump($this->session->userdata()['nama'], $this->session->userdata());
    if($this->session->flashdata('pesan')==TRUE):
    echo'<div class="alert alert-info" role="alert">';
    echo $this->session->flashdata('pesan');
    echo "</div>";
    endif;?>
   <div class="card">
  <div class="card-body">
<b>Selamat, anda berhasil login !</b><br>
Ini adalah laman dashboard (secure pages) by session - <a href=<?php echo base_url('logout');?>><span class="badge badge-warning">Logout</span></a>
</div></div>
</div>