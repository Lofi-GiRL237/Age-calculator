<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                AGE CALCULATOR
            </div>

            <form action="age_cal.php" method="post">
                <div class="form-group">

                    <div class="row mb-4">
                        <div class="col-md-5">
                            <select name="day" class="form-control" id="">
                                <?php
                                for($i=1; $i<=31; $i++){
                                    echo "<option>$i</option>"; 
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select name="month" class="form-control" id="">
                                <?php
                                $A = ["January", "February", "March", "April",
                                      "May", "June", "July", "August", "September",
                                      "October", "November", "December"];

                                for($i=0; $i<count($A); $i++){
                                    echo "<option>$A[$i]</option>"; 
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select name="year" class="form-control" id="">
                            <?php
                            $year = date('Y'); 
                            for($i=1900; $i<=$year; $i++){
                                echo "<option value='$i'>$i</option>"; 
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row mb-4">
                        <input type="submit" name="submit" value="Check the age" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $day = $_POST['day']; 
    $month = $_POST['month']; 
    $year = $_POST['year']; 

    $months = ["January", "February", "March", "April",
               "May", "June", "July", "August", "September",
               "October", "November", "December"];

    $monthNumber = array_search($month, $months) + 1;

    $DOB = "$year-$monthNumber-$day";

    $days = new DateTime($DOB);
    $age = $days->diff(new DateTime());

    echo "<br>";
    echo "<b>Your date of birth is:</b> " . $DOB;
    echo "<br>";
    echo "Your age is ";
    echo $age->y; 
    echo " Years ";
    echo $age->m; 
    echo " Months ";
    echo $age->d; 
    echo " Days ";
}
?>

</body>
</html>
