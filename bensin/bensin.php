<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body {
    text-align: center;
    background-image: url('shell.jpg');
    background-size: cover;
    font-family: 'Poppins', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

form {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    display: inline-block;
    padding: 20px;
    margin-top: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

h1, h2 {
    color: #1a73e8;
}

input[type="text"] {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    font-size: 16px;
}

select {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color: #1a73e8;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #155ab2;
}

.btn {
    text-align: center;
}

    </style>
</body>
</html>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<?php
class Shell {
    public $total,
    $jumlah,
    $jenis,
    $harga,
    $ppn = 0.1;

    function __construct($jumlah, $jenis)
    {
        switch ($jenis){
            case "supershell":
                $this->harga = 15420;
                break;
            case "shellvpower":
                $this->harga = 16130;
                break;
            case "shellvpowerdiesel":
                $this->harga = 18310;
                break;
            case "shellvpowernitro":
                $this->harga = 16510;
                break;
        }

        $this->total = $this->harga * $jumlah - ($this->harga * $jumlah * $this->ppn);
    }
}

class Beli extends Shell {
        public function __construct($jumlah, $jenis)
        {
        parent::__construct($jumlah, $jenis);
    }
}


if(isset($_POST['beli'])) {
    $jumlah = $_POST['inputLiter'];
    $jenis = $_POST['bensin'];
    $shell = new Beli($jumlah, $jenis);
    echo "<br>";
    echo "Total Yang Harus Anda Bayar Adalah " . "Rp." . $shell->total . "<br>Dengan Jumlah $jumlah Liter<br>Dengan Tipe Bensin $jenis <br>";
}

?>

<body>
    <form action="" method="POST">
        <h1>Masukan Jumlah Liter</h1>
        <input type="text" placeholder="Masukan Jumlah Liter" name="inputLiter" id="inputLiter" required>
        <h2>Pilih Tipe Bahan Bakar</h2>
        <div class="btn">
            <select name="bensin" id="bensin">
                <option value="supershell">Super Shell</option>
                <option value="shellvpower">Shell V Power</option>
                <option value="shellvpowerdiesel">Shell V Power Diesel</option>
                <option value="shellvpowernitro">Shell V Power Nitro</option>
            </select>
            <button  type="submit" name="beli">Beli</button>
        </div>
    </form>
</body>