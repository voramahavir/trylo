<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function stockAdd() {
		
	}
}
