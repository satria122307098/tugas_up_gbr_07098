<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Galeri Gambar</title>
    <style>
        .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        }

        .gallery-item {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        width: 220px;
        }

        img {
        width: 200px;
        height: auto;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body>
    <h2>Galeri Gambar</h2>
    <div class="gallery">
    <?php
        $sql = "SELECT * FROM gambartugas ORDER BY updated_at DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='gallery-item'>";
                echo "<img src='" . $row['thumbpath'] . "' alt='Thumbnail'>";
                echo "<p> {$row['filename']}</p>";
                echo "<p><strong>Ukuran:</strong> {$row['width']}x{$row['height']}</p>";
                echo "<p><a href='" . $row['filepath'] . "' target='_blank'>Lihat Asli</a></p>";
                echo "</div>";
            }
        } else {
        echo "<p>Belum ada gambar diunggah.</p>";
        }
        $conn->close();
    ?>
    </div>
    <div  class="container">
        <p  class="container"><br><a href='index.php' target='_blank' >Upload gambar</a><p>
    </div>
</body>
</html>