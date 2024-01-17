<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="foodAvailable.css">
    <title>SharePlate</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <style>
        body {
            position: relative;
            margin-bottom: 100px; /* Adjust the margin to accommodate the footer height */
             background: rgb(191,183,234);
background: linear-gradient(90deg, rgba(191,183,234,1) 0%, rgba(57,240,183,1) 48%, rgba(88,108,253,1) 100%);
        }

        .foot {
            position: fixed;
            bottom: 0;
            width: 100%;
           background-color: rgba(248, 249, 250, 0.5);
            padding: 20px;
            text-align: left;
        }
    </style>
</head>
<body>



 <div class="totcontainer">
        <div class="container">
            <img src="images/shareplatezoom1.jpg" alt="image" id="logo"> 
            <a href="main3.html"><div class="box">HOME</div></a>
            <div class="box"> <a class="home" href="about.html">ABOUT</a></div>
            <!-- <div class="box">TOP</div> -->
            <div class="box"> <a class="home" href="#categorie"> Login</a></div>  
            <!-- <div class="box">SUPPORT</div> -->
        </div>
            <!-- <img src="https://brownliving.in/cdn/shop/articles/food-donation-services-988981_600x.jpg?v=1682960048" alt="image1" class="images"> -->
        <h3 style="margin-left: 5px;">Find food available near you</h3>



<h1>List of Donors</h1>
<br>
<table class="table">
<thead>
<tr>
<th>Full Name</th>
<th>Email Address</th>
<th>Mobile Number</th>
<th>Food Quantity</th>
<th>Total Quantity</th>
<th>Address</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$servername = "localhost";
$username = "root";
$password = "swapna@2005";
$database = "pythonproject";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) { // Fixed the missing "->" and added a semicolon
    die("Connection failed: " . $connection->connect_error);
}
$sql = "SELECT * FROM donate_form";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["fullname"] . "</td>
    <td>" . $row["emailaddress"] . "</td>
    <td>" . $row["mobilenumber"] . "</td>
    <td>" . $row["foodquantity"] . "</td>
    <td>" . $row["totalquantity"] . "</td>
    <td>" . $row["address"] . "</td>
    <td>
    <a class='btn btn-primary btn-sm' href='collectForm.html'>Request</a>
    
    </td>
    </tr>";
}
?>
</tbody>
</table>


 <!-- footer  -->
        <footer class="foot">
            <img src="images/shareplatezoom1.jpg" alt="logo" id="logo1">
            <div class="matter">
                 Our mission is to reduce food waste and make a difference.  
                Join us in the fight against food waste and hunger.  <br> <br>
                 Support local initiatives and organizations dedicated to reducing food waste.  <br> <br>
                 Together, we can make a positive impact on food waste and our environment.
            </div>
            <div class="footnav">
            <ul >
                <li><a href="main3.html" style="text-decoration: none; font-size: large; color: black;">Home</a></li> <br>
                <li><a href="#" style="text-decoration: none; font-size: large; color: black;">About Us</a></li>    <br>     
                <li><a href="#" style="text-decoration: none; font-size: large; color: black;">join with us</a></li>         
            </ul></div>
            <div class="share">
               <span style="font-size: 50px; padding-left: 50px;"> &#128151</span>  
                <span style="float: inline-start; margin-top: 20px; margin-left: 20px;">share this website</span>
            </div>
        </footer>
        <!-- --------------------------------- -->
        
    </div>

</body>
</html>