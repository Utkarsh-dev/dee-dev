<?php
include 'includes/connect.php';

$id = $_GET['id'];
$res = mysqli_query($con, 'SELECT od.order_id,item,waiter_id,table_id,price ,quantity FROM orders o JOIN order_details od on (o.id = od.order_id) where od.order_id ='.$id);
while($row = mysqli_fetch_array($res)){
  print_r($row). "<br>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Order Food</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
   <style type="text/css">

  .ui-autocomplete {
    z-index: 100;
}

  </style> 
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
<?php include('header.php') ?>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">


      <!-- //////////////////////////////////////////////////////////////////////////// -->
<?php include('leftbar.php') ?>

      <!-- START CONTENT -->
      <section id="content">


        <!--start container-->
        <div class="container">
          <p class="caption"></p>
          <h4 class="header">Create New Order</h4>
          <div class="divider"></div>
		      <form name="form" class="formValidate" id="formValidate">
            <div class="row" style="text-align: center;">
              <div class="head_panel">
                
                <?php
                      $tables = array("t1"=>"Table 1","t2"=>"Table 2","t3"=>"Table 3","t4"=>"Table 4");
                    
                ?>
                <table border="2">
                  <tr>
                    <td align="center">
                      <select name="tableId" required="true" id="tableId">
                        <option value="">Select Table</option>
                         <?php
                           foreach($tables as $k => $v) {
                          echo '<option value="'.$k.'">'.$v.'</option>';
                          } 
                         ?>
                       </select>
                    </td>
                    <td align="center">
                          <select name="waiterId" required="true" id="waiterId">
                              <option value="">Select Waiter</option>
                                <?php 
                                  $result = mysqli_query($con, "SELECT * FROM waiters where working is true");

                                   while($row = mysqli_fetch_array($result)){
                                     echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                    }
                                  ?>
                          </select>

                    </td>
                    <td align="center"><button type="button" class="btn btn-default" id="show">Next</button></td>
                  </tr>

                </table>

  
              </div>
            <div class="table-responsive" id="DataTable" style="display: none;">          
                  <table class="table">
                    <thead>
                      <tr>
                        
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>

                    <tbody>
                       <?php $limit = array('1','2','3','4','5');
                            foreach ($limit as $value) {
                        ?>
                         
                         
                            <tr>
  
                              <td>
                                  <div class="input-field col s8">
                                  <input id=<?php echo "item-".$value ?>  name="item[]" type="hidden" class="itemId">

                                  <input hidden_id=<?php echo "item-".$value ?> type="text"class="menu" data-error=".errorTxt01" price=<?php echo "price-".$value ?> placeholder="Name" qty=<?php echo "qty-".$value ?> >
                                  <div class="errorTxt01"></div>
                                </div>
                              </td>
                              <td>
                                  <div class="input-field col s8">
                                  
                                  <input id=<?php echo "price-".$value ?>  type="text"  data-error=".errorTxt01" placeholder="Price" readonly>
                                  <div class="errorTxt01"></div>
                                </div>
                              </td>
                              <td>
                                  <div class="input-field col s8">
                                  <input type="text" data-error=".errorTxt01" name="qty[]" placeholder="Qty" class="QTY">
                                  <div class="errorTxt01"></div>
                                </div>
                              </td>

                              <td>
                                  <div class="input-field col s8">
                                  
                                  <input type="text" name="price[]" data-error=".errorTxt01" placeholder="Total Price" id=<?php echo "qty-".$value ?> class="fieldset" readonly>
                                  <div class="errorTxt01"></div>
                                </div>
                              </td>

                            </tr>
                           <?php } ?> 
                    </tbody>
                  </table>
              
	      <div>                            
		  <div class="input-field col s12">
                    <input id="total_bill"  name="total_bill" type="hidden">
                    <p>Total Bill : <span id="total_amnt">0</span> Rs</p>
                    <input id="bill" name="bill" type="hidden">
                     <button class="btn cyan waves-effect waves-light right" name="action" type="button" id="form">Create Order
                	     <i class="mdi-content-send right"></i>
                     </butt
                  </div>
            </div>
  </div>
	</form>
            <div class="divider"></div>
            
          </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->


  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
 <?php include 'footer.php'; ?>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
	
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    <script type="text/javascript">


      $(document).ready(function() {
           var totalBill = 0;
              $(".QTY").on("keydown keyup", function(e) {

                if(!$(this).closest("tr").find("td:eq(0) .itemId").val()){

                    alert('Please Select Menu Item first!');
                    return false;
                }

                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
                  (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
                 }
                 if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                 } 
                
                if ($(this).val()){

                 var totalPrice = $(this).closest("tr").find("td:eq(1) input").val();
                 var amount = totalPrice * $(this).val();
                 totalBill = totalBill + amount;
                 $(this).closest("tr").find("td:eq(3) input").val(amount );
                 
               }else{
                  $(this).closest("tr").find("td:eq(3) input").val('');
               }
               calculateSum();
 
           });
            $(".menu").keyup(function() {
            if (!this.value) {
                 $(this).closest("tr").find("td:eq(1) input").val('');
                 $(this).closest("tr").find("td:eq(2) input").val('');
                 var price = $(this).closest("tr").find("td:eq(3) input").val();
                 totalBill = totalBill - price;
                 $('#total_amnt').text(totalBill);
                 $(this).closest("tr").find("td:eq(3) input").val('');
                 
             }
             calculateSum();

            });
           $( ".menu" ).autocomplete({

                source: function( request, response ) {
                 $(this).closest("tr").find("td input").val('');
                 
                 $.ajax({
                  url: "fetch_data_api.php",
                  type: 'post',
                  dataType: "json",
                  data: {
                   search: request.term
                  },
                  success: function( data ) {
                    response( data );
                    
                  }
                 });
                },
                select: function (event, ui) {
                 var data = ui.item.value.split('-');
                 var value = ui.item.label;
                 $(this).val(value); // display the selected text
                 var item_id      = data[0];
                 var item_price   = data[1];
                 var price_elem   = $(this).attr('price');
                 var hidden_elem  = $(this).attr('hidden_id');
                 var qty_elem     = $(this).attr('qty');
                 $('#'+hidden_elem).val(item_id );
                 $('#'+price_elem).val(item_price);
                 return false;
                }
               });

           function calculateSum() {
                   var sum = 0;
    //iterate through each textboxes and add the values
                  $(".fieldset").each(function() {
        //add only if the value is number
                  
                  if (!isNaN(this.value) && this.value.length != 0) {
                      sum += parseFloat(this.value);
                      $(this).css("background-color", "#FEFFB0");
                  }

                });

            $("#total_amnt").text(sum.toFixed(2));
            $("#total_bill").val(sum.toFixed(2));
          }
          $("#show").click(function() {
             
              $( "#DataTable" ).toggle(1500);
              if ($(this).text() == "Next")
                    $(this).text("Hide");
              else
                    $(this).text("Next");
           });

 

      $('#form').on('click', function (e) {

          if(!$("#tableId").val()){
                    alert('Please select Table!');
                    return false;
          }
          if(!$("#waiterId").val()){
                alert('Please select Waiter!');
                return false;
          }

          $.ajax({
            type: 'post',
            url: 'routers/create_order_action.php',
            data: $('form').serialize(),
            success: function () {
              alert('Order has been saved');
            },
            error:function(e) {
              alert('There Was Some Error!');
              // body...
            }
          });

        });

      });
   

    </script>
</body>

</html>

