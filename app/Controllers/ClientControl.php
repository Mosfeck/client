<?php

namespace App\Controllers;


use App\Models\ClientModel;
use App\Models\DocumentModel;

class ClientControl extends BaseController
{


    public function __construct()
    {
        $this->model = new ClientModel();

        helper(['form', 'url', 'text']);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    }


    // initial view
    public function index()
    {
        return view('clients/client-individual-view');
    }


    // startup 
    public function startup()
    {
        return view('clients/startup_view');
    }

    // export data
    public function export()
    {
        $file_name = 'Client_details_' . date('d-m-Y') . '.csv';
        // print_r($file_name);exit;

        // add header
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");


        // get data 
        $data = $this->model->getcsvData();
        // print_r($data['exportData']);exit;

        // file creation 
        $file = fopen('php://output', 'w');


        // $header = array("Department id","Department name", "description","status");
        // print_r($header);exit;

        // fputcsv($file, $header);
        foreach ($data as $value) {
            $csv = fputcsv($file, $value);
        }
        // $csv->move(WRITEPATH.'uploads');
        fclose($file);
        exit;
        $message = "Record Exported Successfully!";
        return redirect()->to(site_url('ClientControl'))->with('msg', $message);
    }

    // public function check_user($user = null)
    // {

    //     // $user['user_name'] = $this->request->getPost("user_name");
    //     $userResult = $this->model->name_checker($user);
    //     // print_r($userResult);exit;
    //     echo json_encode($userResult);
    // }

    // success page
    public function success()
    {
        // return redirect()->route('clients');
        echo view('clients/client_success');
    }



    // login client
    public function auth_client()
    {

        // get form input
        $data['tracking_id'] = $this->request->getPost("tracking_id");
        $data['tracking_password'] = $this->request->getPost("tracking_password");


        // $val = $this->validate([
        //     'tracking_id' => 'required',
        //     'tracking_password' => 'required|min_length[6]'
        // ]);

        // form validation
        // if (!$val) {
        //     return redirect()->to(base_url('ClientControl/loginPage'))->withInput()->with('validation', $this->validator);
        // } else {
        // check for user credentials
        $clientResult = $this->model->getClient($data);

        if (count($clientResult) > 0) {
            // set session
            $sess_data = array('isLoggedIn' => TRUE, 'username' => $clientResult[0]['user_name'], 'uid' => $clientResult[0]['tracking_id']);
            // print_r($sess_data);exit;
            $this->session->set($sess_data);

            $sess_id['uid'] = $this->session->uid;
            $sess_id['username'] = $this->session->username;

            // $sess_id['uid'] = $_SESSION['uid'];
            // $sess_id['username'] = $_SESSION['username'];

            return redirect()->to(site_url('ClientControl/getUser'));
        } else {
            $this->session->setFlashdata('msg', '<div class="alert alert-danger text-center">Wrong Tracking ID or Password!</div>');
            return view('clients/signin_view.php');
        }
        // }
    }

    // login page
    public function loginPage()
    {
        // return redirect()->route('clients');
        echo view('clients/signin_view');
    }


    // get client result
    public function getUser()
    {

        $trackId = $_SESSION['uid'];
        // print_r($trackId);exit;
        $data['trackData'] = $this->model->get_data_by_trackid($trackId);
        // print_r($data['trackData']);exit;
        if (empty($data['trackData'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the this item');
        }
        // $data['trackstatus'] = $data['trackData']['status'];
        return view('clients/client_result', $data);
    }


    // edit client 
    public function edit()
    {

        $id = $_SESSION['uid'];

        // print_r($trackId);exit;
        $data['clients'] = $this->model->get_combinedata_by_trackid($id);
        // print_r($data['clients']);exit;

        return view('clients/client-edit-view', $data);
    }

    // public function editAdmin($id = null)
    // {

    //     $data['clients'] = $this->model->getdataid($id);
    //     // print_r($data['clients']);exit;
    //     return view('clients/client-edit-admin-view', $data);
    // }


    // signout
    public function signout()
    {
        $session_items = array('username', 'uid');
        $this->session->remove($session_items);
        session()->destroy();
        $this->session->setFlashdata('msg', '<div class="alert alert-success text-center">Logout Successfully!</div>');
        // $this->session->stop();
        return view('clients/startup_view');
    }

    public function store()
    {

        // target folder
        $path = './uploads';

        // assign file for move
        $identity_scan = $this->request->getFile('identity_scan');
        $trade_license = $this->request->getFile('trade_license');
        $auth_person_photo = $this->request->getFile('auth_person_photo');



        // get random password
        $random_tracking_id = mt_rand(10000000, 99999999);
        $random_password =  random_string('alnum', 21);

        // $user['user_name'] = $this->request->getPost("user_name");


        // Birth combine var
        $years = $this->request->getPost('year');
        $months = $this->request->getPost('month');
        $days = $this->request->getPost('day');
        $birth_date = $years . '-' . $months . '-' . $days;

        $captcha_response = trim($this->request->getVar('g-recaptcha-response'));

        if ($this->request->getMethod() == 'post') {

            if ($captcha_response != '') {
                $keySecret = '6LezdeAZAAAAAEWtCzFxV_mwwC0s5CObdA4Cebm2';

                $check = array(
                    'secret'        =>    $keySecret,
                    'response'        =>    $this->request->getVar('g-recaptcha-response')
                );

                $startProcess = curl_init();

                curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

                curl_setopt($startProcess, CURLOPT_POST, true);

                curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

                curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

                $receiveData = curl_exec($startProcess);

                $finalResponse = json_decode($receiveData, true);

                // //file validation
                // $validated = $this->validate([
                //     'identity_scan' => [
                //         'uploaded[identity_scan]'
                //     ],
                //     'trade_license' => [
                //         'uploaded[trade_license]'
                //     ],
                //     'auth_person_photo' => [
                //         'uploaded[auth_person_photo]'
                //     ],
                // ]);

                $message = "Record Updated Successfully!";

                $data = [
                    'tracking_id' => $random_tracking_id,
                    'tracking_password' => $random_password,
                    'client_type' => $this->request->getVar('client_type'),
                    'company_name' => $this->request->getVar('company_name'),
                    'user_name' => $this->request->getVar('user_name'),
                    'birth_date' => $birth_date,
                    'gender' => $this->request->getVar('gender'),
                    'occupation' => $this->request->getVar('occupation'),
                    'present_add' => $this->request->getVar('present_add'),
                    'permanent_add' => $this->request->getVar('permanent_add'),
                    'contact_phone' => $this->request->getVar('contact_phone'),
                    'contact_mobile' => $this->request->getVar('contact_mobile'),
                    'contact_email' => $this->request->getVar('contact_email'),
                    'technical_phone' => $this->request->getVar('technical_phone'),
                    'technical_mobile' => $this->request->getVar('technical_mobile'),
                    'technical_email' => $this->request->getVar('technical_email'),
                    'billing_phone' => $this->request->getVar('billing_phone'),
                    'billing_mobile' => $this->request->getVar('billing_mobile'),
                    'billing_email' => $this->request->getVar('billing_email'),
                    'father_name' => $this->request->getVar('father_name'),
                    'mother_name' => $this->request->getVar('mother_name'),
                    'spouse_name' => $this->request->getVar('spouse_name'),
                    'photo_identity' => $this->request->getVar('photo_identity'),
                    'identity_number' => $this->request->getVar('identity_number'),
                    'provider_name' => $this->request->getVar('provider_name'),
                    'status' => $this->request->getVar('status')
                ];

                $trackingResult = $this->model->tracking_id_checker($random_tracking_id);


                if ($finalResponse['success']) {
                    if (count($trackingResult) > 0) {
                        $message = "Duplicate tracking id. Please use another tracking id";
                        return redirect()->route('Clients')->with('Insert', $message);
                    } else {

                        $save = $this->model->insertData($data);
                    }
                } else {
                    $message = "Invalid Captcha";
                    return redirect()->route('Clients')->with('CaptchaMsg', $message);
                }



                $insertedID = $this->model->insertID();

                $docData = [
                    'client_id' => $insertedID,
                    'identity_scan' => $identity_scan->getName(),
                    'trade_license' => $trade_license->getName(),
                    'auth_person_photo' => $auth_person_photo->getName(),

                ];

                $docModel = new DocumentModel();
                // if (!$validated) {
                //     echo view('clients/client-individual-view',  ['validation' => $this->validator]);
                // } else {
                $save = $docModel->insertData($docData);

                if ($identity_scan->isValid() && !$identity_scan->hasMoved()) {
                    $identity_scan->move($path);
                }
                if ($trade_license->isValid() && !$trade_license->hasMoved()) {
                    $trade_license->move($path);
                }
                if ($auth_person_photo->isValid() && !$auth_person_photo->hasMoved()) {
                    $auth_person_photo->move($path);
                }
                // }
                $clientData['clients'] = $this->model->get_clientid_password($random_tracking_id);
                // print_r( $clientData['clients']);exit;
                return view('clients/client_success', $clientData);
                // return redirect()->route('Clients/success')->with('msg', $message);
            } else {
                $message = "Invalid Captcha";
                return redirect()->route('Clients')->with('CaptchaMsg', $message);
            }
        }
    }

    // // for check
    // public function checkdata()
    // {
    //     $userName = $this->request->getVar('user_name');
    //     // var_dump($userName);
    //     // print_r($userName);exit;
    //     $clientId['tracks'] = $this->model->get_trackingid_by_name($userName);
    //     // print_r($clientId['tracks']);exit;
    //     $trackingId = $clientId['tracks']['tracking_id'];
    //     // print_r($trackingId);exit;
    //     return view('clients/client-individual-view');
    // }



    // update data
    public function update()
    {

        $id = $_SESSION['uid'];
        $clients = $this->model->get_combinedata_by_trackid($id);
        $identity_scan_name = $clients[0]['identity_scan'];
        $auth_person_photo_name = $clients[0]['auth_person_photo'];
        // print_r($auth_person_photo_name);exit;

        $id = $this->request->getVar('client_id');

        // target folder
        $path = './uploads';

        // assign file for move
        $identity_scan = $this->request->getFile('identity_scan');
        // $trade_license = $this->request->getFile('trade_license');
        $auth_person_photo = $this->request->getFile('auth_person_photo');



        // //file validation
        // $validated = $this->validate([
        //     'identity_scan' => [
        //         'uploaded[identity_scan]'
        //     ],
        //     'trade_license' => [
        //         'uploaded[trade_license]'
        //     ],
        //     'auth_person_photo' => [
        //         'uploaded[auth_person_photo]'
        //     ],
        // ]);

        $message = "Record Updated Successfully!";

        $data = [
            'photo_identity' => $this->request->getVar('photo_identity'),
            'identity_number' => $this->request->getVar('identity_number')
        ];



        // if (!$validated) {
        //     echo view('clients/client-individual-view',  ['validation' => $this->validator]);
        // } else {

        $save = $this->model->updateData($data, $id);

        // }
        $docModel = new DocumentModel();

        $docData = [
            'identity_scan' => $identity_scan->getName(),
            // 'trade_license' => $trade_license->getName(),
            'auth_person_photo' => $auth_person_photo->getName()
        ];



        $save = $docModel->updateData($docData, $id);

        // to delete file
        //------------------------------------------------------

        $fileLocation = base_url() . "/public/uploads/";

        // print_r($fileLocation);exit;
        // unlink($fileLocation);

        $old = getcwd(); // Save the current directory
        chdir($fileLocation);
        unlink($identity_scan_name);
        chdir($old); // Restore the old working directory  

        //------------------------------------------------------

        if ($identity_scan->isValid() && !$identity_scan->hasMoved()) {
            $identity_scan->move($path);
        }


        // if ($trade_license->isValid() && !$trade_license->hasMoved()) {
        //     $trade_license->move($path);
        // }

        if ($auth_person_photo->isValid() && !$auth_person_photo->hasMoved()) {
            $auth_person_photo->move($path);
        }

        // unlink("./uploads/123.jpg");



        $message = "Record Updated Successfully!";
        return redirect()->route('Clients/edit')->with('msg', $message);
    }

    // // update by admin
    // public function updateAdmin()
    // {
    //     $id = $this->request->getVar('tracking_id');
    //     $message = "Record Updated Successfully!";

    //     $data = [
    //         'approve_no' => $this->request->getVar('approve_no'),
    //         'status' => $this->request->getVar('status'),
    //         'action_by' => $this->request->getVar('action_by'),
    //         'action_date' => $this->request->getVar('action_date')
    //     ];
    //     $save = $this->model->updateData($data, $id);
    //     return redirect()->route('Clients/list');
    // }


    // show client profile data
    public function profile()
    {
        $tracking_id = $_SESSION['uid'];
        $data['clients'] = $this->model->getClientProfile($tracking_id);
        return view('clients/client_profile_view', $data);
    }


    // // show whole data
    // public function listInit()
    // {
    //     $data['clients'] = $this->model->getData();
    //     return view('clients/client_list_view', $data);

    // }


    // // list view
    // public function listSearch()
    // {
    //     $tracking_id = $this->request->getVar('tracking_id');
    //     $user_name = $this->request->getVar('user_name');
    //     $contact_mobile = $this->request->getVar('contact_mobile');
    //     $contact_email = $this->request->getVar('contact_email');
    //     $client_type = $this->request->getVar('client_type');
    //     $status = $this->request->getVar('status');


    //     if (!empty($tracking_id) || !empty($user_name) || !empty($contact_mobile) || !empty($contact_email) || !empty($client_type) || !empty($status)) {
    //         $data['clients'] = $this->model->searchData($tracking_id, $user_name,  $contact_mobile,  $contact_email,  $client_type,  $status);
    //         // print_r( $data['clients']);exit;
    //         return view('clients/client_list_view', $data);
    //     }
    //     // return redirect()->route('Clients/success')->with('msg', $message);
    // }
}
