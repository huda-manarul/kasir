<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('query');
		$this->load->helper('url');
	}

	public function add()	{
		$kode = $this->input->post('kode');
		$where = array(
			'id_brg' => $kode
		);
		$this->cart->product_name_rules = '[:print:]';
		$produk = $this->query->getwhere('barang', $where)->result();
		foreach ($produk as $item) {
			$data = array(
				'id'      => $item->id_brg,
				'qty'     => 1,
				'price'   => $item->harga,
				'name'    => $item->nama_brg
			);
		}
		$this->cart->insert($data);
		echo json_encode('succes');
	}
	
	public function getcart()	{
		$output = '';
		$no = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$output .='
			<tr class="databrg ">
			<td >'.$items['name'].'</td>
			<td class="center">'.number_format($items['price']).'</td> 
			<td>
			<input type="text" class="quantity center" name="quantity" data-rowid="'.$items['rowid'].'" type="number" value="'.$items['qty'].'">
			</td> 
			<td class="subtotal center" >'.number_format($items['subtotal']).'</td>
			<td class="center"><a type="button" id="'.$items['rowid'].'" class="hapus_cart" ><i class="material-icons" style="color: red" >clear</i></a></td> 
			</tr>
			';
		}$output .= '
		<tr  id="total">
		<th colspan="5" style="none"> <h4 class="right">Total: Rp '.number_format($this->cart->total()).',-</h4></th>
		</tr>
		';
		return $output;
	}

	 function loadcart(){ //load data cart
	 	echo $this->getcart();
	 }

	 public function delete()	{
	 	$data = array(
	 		'rowid' => $this->input->post('row_id'), 
	 		'qty' => 0, 
	 	);
	 	$this->cart->update($data);
	 }

	 public function update()	{
	 	$row_id = $this->input->post('row_id');
	 	$qty = $this->input->post('qty');
	 	$data = array(
	 		'rowid' => $row_id, 
	 		'qty' => $qty, 
	 	);
	 	$this->cart->update($data);
	 	echo json_encode('succes');
	 }

	 public function save()	 {
	 	foreach ($this->cart->contents() as $items) {
	 		$data = array(
	 			'id_brg' => $items['id'], 
	 			'jumlah' => $items['qty'], 
	 			'tanggal' => date("Y-m-d"),
	 		);
	 		$result = $this->query->add($data,'jual');
	 	}
	 	$this->cart->destroy();
	 	echo json_encode('succes');
	 }

	 public function getproduct()	{
	 	$output = '';
	 	$produk = $this->query->getrelate()->result();
	 	foreach ($produk as $items) {
	 		$output .='
	 		<tr class="databrg ">
	 		<td >'.$items->nama_brg.'</td>
	 		<td class="center">'.$items->jumlah.'</td>
	 		<td>
	 		<input type="text" class="harga center" name="harga" data-rowid="'.$items->id_brg.'" type="number" value="'.$items->harga.'">
	 		</td>
	 		<td class="center"><a type="button" id="'.$items->id_brg.'" class="hapus_cart" ><i class="material-icons" style="color: red" >clear</i></a></td> 
	 		</tr>
	 		';
	 	}
	 	return $output;
	 }

	 function loadproduct()	{
	 	echo $this->getproduct();
	 }

	 public function updateproduct()	 {
	 	$id_brg = $this->input->post('id_brg');
	 	$harga = $this->input->post('harga');
	 	$where = array(
	 		'id_brg' => $id_brg
	 	);
	 	$data = array(
	 		'harga' => $harga
	 	);
	 	$result = $this->query->update($where,$data,'barang');
	 	echo json_encode('succes');
	 }

	 public function deleteproduct()	{
	 	$id_brg = $this->input->post('id_brg');
	 	$where = array(
	 		'id_brg' => $id_brg
	 	);
	 	$result = $this->query->delete($where,'barang');
	 	echo json_encode('succes');
	 }


	}
