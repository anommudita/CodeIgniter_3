<?php

class Mahasiswa_model extends CI_model
{
    public function getAllMahasiswa()
    {
        // query builder yang dimiliki oleh CI
        return  $this->db->get('mahasiswa')->result_array();
        // return $query->result_array();
    }


    public function tambahDataMahasiswa()
    {
        $data = [

            // bernilai true untuk menghindari XSS atau Cross Site Scripting
            "nama" => $this->input->post('nama', 'true'),
            "nim" => $this->input->post('nim', 'true'),
            "email" => $this->input->post('email', 'true'),
            "jurusan" => $this->input->post('jurusan', 'true')
        ];

        $this->db->insert('mahasiswa', $data);
    }


    public function hapusDataMahasiswa($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('mahasiswa', ['id' => $id]);
    }


    public function getMahasiswaById($id)
    {
        // row_array hanya menbalikan 1 baris atau mengambil 1 elementnya saja
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function ubahDataMahasiswa()
    {
        $data = [

            // bernilai true untuk menghindari XSS atau Cross Site Scripting
            "nama" => $this->input->post('nama', 'true'),
            "nim" => $this->input->post('nim', 'true'),
            "email" => $this->input->post('email', 'true'),
            "jurusan" => $this->input->post('jurusan', 'true')
        ];
        $this->db->where('id', $this->input->post('id', 'true'));
        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {

        // similiar dengan query builder
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('jurusan', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
