<?php

namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\PackageModel;

class PackageControl extends BaseController
{

    public function __construct()
    {
        $this->model = new PackageModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['packages'] = $this->model->orderBy('id', 'DESC')->findAll();
        // $data['desigs'] = $this->model->getData();
        return view('package/package_view', $data);
    }

    

    public function create()
    {
        return view('package/package-create-view');
    }

    public function createOrUpdate()
    {
        $id = $this->request->getVar('id');
        $package['package'] = $this->request->getPost("package");

        $data = [
            'package' => $this->request->getVar('package'),
        ];

        $message = "Record Updated Successfully!";

        $packageResult = $this->model->name_checker($package);

        if ($this->request->getMethod() == 'post') {
            if (empty($id)) {
                if (count($packageResult) > 0) {
                    $message = "Duplicate name. Please use another name";
                    return redirect()->route('Package/create')->withInput()->with('Insert', $message);
                } else {
                    $save = $this->model->insertData($data);
                    return redirect()->route('Package/create')->with('msg', $message);
                }
            } else {
                // $save = $this->model->updateData($data, $id);
                // return redirect()->route('Desigs')->with('msg', $message);
            }
        }
    }

    
    public function delete($id = null)
    {
        // $data['desigs'] = $this->model->where('desg_id', $id)->delete();
        $this->model->deleteData($id);
        $message = "Record Deleted successfully";
        return redirect()->route('Package')->with('msg', $message);
    }
}
