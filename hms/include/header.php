<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Hospital Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <?php
                    if (isset($_SESSION['admin'])) {
                        $user = $_SESSION['admin'];
                        echo '
                            <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                    } else if (isset($_SESSION['doctor'])) {
                        $user = $_SESSION['doctor'];
                        echo '
                            <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                    } else if (isset($_SESSION['patient'])) {
                        $user = $_SESSION['patient'];
                        echo '
                            <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                    } else {
                        echo '
                            <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
                            <li class="nav-item"><a href="admin.php" class="nav-link text-white">Admin</a></li>
                            <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
                            <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS (Optional for dropdown functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
