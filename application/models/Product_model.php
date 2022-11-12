<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "rental_DVD";

    public $id_sewa;
    public $nama_penyewa;
    public $alamat;
    public $lama_sewa;

    public function rules()
    {
        return [
            ['field' => 'nama_penyewa',
            'label' => 'nama_penyewa',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],
            
            ['field' => 'lama_sewa',
            'label' => 'lama_sewa',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_sewa" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $harga = 10000;
        $total_harga = $post["lama_sewa"] * $harga;
        $this->nama_penyewa = $post["nama_penyewa"];
        $this->alamat = $post["alamat"];
        $this->lama_sewa = $post["lama_sewa"];
        $this->total_harga = $total_harga;
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $harga = 10000;
        $total_harga = $post["lama_sewa"] * $harga;
        $this->id_sewa = $post["id_sewa"];
        $this->nama_penyewa = $post["nama_penyewa"];
        $this->alamat = $post["alamat"];
        $this->lama_sewa = $post["lama_sewa"];
        $this->total_harga = $total_harga;
        $this->db->update($this->_table, $this, array('id_sewa' => $post['id_sewa']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_sewa" => $id));
    }
}
