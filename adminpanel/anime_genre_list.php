<?php
include('inc/header.php');
include('../adminpanel/CRUD/anime_genre/read.php');
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
                        <h6 class="mb-0">anime genre</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">ID аниме</th>
                                    <th scope="col">ID жанра</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Дата изменения</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if ($anime_genres) {
                                    foreach ($anime_genres as $anime_genre) { ?>
                                        <td><?=$anime_genre['id']?></td>
                                        <td><?=$anime_genre['anime_id']?></td>
                                        <td><?=$anime_genre['genre_id']?></td>
                                        <td><?=$anime_genre['createDate']?></td>
                                        <td><?=$anime_genre['updateDate']?></td>
                                        <td><a class="btn btn-sm btn-primary" href="anime_genre_edit_form.php?id=<?=$anime_genre['id']?>">Detail</a></td>
                                        </tr>
                                    <?php }
                                } else {?>
                                    <tr><td colspan='6'>Нет доступных данных</td></tr>
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