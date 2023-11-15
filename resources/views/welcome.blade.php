<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Mahasiswa</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <form action="{{ route('students.store') }}" method="post">
    @csrf
    <h2>Formulir Mahasiswa JEK University</h2>

    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="gpa">GPA:</label>
    <input type="number" name="gpa" step="0.1" required>

    <button type="submit" name="submit">Submit</button>
  </form>
</body>
</html>

  <?php
  // Proses form jika tombol submit ditekan
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hubungkan ke database (gantilah informasi sesuai dengan pengaturan database Anda)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihan_crud";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gpa = $_POST['gpa'];

    // Simpan data ke database
    $sql = "INSERT INTO mahasiswa (name, email, gpa) VALUES ('$name', '$email', $gpa)";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
  }
  ?>
</body>
</html>
