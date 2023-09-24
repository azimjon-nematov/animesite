<?php
include "../db.php";
$hasData = !empty($_POST['xml']);
if ($hasData) {
    $xml = simplexml_load_string($_POST['xml']);
    $countOfInserted = 0;
    foreach ($xml as $user) {

        try {
            $sql = 'INSERT INTO user(name, login, passwordHash, profileImage, isAdmin, createDate) VALUES(?, ?, MD5(?), ?, 0, NOW())';
            $id = executeAndSelectId($sql, "ssss", [$user->name, $user->login, $user->password, $user->profileImage]);
            $countOfInserted += 1;
        } catch (Throwable $e) {
            
        }
    }
}

include 'inc/header.php';
?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
    <style type="text/css">
        .form__textarea {
            padding: 20px;
            border: none;
            height: 150px;
            position: relative;
            color: #fff;
            font-size: 15px;
            width: 100%;
            color: #fff;
            padding: 15px 20px;
            letter-spacing: 0.2px;
            resize: none;
            background-color: #2b2b31;
            font-family: 'Open Sans', sans-serif;
        }
    </style>

        <!-- Sidebar Start -->
        <?php include('inc/sideBar.php'); ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include('inc/navBar.php'); ?>
            <!-- Navbar End -->

            <form method="post" style="padding: 20px">
            	<textarea name="xml" placeholder="Enter your xml" class="form__textarea"></textarea>
                <br>
                <input type="submit">
            </form>

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>   

<?php include('inc/footer.php'); ?>

<?php if ($hasData): ?>
<script type="text/javascript">
    <?php echo("alert('added " . $countOfInserted . " users!');") ?>
</script>
<?php endif ?>