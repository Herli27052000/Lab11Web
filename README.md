|   HERLIYANSYAH        |       312010387       |
|-----------------------|-----------------------|
|    TI.20.A.2          |   PEMROGRAMAN WEB     |
|   PERTEMUAN 12        |   PRAKTIKUM 11        |

## PERTEMUAN 12

## LAB 11 WEB

## PRAKTIKUM 11

Dipertemuan kali ini kita akan mempelajari **PHP** **FRAMEWORK** **(CODEIGNITER)** dan juga bagaimana menggunakan nya dan mendownload nya.

## LANGKAH - LANGKAH PRAKTIKUM

### PERSIAPAN
Sebelum memulai menggunakan Framework codeigniter, perlu dilakukan konfigurasi pada webserver. Beberapa ekstensi PHP perlu di aktifkan untuk kebutuhan pengembangan Codeigniter 4.


Berikut beberapa ekstensi yang perlu diaktifkan:
* **php-json** ekstension untuk bekerja dengan JSON;
* **php-mysqlnd** native driver untuk MySQL
* **php-xml** ekstension untuk bekerja dengan XML;
* **php-intl** ekstensi untuk membuat aplikasi multibahasa;
* **libcurl** (opsional), jika ingin pakai Curl.

## 1). UNTUK MENGAKTIFKAN EKSTENSI TERSEBUT MELALUI **XAMPP CONTROL PANEL** PADA BAGIAN APACHE KLIK **CONFIG -> PHP.ini**
![xampp](img/xampp.png)

**PENJELASAN**

Klik **PHP.ini**

## 2). PADA BAGIAN EKSTENSION,HILANGKAN TANDA ; (titik koma) pada ekstensi yang akan diaktifkan. Kemudian simpan kembali filenya dan restart Apache web server.
![aktifkan-extension](img/aktifkan-extension.png)

**PENJELASAN**

Aktifkan beberpa extension seperti contoh di atas

## 3). KEMUDIAN BUAT FOLDER BARU DENGAN NAMA **lab11_php_ci**
![folder-lab11_php_ci](img/folder-lab11-phpci.png)

**PENJELASAN**

Buat folder seperti diatas

## 4). INSTALASI CODEIGNITER 4

Untuk melakukan instalasi codeigniter 4 dapat dilakukan dengan dua cara , yaitu cara manual dan menggunakan ***composer***. pada praktikum ini kita menggunakan cara manual.

* Unduh **Codeigniter** dari website https://codeigniter.com/download
* Extrak file zip Codeigniter ke directori **htdocs/lab11_ci.**
* Ubah nama direktory **framework-4.x.xx** menjadi **ci4**
* Buka browser dengan alamat http://localhost/Lab11Web/lab11_php_ci/ci4/public/

![codeiginiter](img/codeigniter.png)

**PENJELASAN**

Codeigniter berhasil didownload dan disimpan file ekstrak nya

## 5). MENJALANKAN CLI (***Command Line Interface***)
Codeigniter 4 menyediakan CLI untuk mempermudah proses development. Untuk mengakses CLI buka terminal/command prompt.

 ![CLI](img/CLI.png)

 **PENJELASAN**

 Arahkan lokasi direktori sesuai dengan direktori kerja project dibuat (**C:\xampp\htdocs\Lab11Web\lab11_php_ci\ci4**)

 Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah
```CLI
php spark
```
![php-spark-CLI](img/php-spark-CLI.png)

**PENJELASAN**

php spark berhasil dipanggil

## 6). MENGAKTIFKAN MODE DEBUGGING
Codeigniter 4 menyediakan fitur **debugging** untuk memudahkan developer untuk mengetahui pesan erorr apabila terjadi kesalahan membuat kode program.

Secara default fitur ini belum aktif. Ketika terjadi erorr pada aplikasi akan ditampilkan pesan seperti berikut.

![erorr](img/erorr.png)

**PENJELASAN**

Semua jenis erorr akan ditampilkan sama. Untuk memudahkan mengetahui jenis erorrnya, maka perlu diaktifkan mode debugging dengan mengubah nilai konfigurasi pada environment variable **CI_ENVIRONMENT** menjadi **development.**

![konfigurasi-ci](img/konfigurasi-CI.png)

**PENJELASAN**

Ubah nama file **env** menjadi **.env** kemudian buka file tersebut dan ubah nilai variable **CI_ENVIRONMENT** menjadi **development.**

![parse-erorr](img/parse-erorr.png)

**PENJELASAN**

Contoh erorr yang terjadi. Untuk mencoba erorr tersebut, ubah kode pada file **app/Controller/Home.php** hilangkan titik koma pada akhir kode.

![home.php](img/Home.php.png)

dan akan erorr seperti gambar tampilan browser digambar sebelumnya.

## 7). MEMBUAT ROUTE BARU
Tambahkan kode berikut di dalam **Routes.php**
```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```
![route](img/route.png)

**PENJELASAN**

Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan perintah berikut.

```CLI
php spark routes
```
![php-spark-routes](img/cli-routes.png)

**PENJELASAN**

Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url: http://localhost:8080/about

![localhost-about](img/localhost-about.png)

**PENJELASAN**

Ketika diakses akan muncul tampilan erorr 404 file not found, itu artinya file/page tersebut tidak ada. Untuk mengakses halaman tersebut, harus dibuat terlebih dahulu Controller yang sesuai dengan routing yang dibuat yaitu Controller Page.

## 8). MEMBUAT CONTROLLER
Selanjutnya adalah membuat Controller Page. Buat file dengan nama **page.php** pada direktori Controller kemudian isi kodenya seperti berikut.

![about-page](img/about-page.png)

**PENJELASAN**

Refresh kembali browser,maka akan ditampilkan hasilnya seperti diatas,dan halaman sudah dapat di akses.


## 9). AUTO ROUTING
Secara default fitur *autoroute* pada Codeigniter sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variablenya. Untuk menonaktifkan ubah nilai **true** menjadi **false**

![page-tos](img/page-tos.png)

**PENJELASAN**

Method ini belum ada pada **routing**, sehingga cara mengaksesnya dengan menggunakan alamat url: http://localhost:8080/page/tos/

## 10). MEMBUAT VIEWS 
Selanjutnya adalah membuat view untuk tampilan web agar lebih menarik. Buat file baru dengan nama **about.php** pada direktori view (**app/view/about.php**) kemudian isi kodenya seperti berikut.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <hr>
    <p><?= $content; ?></p>
</body>
</html>
```
![code-about](img/code-about.png)

Ubah **method about** pada class **Controller Page** menjadi seperti berikut:
![controller-page](img/controller.php.png)

Maka hasil nya akan seperti ini dibrowser

![view-about](img/view-about.png)

## 11). MEMBUAT LAYOUT WEB DENGAN CSS
Pada dasarnya layout web dengan css dapat diimplementasikan dengan mudah pada codeigniter. Yang perlu diketahui adalah, pada Codeigniter 4 file yang menyimpan asset css dan javascript terletak pada direktori **public.**

Buat file css pada direktori **public** dengan nama **style.css** (copy file dari praktikum **lab4_layout**) Kita akan gunakan layout yang pernah dibuat pada praktikum 4.

![file-css](img/file-css.png)

Kemudian buat folder **template** pada direktori **view** kemudian buat file **header.php** dan **footer.php**

Seperti dibawah ini

![folder-template](img/folder-template.png)

Dan tambahkan file didalam nya.

**header.php**

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="container">
    <header>
        <h1>Layout Sederhana</h1>
    </header>
    <nav>
        <a href="<?= base_url('/');?>" class="active">Home</a>
        <a href="<?= base_url('/artikel');?>">Artikel</a>
        <a href="<?= base_url('/about');?>">About</a>
        <a href="<?= base_url('/contact');?>">Kontak</a>
    </nav>
    <section id="wrapper">
        <section id="main">
```

**footer.php**

```html
</section>
            <aside id="sidebar">
                <div class="widget-box">
                    <h3 class="title">Widget Header</h3>
                    <ul>
                        <li><a href="#">Widget Link</a></li>
                        <li><a href="#">Widget Link</a></li>
                    </ul>
                </div>
                <div class="widget-box">
                    <h3 class="title">Widget Text</h3>
                    <p>Vestibulum lorem elit, iaculis in nisl volutpat, malesuada
                    tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, faucibus felis.
                    Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
                </div>
            </aside>
        </section>
    <footer>
        <p>&copy; 2022 - Universitas Pelita Bangsa</p>
    </footer>
    </div>
</body>
</html>
```

Kemudian ubah file **app/views/about.php** seperti berikut

**about.php**

```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>

<?= $this->include('template/footer'); ?>
```

Kemudian refresh dan lihat kembali hasilnya pada browser

Maka tampilannya akan seperti berikut.

![tampilan-about](img/tampilan-about.png)

-------------------------------------------------------------------------------------------------------------------------------------------


## PERTANYAAN DAN TUGAS 
Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.

**Hasil**

![halaman-about](img/halaman-about.png)

**PENJELASAN**

Di atas adalah halaman About

![halaman-contact](img/halaman-contact.png)

**PENJELASAN**

Buat file baru pada **views** dengan nama file **contact.php** dan juga ubah pada **Controller** dibagian file **page.php** dengan menambahkan **include footer/header**



---------------------------------------------------------------------------------------------------------------------------------------------


|   HERLIYANSYAH        |       312010387       |
|-----------------------|-----------------------|
|   TI.20.A.2           |   PEMROGRAMAN WEB     |
|   PERTEMUAN 13        |   PRAKTIKUM 12        |


## PERTEMUAN 13

## LAB 11 WEB (***MELANJUTKAN SEBELUMNYA***)

## PRAKTIKUM 12 - FRAMEWORK LANJUTAN (CRUD)

Dipertemuan kali ini kita akan melanjutkan tugas sebelum nya pada **praktikum 11** di **Lab11Web** dengan menggunakan **php framework** **CodeIgniter 4** Pertemuan kali ini kita akan mempelajari membuat (**CRUD**) pada Framework CI4.


## LANGKAH - LANGKAH PRAKTIKUM

## PERSIAPAN
Untuk memulai membuat aplikasi CRUD sederhana, yang perlu dipersiapkan adalah database server menggunakan MySQL. pastikan MySQL server sudah dapat dijalankan melalui XAMPP.

## 1). MEMBUAT DATABASE
![create-database](img/create-database.png)

**PENJELASAN**

Membuat Database

```mySQL
CREATE DATABASE lab_ci4;
```

## 2). MEMBUAT TABEL
![create-table](img/create-table.png)

**PENJELASAN** 

Membuat tabel 

![database-artikel](img/database-artikel.png)

Database berhasil dibuat










## UNTUK PERTEMUAN KALI INI CUKUP SAMPAI DISINI DAN SAMPAI BERTEMU DI PERTEMUAN BERIKUTNYA

## TERIMAKASIH

## @HERLIYANSYAH