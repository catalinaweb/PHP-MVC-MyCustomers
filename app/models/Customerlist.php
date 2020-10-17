<?php

class Customerlist {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addcustomer($data) {
        //print_r($data); die;
        $this->db->query('INSERT INTO My_Customers (id_customer, customer_name, date_of_birth, address, email, phone_number, organization_name, notes) VALUES (NULL, :customer_name, :date_of_birth, :address, :email, :phone_number, :organization_name, :notes)');

        //Bind values        


        $this->db->bind(':customer_name', $data['name']);
        $this->db->bind(':date_of_birth', $data['birthday']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone']);
        $this->db->bind(':organization_name', $data['organization']);
        $this->db->bind(':notes', $data['notes']);


        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function customerslist() {
        $this->db->query("SELECT *FROM My_Customers");
        $results = $this->db->resultSet();
        return $results;
    }

    public function updatecustomer($data) {
        $this->db->query('UPDATE My_Customers SET customer_name=:customer_name, date_of_birth=:date_of_birth, address=:address, email=:email, phone_number=:phone_number, organization_name=:organization_name, notes=:notes  WHERE id_customer=:id_customer');

        //Bind values
        $this->db->bind(':id_customer', $data["id_customer"]);
        $this->db->bind(':customer_name', $data['name']);
        $this->db->bind(':date_of_birth', $data['birthday']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone']);
        $this->db->bind(':organization_name', $data['organization']);
        $this->db->bind(':notes', $data['notes']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletecustomer($id) {
        $this->db->query('DELETE FROM My_Customers WHERE id_customer=:id_customer');

        //Bind values
        $this->db->bind(':id_customer', $id);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
