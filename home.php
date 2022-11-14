<?php
require ("koneksi.php");
// $email = $_GET['user_fullname'];

//inisialisasi session, agar session yang dibawah bisa berjalan
session_start();

//mengecek user pada session, jika id tidak ada maka akan dikembalikan pada login
if(!isset($_SESSION['id']) ){
    $_SESSION['msg']='anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
//name session
$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];

?>

<html>
<head>
        <title>Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
   
    
        <!-- <h1>Selamat Datang <?php echo $email;?></h1> -->
        <h1>Selamat Datang <?php echo  $sesName ;?></h1>
        <table border='1' style="text-align:center">
            <tr>
                <td>No</td>
                <td>Email</td>
                <td>Nama</td>
                <td colspan="2"></td>
            </tr>
            <?php
            $query  = "SELECT * FROM user_detail";
            $result = mysqli_query($koneksi, $query);
            $no     = 1;

            if ($sesLvl == 1){
                $dis = "";

            }else{
                $dis = "disabled";
            }
            while ($row = mysqli_fetch_array($result)){
                $userMail  = $row['user_email'];
                $userName   = $row['user_fullname'];
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $userMail; ?></td>
                <td><?php echo $userName; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">
                    <input type="button" value="edit" <?php echo $dis; ?>></a>
                    <a href="hapus.php?id=<?php echo $row['id']; ?>">
                    <input type="button" value="hapus" <?php echo $dis; ?>></a>
                </td>
            </tr>        
            <?php
            $no++;   
            }?>
        </table>  
        <p><a href="logout.php">Log Out</a></p>
    </body>
</html>