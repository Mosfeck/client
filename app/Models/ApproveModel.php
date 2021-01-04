<?php

namespace App\Models;

use CodeIgniter\Model;

class ApproveModel extends Model
{

    protected $table = 'approve_tbl';
    protected $primaryKey = 'approve_id';
    protected $allowedFields = [
        'ip_address', 'info','physical_address', 'type','sip_no',
         'package','channel','action_date','action_by','status','id',
         'tracking_id','client_type', 'company_name', 'user_name', 'birth_date',
        'gender', 'occupation', 'present_add', 'permanent_add', 'contact_phone',
        'contact_mobile', 'contact_email', 'technical_phone', 'technical_mobile',
        'technical_email', 'billing_phone', 'billing_mobile', 'billing_email',
        'father_name', 'mother_name', 'spouse_name', 'photo_identity',
        'identity_number', 'provider_name','created_date'
    ];



    // client approve list view
    // need
    public function getData()
    {
        $query = $this->db->query('SELECT client_tbl.id, document_tbl.client_id,
        client_tbl.tracking_id, client_tbl.user_name, client_tbl.client_type,
         client_tbl.contact_phone,  client_tbl.contact_mobile, 
         client_tbl.contact_email,  client_tbl.`status`,
          client_tbl.created_date FROM client_tbl 
           INNER JOIN document_tbl ON client_tbl.id=document_tbl.client_id
           order by client_tbl.id DESC');
        return $query->getResultArray();
    }

    

    // get document list
    public function getDocumentid($id = null)
    {
        $sql = 'SELECT client_tbl.id, client_tbl.user_name,
            client_tbl.photo_identity, document_tbl.client_id, 
            document_tbl.identity_scan, document_tbl.trade_license, 
            document_tbl.auth_person_photo FROM client_tbl INNER JOIN 
            document_tbl ON client_tbl.id=document_tbl.client_id 
            WHERE document_tbl.client_id = ?';
        $query = $this->db->query($sql, array($id));
        return $query->getResultArray();
    }


    // search data
    // need in approve
    public function searchData($tracking_id = null, $user_name = null, $contact_mobile = null, $contact_email = null, $client_type = null, $status = null)
    {
        $sql = "SELECT client_tbl.id, document_tbl.client_id,
        client_tbl.tracking_id, client_tbl.user_name, client_tbl.client_type,
         client_tbl.contact_phone,  client_tbl.contact_mobile, 
         client_tbl.contact_email,  client_tbl.`status`,
          client_tbl.created_date
        from  client_tbl 
        INNER JOIN document_tbl 
            ON client_tbl.id=document_tbl.client_id
        WHERE 
        client_tbl.`tracking_id` LIKE ? or 
        client_tbl.`user_name` LIKE ? or
        client_tbl.`contact_mobile` LIKE ? or 
        client_tbl.`contact_email` LIKE ? or 
        client_tbl.`client_type` LIKE ? or
        client_tbl.`status` LIKE ?
        order by client_tbl.id DESC";
        $query = $this->db->query($sql, array($tracking_id, $user_name, $contact_mobile, $contact_email, $client_type, $status));
        return $query->getResultArray();
    }

    // client profile view
    // need
    public function getClientProfile($tracking_id = null)
    {
        $sql = "SELECT * FROM `client_tbl` 
        INNER JOIN document_tbl
        on client_tbl.id=document_tbl.client_id
         where tracking_id=?";
        $query = $this->db->query($sql, array($tracking_id));
        return $query->getResultArray();
    }

    // export data
    public function getcsvData()
    {
        $sql = "SELECT * FROM `client_tbl` 
        INNER JOIN document_tbl
        on client_tbl.id=document_tbl.client_id 
        order by document_tbl.client_id desc";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    //  export approved data
    public function exportApprove()
    {
        $sql = "SELECT * FROM `approve_tbl` 
        order by approve_id desc";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    // get package dropdown data
    public function typeDropdown()
    {

        $query = $this->db->query('SELECT id, typeName FROM 
            type_tbl order by typeName');
        

        foreach ($query->getResult() as $row) {
            //this sets the key to equal the value so that
            //the pulldown array lists the same for each
            $array[$row->id] = $row->typeName;
        }
        return $array;
    }

    
    // get package dropdown data
    public function packageDropdown()
    {

        $query = $this->db->query('SELECT id, package FROM 
            package_tbl order by package');
        

        foreach ($query->getResult() as $row) {
            //this sets the key to equal the value so that
            //the pulldown array lists the same for each
            $array[$row->id] = $row->package;
        }
        return $array;
    }

    // // client document file view
    // // need
    // public function getDocumentFile($tracking_id = null)
    // {
    //     $sql = "SELECT * FROM `client_tbl` 
    //     INNER JOIN document_tbl
    //     on client_tbl.id=document_tbl.client_id
    //      where tracking_id=?";
    //     $query = $this->db->query($sql, array($tracking_id));
    //     return $query->getRow();
    // }

    // check whole row in table
    // need
    public function sip_checker($sip_no = null)
    {
        // will  check if sip_no exists in whole row in approve table
        $sql = "SELECT sip_no from approve_tbl WHERE sip_no = ?";
        $query = $this->db->query($sql, array($sip_no));
        return $query->getRow();

        // $query = $this->db->table($this->table)->getWhere($sip_no);
        // return $query->getResult();
    }

    // check for duplicate tracking_id in approve form before save
    public function tracking_checker($tracking_id)
    {
        $sql = "SELECT tracking_id from approve_tbl
                where tracking_id = ?";
        $query = $this->db->query($sql, array($tracking_id));              
        return $query->getResult();

        // $query = $this->db->table($this->table)->getWhere($tracking_id);
        // return $query->getResultArray();
    }

    // approve initial data
    public function getApproveData()
    {
        $sql = "SELECT tracking_id, user_name, sip_no, client_type, contact_mobile, 
            contact_email, `status`, created_date, action_by, action_date 
            from approve_tbl ORDER BY approve_id DESC";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    // search approve data
    public function searchApproveData($tracking_id = null, $user_name = null, $contact_mobile = null, $contact_email = null, $client_type = null, $status = null)
    {
        $sql = "SELECT tracking_id, user_name, sip_no, client_type, contact_mobile, 
            contact_email, `status`, created_date, action_by, action_date
            from  approve_tbl
            WHERE 
            `tracking_id` LIKE ? or 
            `user_name` LIKE ? or
            `contact_mobile` LIKE ? or 
            `contact_email` LIKE ? or 
            `client_type` LIKE ? or
            `status` LIKE ?
            ORDER BY approve_id DESC";
        $query = $this->db->query($sql, array($tracking_id, $user_name, $contact_mobile, $contact_email, $client_type, $status));
        return $query->getResultArray();
    }

    // show identity_scan by id
    public function get_identity_scan($identity_scan = null)
    {
        $sql = "SELECT identity_scan from document_tbl
                Where identity_scan=?";
        $query = $this->db->query($sql, array($identity_scan));
        return $query->getResultArray();
    }

    // save data
    public function insertData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
    }

// ---------------------------------------------------------------------------------

    // // check whole row in database
    // public function name_checker($name = null)
    // {
    //     // will  check if username exists in whole row in database
    //     $sql = "SELECT user_name from client_tbl WHERE user_name = ?";
    //     $query = $this->db->query($sql, array($name));
    //     return $query->getRow();
    // }

}
