<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "includes/config.php";

if (!isset($_GET['order_id'])) {
    header("Location: index.php");
    exit;
}

$order_id = (int)$_GET['order_id'];

// Récupérer la commande
$stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$order) {
    header("Location: index.php");
    exit;
}

// Récupérer les articles
$stmt_items = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$items = $stmt_items->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande confirmée - TIANA</title>
    <link rel="stylesheet" href="./css/style-prefix.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 40px 20px; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .success-icon { width: 80px; height: 80px; background: #4CAF50; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: #fff; font-size: 40px; }
        h1 { text-align: center; color: #333; }
        .order-info { background: #f5f5f5; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .order-info p { margin: 8px 0; color: #555; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #8B1A1A; color: #fff; }
        .total { text-align: right; font-size: 20px; font-weight: bold; color: #8B1A1A; margin-top: 20px; }
        .btn { display: inline-block; background: #8B1A1A; color: #fff; padding: 14px 28px; border-radius: 8px; text-decoration: none; margin-top: 20px; }
        .btn:hover { background: #6d1414; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1>Merci pour votre commande !</h1>
        <p class="center">Un email de confirmation a été envoyé à l'adresse fournie.</p>

        <div class="order-info">
            <p><strong>Numéro de commande :</strong> #<?php echo htmlspecialchars($order['order_id']); ?></p>
            <p><strong>Date :</strong> <?php echo date('d/m/Y à H:i', strtotime($order['order_date'])); ?></p>
            <p><strong>Statut :</strong> <?php echo htmlspecialchars($order['order_status']); ?></p>
            <p><strong>Adresse de livraison :</strong> <?php echo htmlspecialchars($order['order_address']); ?></p>
        </div>

        <h2>Détail de votre commande</h2>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $items->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['product_title']); ?></td>
                    <td><?php echo number_format($item['product_price'], 0, ',', ' '); ?> FCFA</td>
                    <td><?php echo $item['product_qty']; ?></td>
                    <td><?php echo number_format($item['product_price'] * $item['product_qty'], 0, ',', ' '); ?> FCFA</td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <p class="total">Total : <?php echo number_format($order['order_total'], 0, ',', ' '); ?> FCFA</p>

        <div class="center">
            <a href="index.php" class="btn">Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>