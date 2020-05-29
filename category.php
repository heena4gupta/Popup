<?php include 'connection.php'; ?>
<?php
$sql= /** @lang en */
    "SELECT * FROM categories";
$result = $conn->query($sql);
$i= 1;

?>
<?php include 'adminheader.php'; ?>

<!DOCTYPE html>
<html>
<head>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Add Category</title>
    <script>
                                function popUp(){
                                    swal({
                                        title: "Are you sure?",
                                        text: "Once deleted, you will not be able to recover this Data..!",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                swal("Poof! Your Data Has Been Deleted!", {
                                                    icon: "success",
                                                    buttons: true,
                                                });
                                            } else {
                                                swal("Your Data Is Safe!");
                                            }
                                        });
                                }
                            </script>
							
<style>
    hr {
        margin-top: 20px;
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
    .text-right {
        text-align: center;
    }
    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings', sans-serif;
        font-style: normal;
        font-weight: normal;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 1px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.428547;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 7px;
        font-family: sans-serif;
    }
    .btn-danger{
        color: white;
        background-color: cornflowerblue;
        border-color: cornflowerblue;
    }
    .glyphicon-pencil{
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings', sans-serif;
        font-style: normal;
        font-weight: normal;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .glyphicon-trash {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings', sans-serif;
        font-style: normal;
        font-weight: normal;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .panel {
        margin: 20px 60px;
        background-color: #fff;
        border: 1px solid #d0caca;
        border-radius: 6px;
        -webkit-box-shadow: 0 1px 1px #555;
        box-shadow: 0 1px 1px #555;
        text-align: center;
    }
    .table-bordered {
        border: 0;
    }
    .table {
        padding: 8px;
        display: table;
        border-collapse: collapse;
        box-sizing: border-box;
        white-space: normal;
        line-height: normal;
        font-weight: normal;
        font-size: medium;
        font-style: normal;
        color: #2b2b2b;
        text-align: center;
        border-spacing: inherit;
        border-color: grey;
        font-variant: normal;
    }
    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: black;
    }
    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: black;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        box-sizing: border-box;
    }
    th {
        border-bottom: 0;
        text-align: center;
    }
    th.header{
        border: 1px solid black;
        padding: 5px;
        vertical-align: bottom;
        text-align: center;
        display: table-cell;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 18px;
        color: black;
        font-variant: normal;
        border-collapse: separate;
        white-space: normal;
    }
    tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: black;
    }
    td {
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border: black;
        padding: 5px;
        line-height: 1;
        vertical-align: top;
        display: table-cell;
    }
</style>
							
							</head>


<hr>
<body>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories</h1>
        </div>
    </div><!--/.row-->
    <div class="page-action-links text-right">
        <a href="add_category.php?operation=create">
            <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add new </button>
        </a>
    </div>
    <br>
    <div class="panel panel-container">
        <table class="table table-hover table-bordered table-condensed">

            <thead>
            <tr>
                <th class="header">Sr.No</th>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo htmlspecialchars($row['category_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                    <td>
                        <a href="edit_category.php?category_id=<?php echo $row['category_id'] ?>&operation=edit" class="btn btn-danger" style="margin-right: 8px;"><span class="glyphicon glyphicon-pencil"></span>
                    </td>
                    <td>
                        <a href="delete_category.php?category_id=<?php echo $row['category_id'] ?>&operation=delete" class="btn btn-danger" onclick="popUp()" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                        
                    </td>
                </tr>
            </tbody>
        </table>
		</div>
</body>
</html>
