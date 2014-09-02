<div id="container">
  <h1>Silahkan isi form berikut dengan benar</h1>

  <div id="body">
    <?php if ($this->session->flashdata('message'))echo $this->session->flashdata('message');?>
    <form method="post" action="<?=site_url()?>registrasi2">
    <p>Username: <input type="text" name="username"></p>
    <p>Password: <input type="text" name="password"></p>
    <p><?=$image;?></p>
    <p>Captcha: <input type="text" name="captcha"></p>
    <p><input type="submit" name="submit" value="submit"  /></p>
    </form>
  </div>
</div>
