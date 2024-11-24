<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran</h2>
        <form id="registrationForm" method="post" enctype="multipart/form-data" action="process.php">
            <label for="name">Nama:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" minlength="6" required><br><br>

            <label for="age">Usia:</label><br>
            <input type="number" id="age" name="age" min="10" max="100" required><br><br>

            <label for="file">Upload File (TXT):</label><br>
            <input type="file" id="file" name="file" accept=".txt" required><br><br>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            const fileInput = document.getElementById("file");
            const file = fileInput.files[0];

            if (file) {
                if (file.size > 1024 * 1024) {
                    alert("File terlalu besar! Maksimum 1MB.");
                    event.preventDefault();
                } else if (!file.name.endsWith(".txt")) {
                    alert("File harus berformat .txt!");
                    event.preventDefault();
                }
            } else {
                alert("File tidak boleh kosong!");
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
