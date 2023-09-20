<?php
include('inc/header.php');
include '../db.php';
?>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include('./inc/sideBar.php'); ?>
        <div class="content">
            <?php include('./inc/navBar.php'); ?>


            <!-- user List Start -->
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
                                    <th scope="col">Имя</th>
                                    <th scope="col">Логин</th>
                                    <th scope="col">Пароль</th>
                                    <th scope="col">Фото</th>
                                    <th scope="col">Админ</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Дата изменения</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $users = SELECT("SELECT * FROM user");
                                if (count($users) > 0) {
                                    foreach ($users as $user) { ?>
                                        <tr>
                                        <td><?=$user['id']?></td>
                                        <td><?=$user['name']?></td>
                                        <td><?=$user['login']?></td>
                                        <td><?=$user['passwordHash']?></td>
                                        <td><?=$user['profileImage']?></td>
                                        <td><?=$user['isAdmin']?></td>
                                        <td><?=$user['createDate']?></td>
                                        <td><?=$user['updateDate']?></td>
                                        <td><a class="btn btn-sm btn-primary" href="editUserForm.php">Detail</a></td>
                                        </tr>
                                    <?php }
                                } else {?>
                                    <tr><td colspan='8'>Нет доступных данных</td></tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Имя</th>
                                    <th scope="col">Логин</th>
                                    <th scope="col">Пароль</th>
                                    <th scope="col">Фото</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="CRUD/anime/add.php" method="POST">
                                    <td><input type="text" name="name"></td>
                                    <td><input type="text" name="login"></td>
                                    <td><input type="text" name="passwordHash"></td>
                                    <td><input type="text" name="profileImage"></td>
                                    <td><input type="text" name="isAdmin"></td>
                                    <td><button type="submit" class="btn btn-primary">Добавить</button></td>
                                    </form>
                                </tr>
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