# tugas_up_gbr_07098
hasil tugas PWL modul upload

Alur program:
Pada saat awal dibuka, aplikasi akan menampilkan file “index.php” dimana pada file tersebut akan ditampilkan form untuk memilih (browse) gambar yang akan diupload. Apabila ditekan tombol submit, maka form akan menjalankan file “upload.php” dan meng-upload file pada server apabila lolos validasi lalu menampilkan galeri. Adapun validasi yang dilakukan adalah sebagai berikut:
1.	Aplikasi akan mengecek tipe file (validasi MIME). Jenis file yang boleh diupload hanya jpg, jpeg, png, gif. File lain selain ekstensi tersebut apabila diupload akan muncul warning "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan."   
2.	Aplikasi kemudian akan mengecek ukuran file. Apabila melebihi 2MB, maka  akan muncul warning "Ukuran file terlalu besar."
3.	Apabila seluruh validasi berhasil dilewati, aplikasi akan insert nilai timestamp sekarang ke dalam database. Langkah ini dilakukan untuk mendapatkan nilai id terakhir yang dibuat untuk merename file gambar.
4.	File gambar yang diupload akan diupload pada 2 lokasi yaitu
/uploads/profile_pics/        file name diganti id_pengguna_timestamp.jpg ukuran file tetap sesuai aslinya
/uploads/thumbs/                id_pengguna_timestamp.jpg. ukuran gambar diubah dengan lebar 200px dan tinggi menyesuaikan
5. 	Setelah berhasil upload file, maka akan diarahkan ke file galeri.php untuk menampikan foto dalam format galeri. Gambar yang ditampilkan adalah versi thumbnail. Apabila dikehendaki melihat file asli, maka dapat klik Lihat Asli

