<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi data
    $errors = [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $age = $_POST['age'] ?? '';
    $file = $_FILES['file'] ?? null;

    // Validasi input
    if (empty($name)) $errors[] = "Nama tidak boleh kosong.";
    if (empty($email)) $errors[] = "Email tidak boleh kosong.";
    if (empty($password) || strlen($password) < 6) $errors[] = "Password harus minimal 6 karakter.";
    if (empty($age) || !is_numeric($age)) $errors[] = "Usia harus angka.";
    if ($file && $file['error'] === 0) {
        if ($file['size'] > 1024 * 1024) {
            $errors[] = "Ukuran file terlalu besar. Maksimum 1MB.";
        }
        if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'txt') {
            $errors[] = "File harus berformat .txt.";
        }
    } else {
        $errors[] = "File tidak boleh kosong.";
    }

    if (count($errors) > 0) {
        echo "<h3>Validasi Error:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><a href='form.php'>Kembali ke Form</a>";
        exit;
    }

    // Baca isi file
    $fileContent = file_get_contents($file['tmp_name']);
    $lines = explode("\n", $fileContent);

    // Data tambahan
    $userAgent = $_SERVER['HTTP_USER_AGENT'];


    // Kirim data ke result.php
    session_start();
    $_SESSION['formData'] = compact('name', 'email', 'age', 'fileContent', 'lines', 'userAgent');
    header("Location: result.php");
    exit;
}
?>
