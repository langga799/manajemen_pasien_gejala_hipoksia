# Manajemen Pasien Gejala Hipoksia Terintegrasi Berbasis Web

## Tentang
Aplikasi Web ini ditujukan kepada pihak instansi kesehatan untuk mempermudah pengelolaan pasien gejala Hipoksia yang sering diderita oleh pasien Covid-19 saat ini. Fitur yang ditawarkan pada aplikasi web ini adalah pengelolaan data pasien, mengetahui lokasi pasien yang melakukan monitoring, data rekam medis pasien, dan daftar kontak erat yang dimiliki oleh pasien yang diisi melalui aplikasi android yang terintegrasi dengan aplikasi web ini.

## Integrasi Android
Aplikasi web ini terintegrasi dengan aplikasi android yang digunakan oleh pasien. Pasien melakukan proses pendaftaran akun dan pengisian identitas diri sebelum dapat melakukan monitoring. Fitur dari aplikasi ini adalah memantau hasil monitoring, mengetahui lokasi pasien, mengetahui hasil diagnosa berdasarkan monitoring, rekomendasi penanganan lanjut dari dokter, dan melakukan pengisian form kontak erat jika pasien mengalami gejala Hipoksia. Aplikasi android ini selain terintegrasi dengan web, juga terintegrasi dengan perangkat Hardware untuk mengambil data parameter yang terkait dengan gejala Hipoksia.

## Integrasi Hardware
Hardware yang terintegrasi ini bertugas untuk mendapatkan data saturasi oksigen dalam darah (Spo2) dan denyut jantung per menit (Bpm). Hardware ini berbasiskan mikrokontroler ESP8266 yang mengirimkan data Spo2 dan Bpm ke platform web (Thingspeak). Data kemudian akan diakses oleh aplikasi android saat pasien melakukan monitoing dan disimpan ke website Hipoksia. Proses pemantauan pasien dilakukan sebanyak 3 kali sekali dalam 24 jam selama 10 - 15 detik untuk sekali monitoring.

# Spesifikasi API
<!-- TOC depthFrom:1 depthTo:3 withLinks:1 updateOnSave:1 orderedList:0 -->
- [Autentikasi](#autentikasi)
    - [Login](#login)
        - [Super Admin](#l_super_admin)
        - [Dokter](#l_dokter)
        - [Admin](#l_admin)
        - [Pasien](#l_pasien)
    - [Register](#register)
        - [Super Admin](#r_super_admin)
        - [Dokter](#r_dokter)
        - [Admin](#r_admin)
        - [Pasien](#r_pasien)
    - [Logout](#logout)
        - [Super Admin](#lg_super_admin)
        - [Dokter](#lg_dokter)
        - [Admin](#lg_admin)
        - [Pasien](#lg_pasien)


# Detail API

## Autentikasi
### <a name="login"></a>Login
#### <a name="l_super_admin"></a>Login Super Admin
#### <a name="l_dokter"></a>Login Dokter
#### <a name="l_admin"></a>Login Admin
#### <a name="l_pasien"></a>Login Pasien

### <a name="register"></a>Register
#### <a name="r_super_admin"></a>Register Super Admin
#### <a name="r_dokter"></a>Register Dokter
#### <a name="r_admin"></a>Register Admin
#### <a name="r_pasien"></a>Register Pasien

### <a name="logout"></a>Logout
#### <a name="lg_super_admin"></a>Logout Super Admin
#### <a name="lg_dokter"></a>Logout Dokter
#### <a name="lg_admin"></a>Logout Admin
#### <a name="lg_pasien"></a>Logout Pasien

