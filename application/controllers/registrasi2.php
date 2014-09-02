<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi2 extends CI_Controller {
  // * Example of captcha validation without database
  // * Instead of it used session to store captcha value
  // * The images will be deleted after the use

  public function index()
  {
    $this->load->library(array('form_validation', 'session'));
    $this->load->helper(array('form', 'url','captcha'));

    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
    $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_captcha');

    if($this->form_validation->run() == FALSE)
    {

      $original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
      $original_string = implode("", $original_string);
      // $captcha = substr(str_shuffle($original_string), 0, 6); // 6 char
      $captcha = substr(str_shuffle($original_string), 0, 4); // 4 char

      //Field validation failed.  User redirected to login page
      $vals = array(
        'word' => $captcha,
        'img_path' => './captcha/',
        'img_url' => base_url().'captcha/',
        // 'font_path' => BASEPATH.'fonts/texb.ttf',
        'img_width' => 150,
        'img_height' => 50,
        'expiration' => 7200
        );

      $cap = create_captcha($vals);
      $data['image'] = $cap['image'];

      // if(file_exists(BASEPATH."../captcha/".$this->session->userdata['image']))
      //   unlink(BASEPATH."../captcha/".$this->session->userdata['image']);

      $this->session->set_userdata(array('captcha'=>$captcha, 'image' => $cap['time'].'.jpg'));
      var_dump($data);
      var_dump($captcha);
      var_dump($this->input->post());

      $this->load->view('registrasi2_view', $data);
    }
    else
    {
      // if(file_exists(BASEPATH."../captcha/".$this->session->userdata['image']))
        // unlink(BASEPATH."../captcha/".$this->session->userdata['image']);

      $this->session->unset_userdata('captcha');
      $this->session->unset_userdata('image');
      $this->load->view('berhasil');
      // redirect('home', 'refresh');
    }

  }

  public function validate_captcha(){
    if($this->input->post() && ($this->input->post('captcha') != $this->session->userdata['captcha']))
    {
      $this->form_validation->set_message('validate_captcha', 'Wrong captcha code, hmm are you the Terminator?');
      return false;
    }else{
      return true;
    }

  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
