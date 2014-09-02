<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	public function index()
	{
    $this->load->library('session');
    $this->load->helper(array('url', 'captcha'));

    if ($this->input->post() && (strtolower($this->input->post('security_code')) == strtolower($this->session->userdata('mycaptcha'))))
    {
      $this->load->view('berhasil');
    }
    else
    {

      $vals = array(
          'img_path'   => './captcha/',
          'img_url'  => base_url().'captcha/',
          'img_width'  => 150,
          'img_height' => 30,
          'border' => 0,
          'expiration' => 7200
      );

      // create captcha image
      $cap = create_captcha($vals);
      // store captcha word in session
      $this->session->set_userdata('mycaptcha', $cap['word']);
      // store captcha image in variable
      $data['image'] = $cap['image'];
      if ($this->input->post()) {
        var_dump($this->input->post());
      }
      var_dump($cap);
      $this->load->view('registrasi_view', $data);
    }
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
