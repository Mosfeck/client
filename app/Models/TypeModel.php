<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeModel extends Model
{

    protected $table = 'type_tbl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'typeName'
    ];
    
    // protected $useTimestamps = true;
    // protected $createdField  = 'admin_created_at';

    // // get all data
    // public function getData()
    // {
    //     $query = $this->db->query('SELECT * FROM admin_tbl order by admin_id desc');
    //     return $query->getResultArray();
    // }

    // // check login data exists
    // public function loginAdmin($data)
    // {
    //     $query = $this->db->table($this->table)->getWhere($data);
    //     return $query->getResultArray();
    // }


    // check duplicate name
    public function name_checker($name)
    {
        $query = $this->db->table($this->table)->getWhere($name);
        return $query->getResult();
    }

    

    // save data
    public function insertData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
    }

    // // update data
    // public function updateData($data, $id)
    // {
    //     $query = $this->db->table($this->table)
    //         ->where('id', $id)
    //         ->update($data);
    // }

    public function deleteData($id)
    {
        // $id fetch Id from user table
        $builder = $this->db->table($this->table)
            ->where('id', $id)
            ->delete();
    }
}
