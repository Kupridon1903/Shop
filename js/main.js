var func = jQuery.noConflict();
var link = jQuery.noConflict();
var press = jQuery.noConflict();
function add_product(item_id){
    number_item = func("#number_item" + item_id).val();
    var kek = check_for_loser(item_id);
    if (kek != 'true') return;
    func.ajax({
        type : 'POST',
        url :'add_product.php',
        data: {
            item_id: item_id,
            number_item : number_item
        },
        success: function(){
            alert('Товар добавлен в корзину');
            check_number_basket();
        }
    });
}

function check_for_loser(id){
    val1 = func('#number_item' + id).val();
    if (val1 < 0 ){
        alert("Значение не может быть меньше нуля");
        return "false";
    }
    else {
        return "true";
    }
}

function delete_product(item_id) {
    if (confirm("Вы действительно хотите удалить этот товар?")) {
        func.ajax({
            type : 'POST',
            url :'delete_product.php',
            data: {
                item_id: item_id
            },
            success: function(){
                link("#main").load("basket.php");
                alert('Товар удален из корзины');
                check_number_basket();
            }
        });
    }
}

function basket_clear(){
    func.ajax({
        url :'basket_delete.php',
        success: function(){
            check_number_basket();

            link("#main").load("main.php");
        }
    });
}

function check_number_basket(){
    func.ajax({
        url :'check_number_basket.php',
        success: function(answer){
            if (answer > 0) {
                func("#number_items_basket").text(answer);
            }
            else {
                func("#number_items_basket").text(0);
            }
        }
    });
}

function add_order(){
    var regInput = func('#checkout_form').find('input').serialize();
    func.ajax({
        url :'add_order.php',
        processData: false,
        contentType: false,
        data: regInput,
        success: function(answer){
            if (answer == "true"){
                alert("Заказ успешно оформлен");
                basket_clear();
            }
            else {
                alert("Не удалось оформить заказ");
            }
        }
    });
}

function user_auth() {
    var mail = func("#dropdownMail").val();
    var password = func("#dropdownPassword").val();
    func.ajax({
        type : 'POST',
        url :'user_auth.php',
        data: {
            mail : mail,
            password : password
        },
        success: function(answer){
            if (answer != 'true'){
                func("#main").load("main.php");
                func("#authorized").html(answer);
            }
            else {
                func("#wrong_info").show();
            }
        }
    });
}

function user_reg() {
    if (inputName != "" && inputFam != "" && inputLogin != "" && inputEmail != "" && inputPassword != "") {
        var regInput = func('#form-vertical').find('input').serialize();
        func.ajax({
            type: 'POST',
            url: 'user_reg.php',
            data: regInput,
            success: function (answer) {
                if (answer != 'true'){
                    func("#main").load("main.php");
                    func("#authorized").html(answer);
                    alert("Вы успешно зарегистрировались");
                }
                else {
                    alert("Вы не прошли регистрацию");
                }
            }
        });
    }
}

function user_exit(){
    func.ajax({
        url :'user_exit.php',
        success: function(){
            link("#main").load("main.php");
            link("#header").load("header.php");
        }
    });
}

function add_admin_product(){
    func("#main").load("admin/window_add_product.php");
}

function change_admin_product(id){
    func("#main").load("admin/window_change_product.php", { product_id : id } );
}

function add_admin_product_script(){
    var fd = new FormData(func('#form_add_product')[0]);
    func.ajax({
        type: 'POST',
        url: 'admin/product_add.php',
        processData: false,
        contentType: false,
        data: fd,
        success: function (answer) {
            if (answer == 'true') {
                alert("Товар успешно добавлен");
                func("#main").load("admin/admin_panel.php");
            } else {
                alert("Произошла ошибка");
            }
        }
    });
}

function delete_admin_product(id){
    if (confirm("Вы действительно хотите удалить этот товар?")) {
        func.ajax({
            type: 'POST',
            url: 'admin/product_delete.php',
            data: {
                id: id
            },
            success: function (answer) {
                if (answer == 'true') {
                    alert("Товар успешно удален");
                    func("#main").load("admin/admin_panel.php");
                }
            }
        });
    }
}

function delete_admin_order(id){
    if (confirm("Вы действительно хотите удалить этот заказ?")) {
        func.ajax({
            type: 'POST',
            url: 'admin/order_delete.php',
            data: {
                id: id
            },
            success: function (answer) {
                if (answer == 'true') {
                    alert("Заказ успешно удален");
                    func("#main").load("admin/admin_panel.php");
                }
            }
        });
    }
}

function delete_admin_user(id){
    if (confirm("Вы действительно хотите удалить этого пользователя?")) {
        func.ajax({
            type: 'POST',
            url: 'admin/user_delete.php',
            data: {
                id: id
            },
            success: function (answer) {
                if (answer == 'true') {
                    alert("Пользователь успешно удален");
                    func("#main").load("admin/admin_panel.php");
                }
            }
        });
    }
}

function check_auth() {
    var display = link("#login_menu").css("display");
    if (display == "none") link("#login_menu").css("display" , "inherit");
    else link("#login_menu").css("display" , "none");
}

function check_items() {
    var display = link("#items_menu").css("display");
    if (display == "none") link("#items_menu").css("display" , "inherit");
    else link("#items_menu").css("display" , "none");
}

function open_item_page(id) {
    link("#main").load("item_page.php", {id : id});
}

function open_admin_items() {
    link("#admin_main").load("admin/admin_main.php");
}

function open_admin_orders() {
    link("#admin_main").load("admin/admin_orders.php");
}

function open_admin_users() {
    link("#admin_main").load("admin/admin_users.php");
}

press("a#index_link").click(function () {
    link("#main").load("main.php");
});
press("a#bike_link").click(function () {
    link("#main").load("products_bikes.php");
});
press("a#scooter_link").click(function () {
    link("#main").load("products_scooters.php");
});
press("a#basket_link").click(function () {
    link("#main").load("basket.php");

});
press("a#contacts_link").click(function () {
    link("#main").load("contacts.php");
});
press("a#user_private").click(function () {
    link("#main").load("user_private.php");
});
press("a#reg_link").click(function () {
    link("#main").load("reg_page.php");
});
press("a#admin_link").click(function () {
    link("#main").load("admin/admin_panel.php");
});
press("#add_order").click(function () {
    link("#main").load("checkout.php");
});

