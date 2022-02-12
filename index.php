<?php
include_once "settings.php";
?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>Readio.live</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="about-us bg-gray-200">
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
    <div class="container">
      <a class="navbar-brand text-white" href="index.php"
      rel="tooltip" title="Readio" data-placement="bottom">
      Readio.live
      </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item dropdown dropdown-hover ">
          <a href="index.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
            <i class="material-icons opacity-6 me-2 text-md">home</i>
            Homepage
          </a>
        </li>
        <li class="nav-item dropdown dropdown-hover ">
          <a href="books.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
            <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
            All Books
          </a>
        </li>
        <li class="nav-item my-auto ms-2">
          <a href="#" class="btn btn-sm  bg-white  mb-0 me-1 mt-2 mt-md-0">Membership</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<header class="bg-gradient-dark">
  <div class="page-header min-vh-75" style="background-image: url('assets/img/bg9.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center mx-auto my-auto">
          <?php 
          $query=$connection->query('SELECT COUNT(*) FROM books;');
          $count=$query->fetch_array(MYSQLI_NUM); 
          ?>
          <h1 class="text-white">Discover our <?php echo $count[0];?>+ books</h1>
          <p class="lead mb-4 text-white opacity-8">Browse, read and listen to all audiobooks</p>
          <div class="p-4 container">
            <form class="form" method="post" action="books.php">
              <div class="form-group mb-2 input-group input-group-outline mb-4 text-white">
                <label class="form-label text-white">Search by title, author or keyword</label>
                <input type="text" name="search_value" class="bs-white form-control text-white">
              </div>
              <div class="form-group mx-sm-2  input-group-static mb-4">
                <button type="submit" class="btn bg-white text-dark">Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
  <section class="pt-5 mb-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-2 col-md-12 col-12 mb-3">
          <a href="books.php?high=rated">
            <div style="height: 13.5em !important;" class="card card-background card-background-mask-dark cursor-pointer move-on-hover">
              <div class="full-background" style="min-height: 100px !important; background-image: url('assets/img/cover/a1.png')" loading="lazy"></div>
              <div class="card-body">
                <div class="content-left text-start my-auto py-3 mt-3">
                  <div class="small-4 medium-4 large-4 columns text-center mb-3">
                    <i class="rounded-circle btn-outline-white material-icons p-3">star</i>
                  </div>
                  <h3 style="font-size:1.375rem;" class="card-title text-white text-center">High Rated</h3>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-12 col-12 mb-3">
          <a href="books.php?new=releases">
            <div style="height: 13.5em !important;" class="card card-background card-background-mask-dark cursor-pointer move-on-hover">
              <div class="full-background" style="min-height: 130px !important; background-image: url('assets/img/cover/a2.png')" loading="lazy"></div>
              <div class="card-body">
                <div class="content-left text-start my-auto py-3 mt-3">
                  <div class="small-4 medium-4 large-4 columns text-center mb-3">
                    <i class="rounded-circle btn-outline-white material-icons p-3">autorenew</i>
                  </div>
                  <h3 style="font-size:1.375rem;" class="card-title text-white text-center">New Releases</h3>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-12 col-12 mb-3">
          <a href="books.php?classics=best">
            <div style="height: 13.5em !important;" class="card card-background card-background-mask-dark cursor-pointer move-on-hover">
              <div class="full-background" style="min-height: 130px !important; background-image: url('assets/img/cover/a3.png')" loading="lazy"></div>
              <div class="card-body">
                <div class="content-left text-start my-auto py-3 mt-3">
                  <div class="small-4 medium-4 large-4 columns text-center mb-3">
                    <i class="rounded-circle btn-outline-white material-icons p-3">group</i>
                  </div>
                  <h3 style="font-size:1.375rem;" class="card-title text-white text-center">Best Classics</h3>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-12 col-12 mb-3">
          <a href="books.php?language=foreign">
            <div style="height: 13.5em !important;" class="card card-background card-background-mask-dark cursor-pointer move-on-hover">
              <div class="full-background" style="min-height: 130px !important; background-image: url('assets/img/cover/a4.png')" loading="lazy"></div>
              <div class="card-body">
                <div class="content-left text-start my-auto py-3 mt-3">
                  <div class="small-4 medium-4 large-4 columns text-center mb-3">
                    <i class="rounded-circle btn-outline-white material-icons p-3">public</i>
                  </div>
                  <h3 style="font-size:1.375rem;" class="card-title text-white text-center">Foreign Languages</h3>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-12 col-12 mb-3">
          <a href="books.php?audio=yes">
            <div style="height: 13.5em !important;" class="card card-background card-background-mask-dark cursor-pointer move-on-hover">
              <div class="full-background" style="min-height: 130px !important; background-image: url('assets/img/cover/a5.png')" loading="lazy"></div>
              <div class="card-body">
                <div class="content-left text-start my-auto py-3 mt-3">
                  <div class="small-4 medium-4 large-4 columns text-center mb-3">
                    <i class="rounded-circle btn-outline-white material-icons p-3">mic</i>
                  </div>
                  <h3 style="font-size:1.375rem;" class="card-title text-white text-center">Audio Books</h3>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-12 col-12 mb-3">
          <a href="books.php">
            <div style="height: 13.5em !important;" class="card card-background card-background-mask-dark cursor-pointer move-on-hover">
              <div class="full-background" style="min-height: 130px !important; background-image: url('assets/img/cover/a6.png')" loading="lazy"></div>
              <div class="card-body">
                <div class="content-left text-start my-auto py-3 mt-3">
                  <div class="small-4 medium-4 large-4 columns text-center mb-3">
                    <i class="rounded-circle btn-outline-white material-icons p-3">book</i>
                  </div>
                  <h3 style="font-size:1.375rem;" class="card-title text-white text-center">All Genres</h3>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <hr style="background-color: #7b809a6e !important;" class="horizontal dark my-5">

  <div class="container mt-sm-3">
    <div class="row">
      <div class="col-lg-3">
        <div class="position-sticky pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2" style="top: 100px">
          <h3>Editor's Choice</h3>
          <h6 class="text-secondary font-weight-normal pe-3">Beautiful books that you must read</h6>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <?php 
          $query = $connection->query("SELECT * FROM books ORDER BY RAND() LIMIT 16");
          while ($result = $query->fetch_assoc()) { 
            $book_id = $result['book_id'];
            $title = $result['title'];
            $author = $result['author'];
            $image_url = $result['image_url'];
            $audio = $result['audio'];
            ?>   
            <div class="col-md-3 mt-md-0 mt-4">
              <a href="detail.php?book_id=<?php echo $book_id;?>">
                <div class="card shadow-lg move-on-hover min-height-160 min-height-160">
                  <?php if($audio=="Yes"){ ?>
                    <div class="position-absolute top-0 end-0 p-2 z-index-1">
                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="lock-black" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">   
                        </g>
                      </svg>
                      <i class="bg-pink bg-gradient rounded-circle btn-outline-white material-icons p-1">mic</i>
                    </div>
                  <?php }?>
                  <img class="w-100 my-auto" src="<?php echo $image_url;?>" alt="hero">
                </div>
                <div class="mt-2 ms-2">
                  <h6 class="mb-0"><?php echo $title;?></h6>
                  <p class="text-secondary text-sm"><?php echo $author;?></p>
                </div>
              </a>
              </div><?php }?>
            </div>
          </div>
        </div>
      </div>

      <hr style="background-color: #7b809a6e !important;" class="horizontal dark my-5">

      <section class="pb-4" id="count-stats">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 mx-auto">
              <div class="row">
                <div class="col-md-4 position-relative">
                  <div class="p-3 text-center">
                    <?php 
                    $query=$connection->query('SELECT COUNT(*) FROM authors;');
                    $count=$query->fetch_array(MYSQLI_NUM); 
                    ?>
                    <h1 class="text-gradient text-primary"><span id="state1" countTo="<?php echo $count[0]; ?>">0</span></h1>
                    <h5 class="mt-3">Authors</h5>
                    <p class="text-sm font-weight-normal">Authors from the past to the present</p>
                  </div>
                  <hr class="vertical dark">
                </div>
                <div class="col-md-4 position-relative">
                  <div class="p-3 text-center">
                    <?php 
                    $query=$connection->query('SELECT COUNT(*) FROM books;');
                    $count=$query->fetch_array(MYSQLI_NUM); 
                    ?>
                    <h1 class="text-gradient text-primary"> <span id="state2" countTo="<?php echo $count[0]; ?>">0</span>+</h1>
                    <h5 class="mt-3">Books</h5>
                    <p class="text-sm font-weight-normal">Rich database of written and audio books</p>
                  </div>
                  <hr class="vertical dark">
                </div>
                <div class="col-md-4">
                  <div class="p-3 text-center">
                    <?php 
                    $query=$connection->query('SELECT COUNT(DISTINCT category) FROM books;');
                    $count=$query->fetch_array(MYSQLI_NUM); 
                    ?>
                    <h1 class="text-gradient text-primary" id="state3" countTo="<?php echo $count[0]; ?>">0</h1>
                    <h5 class="mt-3">Genres</h5>
                    <p class="text-sm font-weight-normal">Important and basic categories</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <hr style="background-color: #7b809a6e !important;" class="horizontal dark my-5">

      <section class="pb-5 position-relative bg-gradient-dark mx-n3">
        <div class="container">
          <div class="row">
            <div class="col-md-8 text-start mb-5 mt-5">
              <h3 class="text-white z-index-1 position-relative">The Best Authors</h3>
              <p class="text-white opacity-8 mb-0">The best authors ever for us</p>
            </div>
          </div>
          <div class="row">
            <?php 
            $query = $connection->query("SELECT * FROM authors ORDER BY RAND() LIMIT 4");
            while ($result = $query->fetch_assoc()) { 
              $author_id = $result['author_id'];
              $first_name = $result['first_name'];
              $last_name = $result['last_name'];
              $birth_date = $result['birth_date'];
              $country = $result['country'];
              $author_image_url = $result['author_image_url'];
              $description = $result['description'];
              ?>   
              <div class="col-lg-6 col-12">
                <div class="card card-profile mt-4 mb-5">
                  <div class="row">
                    <div class="move-on-hover col-lg-4 col-md-6 col-12 mt-n5">
                      <a href="books.php?search_author=<?php echo $first_name;?>_<?php echo $last_name;?>">
                        <div class="p-3 pe-md-0">
                          <img class="w-100 border-radius-md shadow-lg" src="<?php echo $author_image_url;?>" alt="image">
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                      <div class="card-body ps-lg-0">
                        <a href="books.php?search_author=<?php echo $first_name;?>_<?php echo $last_name;?>"><h5 class="mb-0"><?php echo $first_name;?> <?php echo $last_name;?></h5></a>
                        <h6 class="text-primary"><?php echo $birth_date;?>, <?php echo $country;?></h6>
                        <p class="mb-0"><?php echo_limit($description, 100); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                </div><?php }?>
              </div>
            </div>
          </section>

          <section class="my-5 pt-5">
            <div class="container">
              <div class="row">
                <div class="col-md-6 m-auto">
                  <h4>Join our newsletter</h4>
                  <p class="mb-4">
                    Don't miss out! Enter your email to subscribe to updates.
                  </p>
                  <div class="row">
                    <div class="col-8">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control mb-sm-0">
                      </div>
                    </div>
                    <div class="col-4 ps-0">
                      <button type="button" class="btn bg-gradient-info mb-0 h-100 position-relative z-index-2">Subscribe</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 ms-auto">
                  <div class="position-relative">
                    <img class="max-width-50 w-100 position-relative z-index-2" src="assets/img/books.png" alt="image">
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <footer class="footer pt-5 mt-5">
          <div class="container">
            <div class=" row">
              <div class="col-md-3 mb-4 ms-auto">
                <div>
                  <a href="index.php">
                    <img src="assets/img/logo-ct-dark.png" class="mb-3 footer-logo" alt="main_logo">
                  </a>
                  <h6 class="font-weight-bolder mb-4">Readio.live</h6>
                </div>
                <div>
                  <ul class="d-flex flex-row ms-n3 nav">
                    <li class="nav-item">
                      <a class="nav-link pe-1" href="#">
                        <i class="fab fa-facebook text-lg opacity-8"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pe-1" href="#">
                        <i class="fab fa-twitter text-lg opacity-8"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pe-1" href="#">
                        <i class="fab fa-dribbble text-lg opacity-8"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pe-1" href="https://github.com/onurtiris" target="_blank">
                        <i class="fab fa-github text-lg opacity-8"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pe-1" href="#">
                        <i class="fab fa-youtube text-lg opacity-8"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2 col-sm-6 col-6 mb-4">
                <div>
                  <h6 class="text-sm">Company</h6>
                  <ul class="flex-column ms-n3 nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        About Us
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        Blog
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2 col-sm-6 col-6 mb-4">
                <div>
                  <h6 class="text-sm">Resources</h6>
                  <ul class="flex-column ms-n3 nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        Illustrations
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        Site Map
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2 col-sm-6 col-6 mb-4">
                <div>
                  <h6 class="text-sm">Help & Support</h6>
                  <ul class="flex-column ms-n3 nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        Contact Us
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        Sponsorships
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                <div>
                  <h6 class="text-sm">Legal</h6>
                  <ul class="flex-column ms-n3 nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        Terms & Conditions
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        Privacy Policy
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-12">
                <div class="text-center">
                  <p class="text-dark my-4 text-sm font-weight-normal">
                    All rights reserved. Copyright © <script>
                      document.write(new Date().getFullYear())
                    </script> Developed by <a href="https://github.com/onurtiris" target="_blank">Onur Tiriş</a>.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
        <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="assets/js/plugins/countup.min.js"></script>
        <script src="assets/js/plugins/parallax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
        <script src="assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
        <script>

    var element = document.getElementById('count-stats');
    var elementHeight = element.clientHeight;
    document.addEventListener('scroll', animate);

    function inView() {
      var windowHeight = window.innerHeight;
      var scrollY = window.scrollY || window.pageYOffset;
      var scrollPosition = scrollY + windowHeight;
      var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

      if (scrollPosition > elementPosition) {
        return true;
      }

      return false;
    }

    var animateComplete = true;
    function animate() {

      if (inView()) {
        if (animateComplete) {
          if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
              countUp.start();
            } else {
              console.error(countUp.error);
            }
          }
          if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
              countUp1.start();
            } else {
              console.error(countUp1.error);
            }
          }
          if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
              countUp2.start();
            } else {
              console.error(countUp2.error);
            };
          }
          animateComplete = false;
        }
      }
    }

    if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 90,
        backSpeed: 90,
        backDelay: 200,
        startDelay: 500,
        loop: true
      });
    }
  </script>
  <script>
    if (document.getElementsByClassName('page-header')) {
      window.onscroll = debounce(function() {
        var scrollPosition = window.pageYOffset;
        var bgParallax = document.querySelector('.page-header');
        var oVal = (window.scrollY / 3);
        bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
      }, 6);
    }
  </script>
  
  <?php
  function echo_limit($x, $length)
  {
    if(strlen($x)<=$length)
    {
      echo $x;
    }
    else
    {
      $y=substr($x,0,$length) . '...';
      echo $y;
    }
  }
  ?>
</body>

</html>