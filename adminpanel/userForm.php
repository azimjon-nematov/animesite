<?php
include('../db.php');

$session_id = session_id();
if ($session_id == "") {
    session_start();
    $session_id = session_id();
}

include('inc/header.php');

$id = $_GET['id'];
$sql = "SELECT * FROM `user` WHERE id=?";
$user = SELECT($sql, "i", [$id])[0];

?>
<body>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Sidebar Start -->
        <?php include('./inc/sideBar.php'); ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include('./inc/navBar.php'); ?>
            <!-- Navbar End -->


            <!-- Add FORM Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-8">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Edit studio Form</h6>
                            <form action="CRUD/user/update.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Имя</label>
                                    <input class="form-control" value="<?=$user['id']?>" name="id" hidden>
                                    <input type="text" class="form-control" name="name" value="<?=$user['name']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Логин</label>
                                    <input type="text" class="form-control" name="login" value="<?=$user['login']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password Hash</label>
                                    <input type="text" class="form-control" name="passwordHash" value="<?=$user['passwordHash']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ссылка на картинку</label>
                                    <input type="text" class="form-control" name="profileImage" value="<?=$user['profileImage']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Является админом</label>
                                    <?php echo '<input class="form-check-input" name="isAdmin" type="checkbox" ' . ($user['isAdmin'] == 1 ? 'checked' : '') . '>'; ?>
                                    <!-- <input class="form-check-input" name="isAdmin" type="checkbox"> -->
                                </div>


                        
                                <button type="submit" class="btn btn-primary">Обновить</button>
                                <a href="./CRUD/user/delete.php?id=<?=$user['id']?>" class="btn btn-primary">
                                    Удалить
                                    </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add FORM End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

<?php include('./inc/footer.php'); ?>