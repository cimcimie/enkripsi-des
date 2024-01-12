<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DES Enkripsi Dan Dekripsi Contoh</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav></nav>
    <div class="container">
        <div class="center-content">
            <h1>DES Enkripsi Dan Dekripsi</h1>
            <hr class="separator">
        </div>
        <h2>Enkripsi Data</h2>
        <form action="" method="post">
            <label for="data">Data Yang Mau Di Enkripsi</label><br>
            <textarea id="data" name="data" cols="50" rows="4" placeholder="Masukkan data untuk dienkripsi"></textarea><br>
            <input type="submit" name="encrypt" value="Encrypt">
        </form>
        <h2>Dekripsi Data</h2>
        <form action="" method="post">
            <label for="encrypted_data">Data yang di Enkripsi</label><br>
            <textarea id="encrypted_data" name="encrypted_data" cols="50" rows="4" placeholder="Tempel data terenkripsi di sini"></textarea><br>
            <input type="submit" name="decrypt" value="Decrypt">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $key = "abcdefghijklmnopqrstuvwxyz";
            $iv = "123456789abcdefg";

            if (isset($_POST["encrypt"])) {
                $data = $_POST["data"];
                $encryptedData = aes_encrypt($data, $key, $iv);
                echo '<div class="result"><h3>Encrypted Data:</h3>';
                echo '<p>' . base64_encode($encryptedData) . '</p></div>';
            } elseif (isset($_POST["decrypt"])) {
                $encryptedData = base64_decode($_POST["encrypted_data"]);
                $decryptedData = aes_decrypt($encryptedData, $key, $iv);
                echo '<div class="result"><h3>Decrypted Data:</h3>';
                echo '<p>' . $decryptedData . '</p></div>';
            }
        }

        function aes_encrypt($data, $key, $iv) {
            return openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        }

        function aes_decrypt($data, $key, $iv) {
            return openssl_decrypt($data, 'aes-256-cbc', $key, 0, $iv);
        }
        ?>
    </div>
</body>
</html>
