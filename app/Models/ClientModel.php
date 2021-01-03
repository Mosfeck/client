<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{

    protected $table = 'client_tbl';
    protected $primaryKey = 'tracking_id';
    protected $allowedFields = [
        'tracking_password', 'client_type', 'company_name', 'user_name', 'birth_date',
        'gender', 'occupation', 'present_add', 'permanent_add', 'contact_phone',
        'contact_mobile', 'contact_email', 'technical_phone', 'technical_mobile',
        'technical_email', 'billing_phone', 'billing_mobile', 'billing_email',
        'father_name', 'mother_name', 'spouse_name', 'photo_identity',
        'identity_number', 'provider_name', 'status'
    ];



    // get data by id
    public function getdataid($id = null)
    {
        // return $this->asArray()
        //     ->where(['tracking_id' => $id])
        //     ->first();

        $sql = "SELECT tracking_id, user_name, client_type, contact_phone, 
            contact_mobile, contact_email, approve_no, `status`, created_date, action_by, 
            action_date FROM client_tbl
            WHERE tracking_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->getResultArray();
    }


    // // check whole row in database
    // public function name_checker($name = null)
    // {
    //     // will  check if username exists in whole row in database
    //     $sql = "SELECT user_name from client_tbl WHERE user_name = ?";
    //     $query = $this->db->query($sql, array($name));
    //     return $query->getRow();
    // }

    // check whole row in table
    public function tracking_id_checker($tracking_id = null)
    {
        // will  check if username exists in whole row in client table
        $query = $this->db->table($this->table)->getWhere($tracking_id);
        return $query->getResult();
    }

    // get all data by tracking id
    public function get_data_by_trackid($trackId = null)
    {
        $sql = "SELECT * FROM client_tbl
        WHERE tracking_id = ?";
        $query = $this->db->query($sql, array($trackId));
        return $query->getResultArray();
    }

    // get all data by tracking id
    public function get_combinedata_by_trackid($trackId = null)
    {
        $sql = "SELECT client_tbl.tracking_id, client_tbl.photo_identity, 
            client_tbl.identity_number, document_tbl.client_id, 
            document_tbl.identity_scan, document_tbl.auth_person_photo
        FROM client_tbl INNER JOIN document_tbl
        ON client_tbl.id = document_tbl.client_id
        AND client_tbl.tracking_id = ?";
        $query = $this->db->query($sql, array($trackId));
        return $query->getResultArray();
    }

    // check whole row in database
    public function get_clientid_password($tracking_id = null)
    {
        // get tracking_id and tracking_password
        $sql = "SELECT `tracking_id`,`tracking_password` 
            from client_tbl WHERE tracking_id = ?";
        $query = $this->db->query($sql, array($tracking_id));
        return $query->getResultArray();
    }

    // get tracking id by username
    public function get_trackingid_by_name($name = null)
    {
        // get tracking_id 
        $sql = "SELECT `tracking_id` 
            from client_tbl WHERE user_name = ?";
        $query = $this->db->query($sql, array($name));
        return $query->getResultArray();
    }

    // check login data exists
    public function getClient($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResultArray();
    }

    // client list view
    public function getData()
    {
        $query = $this->db->query('SELECT tracking_id, user_name, client_type, contact_phone, 
            contact_mobile, contact_email, approve_no, `status`, created_date, action_by, 
            action_date FROM client_tbl order by tracking_id desc');
        return $query->getResultArray();
    }


    // client profile view
    public function getClientProfile($tracking_id = null)
    {
        $sql = "SELECT * FROM client_tbl where tracking_id=?";
        $query = $this->db->query($sql, array($tracking_id));
        return $query->getResult();
    }


    // search data
    public function searchData($tracking_id = null, $user_name = null, $contact_mobile = null, $contact_email = null, $client_type = null, $status = null)
    {
        // $query = $this->db->query('select `user_name`,`approve_no`, 
        // `client_type`, `contact_phone`, `contact_mobile`, `contact_email`, 
        // `status`, `created_date`, `action_by`, `action_date`
        // from  client_tbl
        // where 
        // `tracking_id` LIKE "%  $tracking_id  %" or 
        // `user_name` LIKE "%  $user_name  %" or
        // `contact_mobile` LIKE "%  $contact_mobile  %" or 
        // `contact_email` LIKE "%  $contact_email  %" or 
        // `client_type` LIKE "%  $client_type  %" or
        // `status` LIKE "%  $status %" 
        // order by tracking_id desc');
        // // print_r($query->getResultArray());exit;
        // return $query->getResultArray();

        $sql = "select tracking_id, `user_name`,`approve_no`, 
        `client_type`, `contact_phone`, `contact_mobile`, `contact_email`, 
        `status`, `created_date`, `action_by`, `action_date`
        from  client_tbl
        where 
        `tracking_id` LIKE ? or 
        `user_name` LIKE ? or
        `contact_mobile` LIKE ? or 
        `contact_email` LIKE ? or 
        `client_type` LIKE ? or
        `status` LIKE ?
        order by tracking_id desc";
        $query = $this->db->query($sql, array($tracking_id, $user_name, $contact_mobile, $contact_email, $client_type, $status));
        return $query->getResultArray();
    }

    // // get admin data
    // public function get_data_id($trackid = NULL)
    // {
    //     $sql = "SELECT client_tbl.`user_name`, client_admin_tbl.`approve_no`, client_tbl.`client_type`, client_tbl.`contact_phone`, client_tbl.`contact_mobile`, client_tbl.`contact_email`, client_admin_tbl.`status`, client_tbl.`created_date`, client_admin_tbl.`action_by`, client_admin_tbl.`action_date` 
    //     FROM client_tbl
    //     INNER JOIN client_admin_tbl ON client_tbl.`tracking_id` = client_admin_tbl.`tracking_id`
    //     AND tracking_id.tracking_id = ?";
    //     $query = $this->db->query($sql, array($trackid));
    //     return $query->getResult();
    // }

    // search data
    // public function checkdata($tracking_id = NULL,  $user_name = NULL,  $contact_mobile = NULL,  $contact_email = NULL,  $client_type = NULL,  $status = NULL)
    // {
    //     $builder = $this->db->table($this->table);
    //     $builder->select('user_name, approve_no, client_type, contact_phone, 
    //         contact_mobile, contact_email, status, created_date, action_by,
    //          action_date');
    //     // $builder->like('tracking_id', $tracking_id, 'both'); 
    //     // $builder->orLike('user_name', $user_name, 'both');
    //     // $builder->orLike('contact_mobile', $contact_mobile, 'both');
    //     // $builder->orLike('contact_email', $contact_email, 'both');
    //     // $builder->orLike('client_type', $client_type, 'both');
    //     // $builder->orLike('status', $status, 'both');

    //     $where = "tracking_id=$tracking_id OR user_name=$user_name OR contact_mobile=$contact_mobile OR contact_email=$contact_email OR client_type=$client_type OR status=$status";
    //     $builder->where($where);
    //     $query   = $builder->get();
    //     return $query->getResultArray();
    // }

    

    // save data
    public function insertData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        // return $this->db->query->insertID();
    }

    // update data
    public function updateData($data, $id)
    {
        $client = $this->db->table($this->table)
            ->where('tracking_id', $id)
            ->update($data);
    }

    // public function deleteData($id)
    // {
    //     // $id fetch Id from user table
    //     $builder = $this->db->table($this->table)
    //         ->where('employee_id', $id)
    //         ->delete();
    // }
}
