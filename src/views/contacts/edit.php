<?php
require '../vendor/autoload.php';

use App\Models\Form;
use App\Factories\ConnectionFactory;
use App\Models\Contact;

// Retrieve contact data

$stmt = $this->conn->prepare('SELECT * FROM contacts WHERE id = ?');
$stmt->execute([$id]);
$contact = $stmt->fetch(\PDO::FETCH_ASSOC);

// Define the form configuration with existing data
$config = [
    ['type' => 'TextInput', 'name' => 'name', 'label' => 'Name', 'value' => $contact['name']],
    ['type' => 'TextInput', 'name' => 'phone_number', 'label' => 'Phone Number', 'value' => $contact['phone_number']],
    ['type' => 'TextInput', 'name' => 'email', 'label' => 'Email', 'value' => $contact['email']],
    ['type' => 'TextAreaField', 'name' => 'address', 'label' => 'Address', 'value' => $contact['address']]
];

// Create the form
$form = new Form($config);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>
<body>
    <h1>Edit Contact</h1>
    <?php
    // Render the form
    echo $form->render();
    ?>
</body>
</html>
