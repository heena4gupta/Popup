<?php
include "connection.php";
?>
<?php
include 'adminheader.php';
?>
<style>
    hr {
        margin-top: 60px;
        margin-bottom: 0;
        border: 0;
        border-top: 1px solid #eee;
    }

    body {
        background: #FFF;
        font-family: 'Dosis', sans-serif;
    }

    .panel {
        margin: 20px 20px;
        background-color: #fff;
        border: 1px solid #d0caca;
        border-radius: 6px;
        -webkit-box-shadow: 0 1px 1px #555;
        box-shadow: 0 1px 1px #555;
        text-align: center;
    }
    .panel-heading {
        font-size: 30px;
        font-weight: bold;
        letter-spacing: 0.025em;
        height: 80px;
        line-height: 20px;
        text-align: center;
    }



</style>
<script type="text/javascript">
    $(function () {
        $("#btnClosePopup").click(function () {
            $("#MyPopup").modal("hide");
        });
    });
</script><!-- Bootstrap -->
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
<!-- Bootstrap -->
<hr>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <form action="add_category_process.php" method="post">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading"><h2>Add Category</h2></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" placeholder="Enter the category" class="form-control" required/>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <a href="category.php" class="btn btn-danger btn-sm">CANCEL</a>
                            <input type="submit" name="add" value="Add" class="btn btn-success btn-sm" data-toggle="modal" data-target="#MyPopup"/>
                        </div>
						<div id="MyPopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title">
                    Greetings
                </h4>
            </div>
            <div class="modal-body">
                Category Added Successfully
            </div>
            <div class="modal-footer">
                <input type="button" id="btnClosePopup" value="Close" class="btn btn-danger" />
            </div>
        </div>
    </div>
</div>
<!-- Modal Popup -->
                    </div>
                </div>
        </div>
        </form>
    </div>