<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('query');
		$this->load->helper('url');
		$this->load->library('excel');
	}

	public function add()	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$id_brg = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_brg = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$harga = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$data = array(
						'id_brg' => $id_brg, 
						'nama_brg' => $nama_brg, 
						'harga' => $harga,
					);
					$result = $this->query->add($data,'barang');
				}

			}
			echo 'Data Imported successfully';
		}
	}
}