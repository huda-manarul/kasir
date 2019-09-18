<?php
class Query extends CI_Model{

	public function getwhere($table, $where) {
		return $this->db->get_where($table,$where);
	}

	public function add($data,$table) {
		return $this->db->insert($table,$data);
	}

	public function get($table)	{
		return $this->db->get($table);
	}

	public function getrelate()	{
		$this->db->select('*');
		$this->db->from('stok');
		$this->db->join('barang', 'barang.id_brg = stok.id_brg');
        return $this->db->get();
	}

	public function update($where,$data,$table){
		$this->db->where($where);
        $this->db->update($table,$data);
	}

	public function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>