<?php
include('inc/header.php');

        $sql = "SELECT * FROM season";
        $stmt = $pdo->query($sql);
        $seasons = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                            <h6 class="mb-4">Add Episode Form</h6>
                            <form action="./CRUD/episode/create.php" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label class="form-label">Название серии</label>
                                    <input type="text" class="form-control" name="title">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">ID сезона</label>

                                    <select class="form-select form-select-sm mb-3" name="season_id" >
                                        <option selected="">Open this select menu</option>
                                        <?php  

                                        if ($seasons) {
                                            foreach ($seasons as $season) { ?>
                                                <option value="<?=$season['id']?>"><?=$season['title']?></option>
                                            <?php }
                                        } else {?>
                                            <option>В базе еще нет Сезонов</option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Выберите постер для episode</label>
                                    <input class="form-control form-control-sm bg-dark" name="image" type="file">
                                </div>
                                

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Video</label>
                                    <input class="form-control form-control-sm bg-dark" name="video" type="file">
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