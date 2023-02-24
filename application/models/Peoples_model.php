<?php


class Peoples_model extends CI_Model
{

    public function getAllPeoples()
    {
        return $this->db->get('peoples')->result_array();
    }


    public function getPeople($limit, $start, $keyword)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('peoples', $limit, $start)->result_array();
    }

    public function countAllPeoples()
    {
        // menghitung jumlah baris data (num_rows)
        return $this->db->get('peoples')->num_rows();
    }
}
