<?php   include_once('./includes/headerNav.php'); ?>
<div class="overlay" data-overlay></div>
<!--
    - HEADER
  -->
<header>
  <!-- top head action, search etc in php -->
  <!-- inc/topheadactions.php -->
  <?php require_once './includes/topheadactions.php'; ?>
  <!-- mobile nav in php -->
  <!-- inc/mobilenav.php -->
  <?php require_once './includes/mobilenav.php'; ?>

    <style>
        * {
    font-family: Arial, Helvetica, sans-serif;
    box-sizing: border-box;

}
:root{
    --main-maroon: #CE5959;
    --deep-maroon: #89375F;
}

.appointments-section {
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
}

input {
    border: none;
    outline: none;
}

.appointment-heading {
    text-align: center;
}

.appointment-head {
    font-size: 40px;
    font-weight: 700;
    margin-bottom: 0;
    color: var( --main-maroon);
}

.appointment-line {
    width: 160px;
    height: 3px;
    border-radius: 10px;
    background-color: var( --main-maroon);
    display: inline-block;
}

.edit-detail-field .child-detail-inner {
    width: 100%;
    display: flex;
    margin-top: 10px;
    justify-content: space-between;
    margin-left: auto;
    margin-right: auto;
}

.Add-child-section {
    margin-top: 40px;
}

.Add-child-section .child-fields1 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields1 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .child-fields1::before {
    position: absolute;
    content: "Prénom";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields3 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields3 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .child-fields3::before {
    position: absolute;
    content: "Nom";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields4 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields4::before {
    position: absolute;
    content: "Numéro ou nom de maison";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields4 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .child-fields5 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields5::before {
    position: absolute;
    content: "Rue ou route";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields5 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .child-fields6 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields6::before {
    position: absolute;
    content: "Ville";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields6 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .child-fields7 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields7::before {
    position: absolute;
    content: "Code postal";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields7 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .child-fields8 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields8::before {
    position: absolute;
    content: "Numéro de téléphone";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields8 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .child-fields9 {
    width: 49%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .child-fields9::before {
    position: absolute;
    content: "Adresse email";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.Add-child-section .child-fields9 input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    background-color: transparent;
}

.Add-child-section .Address-field {
    width: 100%;
    height: 55px;
    border: 1px solid var( --main-maroon);
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: #FFFFFF;
    position: relative;
    box-shadow: 2px 2px 2px rgb(185, 184, 184);
}

.Add-child-section .Address-field input {
    color: #000000;
    font-weight: 700;
    width: 100%;
    height: 100%;
}

.Add-child-section .Address-field::before {
    position: absolute;
    content: "Pays";
    top: -10px;
    background-image: linear-gradient(#FFFCF6, #FFFFFF);
    padding-left: 4px;
    padding-right: 4px;
    color: var( --main-maroon);
    font-weight: 600;
    font-size: 13px;
}

.child-register-btn {
    padding-top: 5px;
}

.child-register-btn button {
    width: 550px;
    height: 60px;
    background-color: var( --main-maroon);
    box-shadow: 0px 0px 4px #615f5f;
    color: #FFFFFF;
    margin-left: auto;
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    font-size: 19px;
    font-weight: 600;
    border: none;
}

.Add-child-section .Address-field textarea {
    display: none;
}

@media screen and (max-width: 794px) {
    .child-register-btn button {
        width: 100%;
    }
    .child-fields,
    .child-fields1,
    .child-fields3 {
        width: 100% !important;
    }
}

.error-ms {
    color: var( --main-maroon);
    margin-bottom: 10px;
}
    </style>
</header>

<body>
    
    <div class="appointments-section">

        <div class="appointment-heading">
                <p class="appointment-head">Passer à la caisse</p>
                <span class="appointment-line"></span>

            </div>
       
        <div class="inner-appointment">
    
        <section class="edit-detail-field">
            <div class="Add-child-section">
                
                <!-- FORMULAIRE DE COMMANDE -->
                <form action="checkout_process.php" method="POST" id="checkout-form">
                    
                    <div class="child-detail-inner">
                        <div class="child-fields1">
                            <input type="text" name="first_name" style="color: #676767;" placeholder="Prénom" required>
                        </div>
                        <div class="child-fields3">
                            <input type="text" name="last_name" style="color: #676767;" placeholder="Nom" required>
                        </div>
                    </div>

                    <div class="child-detail-inner">
                        <div class="child-fields child-fields4">
                            <input type="text" name="house_number" placeholder="P-134" required>
                        </div>
                        <div class="child-fields child-fields5">
                            <input type="text" name="street" placeholder="A5" required>
                        </div>
                    </div>

                    <div class="child-detail-inner">
                        <div class="child-fields child-fields6">
                            <input type="text" name="city" placeholder="Abidjan" required>
                        </div>
                        <div class="child-fields child-fields7">
                            <input type="text" name="postal_code" placeholder="38000" required>
                        </div>
                    </div>

                    <div class="child-detail-inner">
                        <div class="child-fields Address-field">
                            <input type="text" name="country" style="color: #676767;" placeholder="Côte d'Ivoire" required>
                        </div>
                    </div>

                    <div class="child-detail-inner">
                        <div class="child-fields child-fields8">
                            <input type="text" name="phone" placeholder="+225 00 00 00 00 00" required>
                        </div>
                        <div class="child-fields child-fields9">
                            <input type="email" name="email" placeholder="exemple@email.com" required>
                        </div>
                    </div>

                    <div class="child-register-btn">
                        <span class="error-ms"></span>
                        <button type="submit" name="confirmer_commande">Confirmer la commande</button>
                    </div>
                    
                </form>
                <!-- FIN FORMULAIRE -->

            </div>

        </section>
        
        </div>

    </div>
          
</body>

<?php require_once './includes/footer.php'; ?>