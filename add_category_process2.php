  <?php include 'connection.php'; ?>
<?php
if(($_POST['add']))
{
    $errmsg = $sql = "";
    $category_name = trim($_POST['category_name']);

    $sql = "SELECT category_name FROM categories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($category_name == $row["category_name"])
            {
                header('Location:add_category.php?err=' .urlencode('category already exist'));
                exit();
            }

        }
    }
    $sql = "INSERT INTO categories (category_name) VALUES "."('".$category_name."')";
    if($sql==true)
    {
        $message = 'Category Added Successfully';
    }
    else
    {
     echo "<span style='color:red;'>Please register before login..!</span>";
        exit();
        
    }
    $conn->close();

}

?>