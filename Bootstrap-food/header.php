<header class="fixed-top page-header">
          <nav class="navbar navbar-expand-lg navbar-light" id="navbar" style="padding: 0;">
            <div class="container-fluid">
              <a class="navbar-brand flex-grow-1" href="index.php">
                <div class="logo-bar" data-aos="fade-up"data-aos-duration="1000">
                  <img src="image/output-onlinepngtools.png">
                </div>
              </a>
              <div class="navbar-nav pr-5">
                  <a href="cart.php" class="navbar-brand flex-grow-1 nav-link active">
                    <h5 class="px-5 cart" style="border:none; display:inline;background:initial">
                      <i class="fas fa-shopping-cart"></i>
                      <?php

                      if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<span id=\"cart-count\" class=\"text-danger bg-light\">$count</span>";
                      }else{
                        echo "<span id=\"cart-count\" class=\"text-danger bg-light\">0</span>";
                      }

                      ?>
                    </h5>
                  </a>
                </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                    </button>
              <div class="collapse navbar-collapse justify-content-md-between" id="navbarNav">
                <ul class="navbar-nav ">
                  <li class="nav-item">
                    <a class="nav-link link-dark" href="linkpage/foodlink1.html">Food</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link link-dark" href="#featured-destinations">Sweet</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link link-dark" href="#popular-destinations">Beer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link link-dark" href="#request-quote">Contact me</a>
                  </li>
                </ul>
              <div class="collapse navbar-collapse py-3" id="navbarNav">

                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success btn-light" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
      </header>
