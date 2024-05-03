<?php

require_once "../template/header.php";
require_once "../core/functions.php";

?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="border rounded p-5 m-5">
                <h3>Create List</h3>

                <!-- Data Fetching & Adding Process -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST["id"];
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];

                    $contactId = updateContact($id, $name, $email, $phone);
                    header("Location: ../index.php");
                    exit();
                }

                if(isset($_GET['id'])) {
                    $contact = getContactById($_GET['id']);
                    if(!$contact) {
                        echo "Contact not found.";
                        exit();
                    }
                } else {
                    echo "Contact ID not provided.";
                    exit();
                }

                ?>

                <!-- Form Element -->
                <form action="./update.php" method="POST">

                    <!-- Specific Id Search -->
                    <input type="hidden" name="id" value="<?= $contact["id"] ?>">

                    <!-- Update Name Form Input -->
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Name</label>
                        <input type="text" name="name" value="<?= $contact["name"] ?>" class="form-control"
                            id="exampleInputName1">
                    </div>

                    <!-- Update Email Form Input -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="<?= $contact["email"] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <!-- Update Phone Number Form Input -->

                    <div class="mb-3">
                        <label class="form-check-label" for="exampleTel1">Phone Number</label>
                        <input type="tel" name="phone" value="<?= $contact["phone"] ?>" class="form-check-input"
                            id="exampleTel1">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "../template/footer.php" ?>