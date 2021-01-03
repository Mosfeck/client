<?php

namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\AdminModel;

class AdminControl extends BaseController
{

    public function __construct()
    {
        $this->model = new AdminModel();
        helper(['form', 'url']);
        // $pager = \Config\Services::pager();
    }

    public function index()
    {
        $data['admins'] = $this->model->orderBy('admin_id', 'DESC')->findAll();
        // $data['desigs'] = $this->model->getData();
        $data = [
            'admins' => $this->model->paginate(5),
            'pager' => $this->model->pager
        ];
        return view('admin/admin_view', $data);
    }

    // login client
    public function auth_admin()
    {

        // get form input
        $data['admin_name'] = $this->request->getPost("admin_name");
        $data['password'] = md5($this->request->getPost("password"));


        // $val = $this->validate([
        //     'tracking_id' => 'required',
        //     'tracking_password' => 'required|min_length[6]'
        // ]);

        // form validation
        // if (!$val) {
        //     return redirect()->to(base_url('AdminControl/loginPage'))->withInput()->with('validation', $this->validator);
        // } else {
        // check for user credentials
        $adminResult = $this->model->loginAdmin($data);

        if (count($adminResult) > 0) {
            // set session
            $sess_data = array('isLoggedIn' => TRUE, 'uname' => $adminResult[0]['admin_name'], 'uid' => $adminResult[0]['admin_id']);
            // print_r($sess_data);exit;
            $this->session->set($sess_data);

            $sess_id['uid'] = $this->session->uid;
            $sess_id['uname'] = $this->session->uname;

            // will redirect admin list
            return redirect()->to(site_url('Approves/list'));
        } else {
            $this->session->setFlashdata('msg', '<div class="alert alert-danger text-center">Wrong Tracking ID or Password!</div>');
            return view('admin/signin_view.php');
        }
        // }
    }

    // login page
    public function loginPage()
    {
        // return redirect()->route('clients');
        echo view('admin/signin_view');
    }


    public function signout()
    {
        $session_items = array('uname', 'uid');
        $this->session->remove($session_items);
        session()->destroy();
        $this->session->setFlashdata('msg', '<div class="alert alert-success text-center">Logout Successfully!</div>');
        return view('clients/startup_view');
        // $this->session->stop();
        // return view('admin/signin_view');
        
    }


    public function create()
    {
        return view('admin/admin-create-view');
    }

    public function createOrUpdate()
    {
        $id = $this->request->getVar('admin_id');
        $admin['admin_name'] = $this->request->getPost("admin_name");

        $data = [
            'admin_name' => $this->request->getVar('admin_name'),
            'password' => md5($this->request->getVar('password')),
            'email' => $this->request->getVar('email'),
            'contact_no' => $this->request->getVar('contact_no'),
            'address' => $this->request->getVar('address'),
        ];

        $message = "Record Updated Successfully!";

        $adminResult = $this->model->name_checker($admin);

        if ($this->request->getMethod() == 'post') {
            if (empty($id)) {
                if (count($adminResult) > 0) {
                    $message = "Duplicate name. Please use another name";
                    // echo view('designations/desig-create-view', ['Insert' => $message]);
                    return redirect()->route('Admins/create')->withInput()->with('Insert', $message);
                } else {
                    $save = $this->model->insertData($data);
                    // $message = "Record Updated Successfully";
                    return redirect()->route('Admins/create')->with('msg', $message);
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
        $data['desigs'] = $this->model->deleteData($id);
        $message = "Record Deleted successfully";
        return redirect()->route('Admins')->with('msg', $message);
    }
}
