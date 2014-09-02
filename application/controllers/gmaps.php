<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gmaps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->library('javascript');
		$this->load->library('googlemaps');
		$config['map-width'] = '1000px';
		$config['map-height'] = '1000px';
		$this->googlemaps->initialize($config);
	}

	public function index()
	{
		// $this->load->library('javascript');
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);

		$this->add_visual_flag('Bandung, Indonesia');
		$this->add_visual_flag('London, UK');

		$data = $this->load_map_setting();
		$this->load->view('googlemaps_view', $data);
	}

	public function bandung()
	{
		$config['center'] = 'Bandung, Indonesia';
		$config['zoom'] = 16;
		$this->googlemaps->initialize($config);

		$this->add_visual_flag($config['center']);
		$data = $this->load_map_setting();
		$this->load->view('googlemaps_view', $data);
	}

public function london()
	{
		$config['center'] = 'London, UK';
		$config['zoom'] = 16;
		$this->googlemaps->initialize($config);

		$this->add_visual_flag($config['center']);
		$data = $this->load_map_setting();
		$this->load->view('googlemaps_view', $data);
	}

	private function add_visual_flag($place)
	{
		$marker = array();
		$marker['position'] = $place;
		$marker['title'] = $place;
		$this->googlemaps->add_marker($marker);
	}

	private function load_map_setting()
	{
		$locations = array();
		$actions = array();

		$locations[] = 'Bandung, Indonesia';
		$locations[] = 'London, UK';
		$data['locations'] = $locations;
		$actions[] = 'bandung';
		$actions[] = 'london';
		$data['actions'] = $actions;

		$data['map'] = $this->googlemaps->create_map();
		return $data;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
