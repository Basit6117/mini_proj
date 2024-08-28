<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $product = array(
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'discount' => $_POST['discount'],
        'file' => $_POST['file'],
        'quantity' => $_POST['quantity']
    );
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $is_in_cart = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] == $product['name']) {
            $item['quantity'] += $product['quantity'];
            $is_in_cart = true;
            break;
        }
    }
    if (!$is_in_cart) {
        $_SESSION['cart'][] = $product;
    }
    echo json_encode(array('total_items' => count($_SESSION['cart'])));
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == 'remove') {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['name'] == $_POST['name']) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    echo json_encode(array('total_items' => count($_SESSION['cart'])));
    exit;
}
?>