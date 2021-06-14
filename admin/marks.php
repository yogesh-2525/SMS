<?php require_once 'db_con.php';?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container"><br>
          <h1 class="text-center">Welcome to Student Management System!</h1><br>
          <div class="row">
            <div class="col-md-6">
                <form method="POST">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Roll No.</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $query_fetch = "SELECT name, roll, class FROM students";
                            $result = mysqli_query($db_con, $query_fetch);
                            while($row = mysqli_fetch_assoc($result)){ ?>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['roll'] ?></td>
                                <td><?php echo $row['class'] ?></td>
                                <td><a href="marks.php?submit&roll='<?php echo $row['roll'] ?>'" class="btn btn-sm btn-primary" type="submit">Marks</a></td>
                                </tr>
                    <?php   }
                            ?>
                    </tbody>
                </table>
                </form>
            </div>
          </div>
        <br>
        <?php if (isset($_GET['submit'])) {
         $roll = $_GET['roll'];
    if (!empty($roll)) {
        $query = "SELECT * FROM `students` WHERE `roll`= $roll";
        $result = mysqli_query($db_con, $query);
        if (!empty($row = mysqli_fetch_array($result))) {
            if ($row['roll'] !== '') {
                $stroll = $row['roll'];
                $stname = $row['name'];
                $stclass = $row['class'];
                $city = $row['city'];
                $photo = $row['photo'];
                $pcontact = $row['pcontact'];
                ?>
        <div class="row">
          <!-- offset-sm-3 -->
          <div class="col-sm-9 m-auto">
            <table class="table table-bordered">
              <tr>
                <td rowspan="5"><h3>Student Info</h3><img class="img-thumbnail" src="admin/images/<?=isset($photo) ? $photo : '';?>" width="250px"></td>
                <td>Name</td>
                <td><?=isset($stname) ? $stname : '';?></td>
              </tr>
              <tr>
                <td>Roll</td>
                <td><?=isset($stroll) ? $stroll : '';?></td>
              </tr>
              <tr>
                <td>Class</td>
                <td><?=isset($stclass) ? $stclass : '';?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?=isset($city) ? $city : '';?></td>
              </tr>
              <tr>
                <td>Contact</td>
                <td><?=isset($pcontact) ? $pcontact : '';?></td>
              </tr>
              <tr>
                <td>Subjects</td>
                <td>Marks Obtained</td>
                <td>Out Of</td>
              </tr>
              <tr>
                <?php
                $query = "SELECT * FROM classes WHERE standard = '$stclass';";
                $result = mysqli_query($db_con, $query);
                $sub = mysqli_fetch_assoc($result);
                  $subj_1 = $sub['lang_1'];
                  $subj_2 = $sub['lang_2'];
                  $subj_3 = $sub['lang_3'];?>
                  <td>
                  <?php echo ucwords($subj_1) . '<br>' ?>
                  <?php echo ucwords($subj_2) . '<br>' ?>
                  <?php echo ucwords($subj_3) . '<br>' ?>
                  </td>
                  <?php
                  $query = "SELECT {$subj_1},{$subj_2},{$subj_3} FROM marks WHERE name = '$stname';";
                  $result = mysqli_query($db_con, $query);
                  $assoc = mysqli_fetch_assoc($result);
                  $out = (implode('<br>',$assoc));?>
                <td>
                  <?php echo $out; ?>                  
                </td>
                <td>100<br>100<br>100<br></td>
              </tr>
              <tr>
                <td>Total</td>
                <td><?php echo $sum = array_sum($assoc); ?></td>
                <td>300</td>
              </tr>
            </table>
            <div class="bg-danger">
              <?php
              if($sum < 100 /2 ){
                echo '
                <div class="alert alert-danger" role="alert">
                You cannot be promoted!
                </div>
                ';
              }else{
                echo '
                <div class="alert alert-success" role="alert">
                You will be promoted to next class!
                </div>
                ';
              }
              ?>
            </div>
          </div>
        </div>
      <?php
} else {
                echo '<p style="color:red;">Please Input Valid Roll & Email</p>';
            }
        } else {
            echo '<p style="color:red;">Your Input Doesn\'t Match!</p>';
        }
    } else {?>
              <script type="text/javascript">alert("Data Not Found!");</script>
            <?php }
}
;?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>