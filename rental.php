<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link rel="stylesheet" href="rental.css">
</head>
<body>
    <div class="pesan">
    <form method="post">
    <h2>Rental Motor</h2>
        Nama Pelanggan : <input type="text" name = "nama" placeholder = "masukkan nama" id="nama" required><br>
        Lama Waktu Rental : <input type="number" name = "hari" placeholder = "waktu rental ( hari )" id="hari" required><br>
        Jenis Motor : <select name="jenisMotor" id="jenisMotor"><br><br>
            <option value="Beat Karbu">Beat Karbu</option>
            <option value="Vario">Vario</option>
            <option value="Aerox">Aerox</option>
            <option value="Vespa">Vespa</option>
        </select>
        <br><br><input class="kirim" type="submit" value="Kirim">
    </form>

    <?php
    class rentalMotor {
        private $nama;
        private $hari;
        private $jenisMotor;
        private $hargaMotor;
        private $pajak;

        public function __construct($nama, $hari, $jenisMotor){
            $this->nama = $nama;
            $this->hari = $hari;
            $this->jenisMotor = $jenisMotor;
            $this->hargaMotor = 60000;
            $this->pajak = 10000;
         
        }

        public function hitungTotal(){
            $total = $this->hargaMotor * $this->hari + $this->pajak;
            return $total;
        }

        public function Output(){
            echo "<div class = 'output'>";
            echo "<br>";
            echo "Nama : $this->nama <br>" ;
            echo "Lama Rental : $this->hari Hari <br>";
            echo "Jenis Motor : $this->jenisMotor <br>";
            echo "<p><b>Total : Rp. " . number_format($this->hitungTotal(), 2) . "</b></p>";
            echo "</div>";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $motorRental = new rentalMotor($_POST['nama'], $_POST['hari'], $_POST['jenisMotor']);
        $motorRental->Output();
    }
    ?>
    </div>
</body> 
</html>