<?php
include('inc/header.php');
include('./CRUD/anime/read.php');
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
                            <h6 class="mb-4">Add season Form</h6>
                            <form action="./CRUD/season/create.php" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label class="form-label">Название</label>
                                    <input type="text" class="form-control" name="title">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">ID аниме</label>

                                    <select class="form-select form-select-sm mb-3" name="anime_id" >
                                        <option selected="">Open this select menu</option>
                                        <?php  

                                        if ($animes) {
                                            foreach ($animes as $anime) { ?>
                                                <option value="<?=$anime['id']?>"><?=$anime['title']?></option>
                                            <?php }
                                        } else {?>
                                            <option>В базе еще нет anime</option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                

                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" class="form-control" name="order">
                                </div>

                                <button type="submit" class="btn btn-primary">Добавить</button>
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