<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/main.js"></script>

<body class="bg-light">
<?php session_start();

$fname = "";
$fam = "";
$email = "";

if (isset($_SESSION['user_mail'])) {
    
    include("db.php");

    $mail = $_SESSION['user_mail'];

    $result = mysqli_query($link, "SELECT * FROM users WHERE mail='$mail'");
    $row = mysqli_fetch_array($result);
    $fname = $row['fname'];
    $fam = $row['fam'];
    $email = $row['mail'];

}

echo "
    <div class='text-center mb-4 pt-5'>
        <h1 class='h3 mb-3 font-weight-normal'>Оформление заказа</h1>
    </div>
    <form id='checkout_form' class='container mt-5' >
        <div class='form-group'>
            <label for='email_offer'>Email</label>
            <input type='email' class='form-control' id='email_offer' name='email' value='".$email."' placeholder='Email'>
        </div>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for='fname_offer'>Имя</label>
                <input type='text' class='form-control' id='fname_offer' name='fname' value='".$fname."' placeholder='Имя'>
            </div>
            <div class='form-group col-md-6'>
                <label for='fam_offer'>Фамилия</label>
                <input type='text' class='form-control' id='fam_offer' name='fam' value='".$fam."' placeholder='Фамилия'>
            </div>
        </div>
        <div class='form-group' id='address_label'>
            <label for='address_offer'>Адрес</label>
            <input type='text' class='form-control' id='address_offer' name='address' placeholder='Адрес'>
        </div>
        <div class='form-group'>
            <label class='form-check-label ml-4'>
                <input type='checkbox' class='form-check-input' id='delivery' name='delivery' onchange='change_delivery()'>
            Самовывоз</label>
        </div>
        <button type='button' class='btn btn-primary' onclick='add_order()'>Оформить заказ</button>
    </form>
    </div>
";

?>
<script>
    function change_delivery(){
        var value = $('#delivery').prop('checked');
        if (value == true) $('#address_label').hide(300);
        else $('#address_label').show(300);
    }
</script>
</body>
