<?php

class Customers extends Controller {

    public function __construct() {

        $this->customerlistModel = $this->model('Customerlist');
    }

    public function index() {
        $allcustomers = $this->customerlistModel->customerslist();
        $data = [
            "allcustomers" => $allcustomers,
            "title" => "My Customers"
        ];
        $this->view('customers', $data);
    }

    public function addcustomers() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'birthday' => $_POST['birthday'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'organization' => $_POST['organization'],
                'notes' => $_POST['notes'],
                'title' => 'My Customers'
            ];
            //print_r($data); die;
            $this->customerlistModel->addcustomer($data);
            redirect('customers');
        }
    }

    public function updatecustomer() {
        $data = [
            "id_customer" => $_POST["id_customer"],
            'name' => $_POST['name'],
            'birthday' => $_POST['birthday'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'organization' => $_POST['organization'],
            'notes' => $_POST['notes']
        ];

        if ($this->customerlistModel->updatecustomer($data)) {
            redirect('customers');
        }
    }

    public function deletecustomer($id) {
        if ($this->customerlistModel->deletecustomer($id)) {
            redirect('customers');
        }
    }

}
