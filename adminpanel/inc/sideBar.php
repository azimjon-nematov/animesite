<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Аниме</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="anime_list.php" class="dropdown-item">Список аниме</a>
                            <a href="anime_create_form.php" class="dropdown-item">Добавить аниме</a>
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Студио</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="studio_list.php" class="dropdown-item">Список студий</a>
                            <a href="studio_create_form.php" class="dropdown-item">Добавить студию</a>
                            <a href="XMLFromDB.php?table=studio" class="dropdown-item">Экспорт таблицы студия</a>
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Жанры</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="genre_list.php" class="dropdown-item">Список жанров</a>
                            <a href="genre_create_form.php" class="dropdown-item">Добавить жанр</a>
                            <a href="XMLFromDB.php?table=genre" class="dropdown-item">Экспорт таблицы жанр</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Жанры аниме</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="anime_genre_list.php" class="dropdown-item">Список жанров аниме</a>
                            <a href="anime_genre_create_form.php" class="dropdown-item">Добавить жанр для аниме</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="userList.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Пользователи</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="userList.php" class="dropdown-item">Список пользователей</a>
                            <a href="addUserForm.php" class="dropdown-item">Добавить пользователя</a>
                        </div>
                    </div>



                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Сезоны</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="season_list.php" class="dropdown-item">Список сезонов</a>
                            <a href="season_create_form.php" class="dropdown-item">Добавить сезон для аниме</a>
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Episodes</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="episode_list.php" class="dropdown-item">Список episode</a>
                            <a href="episode_create_form.php" class="dropdown-item">Добавить episode</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="DBFromXML.php" class="nav-link" ><i class="fa fa-laptop me-2"></i>Импорт</a>
                    </div>

                 
                    
                </div>
            </nav>
        </div>