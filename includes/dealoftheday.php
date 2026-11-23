<?php
         // Get all deals of the day
$deals_of_the_day = get_deal_of_day();
        ?>
        
        <!-- Deal of the day -->
        <div class="product-featured">
          <h2 class="title">Offre du jour</h2>

          <div class="showcase-wrapper has-scrollbar">
            <!-- display data from db -->
            <?php
            while ($row = mysqli_fetch_assoc($deals_of_the_day)) {
            ?>

              <div class="showcase-container">
                <div class="showcase">
                  <div class="showcase-banner">
                    <img src="./admin/upload/<?php echo $row['deal_image']; ?>" alt="shampoo, conditioner & facewash packs" class="showcase-img" />
                  </div>

                  <div class="showcase-content">
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <a href="./viewdetail.php?id=<?php echo $row['deal_id'] ?>&category=<?php echo "deal_of_day" ?>">
                      <h3 class="showcase-title">
                        <?php echo $row['deal_title']; ?>
                      </h3>
                    </a>

                    <p class="showcase-desc">
                      <?php echo $row['deal_description'] ?>
                    </p>

                    <div class="price-box">
                    <p class="price"><?php echo $row['deal_discounted_price'] ?> FCFA</p>
                    <del><?php echo $row['deal_net_price'] ?> FCFA</del>
                    </div>

                     <button class="add-cart-btn">Premium</button>

                    <div class="showcase-status">
                      <div class="wrapper">
                        <p>déjà vendus : <b><?php echo $row['sold_deal'] ?></b></p>

                        <p>disponibles : <b><?php echo $row['available_deal'] ?></b></p>
                      </div>

                      <div class="showcase-status-bar"></div>
                    </div>

                    <div class="countdown-box">
                      <p class="countdown-desc">Dépêchez-vous ! L'offre se termine dans :</p>

                      <div class="countdown">
                        <div class="countdown-content">
                          <p class="display-number">360</p>

                          <p class="display-text">Jours</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">24</p>
                          <p class="display-text">Heures</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">59</p>
                          <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">00</p>
                          <p class="display-text">Sec</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php
            }
            ?>
            <!--  -->
          </div>
        </div>