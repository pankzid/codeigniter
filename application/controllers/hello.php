<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller {
	public function index()
	{
		$view_params = [
			'mega_title' => 'Learn CodeIgniter - Hello world!',
			'title' => 'Welcome to CodeIgniter',
			'message' => 'Sedang belajar CodeIgniter'
		];
		$this->load->view('helloview', $view_params);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
