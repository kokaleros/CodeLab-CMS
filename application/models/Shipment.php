<?php
Class Shipment extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $shipment_table = "shipments";

    public function create($data = "")
    {
        if(!is_array($data)){
            echo "Create shipment: input data isnt array!";
            return false;
        }


        //insert into database
        if( $shipment = $this->db->insert($this->shipment_table, $data))
        {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function edit($id = '', $data = ''){
        if(!is_array($data)){
            echo "Edit shipment: input data isnt array!";
            return false;
        }

        $this->db->where('shipment_id',$id);
        $result = $this->db->update($this->shipment_table, $data);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id=''){
        $this->db->where('shipment_id', $id);
        $user_delete = $this->db->delete($this->shipment_table);

        if($user_delete){
            return true;
        }else{
            return false;
        }
    }

    public function get_shipment_by_id($id){
        $this->db->where('shipment_id',$id);
        $result = $this->db->get($this->shipment_table);

        return $result->num_rows() == 1 ? $result->row() : false;
    }

    public function get_all_shipments(){
        $this->db->order_by('vrijeme', "DESC");
        $result = $this->db->get($this->shipment_table);

        return $result->num_rows() > 0 ? $result->result() : false;
    }

    public function get_all_shipments_from_user($id){
        $this->db->where('user_id', $id);
        $this->db->order_by('vrijeme', "DESC");
        $result = $this->db->get($this->shipment_table);

        return $result->num_rows() > 0 ? $result->result() : false;
    }

    // FOR TRACKING
    public function get_shipment_by_tracking_number($tracking_number){
        $this->db->where('tracking_number',$tracking_number);
        $result = $this->db->get($this->shipment_table);

        return $result->num_rows() == 1 ? $result->row() : false;
    }

    public function create_note($data = "")
    {
        if(!is_array($data)){
            echo "Create shipment note: input data isnt array!";
            return false;
        }

        //insert into database
        if( $shipment = $this->db->insert('shipment_notes', $data))
        {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function get_all_notes($shipment_id = ''){
        $this->db->where('shipment_id', $shipment_id);
        $this->db->order_by('time', "DESC");
        $result = $this->db->get("shipment_notes");

        return $result->num_rows() > 0 ? $result->result() : false;
    }

    //custom functions -------------------------------------------------------------

    private function update_last_login($id){
        $this->db->set('last_login', time());
        $this->db->where('id', $id);
        $this->db->update($this->user_table);
    }

    private function isMD5($md5 ='')
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

}