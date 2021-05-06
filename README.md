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
13. php artisan schedule:work
14. php artisan serv
```

# API Android

-   [Autentikasi](#autentikasi)
    -   [Login](#login)
        -   [Pasien](#l_pasien)
    -   [Register](#register)
        -   [Pasien](#r_pasien)
    -   [Logout](#logout)
        -   [Pasien](#lg_pasien)
    -   [Update](#update)
        -   [Pasien](#up_pasien)
    -   [Upload Photo](#photo)
        -   [Pasien](#ph_pasien)
    -   [Get Photo](#get_photo)
        -   [Pasien](#get_ph_pasien)
    -   [Get Pasien](#get_biodata)
        -   [Pasien](#get_patient)
-   [Reset Password](#reset_passowrd)
    -   [Forgot](#forgot)
        -   [Pasien](#forgot_pasien)
    -   [Reset](#reset)
        -   [Pasien](#reset_pasien)
-   [Device](#device)
    -   [Create Hardware Identifier](#d_hardware)
        -   [Pasien](#dh_pasien)
    -   [Mobile Identifier](#d_mobile)
        -   [Pasien](#dm_pasien)
    -   [Enable/Disable Device](#en_device)
        -   [Pasien](#en_pasien)
-   [Geolokasi](#geolokasi)
-   [Monitoring](#m_monitoring)
    -   [Get Data Monitoring Pasien](#m_data_patient)
        -   [Pasien](#m_pasien)
-   [Rekam Medis](#rekam_medis)


# API Hardware
-   [Pulse Oximetry](#pulse)
    -   [Insert Spo2 & Bpm](#pulse_insert)
        -   [Pasien](#sen_patient)

<!-- ============= AUTHENTICATION START ============= -->
# <a name="autentikasi"></a>Autentikasi

<!-- ============= LOGIN START ============= -->
## <a name="login"></a>Login
#### <a name="l_pasien"></a>Login Pasien

Request :

-   Method : POST
-   Endpoint : 'patient/login'
-   Header :
    -   Content-Type : application/json
-   Body

```json
{
    "email": "example@gmail.com",
    "password": "example_password"
}
```

Response :

-   Success

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

-   Error

```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan gagal"
}
```
<!-- ============= LOGIN END ============= -->




<!-- ============= REGISTER START ============= -->
## <a name="register"></a>Register
#### <a name="r_pasien"></a>Register Pasien

Request :

-   Method : POST
-   Endpoint : 'patient/register'
-   Header :
    -   Content-Type : application/json
-   Body

```json
{
    "name": "example name",
    "email": "example@gmail.com",
    "password": "example_password",
    "password_confirmation": "example_password"
}
```

Response :

-   Success

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

-   Error

```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan gagal"
}
```
<!-- ============= REGISTER END ============= -->



<!-- ============= LOGOUT START ============= -->
## <a name="logout"></a>Logout
#### <a name="lg_pasien"></a>Logout Pasien

Request :

-   Method : POST
-   Endpoint : 'patient/logout'
-   Header :
    -   Content-Type : application/json
-   Body

```json
{
    "token_id": "example_token_id"
}
```

Response :

-   Success

```json
{
    "code": 200,
    "status": "berhasil",
    "message": "pesan logout"
}
```

-   Error

```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan logout"
}
```
<!-- ============= LOGOUT END ============= -->



<!-- ============= UPDATE START ============= -->
## <a name="update"></a>Update
#### <a name="up_pasien"></a>Update Pasien

Request :

-   Method : POST
-   Endpoint : 'patient/update'
-   Header :
    -   Content-Type : application/json
    -   Authorization : Bearer
-   Body

```json
{
    "nama": "nama_pasien",
    "jenis_kelamin": "jenis_kelamin_pasien",
    "alamat": "alamat_pasien",
    "tanggal_lahir": "tanggal_lahir_pasien",
    "phone": "nomor_telepon_pasien"
}
```

Response :

-   Success

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

-   Error

```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan update"
}
```
<!-- ============= UPDATE END ============= -->



<!-- ============= UPDATE PHOTO START ============= -->
## <a name="photo"></a>Update Photo
#### <a name="ph_pasien"></a>Upload Photo Pasien

Request :

-   Method : POST
-   Endpoint : 'patient/add-profile-photo'
-   Header :
    -   Content-Type : application/json
    -   Authorization : Bearer
-   Body

```json
{
    "photo": "base64 format"
}
```

Response :

-   Success

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

-   Error

```json
{
    "code": 400,
    "status": "gagal",
    "message": "pesan error upload foto"
}
```

## <a name="get_photo"></a>Get Photo

#### <a name="get_ph_pasien"></a>Pasien

Request :

-   Method : POST
-   Endpoint : 'patient/user-profile'
-   Header :
    -   Content-Type : application/json
    -   Authorization : Bearer

Response :

-   Success :

```json
{
    "code": 200,
    "status": "berhasil",
    "message": "data:image/png;base64,random_string_base64"
}
```

-   Error :

```json
{
    "code": 400,
    "status": "gagal",
    "message": "gambar gagal diupload"
}
```
<!-- ============= UPDATE PHOTO END ============= -->



<!-- ============= GET PATIENT START ============= -->
## <a name="get_biodata"></a>Get Biodata
#### <a name="biodata_pasien"></a>Pasien
<!-- ============= GET PATIENT END ============= -->
<!-- ============= AUTHENTICATION END ============= -->




<!-- ============= PASSWORD START ============= -->
# <a name="reset_password"></a>Reset Password

<!-- ============= FORGOT PASSWORD START ============= -->
## <a name="forgot"></a>Forgot
#### <a name="forgot_pasien"></a>Forgot Password Pasien

Request :

-   Method : POST
-   Endpoint : 'patient/forgot-password'
-   Header :
    -   Content-Type : application/json
-   Body:

```json
{
    "email": "patient@gmail.com"
}
```

Response :

-   Success

```json
{
    "code": 200,
    "status": "berhasil",
    "token": "reset password token"
}
```

-   Failed

```json
{
    "code": 400,
    "status": "gagal",
    "message": "error message"
}
```
<!-- ============= FORGOT PASSWORD END ============= -->



<!-- ============= RESET PASSWORD START ============= -->
## <a name="reset"></a>Reset
#### <a name="reset_pasien"></a>Reset Password Pasien

-   Method : POST
-   Endpoint : 'patient/reset-password'
-   Header :
    -   Content-Type : application/json
-   Body:

```json
{
    "password": "new password",
    "password_confirmation": "confirmation password",
    "token": "reset password token"
}
```

Response :

-   Success :

```json
{
    "code": 200,
    "status": "success",
    "message": "password reset successful"
}
```

-   Failed:

```json
{
    "code": 400,
    "status": "failed",
    "message": "check your param or invalid token"
}
```
<!-- ============= RESET PASSWORD END ============= -->
<!-- ============= PASSWORD END ============= -->



<!-- ============= DEVICE START ============= -->
# <a name="device"></a>Device
<!-- ============= HARDWARE START ============= -->
## <a name="d_hardware"></a>Create Hardware Identifier
### <a name="dh_pasien"></a>Pasien
-   Method : POST
-   Endpoint : 'patient/hardware/create'
-   Header : 
    -   Content-Type : application/json
    -   Authorization: Bearer
-   Body:
```json
{
    "serial_number" : "serial_number_hardware"
}
```

Response:
-   Success:
```json
{
    "code": 200,
    "status": "berhasil",
    "message": "device berhasil ditambahkan",
    "device": "serial_number"
}
```

-   Failed:
```json
{
    "code": 400,
    "status": "gagal",
    "message": "device gagal ditambahkan",
}
```
<!-- ============= HARDWARE END ============= -->



<!-- ============= ANDROID START ============= -->
## <a name="d_mobile"></a>Create Android Identifier
### <a name="dm_pasien"></a>Pasien
<!-- ============= END START ============= -->



<!-- ============= ENABLE/DISABLE START ============= -->
## <a name="en_device"></a>Enable/Disable Device
### <a name="en_pasien"></a>Pasien
-   Method: POST
-   Endpoint: 'patient/device/enable' (menyalakan perangkat)
-   Endpoint: 'patient/device/disable' (mematikan perangkat)
-   Header: 
    -   Content-Type : application/json
    -   Authorization : Bearer
-   Body:
```json
{
    "status" : "on/off",
}
```

Response :
-   Success:
```json
{
    "code" : 200,
    "status" : "berhasil",
    "message" : "device berhasil diaktifkan/dinonaktifkan"
}
```

-   Failed :
```json
{
    "code" : 400,
    "status" : "gagal",
    "message" : "device gagal diaktifkan/dinonaktifkan"
}
```

<!-- ============= ENABLE/DISABLE END ============= -->
<!-- ============= DEVICE END ============= -->



<!-- ============= DEVICE START ============= -->
# <a name="pulse"></a>Pulse Oximetry
<!-- ============= SENSOR START ============= -->
## <a name="pulse_insert"></a>Insert Spo2 & Bpm
#### <a name="sen_pasien"></a>Pasien

-   Method : POST
-   Endpoint : 'oximetry/insert'
-   Header :
    -   Content-Type : application/json
-   Body:

```json
{
    "serial_number" : "serial_number_device",
    "spo2": 99,
    "bpm": 90
}
```
<!-- ============= SENSOR END ============= -->
<!-- ============= DEVICE END ============= -->