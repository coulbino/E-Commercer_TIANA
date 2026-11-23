<?php
session_start();

if (isset($_POST['add_to_cart']) OR isset($_POST['buy_now'])) {
    
    // 1. Ajouter le produit au panier (logique existante)
    if (isset($_SESSION['mycart'])) {
        $item_id = array_column($_SESSION['mycart'], 'product_id');
        $item_check_id = in_array($_POST['product_id'], $item_id);
        
        if ($item_check_id == false) {
            $count_card = count($_SESSION['mycart']);
            $_SESSION['mycart'][$count_card] = array(
                'name'         => $_POST['product_name'],
                'price'        => $_POST['product_price'],
                'product_id'   => $_POST['product_id'],
                'category'     => $_POST['product_category'],
                'product_qty'  => $_POST['product_qty'],
                'product_img'  => $_POST['product_img']
            );
        }
    } else {
        $_SESSION['mycart'][0] = array(
            'name'         => $_POST['product_name'],
            'price'        => $_POST['product_price'],
            'product_id'   => $_POST['product_id'],
            'category'     => $_POST['product_category'],
            'product_qty'  => $_POST['product_qty'],
            'product_img'  => $_POST['product_img']
        );
    }
    
    // 2. Rediriger selon le bouton cliqué
    if (isset($_POST['buy_now'])) {
        // Bouton "Acheter maintenant" → aller au checkout
        header('location:checkout.php');
        exit;
    } else {
        // Bouton "Ajouter au panier" → retour à la fiche produit
        header('location:viewdetail.php?id=' . $_POST['product_id'] . '&category=' . $_POST['product_category']);
        exit;
    }
}
?>