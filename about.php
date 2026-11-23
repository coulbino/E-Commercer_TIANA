<?php 
  include_once('./includes/headerNav.php');
?>



<div class="overlay" data-overlay></div>
<!--
    - HEADER
  -->

<header>
  <!-- top head action, search etc in php -->
  <?php require_once './includes/topheadactions.php'; ?>

  <!-- desktop navigation -->
  <?php require_once './includes/desktopnav.php' ?>
  <!-- mobile nav in php -->
 <?php require_once './includes/mobilenav.php'; ?>
</header>

<!--
    - MAIN
  -->

<main>

  <div class="product-container">
    <div class="container">
      <!--
          - SIDEBAR
        -->
      <!-- CATEGORY SIDE BAR MOBILE MENU -->
      <?php require_once './includes/categorysidebar.php' ?>
      <!-- ############################# -->

      <div class="product-box">
        <!-- get id and url for each category and display its dat from table her in this secton -->
        <div class="product-main">

          <!--  -->
          <!-- about us section -->
          <div class="about-us">
            <div class="about-us-section">
              <!-- about us text -->
              <div class="about-us-content">
                <div class="about-us-text">
                  <h1 id="about-title" style="text-align: center;">À propos de nous !</h1>
                  <br>
                  <h2 style="text-align: center;">
                  Bienvenue sur <span id="about-title"><?php echo $_SESSION['web-name'];?></span>
                  </h2>
                  <p>
                    <strong id="about-title"> <?php echo $_SESSION['web-name']; ?></strong> est une plateforme e-commerce professionnelle. Nous vous proposons uniquement du contenu intéressant, que vous apprécierez beaucoup. Nous nous engageons à vous offrir le meilleur du e-commerce, en mettant l'accent sur la fiabilité et la vente en ligne. Nous travaillons à transformer notre passion pour le e-commerce en un site web florissant. Nous espérons que vous apprécierez notre boutique autant que nous aimons vous la présenter.
                  </p>
                  <p style="font-weight: bold; text-align: center;">
                    Merci de votre visite sur <strong id="about-title"> <?php echo $_SESSION['web-name']; ?></strong>
                    <br>
                    <br>
                    <span style="font-size: 16px; font-weight: bold; text-align: center;">
                      Bonne journée !
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!--  -->


        </div>
      </div>
    </div>
  </div>

  <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

  <!--
      - BLOG
    -->

</main>

<?php require_once './includes/footer.php'; ?>