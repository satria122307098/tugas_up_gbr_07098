<?php
date_default_timezone_set('Asia/Jakarta'); // Set zona waktu jika perlu

$conn = new mysqli("localhost", "root", "", "db_web");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Direktori penyimpanan
$upload_dir = "uploads/profile_pics/";
$upload_dir_thumbs = "uploads/thumbs/";



if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_size = 2 * 1024 * 1024; // 2MB

    $file_type = $_FILES['gambar']['type'];
    $file_size = $_FILES['gambar']['size'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // Validasi tipe dan ukuran file
    if (!in_array($file_type, $allowed_types)) {
        die("Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.");
    }
    if ($file_size > $max_size) {
        die("Ukuran file terlalu besar.");
    }

    // Insert kosong dulu untuk dapatkan ID
    $stmt = $conn->prepare("INSERT INTO gambartugas (updated_at) VALUES (NOW())");
    $stmt->execute();
    $last_id = $conn->insert_id;

    // Buat nama file
    $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    $timestamp = date("YmdHis");
    $new_filename = "{$last_id}_{$timestamp}." . strtolower($ext);
    $filepath = $upload_dir . $new_filename;
    $thumbpath = $upload_dir_thumbs . $new_filename;

    // Resize gambar ke lebar 200px
    list($orig_width, $orig_height) = getimagesize($tmp_name);
    $new_width = 200;
    $ratio = $new_width / $orig_width;
    $new_height = intval($orig_height * $ratio);

    // Buat image baru
    switch ($file_type) {
        case 'image/jpeg':
            $src_img = imagecreatefromjpeg($tmp_name);
            break;
        case 'image/png':
            $src_img = imagecreatefrompng($tmp_name);
            break;
        case 'image/gif':
            $src_img = imagecreatefromgif($tmp_name);
            break;
        default:
            die("Format gambar tidak dikenali.");
    }
   
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $filepath)) {
        echo "File ". htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil
        diupload. dan di-rename menjadi ".$new_filename;
       
    } else {
        echo "Gagal mengupload file.";
    }


    $resized_img = imagecreatetruecolor($new_width, $new_height);
   
 //$ori_img = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($resized_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);

    // Simpan file
    switch ($file_type) {
        case 'image/jpeg':
            imagejpeg($resized_img, $thumbpath);
            break;
        case 'image/png':
            imagepng($resized_img, $thumbpath);
            break;
        case 'image/gif':
            imagegif($resized_img, $thumbpath);
            break;
    }

    // Optional: bisa juga disimpan versi thumbnail ke lokasi lain
    //$thumbpath = $filepath; // atau ganti jika bikin thumbnail terpisah
    $thumbpath = $upload_dir_thumbs . $new_filename;
    // Update data ke DB
    $stmt = $conn->prepare("UPDATE gambartugas SET filename = ?, filepath = ?, thumbpath = ?, width = ?, height = ?, updated_at = NOW() WHERE id = ?");
    $stmt->bind_param("sssiii", $new_filename, $filepath, $thumbpath, $orig_width, $orig_height, $last_id);
    $stmt->execute();

    echo "Upload berhasil! Gambar disimpan sebagai: " . $new_filename;
    header("Location: galeri.php");

    imagedestroy($src_img);
    imagedestroy($resized_img);
} else {
    echo "Silakan pilih gambar untuk diupload.";
}

$conn->close();
?>
