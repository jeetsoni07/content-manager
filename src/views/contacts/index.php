<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>
<body>
    <h1>Contact Manager</h1>
    <div class="add-new">
        <a href="../public/index.php?action=create">Add New Contact</a>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?php echo htmlspecialchars($contact['name']); ?></td>
            <td><?php echo htmlspecialchars($contact['phone_number']); ?></td>
            <td><?php echo htmlspecialchars($contact['email']); ?></td>
            <td><?php echo htmlspecialchars($contact['address']); ?></td>
            <td>
            <a href="../public/index.php?action=edit&id=<?php echo $contact['id']; ?>">Edit</a>
            <form action="../public/index.php?action=delete&id=<?php echo $contact['id']; ?>" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
