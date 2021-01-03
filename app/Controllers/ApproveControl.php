<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\ApproveModel;
use App\Models\DocumentModel;

class ApproveControl extends BaseController
{


    public function __construct()
    {
        $this->model = new ApproveModel();

        helper(['form', 'url', 'text']);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    }


    // initial view
    public function index()
    {
        $data['approves'] = $this->model->getData();
        return view('approve/client_list_view', $data);
    }


    // list view
    // need in approve
    public function listSearch()
    {
        $tracking_id = $this->request->getVar('tracking_id');
        $user_name = $this->request->getVar('user_name');
        $contact_mobile = $this->request->getVar('contact_mobile');
        $contact_email = $this->request->getVar('contact_email');
        $client_type = $this->request->getVar('client_type');
        $status = $this->request->getVar('status');

        if (!empty($tracking_id) || !empty($user_name) || !empty($contact_mobile) || !empty($contact_email) || !empty($client_type) || !empty($status)) {
            $data['approves'] = $this->model->searchData($tracking_id, $user_name,  $contact_mobile,  $contact_email,  $client_type,  $status);
            // print_r( $data['clients']);exit;
            return view('approve/client_list_view', $data);
        }
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
        // $message = "Record Exported Successfully!";
        // return redirect()->to(base_url('ClientControl'))->with('msg', $message);
    }

    // export data
    public function exportApprove()
    {
        $file_name = 'Approved_details_' . date('d-m-Y') . '.csv';
        // print_r($file_name);exit;

        // add header
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");


        // get data 
        $data = $this->model->exportApprove();
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
        // $message = "Record Exported Successfully!";
        // return redirect()->to(base_url('ClientControl'))->with('msg', $message);
    }

    // public function check_user($user = null)
    // {

    //     // $user['user_name'] = $this->request->getPost("user_name");
    //     $userResult = $this->model->name_checker($user);
    //     // print_r($userResult);exit;
    //     echo json_encode($userResult);
    // }

    // need in approve
    public function documentList($id = null)
    {
        $data['documents'] = $this->model->getDocumentid($id);
        // print_r($data['clients']);exit;
        return view('approve/document_list_view', $data);
    }


    // // check whether the file is jpg or pdf type
    // public function endsWith($filename, $ext){
    //     $extLength = strlen($ext);
    //     if($extLength){
    //         return substr($filename, $extLength) === $ext;
    //     }
    //     return true;
    // }

    // show client profile data
    // need in approve for save
    public function approveData($tracking_id)
    {
        $data['clients'] = $this->model->getClientProfile($tracking_id);
        $data['types'] = $this->model->typeDropdown();
        $data['packages'] = $this->model->packageDropdown();
        return view('approve/approve_view', $data);
    }

    public function fileChecker($tracking)
    {

        // $uri = $this->request->uri->getSegment(2);
        // print_r($uri);exit;

        // $tracking = $this->request->getRawInput('tracking_id');
        // $tracking = $_POST['tracking_id'];
        // print_r($tracking);exit;


        $path = base_url() . "/uploads/";
        $documents = $this->model->getClientProfile($tracking);
        $identity_scan = $documents[0]['identity_scan'];
        $auth_person_photo = $documents[0]['auth_person_photo'];
        // $trade_license = $documents[0]['trade_license'];
        // print_r($tracking_id);exit;

        if (file_exists($path . $identity_scan) && file_exists($path . $auth_person_photo)) {
            $Success = true;
            $Response = array('Success' => $Success);
            echo json_encode($Response);
        }else{
            $Error = false;
            $Response = array('Error' => $Error);
            echo json_encode($Response);
        }
    }

    public function sip_checker($sip_no)
    {
        // $sip_no = $this->request->getPost('sip_no');
        // print_r($sip_no);exit;

        $sipnoResult = $this->model->sip_checker($sip_no);
        echo json_encode($sipnoResult);

        // print_r($sipnoResult);exit;
        // if (count($sipnoResult) > 0)
        // {
        //     $message = "Duplicate SIP Number. Please use another";
        //     session()->setFlashdata('Insert', $message);
        //     // return redirect()->to(base_url('ApproveControl/approveData'))->withInput()->with('Insert', $message);
        // }else{
        //     $message = "This SIP Number is avaible";
        //     session()->setFlashdata('success', $message);
        //     // return redirect()->to(base_url('ApproveControl/approveData'))->withInput()->with('success', $message);
        // }
    }

    // sava data
    public function save()
    {
        $ClientModel = new ClientModel();
        $tracking_id = $this->request->getVar('tracking_id');
        // print_r($tracking_id);exit;
        $clients = $this->model->getClientProfile($tracking_id);
        // print_r($clients[0]['tracking_id']);exit;
        $tracking['tracking_id'] = $this->request->getVar('tracking_id');
        $array = $this->request->getVar('info');

        $data = [
            'tracking_id' => $clients[0]['tracking_id'],
            'client_type' => $clients[0]['client_type'],
            'company_name' => $clients[0]['company_name'],
            'user_name' => $clients[0]['user_name'],
            'birth_date' => $clients[0]['birth_date'],
            'gender' => $clients[0]['gender'],
            'occupation' => $clients[0]['occupation'],
            'present_add' => $clients[0]['present_add'],
            'permanent_add' => $clients[0]['permanent_add'],
            'contact_phone' => $clients[0]['contact_phone'],
            'contact_mobile' => $clients[0]['contact_mobile'],
            'contact_email' => $clients[0]['contact_email'],
            'technical_phone' => $clients[0]['technical_phone'],
            'technical_mobile' => $clients[0]['technical_mobile'],
            'technical_email' => $clients[0]['technical_email'],
            'billing_phone' => $clients[0]['billing_phone'],
            'billing_mobile' => $clients[0]['billing_mobile'],
            'billing_email' => $clients[0]['billing_email'],
            'father_name' => $clients[0]['father_name'],
            'mother_name' => $clients[0]['mother_name'],
            'spouse_name' => $clients[0]['spouse_name'],
            'photo_identity' => $clients[0]['photo_identity'],
            'identity_number' => $clients[0]['identity_number'],
            'provider_name' => $clients[0]['provider_name'],
            'ip_address' => $this->request->getVar('ip_address'),
            'info' => implode(', ', $array),
            'physical_address' => $this->request->getVar('physical_address'),
            'type' => $this->request->getVar('type'),
            'sip_no' => $this->request->getVar('sip_no'),
            'package' => $this->request->getVar('package'),
            'channel' => $this->request->getVar('channel'),
            'action_date' => date("Y-m-d H:i:s"),
            // 'action_by' => $this->session->uname,
            'action_by' => $this->request->getVar('action_by'),
            'status' => 'Approved',
        ];

        $trackingResult = $this->model->tracking_checker($tracking);

        // echo '<pre>';
        // print_r($trackingResult);exit;
        // echo '<pre>';

        if ($this->request->getMethod() == 'post') {


            if (count($trackingResult) > 0) {
                $message = "Duplicate tracking id. Please use another tracking id";

                $this->session->setFlashdata('Insert', $message);
                
               
                // return redirect()->to(current_url());
                // session()->setFlashdata('Insert', $message);
                // return redirect()->route('Clients')->with('Insert', $message);
            } else {
                $this->model->insertData($data);

                $clientData = [
                    'status' => 'Approved',
                    'sip_no' => $this->request->getVar('sip_no'),
                ];

                $ClientModel->updateData($clientData, $tracking_id);
                
                
                // $Success = true;
                // $Response = array('Success' => $Success);
                
                
                $message = "Record Updated Successfully";
                return redirect()->to(site_url('Approved/list'))->with('msg', $message);
            }
        }
    }

    // check tracking id exist
    // cancel status
    public function cancel($tracking_id)
    {

        // $tracking_id = $this->request->getVar('tracking_id');
        // print_r($tracking_id);exit;
        $clients = $this->model->getClientProfile($tracking_id);
        // print_r($clients[0]['tracking_id']);exit;
        $data = [
            'tracking_id' => $clients[0]['tracking_id'],
            'client_type' => $clients[0]['client_type'],
            'company_name' => $clients[0]['company_name'],
            'user_name' => $clients[0]['user_name'],
            'birth_date' => $clients[0]['birth_date'],
            'gender' => $clients[0]['gender'],
            'occupation' => $clients[0]['occupation'],
            'present_add' => $clients[0]['present_add'],
            'permanent_add' => $clients[0]['permanent_add'],
            'contact_phone' => $clients[0]['contact_phone'],
            'contact_mobile' => $clients[0]['contact_mobile'],
            'contact_email' => $clients[0]['contact_email'],
            'technical_phone' => $clients[0]['technical_phone'],
            'technical_mobile' => $clients[0]['technical_mobile'],
            'technical_email' => $clients[0]['technical_email'],
            'billing_phone' => $clients[0]['billing_phone'],
            'billing_mobile' => $clients[0]['billing_mobile'],
            'billing_email' => $clients[0]['billing_email'],
            'father_name' => $clients[0]['father_name'],
            'mother_name' => $clients[0]['mother_name'],
            'spouse_name' => $clients[0]['spouse_name'],
            'photo_identity' => $clients[0]['photo_identity'],
            'identity_number' => $clients[0]['identity_number'],
            'provider_name' => $clients[0]['provider_name'],
            'ip_address' => $this->request->getVar('ip_address'),
            'physical_address' => $this->request->getVar('physical_address'),
            'type' => $this->request->getVar('type'),
            'sip_no' => $this->request->getVar('sip_no'),
            'package' => $this->request->getVar('package'),
            'channel' => $this->request->getVar('channel'),
            'action_date' => date("Y-m-d H:i:s"),
            'action_by' => $this->session->uname,
            'status' => 'Cancel',
        ];

        // $tracking['tracking_id'] = $tracking_id;
        // if ($this->request->getMethod() == 'post') {
        $trackingResult = $this->model->tracking_checker($tracking_id);

        if (count($trackingResult) > 0) {
            echo json_encode(array('type' => 'error', 'text' => 'Duplicate tracking id. Please use another tracking id'));
            // echo json_encode($output);
            
            // $output = json_encode(array('type' => 'error', 'text' => 'Duplicate tracking id. Please use another tracking id'));
            // echo $output;
            // die($output);
            // $message = "Duplicate tracking id. Please use another tracking id";

            // $this->session->setFlashdata('Insert', $message);
        } else {
            $this->model->insertData($data);

            $ClientModel = new ClientModel();

            $clientData = [
                'status' => 'Cancel'
            ];

            // $_POST['tracking_id']= $tracking_id;
            // $ClientModel->save($_POST);

            $ClientModel->updateData($clientData, $tracking_id);

            echo json_encode(array('type' => 'message', 'text' => 'Record Canceled Successfully'));
            // echo json_encode($output);
            // $output = json_encode(array('type' => 'success', 'text' => 'Record Cancel Successfully'));
            
            //  echo $output;
             // die($output);
            // $message = "Record Cancel Successfully";
            // return redirect()->route('Approved/list')->with('msg', $message);
        }
        // }
    }

    // show all approved data
    public function getApproveData()
    {
        $data['approved'] = $this->model->getApproveData();
        return view('approve/approved_list_view', $data);
    }

    // search approved data
    public function searchApproveData()
    {
        $tracking_id = $this->request->getVar('tracking_id');
        $user_name = $this->request->getVar('user_name');
        $contact_mobile = $this->request->getVar('contact_mobile');
        $contact_email = $this->request->getVar('contact_email');
        $client_type = $this->request->getVar('client_type');
        $status = $this->request->getVar('status');

        if (!empty($tracking_id) || !empty($user_name) || !empty($contact_mobile) || !empty($contact_email) || !empty($client_type) || !empty($status)) {
            $data['approved'] = $this->model->searchApproveData($tracking_id, $user_name,  $contact_mobile,  $contact_email,  $client_type,  $status);
            // print_r( $data['clients']);exit;
            return view('approve/approved_list_view', $data);
        }
    }

    // ---------------------------------------------------------------------   


}
