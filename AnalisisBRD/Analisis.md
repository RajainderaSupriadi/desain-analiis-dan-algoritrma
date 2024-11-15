# **Analisis Aplikasi Manajemen Data Guru**

### **1. Tujuan Aplikasi**
Aplikasi **Manajemen Data Guru** bertujuan untuk memberikan solusi yang efisien bagi pengelolaan data guru di sebuah institusi pendidikan. Dengan aplikasi ini, admin atau bagian akademik dapat mengelola dan memperbarui data guru secara mudah, sedangkan mahasiswa dapat mengakses informasi dasar tentang guru yang mengajar di institusi tersebut. Aplikasi ini akan mengurangi ketergantungan pada pengelolaan data manual dan memastikan bahwa semua pihak memiliki akses yang sesuai berdasarkan peran mereka.

### **2. Aktor dan Peran**
#### **Admin/Bagian Akademik**
- **Peran Utama**: Admin memiliki akses penuh ke aplikasi dan bertanggung jawab untuk mengelola semua aspek data guru.
- **Tanggung Jawab**:
  - **Menambah** data guru baru.
  - **Mengubah** data guru yang sudah ada (misalnya, memperbarui status, alamat, atau mata pelajaran yang diajarkan).
  - **Menghapus** data guru yang sudah tidak aktif atau perlu dihapus.
  - **Mencari** data guru berdasarkan kriteria tertentu (misalnya, nama, NIP, atau mata pelajaran).

#### **Mahasiswa**
- **Peran Utama**: Mahasiswa hanya dapat melihat data guru yang ada, tanpa hak untuk mengubah atau menghapus data tersebut.
- **Tanggung Jawab**:
  - **Melihat** data guru yang mengajar mereka, termasuk informasi nama, mata pelajaran, dan status guru.

---

### **3. Analisis Fitur dan Fungsionalitas**

#### **Fitur untuk Mahasiswa**
- **Melihat Data Guru**:  
  Mahasiswa dapat mengakses daftar guru yang mengajar mata pelajaran mereka. Aplikasi ini menyediakan tampilan yang memungkinkan mahasiswa untuk melihat informasi seperti:
  - **Nama guru**
  - **Mata pelajaran yang diajarkan**
  - **Status guru** (apakah aktif atau tidak aktif mengajar)

  Fitur ini dirancang untuk memudahkan mahasiswa dalam mencari informasi terkait guru mereka tanpa memerlukan login atau akses tambahan.

#### **Fitur untuk Admin/Bagian Akademik**
- **Pengelolaan Data Guru**:  
  Admin memiliki kemampuan untuk mengelola data guru secara lengkap, termasuk:
  - **Menambah guru** baru ke dalam sistem dengan informasi lengkap seperti nama, NIP, alamat, telepon, mata pelajaran, jenis kelamin, tanggal lahir, dan status pekerjaan.
  - **Mengedit** data guru yang sudah ada jika ada perubahan (misalnya, perubahan mata pelajaran atau status).
  - **Menghapus** data guru yang tidak lagi aktif atau yang sudah tidak bekerja di institusi.
  
- **Pencarian Data Guru**:  
  Admin dapat mencari data guru berdasarkan nama, NIP, atau mata pelajaran yang diajarkan. Fitur pencarian ini akan mempermudah admin dalam mengelola dan menemukan data guru tanpa harus menelusuri setiap entri manual.

---

### **4. Persyaratan Fungsional**
Aplikasi ini dibangun untuk memenuhi beberapa persyaratan fungsional berikut:

#### **Sistem Login dan Akses Berdasarkan Peran**
- **Admin**: Admin memiliki hak akses penuh untuk melakukan operasi CRUD (Create, Read, Update, Delete) terhadap data guru. Admin dapat melakukan pencarian dan manipulasi data secara bebas.
- **Mahasiswa**: Mahasiswa hanya memiliki akses untuk melihat informasi data guru yang ada, tanpa hak untuk mengedit atau menghapus data. Mahasiswa tidak memerlukan akun login untuk mengakses data ini.

#### **Pengelolaan Data Guru**
- **Admin**: Admin dapat menambah data guru baru, mengedit data yang ada, dan menghapus data guru yang tidak aktif atau tidak relevan lagi.
- **Mahasiswa**: Mahasiswa hanya dapat melihat informasi guru yang sudah diinput oleh admin. Mereka tidak dapat mengedit atau menghapus data guru.

---

### **5. Persyaratan Non-Fungsional**

- **Kegunaan**:  
  Aplikasi harus memiliki antarmuka yang sederhana, intuitif, dan mudah digunakan oleh semua pengguna. Desain harus memudahkan pengguna dalam mencari data guru dengan beberapa klik saja.
  
- **Keamanan**:  
  - **Admin**: Admin memiliki kontrol penuh terhadap data guru dan dapat menambah, mengubah, atau menghapus informasi tersebut.
  - **Mahasiswa**: Mahasiswa hanya memiliki hak untuk melihat informasi data guru yang ada dan tidak memiliki kemampuan untuk mengubah atau menghapus data tersebut. Hal ini mencegah adanya penyalahgunaan atau kesalahan pengelolaan data oleh pihak yang tidak berwenang.

- **Kinerja**:  
  Aplikasi harus cukup responsif untuk menangani pencarian data guru dalam waktu singkat, bahkan ketika data yang disimpan dalam sistem bertambah banyak.

---

### **6. Model, Migrasi, Seeder, dan Resource yang Perlu Dibuat**

#### **Model: Dataguru**
- **Model `Dataguru`** menyimpan semua informasi terkait guru. Setiap guru akan memiliki informasi yang lengkap, mulai dari nama, NIP, alamat, telepon, mata pelajaran, jenis kelamin, tanggal lahir, hingga status pekerjaan (aktif atau tidak aktif).

#### **Migration**
- **Struktur Tabel `datagurus`**:
  - `id`: BigInt UNSIGNED (Primary Key)
  - `nama`: varchar(255)
  - `nip`: varchar(255)
  - `alamat`: text
  - `telepon`: varchar(15)
  - `mata_pelajaran`: varchar(255)
  - `jenis_kelamin`: enum('L', 'P')
  - `tanggal_lahir`: date
  - `status`: enum('aktif', 'tidak aktif')
  - `created_at` & `updated_at`: timestamp
  
#### **Seeder**
- **Seeder `DataguruSeeder`** digunakan untuk mengisi data awal tentang guru yang ada di database untuk keperluan pengujian.

#### **Resource**
- **Endpoint API** untuk **Data Guru**:
  Admin dapat melakukan operasi CRUD, sementara mahasiswa hanya dapat mengakses informasi guru.

---

### **7. Implementasi Permissions**

#### **Model `Permission`**
- Menggunakan **Spatie Laravel Permission** untuk mengelola hak akses (permissions) untuk admin dan mahasiswa.

- **Permissions untuk Mahasiswa**:
  - `view_datagurus`: Memberikan hak kepada mahasiswa untuk melihat data guru.

- **Permissions untuk Admin**:
  - `manage_datagurus`: Memberikan hak kepada admin untuk menambah, mengedit, dan menghapus data guru.

#### **Seeder `PermissionsSeeder`**
- **PermissionsSeeder** digunakan untuk menambahkan permissions bagi masing-masing role (admin dan mahasiswa).
