<?php
include('inc/header.php');
include('../adminpanel/CRUD/season/read.php');
?>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include('./inc/sideBar.php'); ?>
        <div class="content">
            <?php include('./inc/navBar.php'); ?>


            <!-- Anime List Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">ID anime</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Дата изменения</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if ($seasons) {
                                    foreach ($seasons as $season) { ?>
                                        <td><?=$season['id']?></td>
                                        <td><?=$season['anime_id']?></td>
                                        <td><?=$season['title']?></td>
                                        <td><?=$season['order']?></td>
                                        <td><?=$season['createDate']?></td>
                                        <td><?=$season['updateDate']?></td>
                                        <td><a class="btn btn-sm btn-primary" href="season_edit_form.php?id=<?=$season['id']?>">Detail</a></td>
                                        </tr>
                                    <?php }
                                } else {?>
                                    <tr><td colspan='7'>Нет доступных данных</td></tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


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
    </div>
<?php include('./inc/footer.php'); ?>