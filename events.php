<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.jpg" type="image/jpg" size="16x16";>
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
    <?php echo "<link rel='stylesheet' href='css/bootstrap.css'>";?>
    <?php echo "<link rel='stylesheet' href='css/footer.css'>";?>
     <?php echo "<link rel='stylesheet' href='css/header.css'>";?>
     <title>तूर्यनाद|प्रतियोगिताएँ</title>
     <style>
     body{
       font-family: 'Hind', sans-serif;
     }
     h1,h2,h3,h4{
       font-family: 'Hind', sans-serif;
     }
     .event{
       background: #212529;
       padding: 200px 0px 100px 0px;
     }
     .footer-section {
    padding-top: 56px;
    border-top: 1px solid #ffffff1c;
    }

    a:hover, a:focus {
      color: #f5ba4b;
    text-decoration: none;
    }
    .event-data{
      text-align: center;
    }
    .event-data:hover img {
    box-shadow: 0px 0px 18px #767474;
}
.event-data img {
  transition: all 0.3s ease-in-out;
}
    .event-data:hover a{
      color: #f5ba4b;
    }
    a {
    color: white;
    font-size: 23px;
    text-decoration: none;
    transition: all 0.3s linear;
}

     </style>
  </head>
  <body>
    <?php include 'includes/header.php';
          include 'includes/connection.php';
    $qry="select alias,title from events;";
    $event=mysqli_query($conn,$qry);
    ?>

      <div class="event">
        <div class="bg-triangle bg-triangle-light bg-triangle-top bg-triangle-left"></div>
        <div class="bg-triangle bg-triangle-light bg-triangle-top bg-triangle-right"></div>
      <div class="container">
        <div class="row">

  <?php    if (mysqli_num_rows($event) > 0)
    while($row = mysqli_fetch_assoc($event)) {
      ?>

          <div class="col-lg-3">
            <div class="event-data">
                <a href="events-i.php?alias=<?php echo $row['alias']; ?>"><img class="img-responsive" src="images/posters/<?php echo $row['alias']; ?>.jpg" alt="<?php echo $row['title']; ?>"></a>
                <h1> <a href="events-i.php?alias=<?php echo $row['alias']; ?>"><?php echo $row['title']; ?></a> </h1>
            </div>
          </div>


<?php
}
?>
</div>
</div>
</div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
