<?php
require '../vendor/autoload.php';

use App\Controllers\ContactController;

$controller = new ContactController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) {
            $controller->edit($id);
        } else {
            echo "ID is required to edit a contact.";
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        } else {
            echo "ID is required to delete a contact.";
        }
        break;
    default:
        $controller->index();
        break;
}
