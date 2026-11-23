<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../libs/PHPMailer/src/Exception.php';
require_once __DIR__ . '/../libs/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../libs/PHPMailer/src/SMTP.php';

function envoyerFacture($customer_email, $customer_name, $order_id, $order_total, $items) {
    $config = require __DIR__ . '/mail_config.php';
    
    $mail = new PHPMailer(true);
    
    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host       = $config['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['username'];
        $mail->Password   = $config['password'];
        $mail->SMTPSecure = $config['encryption'];
        $mail->Port       = $config['port'];
        $mail->CharSet    = 'UTF-8';
        
        // Expéditeur et destinataire
        $mail->setFrom($config['from_email'], $config['from_name']);
        $mail->addAddress($customer_email, $customer_name);
        
        // Contenu
        $mail->isHTML(true);
        $mail->Subject = "Facture de votre commande #$order_id - TIANA";
        
        // Construction du HTML
        $html = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #8B1A1A; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; background: #f9f9f9; }
                .table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                .table th, .table td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
                .table th { background: #8B1A1A; color: white; }
                .total { font-size: 18px; font-weight: bold; color: #8B1A1A; text-align: right; }
                .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>TIANA</h1>
                    <p>Merci pour votre commande !</p>
                </div>
                <div class='content'>
                    <p>Bonjour <strong>" . htmlspecialchars($customer_name) . "</strong>,</p>
                    <p>Nous confirmons la réception de votre commande <strong>#$order_id</strong>.</p>
                    
                    <h3>Détail de votre commande :</h3>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Sous-total</th>
                            </tr>
                        </thead>
                        <tbody>";
        
        foreach ($items as $item) {
            $sous_total = $item['product_price'] * $item['product_qty'];
            $html .= "
                <tr>
                    <td>" . htmlspecialchars($item['product_title']) . "</td>
                    <td>" . number_format($item['product_price'], 0, ',', ' ') . " FCFA</td>
                    <td>" . $item['product_qty'] . "</td>
                    <td>" . number_format($sous_total, 0, ',', ' ') . " FCFA</td>
                </tr>";
        }
        
        $html .= "
                        </tbody>
                    </table>
                    
                    <p class='total'>Total : " . number_format($order_total, 0, ',', ' ') . " FCFA</p>
                    
                    <p>Nous vous informerons dès que votre commande sera expédiée.</p>
                    <p>Délai de livraison estimé : <strong>3 à 5 jours ouvrables</strong>.</p>
                    
                    <p>Cordialement,<br>L'équipe TIANA</p>
                </div>
                <div class='footer'>
                    <p>© " . date('Y') . " TIANA - Tous droits réservés</p>
                    <p>Abidjan, Côte d'Ivoire</p>
                </div>
            </div>
        </body>
        </html>";
        
        $mail->Body = $html;
        $mail->AltBody = "Merci pour votre commande #$order_id. Total : " . number_format($order_total, 0, ',', ' ') . " FCFA";
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Erreur envoi email : " . $mail->ErrorInfo);
        return false;
    }
}