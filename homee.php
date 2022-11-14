<?php
require ("koneksi.php");
?>

<html> 
    <head>
        <title>home</title>
    </head>
    <body>
<h1>Selamat Datang</h1>
    <table border='1'>
        <tr>
            <td>Id</td>
            <td>Email</td>
            <td>Username</td>
            <td>Level</td>
        </tr>
        <?php
        $query = "SELECT* FROM user_detail";
        $result = mysqli_query($koneksi, $query);
        
       // while($row = mysqli_fetch_array($result)){
while($row=mysqli_fetch_array($result)){
            $get_id = $row['id'];
            $get_user = $row['user_email'];
            $get_name =$row['user_fullname'];
            $get_level =$row['level'];
            ?>
            
            <tr>
                <td><?php echo $get_id; ?> </td>
                <td><?php echo $get_user; ?> </td>
                <td><?php echo $get_name; ?> </td>
                <td><?php echo $get_level; ?> </td>
                <td></td>
            </tr>
            <tr>
                //<td><?php echo $no; ?> </td>
                //<td><?php echo $userMail; ?> </td>
                <td><?php echo $userName; ?> </td>
                <td><a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
                    <a href="hapus.php?id=<?php echo $row['id']; ?>">hapus</a>
                </td>
            </tr>
            <?php
            
 }
        ?>
         </table>
        </body>
</html>