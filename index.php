<?php

include "./template/header.php";
include "./core/functions.php";

?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="mb-3">
                <h3>Contacts</h3>
                <a href="../CRUD/create.php"></a>
            </div>

            <?php
            $contacts = getAllContacts();
            ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact['id']; ?></td>
                            <td><?php echo $contact['name']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td><?php echo $contact['phone'] ?></td>
                            <td>
                                <a href="./CRUD/update.php?id=<?= $contact["id"]; ?>" class="btn btn-warning">Update</a>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $contact["id"] ?>">
                                    <button onclick="return confirm('Are U Sure to Delete?')"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "./template/footer.php" ?>