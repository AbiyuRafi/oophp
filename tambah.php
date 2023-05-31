<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form action="" method="post">
            <h3>Nis</h3>
            <input type="text" name="nis" id="nis" required><br>

            <h3>Matematika</h3>
            <input type="text" name="mtk" id="mtk" required><br>

            <h3>Produktif</h3>
            <input type="text" name="prod" id="prod" required><br>

            <h3>Pipas</h3>
            <input type="text" name="pipas" id="pipas" required><br>

            <h3>Sejarah</h3>
            <input type="text" name="sejarah" id="sejarah" required><br>

            <h3>Agama</h3>
            <input type="text" name="agama" id="agama" required><br>

            <h3>B.Indonesia</h3>
            <input type="text" name="bindo" id="bindo" required><br><br>

            <input type="submit" name="submit" value="Tambah Data">
        </form>
    </center>
    <a href="tampil.php">Kembali</a>

    <?php
    include "connect.php";

    class DataHandler
    {
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function tambahData($nis, $mtk, $prod, $pipas, $sejarah, $agama, $bindo)
        {
            $query = "INSERT INTO tb_ngulang (nis, mtk, prod, pipas, sejarah, agama, bindo) VALUES ('$nis', '$mtk', '$prod', '$pipas', '$sejarah', '$agama', '$bindo')";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                echo "<script> alert ('Data berhasil ditambahkan.') 
                    window.location.href = 'tampil.php';</script>";
            } else {
                // echo "<script> alert ('Gagal tambah data')
                //     window.location.href = 'tambah.php';</script>";
                echo "gagal";
            }
        }
    }

    $dataHandler = new DataHandler($conn);

    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $mtk = $_POST['mtk'];
        $prod = $_POST['prod'];
        $pipas = $_POST['pipas'];
        $sejarah = $_POST['sejarah'];
        $agama = $_POST['agama'];
        $bindo = $_POST['bindo'];

        $dataHandler->tambahData($nis, $mtk, $prod, $pipas, $sejarah, $agama, $bindo);
    }
    ?>
</body>

</html>