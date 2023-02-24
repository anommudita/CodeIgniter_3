<?php

class Peoples extends CI_Controller
{

    // Membuat constructor agar tidak mengulang ulang
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    // }


    // jika semua controler membutuhkan database maka aktifkan di autoload 'database'

    public function index()
    {

        // modul database untuk CI
        // method langsung ke database
        // $this->load->database();

        // load model
        $this->load->model('Peoples_model', 'peoples');


        // pagination
        $this->load->library('pagination');


        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            // set session untuk mencari keyword yang sama tanpa harus mengetik ulang
            // jadinya halaman selanjutnya akan tetap menampilkan keyword yang sama
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            // jika tidak ada keyword yang dikirimkan
            // maka akan mengambil keyword dari session
            $data['keyword'] = $this->session->userdata('keyword');
        }


        // config
        // jumlah data yang di ambil
        // menggantika countAllPeoples() dengan count_all_results()
        $this->db->like('name', $data['keyword']);
        $this->db->from('peoples');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];

        // jumlah data yang ditampilan per halaman
        $config['per_page'] = 8;

        // initialize
        $this->pagination->initialize($config);
        // mengambil seluruh database
        $data['judul'] = 'List of Peoples';

        // kenapa 3 ? karena sesuai dengan perhalaman url nya contoh  codeigniter_3/ peoples / index / 100
        // http://localhost/CodeIgniter_3/peoples/index/100 => base_url = dihitung muladi dari 0
        $data['start'] = $this->uri->segment(3);

        $data['peoples'] = $this->peoples->getPeople($config['per_page'], $data['start'], $data['keyword']);



        $this->load->view('templates/header', $data);
        $this->load->view('peoples/index', $data);
        $this->load->view('templates/footer');
    }
}
