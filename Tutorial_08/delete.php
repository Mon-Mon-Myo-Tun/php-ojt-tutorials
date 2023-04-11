<?php
    include "db.php";
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        $sql="delete from posts where id=$id";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "<script>alert('Data has been deleted!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else
        {
            echo "<script>alert('Error deleting data.')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    } 
?>



