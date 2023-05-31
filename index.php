<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <form action="" method="post">
            <h3>NIS</h3>
            <input type="number" name="nis" required>

            <h3>Matematika</h3>
            <input type="number" name="mtk" required>

            <h3>Prod</h3>
            <input type="number" name="prod" required>

            <h3>Pipas</h3>
            <input type="number" name="pipas" required>

            <h3>Sejarah</h3>
            <input type="number" name="sejarah" required>

            <h3>Agama</h3>
            <input type="number" name="agama" required>

            <h3>B.indo</h3>
            <input type="number" name="bindo" required>
            <br><br>
            <input type="submit" name="submit">
            <hr>
        </form>
    </center>
</body>

</html>

<?php
class Form
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function handleSubmit()
    {
        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $mtk = $_POST['mtk'];
            $prod = $_POST['prod'];
            $pipas = $_POST['pipas'];
            $sejarah = $_POST['sejarah'];
            $agama = $_POST['agama'];
            $bindo = $_POST['bindo'];

            $sql = "INSERT INTO `tb_ngulang`(`nis`,`mtk`, `prod`, `pipas`, `sejarah`, `agama`, `bindo`) VALUES ('$nis','$mtk','$prod','$pipas','$sejarah','$agama','$bindo')";
            $apakah = mysqli_query($this->conn, $sql);

            if ($apakah) {
                echo "Berhasil ditambahkan";
            } else {
                echo "Gagal";
                exit;
            }

            $data = array($mtk, $prod, $pipas, $sejarah, $agama, $bindo);


            $totalSemua = array_sum($data);
            echo "Jumlah total angka: " . $totalSemua . "<br>";


            $total1 = array_sum($data);
            $jumlahData = count($data);
            $rataRata = $total1 / $jumlahData;
            echo "Jumlah rata rata: " . $rataRata . "<br>";


            $maksimum = max($data);
            echo "Nilai maksimum: " . $maksimum . "<br>";


            $minimum = min($data);
            echo "Nilai minimum: " . $minimum . "<br>";


            if ($totalSemua >= 540) {
                echo "A";
            } elseif ($totalSemua >= 480) {
                echo "B";
            } elseif ($totalSemua >= 420) {
                echo "C";
            } else {
                echo "D";
            }
            echo "<br>";
        }
    }
}

include "connect.php";
$formHandler = new Form($conn);
$formHandler->handleSubmit();
?>
<html><a class="a" href="tampil.php">Tampil</a>

</html>