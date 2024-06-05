<?php
    session_start();
    include("config.php");
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delta Courier</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" type="image/x-icon" href="https://www.iekdeltalive.gr/images/favicon-32x32.png">
    </head>
    <body>
        <!-- Header -->
        <header class="header">
                
            <a href="#home" class="logo"><span>Δέλτα</span> Courier</a>

            <i class="bx bx-menu" id="menu-icon"></i>

            
            <nav class="menu">
                <a href="index.php" class="">Home</a>
                <a href="index.php" class="">About</a>
                <a href="#appointment" class="active">Appointment</a>
                <a href="tracking.php" class="">Tracking</a>
            </nav>
        </header>

        <!-- Appointment -->

        <section class="appointment" id="appointment">
            <h2 class="heading"><span>Appointment</span></h2>
            <form action="appointment.php" method="post">
                <input type="text" name="aname" id="aname" placeholder="Ονοματεπώνυμο">
                <input type="text" name="anumber" id="anumber" placeholder="Τηλέφωνο">
                <select name="alocation" id="alocation">
                    <option>Καταστήματα</option>
                    <option>Σταδίου 26, Αθήνα</option>
                    <option>Ιπποκράτους 22, Αθήνα</option>
                    <option>Γούναρη 23, Πειραιάς</option>
                </select>
                <select name="adate" id="adate">
                    <option>Ημερομηνία</option>
                    <?php 
                                $query ="SELECT appointments_free_dates FROM appointments_free_dates";
                                $result = $conn->query($query);
                                if($result->num_rows> 0){
                                $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                }
                            foreach ($options as $option) {
                            ?>
                                <option><?php echo $option['appointments_free_dates']; ?> </option>
                                <?php 
                                }
                            ?>  
                </select>
                <br>
                <button name="submit" id="submit">Submit</button>
            </form>
        </section>

        <?php
                if(isset($_POST['submit']))
                {    
                     $name = $_POST['aname'];
                     $number = $_POST['anumber'];
                     $location = $_POST['alocation'];
                     $date = $_POST['adate'];
                     $sql = "INSERT INTO appointments (appointment_name, appointment_number, appointment_location, appointment_date) VALUES (?,?,?,?)";
                     $stmt = $conn->prepare($sql);
                     $stmt->bind_param("ssss", $name, $number, $location, $date);
                     $stmt->execute();
                     if ($stmt->affected_rows > 0) {
                        echo "Η κράτηση σας εγκρίθηκε !";
                     } else {
                        echo "Error: " . $sql . ":-" . mysqli_error($sql);
                     }
                     $stmt->close();
                     $conn->close();
                }
        ?>

        <!-- Footer -->

        <footer class="footer">
            <div class="footer-text">
                <p>Copyright &copy; 2024 by Δέλτα Courier | All Rights Reserved.</p>
            </div>
        </footer>
    </body>

    <!-- Scripts -->

    <script src="/js/script.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</html>