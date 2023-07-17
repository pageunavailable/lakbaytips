<?php
require '../php/db_connect.php';
$accid = $_SESSION['accid'];
#User
$statement = $db->prepare("SELECT lt_acc_id,
                                  lt_acc_usrnm,
                                  lt_acc_eml, 
                                  lt_acc_fn, 
                                  lt_acc_ln, 
                                  lt_acc_age, 
                                  lt_acc_bdate,
                                  lt_acc_cp,
                                  lt_acc_pfp
                                  FROM lt_usr_acc WHERE lt_acc_id = ?");
$statement->execute([$accid]);
#->fetch means fetch only one. Will not return array but instead entity
$user = $statement->fetch(PDO::FETCH_ASSOC);

#Carousel images
#Replace from with carousel table name
$statement = $db->prepare("SELECT lt_acc_id, 
                                  lt_acc_eml, 
                                  lt_acc_fn, 
                                  lt_acc_ln, 
                                  lt_acc_age, 
                                  lt_acc_bdate  
                                  FROM lt_usr_acc");
$statement->execute();
#fetchAll means it will return an array of entities from db
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
#listings = $results

#Delete this when querying from table
$listing = ["../assets/img/img-palawan.jpg", "../assets/img/Lakbay_Tips_2.0 logo_big.png"]

?>
<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/profile.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<body>
  <div class="profile-container">

    <div class="profilebox">
      <div class="profile-card-container">
        <div class="pfpCircle">
          <?php
          #If url will be used no need to base64_encode. Just pass the string url to the <img>
          $imageSrc = '../assets/img/StockProfile.png';
          if ($user['lt_acc_pfp']) {
            $imageData = base64_encode($user['lt_acc_pfp']);
            $imageSrc = "data:image/jpeg;base64, " . $imageData;
          }
          ?>
          <img src="<?= $imageSrc ?>" alt="">
        </div>
        <div class="profile-name-uname">
          <span class="text"><?= $user['lt_acc_usrnm'] ?> </span>
          <span class="sub-text">Name: <?= $user['lt_acc_fn'] ?> <?= $user['lt_acc_ln'] ?></span>
        </div>

        <div class="profile-info-container">
          <div class="profile-info">
            <Row>
              <span> <img src='../assets/icons/person-2-svgrepo-com.svg' alt=""> </span>
              <span>
                <p>Age: <?= $user['lt_acc_age'] ?> </p>
              </span>
              <span> <img src=" ../assets/icons/cake-svgrepo-com.svg"> </span>
              <span>
                <p>Birthdate <?= $user['lt_acc_bdate'] ?> </p>
              </span>
            </Row>

            <Row>
              <span> <img src=" ../assets/icons/email-1573-svgrepo-com.svg"> </span>
              <span>
                <p>Email <?= $user['lt_acc_eml'] ?> </p>
              </span>
              <span><img src=" ../assets/icons/telephone-svgrepo-com.svg"> </span>
              <span>
                <p>Mobile <?= $user['lt_acc_cp'] ?> </p>
              </span>
            </Row>


          </div>

        </div>
      </div>
      <!-- Button trigger modal -->
      <div class="profilebox-modal-btn">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Edit
        </button>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../html/update-profile-form.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" placeholder="First Name" value=<?= $user['lt_acc_fn'] ?>>
                </div>
                <div class="form-group">
                  <label for="first_name">Last Name</label>
                  <input type="text" name="last_name" placeholder="Last Name" value=<?= $user['lt_acc_ln'] ?>>
                </div>
                <div class="form-group">
                  <label for="first_name">Email</label>
                  <input type="email" name="email" placeholder="Email" value=<?= $user['lt_acc_eml'] ?>>
                </div>
                <div class="form-group">
                  <label for="first_name">Mobile Number</label>
                  <input type="number" name="mobile" placeholder="Mobile Number" value=<?= $user['lt_acc_cp'] ?>>
                </div>
                <div class="form-group">
                  <label for="first_name">Age</label>
                  <input age="number" name="age" value=<?= $user['lt_acc_age'] ?>>
                </div>
                <div class="form-group">
                  <label for="first_name">Birth Day</label>
                  <input type="date" name="birthdate" value="<?= $user['lt_acc_bdate'] ?>">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <div class="profilebox2">

      <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
          <?php
          for ($a = 0; $a < sizeof($listing); $a++) { ?>
            <?php
            if ($a == 0) { ?>
              <div class="carousel-item active">
              <?php } else { ?>
                <div class="carousel-item">
                <?php } ?>
                <img src="<?= $listing[$a] ?>" class="d-block " alt="...">
                </div>
          <?php
          }
          ?>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          </div>
        </div>

      </div>
</body>

<script>
  //No need to ajax since editing should submit form then reload page
</script>

</html>