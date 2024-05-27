<?php
require '../vendor/autoload.php';

use App\Models\Form;

// Define the form configuration
$config = [
    ['type' => 'TextInput', 'name' => 'name', 'label' => 'Name'],
    ['type' => 'TextInput', 'name' => 'phone_number', 'label' => 'Phone Number'],
    ['type' => 'TextInput', 'name' => 'email', 'label' => 'Email'],
    ['type' => 'TextAreaField', 'name' => 'address', 'label' => 'Address']
];

// Create the form
$form = new Form($config);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>
<body>
    <h1>Add Contact</h1>
    <?php
    // Render the form
    echo $form->render();
    ?>
</body>
</html>
