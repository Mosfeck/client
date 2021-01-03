<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{

    protected $table = 'document_tbl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'client_id', 'identity_scan', 'trade_license', 'auth_person_photo',
        'created_by'
    ];

    // save data
    public function insertData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
    }

    // update data
    public function updateData($data, $id)
    {
        $client = $this->db->table($this->table)
            ->where('client_id', $id)
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
