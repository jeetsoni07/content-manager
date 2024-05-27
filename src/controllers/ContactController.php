<?php
namespace App\Controllers;

use App\Factories\ConnectionFactory;
use App\Models\Contact;


class ContactController
{
    private $conn;
    private $contact;
    private $basePath;
    private $viewPath;

    public function __construct()
    {
        $this->conn = ConnectionFactory::create();
        $this->contact = new Contact($this->conn);
        $this->basePath = dirname($_SERVER['REQUEST_URI']);
        $this->viewPath = __DIR__ . '/../../src/views/contacts/';
    }

    public function index()
    {
        $result = $this->contact->read();
        $contacts = $result->fetchAll(\PDO::FETCH_ASSOC);
        include $this->viewPath . 'index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contact->name = $_POST['name'];
            $this->contact->phone_number = $_POST['phone_number'];
            $this->contact->email = $_POST['email'];
            $this->contact->address = $_POST['address'];
            if ($this->contact->create()) {
                header('Location: ' . $this->basePath . '/index.php');
                exit();
            }else {
                echo "Error creating contact.";
            }
        }
        include $this->viewPath . 'create.php';
    }

    public function edit($id)
    {

        global $basePath;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contact->id = $id;
            $this->contact->name = $_POST['name'];
            $this->contact->phone_number = $_POST['phone_number'];
            $this->contact->email = $_POST['email'];
            $this->contact->address = $_POST['address'];

            if ($this->contact->update()) {
                header('Location: ' . $this->basePath . '/index.php');
                exit();
            }else {
                echo "Error editing contact.";
            }

        } else {
            $stmt = $this->conn->prepare('SELECT * FROM contacts WHERE id = ?');
            $stmt->execute([$id]);
            $contact = $stmt->fetch(\PDO::FETCH_ASSOC);

            include $this->viewPath . 'edit.php';
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contact->id = $id;

            if ($this->contact->delete()) {
                header('Location: ' . $this->basePath . '/index.php');
                exit();
            } else {
                echo "Error deleting contact.";
            }
        }
    }

}