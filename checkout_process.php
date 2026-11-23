<?php
session_start();
include "includes/config.php";
require_once "includes/mail_service.php";

// 1. Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// 2. Vérifier que le panier n'est pas vide
if (!isset($_SESSION['mycart']) || empty($_SESSION['mycart'])) {
    header("Location: cart.php");
    exit;
}

// 3. Récupérer les données du formulaire
$first_name = trim($_POST['first_name'] ?? '');
$last_name  = trim($_POST['last_name'] ?? '');
$house      = trim($_POST['house_number'] ?? '');
$street     = trim($_POST['street'] ?? '');
$city       = trim($_POST['city'] ?? '');
$postal     = trim($_POST['postal_code'] ?? '');
$country    = trim($_POST['country'] ?? '');
$phone      = trim($_POST['phone'] ?? '');
$email      = trim($_POST['email'] ?? '');

// 4. Valider les champs obligatoires
if (empty($first_name) || empty($last_name) || empty($phone) || empty($email)) {
    header("Location: checkout.php?error=missing_fields");
    exit;
}

// 5. Construire l'adresse complète
$full_address = "$house $street, $postal $city, $country";

// 6. Récupérer le customer_id
$customer_id = (int)$_SESSION['id'];

// 7. Calculer le total
$order_total = 0;
foreach ($_SESSION['mycart'] as $item) {
    $order_total += $item['price'] * $item['product_qty'];
}

// 8. Insérer la commande dans `orders`
$stmt = $conn->prepare("INSERT INTO orders (customer_id, order_total, order_status, order_address, order_phone) VALUES (?, ?, 'en_attente', ?, ?)");
$stmt->bind_param("idss", $customer_id, $order_total, $full_address, $phone);

if (!$stmt->execute()) {
    error_log("Erreur insertion commande : " . $stmt->error);
    header("Location: checkout.php?error=db_error");
    exit;
}

$order_id = $stmt->insert_id;
$stmt->close();

// 9. Insérer chaque article dans `order_items`
$items_for_email = [];
foreach ($_SESSION['mycart'] as $item) {
    $product_id    = (int)$item['product_id'];
    $product_title = $item['name'];
    $product_price = (float)$item['price'];
    $product_qty   = (int)$item['product_qty'];

    $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_title, product_price, product_qty) VALUES (?, ?, ?, ?, ?)");
    $stmt_item->bind_param("iisdi", $order_id, $product_id, $product_title, $product_price, $product_qty);
    $stmt_item->execute();
    $stmt_item->close();

    // Préparer pour l'email
    $items_for_email[] = [
        'product_title' => $product_title,
        'product_price' => $product_price,
        'product_qty'   => $product_qty
    ];
}

// 10. Envoyer l'email de facture
$customer_name = $_SESSION['customer_name'] ?? ($first_name . ' ' . $last_name);
$email_envoye = envoyerFacture($email, $customer_name, $order_id, $order_total, $items_for_email);

if (!$email_envoye) {
    error_log("Email non envoyé pour la commande #$order_id");
}

// 11. Vider le panier
unset($_SESSION['mycart']);

// 12. Rediriger vers la page de confirmation
header("Location: order_confirmation.php?order_id=$order_id");
exit;