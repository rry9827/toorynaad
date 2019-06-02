<?php

$alias=$_GET['alias'];

include 'includes/connection.php';


$qry="select * from events where alias='$alias';";
$event=mysqli_query($conn,$qry);
if ($event)
{
  $row = mysqli_fetch_assoc($event);
?>

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
     <title>तूर्यनाद|प्रतियोगिताए|<?php echo $row['title'];?></title>
     <style>
body{
 background: white;
 color: black;
}
.header{
 position: relative;
 background: #212529;
}
.event {
    padding: 100px 0px;
}
.event-i-data p {
    font-size: 17px;
    font-weight: 600;
}
.tab-content {
    height: 228px;
}
.event-i-data h3 {
  font-size: 27px;
  margin-left: 20px;
}
blockquote{
  border-left: 5px solid #686262fa;
}
.event-i-data {
    padding: 20px;
    background: #cfcdcd82;
}
img.img-responsive {
    margin-top: 30px;
}
.event .row{
      background: #0000000f;
}
ul.nav.nav-tabs {
    margin-bottom: 20px;
    border-bottom: 2px solid black;
}
.tabs-section h4 {
    font-size: 27px;
    margin-top: 30px;
    font-weight: 600;
    margin-bottom: 30px;
}
ul.nav.nav-tabs li a {
    font-size: 16px;
    color: black;
    font-weight: 900;
}
ul.nav.nav-tabs li.active a {
    background: #e9e5e5;
}
.tab-content li {
    list-style-type: gujarati;
    padding-left: 10px;
    font-size: 15px;
    padding-bottom: 5px;
    font-weight: 600;
}
@media (max-width: 991px){
  .tab-content {
      height: auto;
  }
  .event{
      padding:0px;
  }
}
     </style>
   </head>
   <body>
     <?php include 'includes/header.php'; ?>

        <div class="event">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img class="img-responsive" src="images/<?php echo $row['alias']; ?>.jpg" alt="<?php echo $row['title']; ?>">
              </div>
              <div class="event-i-data col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3><?php echo $row['title']?></h3>
                <blockquote><?php echo $row['tagline']?></blockquote>
                <p><?php echo $row['description']?></p>
              </div>
            </div>
          </div>
              <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                  <div class="tabs-section">
                  <h4>तूर्यनाद'18</h4>


                  <?php

                    $rules = $row['rules'];
                   if (!empty($rules)) {
                       $rules =  explode('@@', $rules);
                       $first_round_rules= explode('**', $rules[0]);
                       $second_round_rules = null;
                       $third_round_rules = null;
                       if (!empty($rules[1])) {
                           $second_round_rules= explode('**', $rules[1]);
                       }
                       if (!empty($rules[2])) {
                           $third_round_rules= explode('**', $rules[2]);
                       }

                        ?>

    <ul class="nav nav-tabs">
<?php
        switch ($row['alias']) {
            case 'paridhanika':
            $first_round = 'प्रथम  चरण (ऑनलाइन ) ';
            break;
            case 'kavi':
            $first_round = 'प्रथम  चरण(ऑनलाइन ) ';
            break;

            default:
            $first_round = 'प्रथम  चरण';
            break;
        } ?>
    <li class="active"><a href="#f_round"  data-toggle="tab" ><?php echo $first_round; ?></a></li>


    <?php if (!empty($second_round_rules)) {
            switch ($row['alias']) {
            case 'paridhanika':
            $second_round = 'अंतिम  चरण ';
            break;
            case 'kavi':
            $second_round = 'अंतिम  चरण ';
            break;
            default:
            $second_round = 'द्वितीय चरण';
            break;
        } ?>


            <li class><a href="#s_round"  data-toggle="tab" > <?php echo $second_round; ?></a></li>
<?php } ?>
            <?php if (!empty($third_round_rules)) { ?>
            <li class><a href="#t_round"  data-toggle="tab" >तृतीय चरण</a></li>
<?php } ?>


  </ul>

  <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane fade in active" id="f_round">
                  <ul>
        <?php foreach ($first_round_rules as $key => $value) {
                     if (!empty($value)) {?>
                <li><?php echo $value; ?></li>
<?php } } ?>
                </ul>
              </div>

          <?php if (!empty($second_round_rules)) { ?>
                <div class="tab-pane fade" id="s_round">
                <ul>
                <?php foreach ($second_round_rules as $key => $value) {
                    if (!empty($value)) {?>
                <li><?php echo $value; ?></li>
<?php } } ?>
              </ul>

<?php } ?>
                </div>
            <?php if (!empty($third_round_rules)) {?>
                <div class="tab-pane fade" id="t_round">
            <ul>
                <?php
                foreach ($third_round_rules as $key => $value) {
                      if (!empty($value)) { ?>
                <li><?php echo $value; ?></li>
<?php }  } ?>
            </ul>
<?php } ?>
                          </div>
                        </div>
                      </div>
<?php } ?>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>


     <?php include 'includes/footer.php'; ?>
   </body>
 </html>
<?php
}
?>
