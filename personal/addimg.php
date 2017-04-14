<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
            echo "用户名".$_SESSION['username'];
    }
    else
    {
        echo "未登录";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/addimg.css" />
</head>
<body>
    <h2>选择照片</h2>
    <form action="addimg-act.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file" />
        <input type="text" name="photodis" id="photodis" placeholder="请输入照片描述" />
        <select name="dealbum" id="dealbum">
            <?php 
                $username=$_SESSION['username'];
                $conn = mysqli_connect('localhost','root','','bishe');
                $sql="SELECT * FROM album where username='$username'";
                
                $result = mysqli_query($conn,$sql);
                
                while ( $row=mysqli_fetch_array($result) ) {
                   
                   echo "<option value='".$row['albumname']."' >".$row['albumname']."</option>";
                 }


             ?>
        </select>
        
        <input type="submit" class="upload-btn" name="submit" value="确定" />
    </form>
</body>
</html>