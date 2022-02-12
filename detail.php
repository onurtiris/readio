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
            <form class="form" method="post" action="books.php">
              <div class="form-group  input-group input-group-outline mb-4 text-white">
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Access denied</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        You don't have permission to use this feature.
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
$book_id = htmlspecialchars($_GET['book_id']);
$query = $connection->query("SELECT * FROM books WHERE book_id = $book_id");
while ($result = $query->fetch_assoc()) { 
  $book_id = $result['book_id'];
  $review = $result['review'];
  $title = $result['title'];
  $author_id = $result['author_id'];
  ?>
  
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <section class="py-2">
      <section class="mt-5">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-12 mb-3">
              <div class="card move-on-hover card-background">
                <div class="full-background" style="background-image: url('<?php echo $result['image_url'];?>')" loading="lazy"></div>
                <div class="card-body">
                  <div class="content-left text-start my-auto py-4">
                  </div>
                  <div class="github-buttons mb-3">
                    <a href="#" target="_blank"
                    data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn bg-gradient-primary mb-5 mb-sm-0">Start</a>
                    <div class="github-button">
                      <span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-9 col-12 ">
              <h3 class="p-3 pb-0 pt-0 text-gradient text-primary mb-0"><?php echo $result['title'];?></h3>
              <h4 class="px-3">by <a class="font-weight-bold"><?php echo $result['author'];?></a></h4>
              <p class="p-3 pe-md-5 pb-0 mb-4">
                <?php echo $result['description'];?>
              </p>
              <div class="container">
                <div class="row">
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-copy opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>Total pages:</b><br><?php echo $result['total_pages'];?></p>
                    </div>
                  </div>
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-paperclip opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>Genre:</b><br><a href="books.php?search_genre=<?php echo $result['category']; ?>"><?php echo $result['category'];?></a></p>
                    </div>
                  </div>
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-star-half-alt opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>Rating:</b><br><?php echo $result['rating'];?>/5.0</p>
                    </div>
                  </div>
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-upload opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>Publisher:</b><br><a href="books.php?search_publisher=<?php echo $result['publisher']; ?>"><?php echo $result['publisher'];?></a></p>
                    </div>
                  </div>
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-calendar-alt opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>Year:</b><br><?php echo $result['year'];?></p>
                    </div>
                  </div>
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-globe-americas opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>Language:</b><br><?php echo $result['language'];?></p>
                    </div>
                  </div>
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-microphone opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>Audio:</b><br><?php echo $result['audio'];?></p>
                    </div>
                  </div>
                  <div class="move-on-hover col-md-3 p-3 info-horizontal">
                    <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                      <i class="fas fa-hashtag opacity-10"></i>
                    </div>
                    <div class="description ps-3">
                      <p class="mb-0"><b>ISBN:</b><br><?php echo $result['isbn'];?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>

    <hr style="background-color: #7b809a6e !important;" class="horizontal dark my-5">

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2">
              <h3>Reviews</h3>
              <h6 class="text-secondary font-weight-normal pe-3 mb-0">Reviews of magazines and public figures</h6>
            </div>
            <div class="col-lg-12 col-md-12 ">
              <div class="card bg-gradient-primary mb-3">
                <div class="card-body">
                  <div class="author align-items-center">
                    <div class="name">
                      <h6 class="text-white mb-0 font-weight-bolder">A reader of the <?php echo $title;?> book says;</h6>
                      <div class="stats text-white">
                        <i class="far fa-clock"></i> Long time ago
                      </div>
                    </div>
                  </div>
                  <p class="mt-4 text-white">"<?php echo $review;?>"</p>
                  <div class="rating mt-3">
                    <i class="fas fa-star text-white"></i>
                    <i class="fas fa-star text-white"></i>
                    <i class="fas fa-star text-white"></i>
                    <i class="fas fa-star text-white"></i>
                    <i class="fas fa-star text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2">
              <h3>Author</h3>
              <h6 class="text-secondary font-weight-normal pe-3 mb-0">Brief information about the author</h6>
            </div>
            <?php
            $query = $connection->query("SELECT * FROM authors WHERE author_id = $author_id");
            while ($result = $query->fetch_assoc()) { 
              $author_name = $result['first_name'];
              $author_surname = $result['last_name'];
              $author_country = $result['country'];
              $author_birth_date = $result['birth_date'];
              $author_description = $result['description'];
              $author_image_url = $result['author_image_url'];
              ?>

              <div class="col-lg-12 col-md-12 ">
               <div class="col-lg-12 col-12">
                <div class="card card-profile mt-4 mb-5">
                  <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-n5">
                      <a href="books.php?search_author=<?php echo $author_name;?>_<?php echo $author_surname;?>">
                        <div class="move-on-hover p-3 pe-md-0">
                          <img class="w-100 border-radius-md shadow-lg" src="<?php echo $author_image_url;?>" alt="image">
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                      <div class="card-body ps-lg-0">
                        <a href="books.php?search_author=<?php echo $author_name;?>_<?php echo $author_surname;?>"><h5 class="mb-0"><?php echo $author_name; ?> <?php echo $author_surname; ?></h5><a/>
                          <h6 class="text-secondary"><?php echo $author_birth_date;?>, <?php echo $author_country;?></h6>
                          <p class="mb-0"><?php echo_limit($author_description, 244); ?></p>
                        </div>
                      </div>
                      </div><?php } ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

        <?php }?>

        <hr style="background-color: #7b809a6e !important;" class="horizontal dark my-5">

        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2">
                <h3>Similar Books</h3>
                <h6 class="text-secondary font-weight-normal pe-3 mb-0">People who read this book also like these books</h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row">
                <?php 
                $book_id = htmlspecialchars($_GET['book_id']);
                $query = $connection->query("SELECT * FROM books WHERE book_id = $book_id");
                while ($result = $query->fetch_assoc()) { 
                  $category = $result['category'];
                }
                $query = $connection->query("SELECT * FROM books WHERE category = '$category' ORDER BY RAND() LIMIT 6");
                while ($result = $query->fetch_assoc()) { 
                  $title = $result['title'];
                  $author = $result['author'];
                  $image_url = $result['image_url'];
                  $book_id = $result['book_id'];
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
                    <a href="#" class="btn btn-twitter mb-0 me-2">
                      <i class="fab fa-twitter me-1"></i> Tweet
                    </a>
                    <a href="#" class="btn btn-facebook mb-0 me-2">
                      <i class="fab fa-facebook-square me-1"></i> Share
                    </a>
                    <a href="#" class="btn btn-pinterest mb-0 me-2">
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