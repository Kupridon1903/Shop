
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<body class="bg-light ">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#" class="nav-link text-dark" onclick="open_admin_items()">Товары</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark" onclick="open_admin_orders()">Заказы</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark" onclick="open_admin_users()">Пользователи</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid bg-light mb-5" id="admin_main">
    <?php include_once("admin_main.php") ?>
</div>

</body>

