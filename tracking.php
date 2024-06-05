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
        <script src="/js/script.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="/js/script.js"></script>
    </head>
    <body>
        <!-- Header -->
        <header class="header">
                
            <a href="#home" class="logo"><span>Δέλτα</span> Courier</a>

            <i class="bx bx-menu" id="menu-icon"></i>

            
            <nav class="menu">
                <a href="index.html" class="">Home</a>
                <a href="appointment.php" class="">Appointment</a>
                <a href="#tracking" class="active">Tracking</a>
            </nav>
        </header>

        <!-- Tracking -->
        <section class="tracking" id="tracking">
            <h2 class="heading">Tracking</h2>
            <form action="tracking.php" id="tracking_form" method="post">
                <input type="text" name="tname" id="tracking_name" placeholder="Ονοματεπώνυμο">
                <input type="text" name="tnumber" id="tracking_number" placeholder="Τηλέφωνο">
                <input type="text" name="tracking_id" id="tracking_id"  required placeholder="Κωδικός Αποστολής">
                <button id="submit" name="submit">Αναζήτηση</button>
            </form>
        </section>


        <?php
                if(isset($_POST['submit'])) {
                    $name = $_POST['tname'];
                    $number = $_POST['tnumber'];
                    $track_number = $_POST['tracking_id'];

                    $track_number = mysqli_real_escape_string($conn, $track_number);

                    $query = "SELECT tracking_status FROM tracking WHERE tracking_number = '$track_number'";
                    $result = $conn->query($query);

                    if ($result) {
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if ($row['tracking_status'] == "Απεστάλη") {
                                echo '<script>swal("Η παραγγελία σας έχει σταλθεί!", "Ευχαριστούμε πολύ για την συνεργασία!", "success");</script>'; 
                            } elseif ($row['tracking_status'] == "Διαλογή") {
                                echo '<script>swal("Η παραγγελία σας βρίσκετε στη διαλογή!", "Ευχαριστούμε πολύ για την συνεργασία!", "warning");</script>';
                            }elseif ($row['tracking_status'] == "Ακυρώθηκε") {
                                    echo '<script>swal("Η παραγγελία σας ακυρώθηκε!", "Ευχαριστούμε πολύ για την συνεργασία!", "error");</script>';
                            }
                        } else {
                            echo '<script>swal("Η παραγγελία σας δεν έχει καταχωρηθεί!", "Επικοινωνείστε με το κατάστημα", "error");</script>';
                        }
                    }
                }
        ?>

        <!-- Footer -->

        <footer class="footer">
            <div class="footer-text">
                <p>Copyright &copy; 2024 by Δέλτα Courier | All Rights Reserved.</p>
            </div>
        </footer>
    </body>
    
</html>