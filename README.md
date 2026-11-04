# 🏢 E-Cuti BBPPTP Medan

> **Sistem Informasi Digitalisasi Pengajuan, Persetujuan, dan Rekapitulasi Cuti Pegawai**  
> Balai Besar Perbenihan dan Proteksi Tanaman Perkebunan (BBPPTP) Medan

---

## 📌 Gambaran Umum

**E-Cuti BBPPTP Medan** adalah platform web terintegrasi yang dirancang untuk mentransformasi proses administrasi tata usaha di lingkungan BBPPTP Medan dari sistem manual berbasis kertas menjadi digital. 

Sistem ini mempercepat proses pengajuan cuti pegawai, mempermudah verifikasi dan persetujuan oleh pimpinan/admin tata usaha, menerbitkan surat izin cuti secara otomatis, serta menyediakan fitur rekapitulasi data yang akurat dan dapat diekspor untuk kebutuhan pelaporan internal Tata Usaha.

---

## ✨ Fitur Utama

### 👨‍💼 1. Panel Pegawai
* **Autentikasi Aman:** Login khusus pegawai menggunakan NIP / Email instansi.
* **Dashboard Kuota Cuti:** Informasi *real-time* mengenai sisa kuota cuti tahunan dan riwayat pengajuan.
* **Form Pengajuan Cuti Digital:** 
  * Pemilihan jenis cuti (Cuti Tahunan, Cuti Sakit, Cuti Alasan Penting, Cuti Melahirkan, dll.).
  * Input tanggal mulai, tanggal selesai, dan kalkulasi durasi cuti secara otomatis.
  * Unggah dokumen pendukung (misal: surat keterangan dokter).
* **Tracking Status:** Pemantauan status pengajuan secara langsung (*Pending*, *Approved*, *Rejected*).
* **Unduh Surat Cuti:** Cetak/unduh Surat Izin Cuti resmi berformat PDF secara mandiri setelah disetujui.

### 🛡️ 2. Panel Admin / Tata Usaha
* **Dashboard Analitik Tata Usaha:** Ringkasan statistik pengajuan cuti harian, mingguan, dan bulanan.
* **Verifikasi & Persetujuan (Approval System):**
  * Peninjauan berkas dan alasan pengajuan cuti pegawai.
  * Akses persetujuan (*Approve*) atau penolakan (*Reject*) disertai catatan/alasan.
* **Generasi Surat Otomatis:** Sistem membuat Surat Izin Cuti berformat standar instansi lengkap dengan nomor surat resmi begitu pengajuan disetujui.
* **Rekapitulasi Data Cuti:**
  * Penarikan laporan rekapitulasi berdasarkan rentang tanggal, divisi/bagian, maupun jenis cuti.
  * Ekspor laporan rekap data ke format **Excel (.xlsx)** dan **PDF**.
* **Manajemen Data Pegawai & Kuota:** Pengelolaan data master pegawai, pembaruan jatah kuota cuti tahunan, dan pengontrolan hak akses.

---

## 🔄 Alur Kerja Sistem (Workflow)

```text
[Pegawai]                      [Admin Tata Usaha]                 [Sistem]
   │                                   │                             │
   ├─ 1. Login & Isi Form Cuti ───────>│                             │
   │                                   ├─ 2. Verifikasi Data         │
   │                                   │                             │
   │                                   ├─── IF APPROVED ────────────>│
   │                                   │                             ├─ 3. Potong Kuota Cuti
   │                                   │                             ├─ 4. Generate Surat Cuti (PDF)
   │<──────────────────────────────────┴─────────────────────────────┴─ 5. Status "Approved"
   │                                                                 │
   ├─ 6. Unduh Surat Cuti (PDF)                                      │
   │                                                                 │
   │                                   └─ 7. Rekapitulasi Data ───────┼─ 8. Export Excel / PDF
```

---

## 🛠️ Teknologi yang Digunakan (Tech Stack)

* **Backend:** PHP (CodeIgniter / Laravel / Native PHP)
* **Database:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap / AdminLTE
* **PDF Engine:** Dompdf / FPDF (untuk pembuatan Surat Cuti otomatis)
* **Spreadsheet Engine:** PhpSpreadsheet / SheetJS (untuk rekapitulasi data ke Excel)
* **Server Compatibility:** Apache / Nginx (XAMPP / Server VPS / CPanel)

---

## 💻 Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan lingkungan server memenuhi kriteria berikut:

* PHP v7.4 atau v8.x
* MySQL / MariaDB v5.7 atau lebih baru
* Ekstensi PHP aktif: `mysqli`, `pdo_mysql`, `gd`, `mbstring`, `curl`, `zip`
* Web Server (Apache / Nginx)

---

## 🚀 Panduan Instalasi

1. **Clone Repositori**
   ```bash
   git clone https://github.com/faqbila/E-cuti-staff-BBPPTP-Medan.git
   cd E-cuti-staff-BBPPTP-Medan
   ```

2. **Pengaturan Database**
   * Buka phpMyAdmin / MySQL Client Anda.
   * Buat database baru, contoh: `bbpptp`.
   * Import berkas SQL yang berada di dalam folder `database/bbpptp.sql`.

3. **Konfigurasi Koneksi Database**
   * Buka file konfigurasi database (contoh pada CodeIgniter/Laravel/Native):
     ```php
     // .env atau application/config/database.php
     'hostname' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'bbpptp',
     ```

4. **Jalankan Aplikasi**
   * Jika menggunakan XAMPP, simpan folder di `htdocs/` dan akses via browser: `http://localhost/E-cuti-staff-BBPPTP-Medan`.
   * Jika menggunakan Laravel Development Server:
     ```bash
     php artisan serve
     ```

---

## 🔑 Hak Akses Pengguna Default

> **Catatan:** Segera ubah kata sandi default setelah instalasi pertama di lingkungan produksi.

| Role | Username / NIP | Password | Akses |
| :--- | :--- | :--- | :--- |
| **Admin TU** | `admin` | `admin123` | Full Access (Verifikasi, Rekapitulasi, Master Data) |
| **Pegawai** | `199501012020121001` | `pegawai123` | Pengajuan Cuti, Tracking, Cetak Surat |

---

---

## 📑 Format Output & Laporan

1. **Surat Izin Cuti (PDF):** Diterbitkan otomatis sesuai dengan format standar tata usaha instansi pemerintah yang mencantumkan detail pemohon, durasi cuti, persetujuan admin/atasan, dan nomor surat resmi.
2. **Rekapitulasi Cuti (Excel/PDF):** Tabel terstruktur memuat data NIP, Nama, Jabatan, Jenis Cuti, Tanggal Pengajuan, Status, dan Sisa Kuota Cuti Pegawai untuk keperluan arsip tahunan Tata Usaha BBPPTP Medan.

---

## 📄 Lisensi & Hak Cipta

Dikembangkan untuk **Balai Besar Perbenihan dan Proteksi Tanaman Perkebunan (BBPPTP) Medan**.  
Seluruh hak cipta dilindungi undang-undang dan penggunaan terbatas untuk lingkungan internal instansi.
