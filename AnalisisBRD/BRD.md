# Data Guru (BRD)
### Proyek: Aplikasi Manajemen Data Guru  
**Versi:** 1.2  
**Tanggal:** 11 November 2024  

---

## 1. Tujuan Proyek
**Objektif**:  
Aplikasi ini bertujuan untuk mempermudah admin dalam mengelola data guru, termasuk informasi pribadi, mata pelajaran yang diajarkan, dan status pekerjaan guru (aktif/tidak aktif). Aplikasi ini juga memungkinkan mahasiswa untuk melihat jadwal pengajaran guru.

---

## 2. Fitur Utama

### Untuk Admin
- **Pengelolaan Data Guru**:  
  Admin dapat menambah, mengubah, dan menghapus data guru. Setiap guru akan memiliki informasi lengkap seperti nama, NIP, alamat, telepon, mata pelajaran, jenis kelamin, tanggal lahir, dan status kerja (aktif atau tidak aktif).
  
- **Pencarian Guru**:  
  Admin dapat mencari guru berdasarkan nama, NIP, atau mata pelajaran.

### Untuk Mahasiswa
- **Melihat Daftar Guru**:  
  Mahasiswa dapat melihat informasi guru, termasuk nama, mata pelajaran, dan status guru.

---

## 3. Persyaratan Fungsional

### Sistem Login
- **Akses Berdasarkan Peran**:
  - Admin memiliki akses penuh untuk mengelola data guru.
  - Mahasiswa hanya dapat melihat data guru tanpa dapat mengubah atau menghapus data.

### Pengelolaan Data Guru
- **Admin**: Mengelola data guru, termasuk menambah, mengubah, dan menghapus data guru yang ada di sistem.
- **Mahasiswa**: Hanya dapat melihat informasi mengenai guru yang mengajar di sekolah.

---

## 4. Persyaratan Non-Fungsional

- **Kegunaan**:  
  Antarmuka aplikasi harus mudah digunakan oleh mahasiswa dan admin, dengan navigasi yang intuitif dan cepat.

- **Keamanan**:
  - Admin hanya yang bisa mengelola data guru.
  - Mahasiswa hanya dapat melihat informasi data guru tanpa hak untuk mengedit atau menghapus data.

---

## 5. Model, Migrasi, Seeder, dan Resource yang Perlu Dibuat

### Model: Dataguru
- **Model**: `Dataguru`  
  Menyimpan informasi lengkap guru.

### Migration
Struktur tabel `datagurus` yang akan dibuat pada database:

- `id`: `bigint UNSIGNED` (Primary Key)  
- `nama`: `varchar(255)` - Nama lengkap guru.  
- `nip`: `varchar(255)` - Nomor Induk Pegawai (unik).  
- `alamat`: `text` - Alamat tempat tinggal guru.  
- `telepon`: `varchar(15)` - Nomor telepon guru.  
- `mata_pelajaran`: `varchar(255)` - Mata pelajaran yang diajarkan oleh guru.  
- `jenis_kelamin`: `enum('L', 'P')` - Jenis kelamin guru (Laki-laki atau Perempuan).  
- `tanggal_lahir`: `date` - Tanggal lahir guru.  
- `status`: `enum('aktif', 'tidak aktif')` - Status aktif atau tidak aktif guru.  
- `created_at`: `timestamp` - Waktu data dibuat.  
- `updated_at`: `timestamp` - Waktu data terakhir diperbarui.

### Seeder
- **Seeder**: `DataguruSeeder`  
  Seeder ini bertugas mengisi database dengan data guru untuk pengujian.

### Resource
- **Endpoint API** untuk data guru yang dapat diakses oleh mahasiswa dan admin.  
  Admin dapat melakukan operasi CRUD, sementara mahasiswa hanya dapat mengakses data guru.

---

### Permissions

#### Model: `Permission`
- **Model**: `Permission`  
  Menyimpan daftar permissions yang mengatur hak akses pengguna dalam aplikasi (admin dan mahasiswa).

#### Permissions untuk Mahasiswa
- **Permissions**:  
  - `view_datagurus`: Mengizinkan mahasiswa melihat data guru.

#### Permissions untuk Admin
- **Permissions**:  
  - `manage_datagurus`: Mengizinkan admin untuk menambah, mengedit, atau menghapus data guru.

---

## 6. Analisis Permissions untuk Mahasiswa dan Admin

Dalam proyek aplikasi manajemen data guru ini, diperlukan sistem **permissions** untuk membatasi akses berdasarkan peran pengguna. Admin memiliki akses penuh untuk mengelola data guru, sementara mahasiswa hanya dapat melihat informasi terkait guru tanpa hak untuk mengedit atau menghapus data.

### Permissions yang Diperlukan

**Mahasiswa** hanya membutuhkan akses untuk **melihat** data guru, sehingga permissions yang diberikan adalah:

- **Permissions untuk Mahasiswa**:
  - `view_datagurus`: Mengizinkan mahasiswa melihat data guru.

**Admin**, di sisi lain, memiliki **akses penuh** untuk mengelola data guru, yang mencakup:

- **Permissions untuk Admin**:
  - `manage_datagurus`: Mengizinkan admin untuk menambah, mengedit, dan menghapus data guru.

---

### Implementasi Model dan Seeder untuk Permissions

#### Model: `Permission`
Model `Permission` sudah disediakan oleh paket Spatie Laravel Permission. Model ini akan menyimpan data permission yang mengatur hak akses pengguna. Berikut adalah beberapa contoh data permission:
- `name`: Nama dari permission, seperti `view_datagurus` dan `manage_datagurus`.
- `guard_name`: Guard untuk permission, defaultnya adalah `web`.

#### Seeder: `PermissionsSeeder`

Seeder `PermissionsSeeder` akan membuat permissions untuk role mahasiswa dan menetapkannya agar mahasiswa dapat melihat data guru. Admin sudah memiliki akses penuh secara default.

---

