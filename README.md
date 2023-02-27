Kode sistem backend untuk aplikasi mobile El-AKIP, yaitu aplikasi pemerintahan untuk membantu proses monitoring kinerja perangkat daerah di Kabupaten Grobogan sebagai keperluan skripsi Universitas Dian Nuswantoro oleh Adela Salma Nadhifa (NIM A11.2019.12079) tahun 2023 menggunakan bahasa pemrograman native PHP 7.4 dan MySQL.

Sistem backend berhasil dibangun dan dideploy menggunakan hosting server Google Cloud Platform melalui App Engine dan CloudSQL dengan link https://refined-iridium-373115.uc.r.appspot.com

API yang dihasilkan :

1. /login

2. /visi

          /read

          /read_single
     
          /create
     
          /update
     
          /delete
     
     
3. /misi

          /read

          /read_single
     
          /create
     
          /update
     
          /delete
     
     
4. /tujuan
       
       /read

       /read_single
       
       /create
       
       /update
       
       /delete
       
       
5. /indikator_target

                 /read
                 
                 /read_single
                 
                 /create
                 
                 /update
                 
                 /delete
                 
                 
6. /kegiatan

         /read

         /read_single
         
         /create
         
         /update
         
         /delete

Gambar penunjang :
1. Halaman home, berisi fitur login admin
<img width="1436" alt="Screenshot 2023-02-27 at 11 46 11 PM" src="https://user-images.githubusercontent.com/80314714/221626376-0d04d820-fa30-4ba4-aa26-69962cbc3a26.png">

2. Halaman index, berisi fitur trigger yang akan menampilkan history user yang berhasil login atau memodifikasi data di dalam aplikasi El-AKIP
<img width="1436" alt="Screenshot 2023-02-27 at 11 42 42 PM" src="https://user-images.githubusercontent.com/80314714/221625657-ca1b1631-6f1f-40a7-8b28-b7cb222a4535.png">
