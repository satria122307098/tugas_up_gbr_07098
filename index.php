<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWL - Tugas Upload Gambar -</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body>

<h2>Tugas Praktek Upload Foto Profile</h2>
<div class="container">
    <div class="w-50  text-left mt-1">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto">Silahkan pilih file gambar yang hendak di-upload</label>
                <input class="form-control" type="file" name="gambar" id="gambar" autofocus required>
            </div><br>
            <input type="submit" name="upload" value="Upload">
        </form>
    </div>
</div>
</div>
</body>
</html>