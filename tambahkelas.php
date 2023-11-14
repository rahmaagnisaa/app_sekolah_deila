<?php
    require_once("config.php");
    if(isset($_POST['simpan'])){
        extract($_POST);
        $insert = mysqli_query($conn,"insert into tbkelas values(null,'$nama','$jurusan')");
        if($insert){
            ?>
                <script>
                    alert('simpan berhasil');
                    location.href='?hal=tampilkelas';
                </script>
            <?php        
        }
    }
?>
<html>
    <head>
        <title>Tambah Data</title>
    </head>
    <body>
        <a href="?hal=tampilkelas">Lihat Data</a>
        <br>
        <br>
        <form action="?hal=tambahkelas" method="post">
            <table>
                <tr>  
                    <td>Nama Kelas</td>
                    <td><input type="text" name="nama" placeholder="Nama Kelas" maxlength="50"></td>
                </tr>
                <tr>  
                    <td>Jurusan</td>
                    <td>
                        <select name="jurusan">
                            <option value="">==pilih jurusan==</option>
                            <option value="Akutansi">Akutansi</option>
                            <option value="Manajemen Perkantoran">Manajemen Perkantoran</option>
                            <option value="Bisnis Daring">Bisnis Daring</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        </select>
                    </td>
                <tr>
                    <td><button type="sumbit" name="simpan" value="simpan">Simpan</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                </tr>
            </tr>
            </tr>
            </table>
        </form>        
    </body>
</html>