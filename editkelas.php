<?php
    require_once('config.php');
    if(isset($_POST['update'])){
        extract($_POST);
        $update = mysqli_query($conn,"update tbkelas set nama_kelas='$nama', jurusan='$jurusan' where idkelas=$id");
        var_dump($update);
        if($update){
            ?>
            <script>
                alert('simpan berhasil');
                location.href='?hal=tampilkelas';
            </script>
            <?php
        }else{
            echo "<script>alert('update GAGAL')</script>";
            header("location:?hal=tampilkelas");
        }
    }
    
    $id = isset($_GET['id'])?$_GET['id']:"";
    if($id == ""){
        echo "<script>alert('data tidak ditemukan');location.href='?hal=tampilkelas';</script>";
    }else{
        $query = mysqli_query($conn,"select * from tbkelas where idkelas=$id");
        $baris = mysqli_fetch_array($query);
    }
    ?>
    <html>
        <head>
            <title>Edit Data</title>
        </head>
        <body>
            <a href="?hal=tampilkelas">Kembali ke home</a>
            <br>
            <br>
            <form action="?hal=editkelas" method="post">
                <table>
                    <input type="hidden" name="id" value="<?=$baris['idkelas']?>">
                    <tr>
                        <td>Nama Kelas</td>
                        <td><input type="text" name="nama" placeholder="Nama Kelas" maxlength="50" value="<?=$baris['nama_kelas']?>"></td>
                    </tr>  
                    <tr>
                     <td>Jurusan</td>
                     <td>
                        <select name="jurusan">
                             <option <?=$baris['jurusan']=='akutansi'?'selected':''?> value="akutansi">Akutansi</option>
                             <option <?=$baris['jurusan']=='manajemen perkantoran'?'selected':''?> value="manajemen perkantoran">Manajemen Perkantoran</option> 
                             <option <?=$baris['jurusan']=='bisnis daring'?'selected':''?> value="bisnis daring">Bisnis Daring</option>
                             <option <?=$baris['jurusan']=='desain komunikasi visual'?'selected':''?> value="desain komunikasi visual">Desain Komunikasi Visual</option>
                             <option <?=$baris['jurusan']=='rekayasa perangkat lunak'?'selected':''?> value="rekayasa perangkat lunak">Rekayasa Perangkat Lunak</option>
                        </select> 
                    </td>
                    
                    <tr>
                        <td><button type="submit" name="update">Update</button></td>
                        <td></td>
                    </tr>
                </tr>
                </tr>
            </table>
        </form>
    </body>
</html>