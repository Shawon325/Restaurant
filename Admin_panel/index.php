<?php
include '../Session/Session.php';
Session::checkSession();
include_once '../Database/Database.php';
include_once '../Database/connect.php';
spl_autoload_register(function ($class) {
    include 'layout/class/' . $class . '.php';
});

if (isset($_GET['action'])) {
    Session::destroy();
}
?>



<!-- Header -->
<?php include 'layout/header.php' ?>
<!-- Header -->

<!-- Sidebar -->
<?php include 'layout/sidebar.php' ?>
<!-- End of Sidebar -->

<!-- Topbar -->
<?php include 'layout/topbar.php'; ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<?php
if (isset($_REQUEST['page'])) {
    switch ($_REQUEST['page']) {

        case 'dashboard':
            include 'layout/dashboard.php';
            break;

        case 'add_users':
            include 'layout/add_users.php';
            break;

        case 'manage_users':
            include 'layout/manage_users.php';
            break;

        case 'add_group':
            include 'layout/add_group.php';
            break;

        case 'manage_group':
            include 'layout/manage_group.php';
            break;

        case 'stores':
            include 'layout/stores.php';
            break;

        case 'tables':
            include 'layout/tables.php';
            break;

        case 'category':
            include 'layout/category.php';
            break;

        case 'add_products':
            include 'layout/add_products.php';
            break;

        case 'manage_products':
            include 'layout/manage_products.php';
            break;

        case 'add_orders':
            include 'layout/add_orders.php';
            break;

        case 'manage_orders':
            include 'layout/manage_orders.php';
            break;

        case 'product_reports':
            include 'layout/product_reports.php';
            break;

        case 'store_reports':
            include 'layout/store_reports.php';
            break;

        case 'company_info':
            include 'layout/company_info.php';
            break;

        case 'profile':
            include 'layout/profile.php';
            break;

        case '404':
            include 'layout/404.php';
            break;

        case 'setting':
            include 'layout/setting.php';
            break;

        case 'blank':
            include 'layout/blank.php';
            break;

        case 'buttons':
            include 'layout/buttons.php';
            break;

        case 'cards':
            include 'layout/cards.php';
            break;

        case 'charts':
            include 'layout/charts.php';
            break;

        case 'tables':
            include 'layout/tables.php';
            break;

        case 'data_tables':
            include 'layout/data_tables.php';
            break;

        case 'utilities-animation':
            include 'layout/utilities-animation.php';
            break;

        case 'utilities-border':
            include 'layout/utilities-border.php';
            break;

        case 'utilities-color':
            include 'layout/utilities-color.php';
            break;

        case 'utilities-other':
            include 'layout/utilities-other.php';
            break;
        default:
            include 'layout/dashboard.php';
            break;
    }
} else {
    include 'layout/dashboard.php';
}
?>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'layout/footer.php' ?>
<!-- End of Footer -->



<!-- Logout Modal-->
<?php include 'layout/logout.php' ?>