<?php include 'connection.php'; ?>

<?php include 'adminheader.php'; ?>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
 hr {
        margin-top: 10px;
        margin-bottom: 0;
        border: 0;
        border-top: 1px solid #eee;
    }
    body {
        background: #FFF;
        font-family: 'Dosis', sans-serif;
    }
    h1{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
    }
</style>
<hr>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pending Orders</h1>
        </div>
    </div><?php
if(isset($_GET['success_msg']))
{
    echo "<div class = ''><h3>".htmlspecialchars($_GET['success_msg'])."</h3></div><br>";
}?>
<?php
if(isset($_GET['err']))
{
    echo "<div class = ''><h3>".htmlspecialchars($_GET['err'])."</h3></div><br>";
}?>

    <div class="panel panel-default">
        <div class="panel-body">

            <?php
            $orders_list = "SELECT  o.user_id,o.order_id,o.user_id,o.product_id,o.qty,o.p_status,p.product_name,p.product_price,p.product_image,u.first_name,u.last_name,u.company_name,u.company_address FROM orders o,products p,user_info u WHERE  o.product_id=p.product_id and o.user_id=u.user_id and o.admin_status = '' ";
            $result = $conn->query($orders_list);
            $i= 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row=mysqli_fetch_array($result)) {
                    ?>
                    <div class="row">
                        <div class="col-md-2">
                            <?php echo $i++; ?>
                            <img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail" height = 60 width = 80 >
                        </div>
                        <div class="col-md-4">
                            <table>
                                <tr><td>Product Name</td><td><b><?php echo $row["product_name"]; ?></b> </td></tr>
                                <tr><td>Product Price</td><td><b><?php echo " $ ".$row["product_price"]; ?></b></td></tr>
                                <tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
                                <tr><td>Total amount</td><td><b> $ <?php echo $row["qty"] * $row["product_price"] ?></b></td></tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table>
                                <tr><td>Retailer Name: </td> <td><?php echo $row["first_name"]; ?><?php echo $row["last_name"]; ?> </td></tr>
                                <tr><td>Company Name: </td><td><b><?php echo $row["company_name"]; ?></b></td></tr>
                                <tr><td> Company Address: </td><td><b><?php echo $row["company_address"]; ?> </b></td></tr>
                            </table>
                        </div>
                          <div class="col-md-2">
                            <table>
                                <tr>
                                    <td>
                                        <a href="order_proceed_process.php?order_id=<?php echo $row['order_id'] ?>">
                                            <button class="btn btn-success">Accept <i class="fa fa-angle-right color-white"></i> </button>
                                        </a>
                                    </td>
                                    <br>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Reject</button>
										

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p style="text-align:center">Order Cancelled Succesfully!!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <a href="order_cancel_process.php?order_id=<?php echo $row['order_id'] ?>">
                                     
   <button type="button" class="btn btn-default">Yes</button></a>
        </div>
      </div>
      
    </div>
  </div>
  

                                 </td>
                            </table>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

        </div>
        <div class="panel-footer"></div>
    </div>
