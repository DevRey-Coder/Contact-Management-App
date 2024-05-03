<?php require_once "../template/header.php";
include "../core/functions.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="border rounded p-5 m-5">
                <h3>Create List</h3>

                <!-- Data Fetching & Adding Process -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];

                    $contactId = addContact($name, $email, $phone);
                    if ($contactId) {
                        header("Location: ../index.php");
                    } else {
                        echo "Error adding contact.";
                    }
                }
                ?>

                <!-- Form Element -->
                <form action="" method="POST">

                    <!-- Name Form Input -->
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1">
                    </div>

                    <!-- Email Form Input -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <!-- Phone Number Form Input -->

                    <div class="mb-3">
                        <label class="form-check-label" for="exampleTel1">Phone Number</label>
                        <input type="tel" name="phone" class="form-check-input" id="exampleTel1">
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "../template/footer.php" ?>