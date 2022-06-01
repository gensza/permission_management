<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

      var $table = 'produk'; //nama tabel dari database
      var $column_order = array(null, 'kode_barang', 'nama_barang', 'kode_ukuran', 'kode_warna', 'harga', 'harga_dasar'); //field yang ada di table user
      var $column_search = array('kode_barang', 'nama_barang', 'kode_ukuran', 'kode_warna', 'harga', 'harga_dasar'); //field yang diizin untuk pencarian 
      var $order = array('id_produk' => 'desc'); // default order 

      public function __construct()
      {
            parent::__construct();
            $this->load->database();
      }

      private function _get_datatables_query()
      {


            $this->db->from($this->table);
            // $this->db->where('user', $role_user);
            // $this->db->select('id', 'tglpo', 'noreftxt', 'nopotxt', 'nama_supply', 'lokasi_beli');
            // $this->db->from('po');
            // $this->db->order_by('id', 'desc');

            $i = 0;

            foreach ($this->column_search as $item) // looping awal
            {
                  if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
                  {

                        if ($i === 0) // looping awal
                        {
                              $this->db->group_start();
                              $this->db->like($item, $_POST['search']['value']);
                        } else {
                              $this->db->or_like($item, $_POST['search']['value']);
                        }

                        if (count($this->column_search) - 1 == $i)
                              $this->db->group_end();
                  }
                  $i++;
            }

            if (isset($_POST['order'])) {
                  $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else if (isset($this->order)) {
                  $order = $this->order;
                  $this->db->order_by(key($order), $order[key($order)]);
            }
      }

      function get_datatables()
      {
            $this->_get_datatables_query();
            if ($_POST['length'] != -1)
                  $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
      }

      function count_filtered()
      {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
      }

      public function count_all()
      {
            $this->db->from($this->table);
            return $this->db->count_all_results();
      }

      public function save_dataproduk($data_save)
      {
            return $this->db->insert('produk', $data_save);
      }

      public function update_dataproduk($data_update)
      {
            $this->db->where('kode_barang', $data_update['kode_barang']);
            return $this->db->update('produk', $data_update);
      }

      public function del_dataproduk($id_produk)
      {
            $this->db->delete('produk', array('id_produk' => $id_produk));
      }
}

/* End of file M_admin.php */
