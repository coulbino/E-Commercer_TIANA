# 📊 Modèle Conceptuel de Données (MCD)

**Projet** : TIANA  
**Base de données** : db_ecommerce  
**Méthode** : Merise (Entité-Association)

---

## 🎯 Présentation

Le MCD (Modèle Conceptuel de Données) décrit les **entités** du système et leurs **relations**, indépendamment de toute considération technique.

---

## 🧩 Entités identifiées

### 1. CLIENT

**Identifiant** : `customer_id`

**Attributs** :
- `customer_id` : identifiant unique
- `customer_fname` : nom complet
- `customer_email` : adresse email (unique)
- `customer_pwd` : mot de passe
- `customer_phone` : numéro de téléphone
- `customer_address` : adresse postale
- `customer_role` : rôle (client / admin)

**Description** : représente un utilisateur du site, client ou administrateur.

---

### 2. CATÉGORIE

**Identifiant** : `id`

**Attributs** :
- `id` : identifiant unique
- `name` : nom de la catégorie
- `img` : icône associée
- `status` : état (actif/inactif)
- `created_at` / `updated_at` : dates

**Description** : catégorie principale de produits (Vêtements, Chaussures, Bijoux, etc.).

---

### 3. PRODUIT

**Identifiant** : `product_id`

**Attributs** :
- `product_id` : identifiant unique
- `product_title` : nom du produit
- `product_desc` : description
- `product_price` : prix en FCFA
- `discounted_price` : prix promotionnel
- `product_img` : image
- `product_left` : stock disponible
- `product_catag` : catégorie (hommes/femmes/tous)
- `category_id` : référence à la catégorie
- `product_author` : auteur
- `status` : état
- `created_at` / `updated_at` : dates

**Description** : article vendu sur le site.

---

### 4. COMMANDE

**Identifiant** : `order_id`

**Attributs** :
- `order_id` : identifiant unique
- `customer_id` : référence au client
- `order_total` : montant total
- `order_status` : statut (en_attente, payée, expédiée, livrée)
- `order_address` : adresse de livraison
- `order_phone` : téléphone de contact
- `order_date` : date de la commande

**Description** : commande passée par un client.

---

### 5. LIGNE_COMMANDE (order_items)

**Identifiant** : `item_id`

**Attributs** :
- `item_id` : identifiant unique
- `order_id` : référence à la commande
- `product_id` : référence au produit
- `product_title` : nom du produit (dénormalisé)
- `product_price` : prix unitaire
- `product_qty` : quantité

**Description** : détail d'une ligne de commande.

---

### 6. AVIS (reviews)

**Identifiant** : `id`

**Attributs** :
- `id` : identifiant unique
- `name` : nom du client
- `review` : contenu de l'avis

**Description** : avis client affiché sur le site.

---

### 7. BANNIÈRE (banner)

**Identifiant** : `banner_id`

**Attributs** :
- `banner_id` : identifiant unique
- `banner_subtitle` : sous-titre
- `banner_title` : titre
- `banner_items_price` : prix mis en avant
- `banner_image` : image
- `banner_status` : état

**Description** : bannière publicitaire de la page d'accueil.

---

### 8. PARAMÈTRES (settings)

**Attributs** :
- `website_name` : nom du site
- `website_logo` : logo
- `website_footer` : texte du pied de page

**Description** : configuration générale du site.

---

## 🔗 RELATIONS

### 🔹 Relation 1 : CLIENT — COMMANDE

**Cardinalité** : `1,N`

- **Un client** peut passer **plusieurs commandes**
- **Une commande** appartient à **un seul client**

---

### 🔹 Relation 2 : COMMANDE — LIGNE_COMMANDE

**Cardinalité** : `1,N`

- **Une commande** contient **plusieurs lignes**
- **Une ligne** appartient à **une seule commande**

---

### 🔹 Relation 3 : PRODUIT — LIGNE_COMMANDE

**Cardinalité** : `1,N`

- **Un produit** peut apparaître dans **plusieurs lignes de commande**
- **Une ligne** référence **un seul produit**

---

### 🔹 Relation 4 : CATÉGORIE — PRODUIT

**Cardinalité** : `1,N`

- **Une catégorie** contient **plusieurs produits**
- **Un produit** appartient à **une seule catégorie**

---

## 📐 SCHÉMA DU MCD

```mermaid
erDiagram
    CLIENT ||--o{ COMMANDE : "passe"
    COMMANDE ||--|{ LIGNE_COMMANDE : "contient"
    PRODUIT ||--o{ LIGNE_COMMANDE : "référencé"
    CATEGORIE ||--o{ PRODUIT : "contient"
    
    CLIENT {
        int customer_id PK
        string customer_fname
        string customer_email UK
        string customer_pwd
        string customer_phone
        text customer_address
        string customer_role
    }
    
    COMMANDE {
        int order_id PK
        int customer_id FK
        decimal order_total
        string order_status
        text order_address
        string order_phone
        datetime order_date
    }
    
    LIGNE_COMMANDE {
        int item_id PK
        int order_id FK
        int product_id FK
        string product_title
        decimal product_price
        int product_qty
    }
    
    PRODUIT {
        int product_id PK
        int category_id FK
        string product_title
        text product_desc
        decimal product_price
        decimal discounted_price
        text product_img
        int product_left
        string product_catag
    }
    
    CATEGORIE {
        int id PK
        string name
        string img
        binary status
    }