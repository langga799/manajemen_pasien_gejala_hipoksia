# Manajemen Pasien Gejala Hipoksia Terintegrasi Berbasis Web

## Tentang
Aplikasi Web ini ditujukan kepada pihak instansi kesehatan untuk mempermudah pengelolaan pasien gejala Hipoksia yang sering diderita oleh pasien Covid-19 saat ini. Fitur yang ditawarkan pada aplikasi web ini adalah pengelolaan data pasien, mengetahui lokasi pasien yang melakukan monitoring, data rekam medis pasien, dan daftar kontak erat yang dimiliki oleh pasien yang diisi melalui aplikasi android yang terintegrasi dengan aplikasi web ini.

## Integrasi Android
Aplikasi web ini terintegrasi dengan aplikasi android yang digunakan oleh pasien. Pasien melakukan proses pendaftaran akun dan pengisian identitas diri sebelum dapat melakukan monitoring. Fitur dari aplikasi ini adalah memantau hasil monitoring, mengetahui lokasi pasien, mengetahui hasil diagnosa berdasarkan monitoring, rekomendasi penanganan lanjut dari dokter, dan melakukan pengisian form kontak erat jika pasien mengalami gejala Hipoksia. Aplikasi android ini selain terintegrasi dengan web, juga terintegrasi dengan perangkat Hardware untuk mengambil data parameter yang terkait dengan gejala Hipoksia.

## Integrasi Hardware
Hardware yang terintegrasi ini bertugas untuk mendapatkan data saturasi oksigen dalam darah (Spo2) dan denyut jantung per menit (Bpm). Hardware ini berbasiskan mikrokontroler ESP8266 yang mengirimkan data Spo2 dan Bpm ke platform web (Thingspeak). Data kemudian akan diakses oleh aplikasi android saat pasien melakukan monitoing dan disimpan ke website Hipoksia. Proses pemantauan pasien dilakukan sebanyak 3 kali sekali dalam 24 jam selama 10 - 15 detik untuk sekali monitoring.

# Cara Install
```bash
1. buka git bash
2. git clone https://github.com/yofan2408/manajemen_pasien_gejala_hipoksia.git
3. cd manajemen_pasien_gejala_hipoksia
4. composer install
5. npm install
6. npm run dev
7. buat database di php my admin
8. ubah nama file .env.example menjadi .env
9. php artisan key:generate
10. setup database .env
11. php artisan migrate --seed
12. php artisan passport:install
13. php artisan serv
```

# Spesifikasi API
<!-- TOC depthFrom:1 depthTo:3 withLinks:1 updateOnSave:1 orderedList:0 -->
- [Autentikasi](#autentikasi)
    - [Login](#login)
        - [Pasien](#l_pasien)
    - [Register](#register)
        - [Pasien](#r_pasien)
    - [Logout](#logout)
        - [Pasien](#lg_pasien)
    - [Update](#update)
        - [Pasien](#up_pasien)
    - [Upload Photo](#photo)
        - [Pasien](#ph_pasien)
    - [Get Photo](#g_photo)
        - [Pasien](#get_photo)

# Detail API

## Autentikasi
### <a name="login"></a>Login
#### <a name="l_pasien"></a>Login Pasien
Request : 
- Method : POST
- Endpoint : 'api/login'
- Header : 
    - Accept : application/json
- Body
```json
{
    "email": "example@gmail.com",
    "password": "example_password",
}
```

Response : 
- Success
```json
{
    "code": 200,
    "status": "berhasil",
    "token_type": "Bearer",
    "access_token": "example_token",
    "token_id": "example_token_id",
    "user": {
        "id": "user_id",
        "name": "example_name",
        "email": "example_name@gmail.com",
        "created_at": "2021-02-17T16:16:36.000000Z",
        "updated_at": "2021-02-17T16:16:36.000000Z"
    }
}
```            
- Error
```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan gagal"
}
```  

### <a name="register"></a>Register
#### <a name="r_pasien"></a>Register Pasien
Request : 
- Method : POST
- Endpoint : 'api/register'
- Header : 
    - Accept : application/json
- Body
```json
{
    "name": "example name",
    "email": "example@gmail.com",
    "password": "example_password",
    "password_confirmation": "example_password",
}
```

Response : 
- Success
```json
{
    "code": 200,
    "status": "berhasil",
    "token_type": "Bearer",
    "access_token": "example_token",
    "token_id": "example_token_id",
    "user": {
        "id": "user_id",
        "name": "example_name",
        "email": "example_name@gmail.com",
        "created_at": "2021-02-17T16:16:36.000000Z",
        "updated_at": "2021-02-17T16:16:36.000000Z"
    }
}
```            
- Error
```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan gagal"
}
```  

### <a name="logout"></a>Logout
#### <a name="lg_pasien"></a>Logout Pasien
Request : 
- Method : POST
- Endpoint : 'api/logout'
- Header : 
    - Accept : application/json
- Body
```json
{
    "token_id": "example_token_id",
}
```

Response : 
- Success
```json
{
    "code": 200,
    "status": "berhasil",
    "message": "pesan logout"
}
```            
- Error
```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan logout"
}
```  

### <a name="update"></a>Update
#### <a name="up_pasien"></a>Update Pasien
Request : 
- Method : POST
- Endpoint : 'api/update'
- Header : 
    - Accept : application/json
    - Authorization : Bearer
- Body
```json
{
    "jenis_kelamin": "jenis_kelamin_pasien",
    "alamat": "alamat_pasien",
    "tanggal_lahir": "tanggal_lahir_pasien",
    "phone": "nomor_telepon_pasien"
}
```

Response : 
- Success
```json
{
    "code": 200,
    "status": "berhasil",
    "message": "data pasien telah di update",
    "user": {
        "id": 1,
        "name": "nama_paisen",
        "email": "email_pasien",
        "jenis_kelamin": "jenis_kelamin_pasien",
        "alamat": "alamat_pasien",
        "tangggal_lahir": "tanggal_lahir_pasien",
        "phone": "nomor_telepon_pasien",
        "created_at": "2021-02-18T07:44:04.000000Z",
        "updated_at": "2021-02-18T07:45:46.000000Z"
    }
}
```            
- Error
```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan update"
}
```  

### <a name="photo"></a>Update
#### <a name="ph_pasien"></a>Upload Photo Pasien
Request : 
- Method : POST
- Endpoint : 'api/update'
- Header : 
    - Accept : application/json
    - Authorization : Bearer
- Body
```json
{
    "gambar": "gambar.jpg",
}
```

Response : 
- Success
```json
{
    "code": 200,
    "status": "berhasil",
    "message": "pesan berhasil",
    "user": {
        "id": 1,
        "name": "nama_pasien",
        "photo": "namafoto.jpg",
        "created_at": "2021-02-18T05:30:33.000000Z",
        "updated_at": "2021-02-19T04:09:55.000000Z"
    }
}
```            
- Error
```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan error upload foto"
}
```     

### <a name="g_photo"></a>Get Photo
#### <a name="get_pasien"></a>Get Photo Pasien
