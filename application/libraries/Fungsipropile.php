<?php
Class Fungsipropile{

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
            }
            //---------------------------------------------------nampilno user login berdasarkan tabel user login dengan librari berdasarkan ROW------------------------\\
    function user_login() {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }
//---------------------------------------------------ENDDDDDDD nampilno user login berdasarkan tabel user login dengan librari------------------------\\
}

