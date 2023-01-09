<?php include_once("componet/conn.php"); ?>
<?php 
session_start();
    if(isset($_SESSION["login"])){
        $name = $_SESSION["username"];
        $uid = $_SESSION["id"];
    }else{
        header("location:index.php");
    }
?>

<?php

// $pname = "";
// $qty = 0;
// $disprice = 0;
  if(isset($_REQUEST["oid"])){
    $oid = $_REQUEST["oid"];
    $getorderq = "select * from orders where oid={$oid}";
    $getorderexc = $con->query($getorderq);
    $orderdata = mysqli_fetch_assoc($getorderexc);

    $getuserq = "select * from users where id={$uid}";
    $getuserexc = $con->query($getuserq);
    $userdata = mysqli_fetch_assoc($getuserexc);

    $getaddressq = "select * from `user-address` where adrid={$orderdata['adrid']}";
    $excaddress = $con->query($getaddressq);
    $addressdata = mysqli_fetch_assoc($excaddress);
    
    if($addressdata){
      $number = $addressdata["number"];
      $address = $addressdata["address"];
      $city = $addressdata["city"];
      $state = $addressdata["state"];
      $zip = $addressdata["zip"];
    }

    if($orderdata){
      $pid = $orderdata["pid"];
      $date = $orderdata["date"];
      $getprodq = "select * from products where pid={$pid}";
      $getprodexc = $con->query($getprodq);
      $proddata = mysqli_fetch_assoc($getprodexc);
      if($proddata){
        $pname= $proddata["pname"];
        $disprice = $proddata["dis-price"];
        $qty = $orderdata["qty"];
        $total = $disprice * $qty;
      }
      $newnum = substr($number, -10, -7) . "-" . substr($number, -7, -4) . "-" . substr($number, -4);
    }
  }else{
    header("location:index.php");
  }
?>

<?php
    $html='
    <!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <style>
            
@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
*{
  margin: 0;
  box-sizing: border-box;

}
body{
  background: #E0E0E0;
  font-family: "Roboto", sans-serif;
}
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}

#invoiceholder{
  width:100%;
  // height: 100%;
  padding-top: 50px;
}

#invoice{
  position: relative;
  top: 0px;
  margin: 0 auto;
  width: 700px;
  background: #FFF;
}

[id*="invoice-"]{
  border-bottom: 1px solid #EEE;
  padding: 30px;
}

#invoice-top{min-height: 60px;}
#invoice-mid{min-height: 60px;}
#invoice-bot{ min-height: 20px;}

.logo{
  float: left;
	height: 60px;
	width: 60px;
	// background: url(img/logo1.png) no-repeat;
	// background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	// background: url(img/client.jpg) no-repeat;
	// background-size: 60px 60px;
  // border-radius: 50px;
}
.info{
  display: block;
  float:left;
  margin-left: 20px;
}
.title{
  float: right;
}
.title p{text-align: right;}
#project{margin-left: 52%;}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE
}
.tabletitle{
  padding: 5px;
  background: #EEE;
}
.service{border: 1px solid #EEE;}
.item{width: 50%;}
.itemtext{font-size: .9em;}

#legalcopy{
  margin-top: 30px;
}
form{
  float:right;
  margin-top: 30px;
  text-align: right;
}


.effect2
{
  position: relative;
}

.effect2:after
{
  -webkit-transform: rotate(3deg);
  -moz-transform: rotate(3deg);
  -o-transform: rotate(3deg);
  -ms-transform: rotate(3deg);
  transform: rotate(3deg);
  right: 10px;
  left: auto;
}



.legal{
  width:70%;
}
        </style>
    </head>
    <body>
    <div id="invoiceholder">

<div id="invoice" class="effect2">
  
  <div id="invoice-top">
  <!--  <div class="logo"></div> -->
    <div class="info">
      <h2>EZSOP</h2>
      <p> ezsop@gmail.com </br>
          <!-- 989-335-6503 -->
          www.ezsop.com
      </p>
    </div>
    <div class="title">
      <h1>Invoice #'.$oid.'</h1>
      <!-- <p>Issued: May 27, 2015</br> -->
      <p>Issued: '. $date .'</br>
         Payment Due: '. $date .'
      </p>
    </div><!--End Title-->
  </div><!--End InvoiceTop--> 
  <div id="invoice-mid">
    
    <!-- <div class="clientlogo"><img src="img/logo1.png"></div>
    -->
    <div class="info">
      <h2>'.$name.'</h2>
      <p>'. $address .'</p> 
      <p>'. $city.','. $state.', '. $zip .'</p> 
      <p> Email : '. $userdata["email"] .'</p> 
      <p> Phone :+91 '. $newnum .'</p> 
    </div>

    <!-- <div id="project">
      <h2>ezsop Description</h2>
      <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p>
    </div>    -->

  </div>

  <div id="invoice-bot">
    
    <div id="table">
      <table>
        <tr class="tabletitle">
          <td class="item"><h2>Product Name</h2></td>
          <td class="Hours"><h2>Price</h2></td>
          <td class="Rate"><h2>Qty</h2></td>
          <td class="subtotal"><h2>Sub-total</h2></td>
        </tr>
        
        <tr class="service">
           <td class="tableitem"><p class="itemtext">'.$pname.'	</p></td>
           <td class="tableitem"><p class="itemtext"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'.$disprice.'</p></td>
           <td class="tableitem"><p class="itemtext">'.$qty.'</p></td>
           <td class="tableitem"><p class="itemtext"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'.($disprice* $qty).'</p></td>
        
        </tr>
        
          
        <tr class="tabletitle">
          <td></td>
          <td></td>
          <td class="Rate"><h2>Total</h2></td>
          <td class="payment"><h2><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>'.$total.'</h2></td>
        </tr>
        
      </table>
    </div>

    
    <div id="legalcopy">
      <p class="legal"><strong>Thank you for your purchase!</strong> You just made our business grow, and for that, we are forever indebted. Enjoy your [product] and keep supporting small businesses!</p>
    </div>
    
  </div>
</div>
</div>
    </body>
</html>';
?>

<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();


$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream("invoice.pdf",array('Attachment'=>0));
?>