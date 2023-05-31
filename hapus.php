<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="pragos.png" alt="">
    <br>

    <?php
    include "connect.php";

    class DataHandler
    {
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function deleteData($nis)
        {
            $query = "DELETE FROM tb_ngulang WHERE nis = '$nis'";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                echo "<a href='tampil.php'>Yeay Berhasil</a>";
            } else {
                echo "Gagal menghapus data.";
            }
        }
    }

    $dataHandler = new DataHandler($conn);
    if (isset($_GET['nis'])) {
        $nis = $_GET['nis'];
        $dataHandler->deleteData($nis);
    }
    ?>

</body>

</html>
