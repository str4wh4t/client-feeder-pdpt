<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fakultas
 *
 * @author U.L.T.R.O.N
 */
class Fakultas extends CI_Controller {
    //put your code here
        
        var $proxy = '';
        var $token = '';
        
        public function __construct() {
            parent::__construct();
            
            $wsdl = 'http://182.255.0.173:8082/ws/live.php?wsdl';
            $client = new nusoap_client($wsdl, 'wsdl');
                    
                    
                    
            $this->proxy = $client->getProxy();
            
            
            
            if(get_cookie('login') != NULL){
                $this->token = $this->proxy->getToken('001008e1','SIbapsi2015');
            }
            

        }
        public function index()
	{
            if(get_cookie('login') != NULL){
                redirect('index.php/fakultas/home');
            }
            
            /*
            $proxy = $this->client->getProxy();  
            
            $token = get_cookie('token');
            $table = 'jurusan';
            $filter = '';
            $order = '';
            $limit = '';
            $offset = '';
            
            $data = $proxy->GetRecordset($token,$table,$filter,$order,$limit,$offset);
            
             * 
             */
            
            $this->load->view('Fakultas/index');
	}
        public function home(){
            if(get_cookie('login') == NULL){
                redirect('index.php/fakultas');
            }
            $this->load->view('Fakultas/Home');
        }
        
        public function dologout(){
            if($this->input->post()){
                if($_POST['logout']=='y'){
                    set_cookie('login','');
                    echo 1;
                }
            }
        }
        
        public function dologin(){
            if($this->input->post()){
                if($_POST['username'] == 'undip' && $_POST['password'] == 'undip'){
                    
                    
                    
                    

                     /*

                    if(get_cookie('token') == NULL){
                        $proxy = $this->client->getProxy(); 

                        $username = '001008e1';
                        $password = 'SIbapsi2015';

                        $token = $proxy->getToken($username,$password);
                        set_cookie('token',$token,36000);
                    }
                     * 
                     */
                    
                    set_cookie('login','undip',36000);
                    
                    echo 1;die;
                }
                else{
                    echo "oops..password salah !";die;
                }
            }
        }
        public function kuliahmhs(){
            if(get_cookie('login') == NULL){
                redirect('index.php/fakultas');
            }
            $this->load->view('Fakultas/KuliahMhs');
        }
        public function mhspt(){
            if(get_cookie('login') == NULL){
                redirect('index.php/fakultas');
            }
            $this->load->view('Fakultas/MhsPt');
        }
        public function dosearchmhs(){
            if($this->input->post()){

                $table = 'mahasiswa_pt';
                $filter = "nipd LIKE '%".  strtoupper(trim($_POST['search']))."%'";
                $order = '';
                $limit = '';
                $offset = '';

                $datax = $this->proxy->GetRecordset($this->token,$table,$filter,$order,$limit,$offset);
                
                $result = array();
                            
                if(!empty($datax['result'])){

                    $result = array(
                        'datax'=>$datax['result'],
                        'res'=>'ok'
                    ); 

                }
                else{
                    $result = array('data'=>array(),'res'=>'data tidak ditemukan');
                }

                echo json_encode($result);die;

                $data = $this->proxy->GetCountRecordset($this->token,$table,$filter);

                var_dump($data);die;
            }       
        }
        
        public function dosearchkulmhs(){
            if($this->input->post()){

               
                $table = 'kuliah_mahasiswa';
                $filter = "id_reg_pd = '".$_POST['id_reg_pd']."'";
                $order = '';
                $limit = '';
                $offset = '';
                
                $datay = $this->proxy->GetRecordset($this->token,$table,$filter,$order,$limit,$offset);

                if(!empty($datay['result'])){
                    $result = array(
                        'datay'=>$datay['result'],
                        'res'=>'ok'
                    ); 

                }
                else{
                    $result = array('data'=>array(),'res'=>'data tidak ditemukan');
                }

                echo json_encode($result);die;

                $data = $this->proxy->GetCountRecordset($this->token,$table,$filter);

                var_dump($data);die;
            }       
        }
        public function doeditmhs(){
            if($this->input->post()){

                $table = 'kuliah_mahasiswa';
                $id_smt = $_POST['id_smt'];
                $id_reg_pd = $_POST['id_reg_pd'];
                $ipk = $_POST['ipk'];
                $ips = $_POST['ips'];
                $sks_smt = $_POST['sks_smt'];
                $sks_total = $_POST['sks_total'];

                $filter = "id_smt = '".$_POST['id_smt']."' AND id_reg_pd = '".$id_reg_pd."'";
                $order = '';
                $limit = '';
                $offset = '';

                $data = $this->proxy->GetRecordset($this->token,$table,$filter,$order,$limit,$offset);
                
                $records = array();

                //var_dump($data);die;
                
                
                foreach ($data['result'] as $row){
                    $key = array('id_smt' => $row['id_smt'],'id_reg_pd' => $row['id_reg_pd']);
                    $data = array('ipk' => $ipk,'ips' => $ips,'sks_smt' => $sks_smt,'sks_total' => $sks_total);
                    $records[] = array('key'=>$key,'data'=>$data);
                }
                
                /*
                $key = array('id_smt' => $id_smt,'id_reg_pd' => $id_reg_pd);
                $data = array('ipk' => $ipk,'ips' => $ips,'sks_smt' => $sks_smt,'sms_total' => $sks_total);
                $records = array('key'=>$key,'data'=>$data);
                *
                 */
                
                
                $result = array();
                
                foreach($records as $record){
                    $result[] = $this->proxy->UpdateRecord($this->token,$table,json_encode($record));
                }
                
                
                //$result = $this->proxy->UpdateRecord($token,$table,json_encode($record));

                echo json_encode($result[0]['result']);die;
            
            }       
        }
        public function dogodel(){
            if($this->input->post()){

                $table = 'mahasiswa_pt';

                $id_reg_pd = $_POST['id_reg_pd'];

                $filter = "id_reg_pd = '".$id_reg_pd."'";
                $order = '';
                $limit = '';
                $offset = '';

                $data = $this->proxy->GetRecordset($this->token,$table,$filter,$order,$limit,$offset);
                
                $records = array();

                //var_dump($data);die;
                
                
                $records = array();
            
                foreach ($data['result'] as $row){
                    $records[] = array('id_reg_pd' => $row['id_reg_pd']);
                    //$records[] = array('key'=>$key,'data'=>$data);
                }
            
                foreach($records as $record){
                    $result[] = $this->proxy->DeleteRecord($this->token,$table,  json_encode($record));
                }
                
                
                

                echo json_encode($result[0]['result']);die;
                
                'af73b17a-8d51-478b-9fe8-c2e5d25fb1a0';
            
            }       
        }
}
