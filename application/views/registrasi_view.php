<div id="container">
  <h1>Silahkan isi form berikut dengan benar</h1>

  <div id="body">
    <?php if ($this->session->flashdata('message'))echo $this->session->flashdata('message');?>
    <form method="post" action="<?=site_url()?>registrasi">
    <p>Nama: <input type="text" name="nama"></p>
    <p><?=$image;?></p>
    <p>Security: <input type="text" name="security_code"></p>
    <p><input type="submit" name="submit" value="submit"  /></p>
    </form>
  </div>
</div>
