<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 6 - Bintang</title>
</head>
<body>
    <form action="contoh.php" method="POST">
    <fieldset>
        <legend>Registrasi</legend>
        <p>
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name">
        </p>
        <p></p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="gender">Jenis Kelamin:</label>
            <input type="radio" name="gender" id="gender" value="Laki-Laki">Laki-Laki
            <input type="radio" name="gender" id="gender" value="Perempuan">Perempuan
        </p>
        <p>
            <label for="agama">Agama</label>
            <select name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
        </p>
    </fieldset>
    </form>
</body>
</html>