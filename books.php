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
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
      <a class="navbar-brand  text-white " href="index.php"
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
  <div class="page-header min-vh-45" style="background-image: url('assets/img/bg9.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center mx-auto my-auto">
          <div class="p-4 container">
            <?php 
            $query=$connection->query('SELECT COUNT(*) FROM books;');
            $count=$query->fetch_array(MYSQLI_NUM); 
            ?>
            <h1 class="text-white">Discover our <?php echo $count[0];?>+ books</h1>
            <p class="lead mb-4 text-white opacity-8">Browse, read and listen to all audiobooks</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
  <div class="container mt-sm-5">
    <div class="col-lg-12">
      <div class="mt-lg-0 mt-5 ps-2">
        <h3>Books</h3>
        <?php
        if ($_POST) {
          $search_value = $_POST['search_value'];
          $genres = $_POST['genres']; ?>
          <h6 class="text-secondary font-weight-normal pe-3 mb-0">Search results for <?php
          if(empty($genres)){ $genres = 'All';}
          if(empty($search_value) && empty($genres)){ echo "<b class='text-primary'>all books</b>"; } else { if(!empty($search_value)){ echo "<b class='text-primary'>'$search_value'</b> in the <b class='text-primary'>"; } else { echo " <b class='text-primary'>"; } echo strtolower($genres); echo " genre</b>"; } ?></h6><?php }
          else { ?>
            <h6 class="text-secondary font-weight-normal pe-3 mb-0">Search results for <b class="text-primary">all books</b></h6> <?php } ?>
          </div>
        </div>

        <hr style="background-color: #7b809a6e !important;" class="horizontal dark my-5">

        <div class="row">
          <div class="col-lg-3">
            <div class="position-sticky pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2 pe-3" style="top: 100px">
              <h3 style="font-size:1.5em;">Search</h3>
              <form method="post" action="">
                <div class="input-group input-group-static my-3">
                  <label>Title, author or ISBN</label>
                  <input name="search_value" type="text" class="form-control">
                </div>
                <div class="input-group input-group-static mb-4">
                 <label for="exampleFormControlSelect1" class="ms-0">Genres</label>
                 <select name="genres" class="form-control" id="exampleFormControlSelect1">
                   <option selected>All</option>
                   <option>Classics</option>
                   <option>Dystopian</option>
                   <option>Fantasy</option>
                   <option>Fiction</option>
                   <option>Historical</option>
                   <option>Nonfiction</option>
                   <option>Romance</option>
                   <option>Childrens</option>
                 </select>
               </div>
               <div class="form-check ps-0">
                <input class="form-check-input" name="audiobooks" type="checkbox" value="" id="fcustomCheck1">
                <label class="custom-control-label">Audiobooks only</label>
              </div>
              <div class="form-check px-0">
                <input class="btn bg-gradient-primary btn-block w-100 my-3 mb-2" style="border-radius: 22px;" type="submit" value="Search">
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">
            <?php 
            $search_value = $_POST['search_value'];  
            if ($_POST) {
              $search_value = $_POST['search_value'];
              if(empty($_POST['genres'])){ $genres='All'; }
            }
            else{
              $search_value = htmlspecialchars($_GET['search_value']);
              $genres = htmlspecialchars($_GET['genres']);
            }
            if(empty($search_value) && empty($genres) && !isset($_POST['audiobooks'])){
              $query = $connection->query("SELECT * FROM books");
            }
            else{
              if($genres=='All'){
                if(isset($_POST['audiobooks'])){ $query = $connection->query("SELECT * FROM books WHERE audio = 'Yes' AND (title LIKE '%$search_value%' OR author LIKE '%$search_value%' OR isbn LIKE '%$search_value%')");}
                else { $query = $connection->query("SELECT * FROM books WHERE title LIKE '%$search_value%' OR author LIKE '%$search_value%' OR isbn LIKE '%$search_value%'");}
              }
              else{
                if(isset($_POST['audiobooks'])){ $query = $connection->query("SELECT * FROM books WHERE audio = 'Yes' AND (category='$genres' AND (title LIKE '%$search_value%' OR author LIKE '%$search_value%' OR isbn LIKE '%$search_value%'))"); }
                else { $query = $connection->query("SELECT * FROM books WHERE category='$genres' AND (title LIKE '%$search_value%' OR author LIKE '%$search_value%' OR isbn LIKE '%$search_value%')"); }                  
              }
            }
            if(htmlspecialchars($_GET['classics'] == 'best') && !$_POST){ $query = $connection->query("SELECT * FROM books WHERE category='Classics' ORDER BY rating DESC");}
            if(htmlspecialchars($_GET['audio'] == 'yes') && !$_POST){ $query = $connection->query("SELECT * FROM books WHERE audio = 'Yes'");}
            if(htmlspecialchars($_GET['new'] == 'releases') && !$_POST){ $query = $connection->query("SELECT * FROM books ORDER BY year DESC");}
            if(htmlspecialchars($_GET['high'] == 'rated') && !$_POST){ $query = $connection->query("SELECT * FROM books ORDER BY rating DESC");}
            if(htmlspecialchars($_GET['language'] == 'foreign') && !$_POST){ $query = $connection->query("SELECT * FROM books EXCEPT SELECT * FROM books WHERE language = 'English'");}
            $search_author = htmlspecialchars($_GET['search_author']);                                   
            if(!empty($search_author) && !$_POST){ $query = $connection->query("SELECT * FROM books WHERE author LIKE '%$search_author%'");}
            $search_genre = htmlspecialchars($_GET['search_genre']);
            if(!empty($search_genre) && !$_POST){ $query = $connection->query("SELECT * FROM books WHERE category LIKE '%$search_genre%'");}
            $search_publisher = htmlspecialchars($_GET['search_publisher']);
            if(!empty($search_publisher) && !$_POST){ $query = $connection->query("SELECT * FROM books WHERE publisher LIKE '%$search_publisher%'");}            
            while ($result = $query->fetch_assoc()) { 
              $result_book_id = $result['book_id'];
              $result_title = $result['title'];
              $result_author = $result['author'];
              $result_image_url = $result['image_url'];
              $result_audio = $result['audio'];
              ?>   
              <div class="col-md-2 mt-md-0 mt-4">
                <a href="detail.php?book_id=<?php echo $result_book_id;?>">
                  <div class="card shadow-lg move-on-hover min-height-160 min-height-160">
                    <?php if($result_audio=="Yes"){ ?>
                      <div class="position-absolute top-0 end-0 p-2 z-index-1">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g id="lock-black" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">   
                          </g>
                        </svg>
                        <i class="bg-pink bg-gradient rounded-circle btn-outline-white material-icons p-1">mic</i>
                      </div>
                    <?php }?>
                    <img class="w-100 my-auto" src="<?php echo $result_image_url;?>" alt="hero">
                  </div>
                  <div class="mt-2 ms-2">
                    <h6 class="mb-0"><?php echo $result_title;?></h6>
                    <p class="text-secondary text-sm"><?php echo $result_author;?></p>
                  </div>
                </a>
                </div><?php }?>
              </div>
            </div>
          </div>
        </div>

        <hr style="background-color: #7b809a6e !important;" class="horizontal dark my-5">

        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pb-lg-5 px-2 pb-3 mt-lg-0 mt-5 ps-2">
                <h3>Editor's Choice</h3>
                <h6 class="text-secondary font-weight-normal pe-3 mb-0">Beautiful books that you must read</h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row">
                <?php 
                $query = $connection->query("SELECT * FROM books ORDER BY RAND() LIMIT 6");
                while ($result = $query->fetch_assoc()) { 
                  $book_id = $result['book_id'];
                  $title = $result['title'];
                  $author = $result['author'];
                  $image_url = $result['image_url'];
                  $audio = $result['audio'];
                  ?>   
                  <div class="col-md-2 mt-md-0 mt-4">
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
                        <img class="w-100 my-auto" src="<?php echo $image_url;?>" alt="features">
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

            <div class="mb-5">
              <div class="container">
                <div class="row">
                  <div class="col-lg-5 ms-auto">
                    <h4 class="mb-1">Thanks for choosing us!</h4>
                    <p class="lead mb-0">You can support us by sharing on social media</p>
                  </div>
                  <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-end mt-5">
                    <a href="#" class="btn btn-twitter mb-0 me-2" target="_blank">
                      <i class="fab fa-twitter me-1"></i> Tweet
                    </a>
                    <a href="#" class="btn btn-facebook mb-0 me-2" target="_blank">
                      <i class="fab fa-facebook-square me-1"></i> Share
                    </a>
                    <a href="#" class="btn btn-pinterest mb-0 me-2" target="_blank">
                      <i class="fab fa-pinterest me-1"></i> Pin it
                    </a>
                  </div>
                </div>
              </div>
            </div>
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
</body>

</html>