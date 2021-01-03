<?php

namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\TypeModel;

class TypeControl extends BaseController
{

    public function __construct()
    {
        $this->model = new TypeModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['types'] = $this->model->orderBy('id', 'DESC')->findAll();
        // $data['desigs'] = $this->model->getData();
        return view('type/type_view', $data);
    }

    public function create()
    {
        return view('type/type-create-view');
    }

    public function createOrUpdate()
    {
        $id = $this->request->getVar('id');
        $type['typeName'] = $this->request->getPost("typeName");

        $data = [
            'typeName' => $this->request->getVar('typeName'),
        ];

        $message = "Record Updated Successfully!";

        $typeResult = $this->model->name_checker($type);

        if ($this->request->getMethod() == 'post') {
            if (empty($id)) {
                if (count($typeResult) > 0) {
                    $message = "Duplicate name. Please use another name";
                    return redirect()->route('Types/create')->withInput()->with('Insert', $message);
                } else {
                    $save = $this->model->insertData($data);
                    return redirect()->route('Types/create')->with('msg', $message);
                }
            } else {
                // $save = $this->model->updateData($data, $id);
                // return redirect()->route('Types')->with('msg', $message);
            }
        }
    }

    
    public function delete($id = null)
    {
        // $data['desigs'] = $this->model->where('desg_id', $id)->delete();
        $this->model->deleteData($id);
        $message = "Record Deleted successfully";
        return redirect()->route('Types')->with('msg', $message);
    }
}
