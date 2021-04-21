<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/userstyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

.navbar
{
    width:100%;
    white-space:nowrap;
    background-color: #476b6b;
}
.main_div
{
    width:100%;
    height:100vh;
 
}
   input
  {
      margin-top:10px;
      width:230px;
      height:40px;
      border-radius:5px;
      outline:none;
  }
 ::placeholder
 {
     padding:10px;
     color:orange;
 }
button
{
    color:#476b6b;
    background:white;
    border-color:#476b6b;
   padding: 14px 20px;
  cursor: pointer;
  width: 100%;
    
}
button:hover
 {
     color:white;
     background:#476b6b;
     border:none;
     opacity:0.8;
 }


 </style>
</head>
<body background= "images/background.png">
<div class="main_div">
 
     <div class="navbar navbar-expand-md">
   
     <img src="images/rlogo.png" ; width="60" height="60">

      
      <a href="#" class="navbar-brand font-weight-bold text-white text-center"><h2 style="font-family:HGMaruGothicMPRO;bold; font-size:45px; margin-left:12px"> GRIT BANK</h2></a>
      <button class="navbar-toggler text-white " type="button" data-toggle="collapse" data-target="#collapsenavbar">
      <span class="navbar-toggler-icon" style="background:white;"></span>
      </button>
     
       <div class="collapse navbar-collapse text-center" id="collapsenavbar">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a href="index.php" class="nav-link text-white "><span style="margin-left:90px ;font-size:23px; font-family:HGMaruGothicMPRO;" ><b>ABOUT</b></span></a></li>
              <li class="nav-item">
                  <a href="viewcustomers.php" class="nav-link text-white "><span style="margin-left:30px ;font-size:22px;font-family:HGMaruGothicMPRO;"><b>VIEW CUSTOMER</b></a></li>
              <li class="nav-item">
                  <a href="transfermoney.php" class="nav-link text-white"></a></li>
              <li class="nav-item">
                  <a href="#contact" class="nav-link text-white"><span style="font-size:22px; font-family:HGMaruGothicMPRO;"><b>CONTACT</b></a></li>    
               </ul>
        </div>
     </div>
     <div class="container">
        <div class="row">

          <div class="col-sm-4">
              <div class="card text-center" style="margin-top:76px;background-color:#476b6b; border-radius:10px;color:white" >
              <form method="POST">  
                                              
 <?php
include 'connection.php';
$ids=$_GET['idtransfer'];
$showquery="select * from `users` where id=($ids) ";
$showdata=mysqli_query($con,$showquery);
if (!$showdata) {
  printf("Error: %s\n", mysqli_error($con));
  exit();
}
$arrdata=mysqli_fetch_array($showdata);

?> 
                     
                    <div class="card-body">
                     
                    <h3 style ="font-family:HGMaruGothicMPRO;">Sender Details</h3>
                  

                    <img src="images/trans1.png" style="width:80px;height:70px;margin-top:10px; margin-left:30px"><br>
                        <label>Name</label>
                        <input type="text"  name="name1" value="<?php echo $arrdata['name']; ?>" required placeholder="Enter your name"/><br><br>
                        <label>Email</label>
                        <input type="text" name="email1" value="<?php echo $arrdata['email']; ?>" required placeholder="Enter email id"/><br><br>
                        <label>Amount</label>
                        <input type="text" name="amount1" value="" style="width:210px;" required placeholder="Enter amount"/><br><br>
                        
                    </div>

               </div>
          </div>
           
          <div class="col-sm-4">
              <div class="card text-center" style="margin-top:75px;height:380px;background-color:#090D34	">
                   <div class="card-body">
                   <img src="images/transaction.png" style="width:250px;height:220px;margin-top:40px;"><br><br>
                   <button name="submit">CONFIRM</button>
                  </div>
             </div>
          </div>

          <div class="col-sm-4">
                <div class="card text-center" style="margin-top:76px;height:380px;background-color:#476b6b;border-radius:10px;color:white">
                   
                   <div class="card-body">
                   <h3 style ="font-family:HGMaruGothicMPRO;">Receiver Details</h3>

                   <img src="images/trans2.png" style="width:80px;height:70px;margin-top:10px; margin-left:30px"><br>
                        <label>Name</label>  
                        <input type="text"  name="name2" value="" required placeholder="Enter your name"/><br><br>
                        <label>Email</label>
        
                        <input type="text" name="email2" value="" required placeholder="Enter email id"/><br><br>
                        
                   
                 
                   
                    
                   </div>

               </div>
          </div>

       </div>
       
    </div>
</div>
</form> 
<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    
  
    $Sender_name=$_POST['name1'];
    $Sender_email=$_POST['email1'];
    $Sender=$_POST['amount1'];
    $Receiver_name=$_POST['name2'];
    $Receiver_email=$_POST['email2'];
     
  

    $ids=$_GET['idtransfer'];
    $senderquery="select * from `users` where id=$ids ";
    $senderdata=mysqli_query($con,$senderquery);
  
    if (!$senderdata) {
     printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $arrdata=mysqli_fetch_array($senderdata);

    //receiverquery
    $receiverquery="select * from `users` where email='$Receiver_email' ";
    $receiver_data=mysqli_query($con,$receiverquery);
   
    if (!$receiver_data) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $receiver_arr=mysqli_fetch_array($receiver_data);
    $id_receiver=$receiver_arr['id'];


    if($arrdata['balance'] >= $Sender)
    {
      $decrease_sender=$arrdata['balance'] - $Sender;
      $increase_receiver=$receiver_arr['balance'] + $Sender;
       $query="UPDATE `users` SET `id`=$ids,`balance`= $decrease_sender  where `id`=$ids ";
       $rec_query="UPDATE`users` SET `id`=$id_receiver,`balance`= $increase_receiver where  `id`=$id_receiver ";
       $res= mysqli_query($con,$query);
       $rec_res= mysqli_query($con,$rec_query);
      // $res_receiver=mysqli_query($con,$query_receiver);
       if($res && $rec_res)
      {
       ?>
       <script>
       swal("Done!", "Transaction Successful!", "success");
        </script> 
    
      <?php
   
      }
      else
      {
      ?>
           <script>
       swal("Error!", "Error Occured!", "error");
        </script> 

      <?php
      
      }
    }
  

  else
 {
  ?>
    <script>
       swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
        </script> 
  <?php
   
 }
 
}
?>





</body>
</html>