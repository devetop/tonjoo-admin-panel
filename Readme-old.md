# Readme

Stack aplikasi `Tonjoo Admin Panel` dirancang untuk berjalan menggunakan `docker` pada `environment` production. Untuk pengembangan local developer dapat memilih menggunakan `docker` atau cara _tradisional_ yaitu menggunakan  instalasi php dan node pada mesin developer.

Basis docker yang digunakan adalah [dockerize-php](https://git.tonjoo.com/tonjoo/dockerize-wordpress)

## Stack Aplikasi

`Tonjoo Admin Panel`  merupakan sebuah stack aplikasi berbasis modular dengan memisahkan bagian `frontend` dan `backend` aplikasi. 

| Service  | Stack | Folder |  URL Local | URL Domain |  Deskripsi |
|------------|---------|-----------|-----------|-----------|-----------|
| Admin Panel | nginx | `admin`|- | admin.dev.local:57710 |  Admin tools (phpmyadmin etc)  |
|   | nginx,traefik | `admin`| -  | proxy.dev.local:57710 |  Traefik Dashboard  |
| Backend | laravel,inertia,react| `backend` | 127.0.0.1:8000 | admin.dev.local |  Admin Backend  |
| Inertia Dashboard | laravel,inertia,react | `backend` | 127.0.0.1:8000/dashboard | admin.dev.local/dashboard | Dashboard aplikasi dengan base Laravel Inertia  |
| Next JS Web | next-js,react | `frontend-web`| 127.0.0.1:8080/ | dev.local |  Website berbasis NextJS  |
| Next JS Dashboard | next-js,react | `frontend-dashboard` | 127.0.0.1:8090/ | dashboard.dev.local | Aplikasi Web berbasis NextJS  |


## Template Style dan Static Pages

### Backend

Untuk mempermudah pengembangan aplikasi , terutama aplikasi `Backend`, template static aplikasi dapat diakses pada tautan berikut

| Service  | URL Dev | Deskripsi |
|------------|---------|-----------|
| JSX Template| 127.0.0.1:8080/jsx | Style guide untuk JSX|
| HTML Template| 127.0.0.1:8080/html | Style guide untuk HTML|

### Frontend Web dan Dashboard

Pengembangan aplikasi `Next` dapat dilakukan oleh developer Front-End pada folder : 

- `frontend-web/src/pages/static`  
- `frontend-dashboard/src/pages/static`

## Environment

Terdapat beberapa konfigurasi environment yang dapat digunakan untuk pengembangan aplikasi


| Environment  | docker-compose | Penjelasan |
|------------|---------|-----------|
| dev local | docker-compose.yml | Tempat developer mengembangkan aplikasi, aplikasi dijalankan dengan php artisan serve atau npm run dev | 
| dev tonjoo | docker-compose-dev-tonjoo.yml | Environment development dengan traefik + nginx. Aplikasi dijalankan dengan php-fpm dan npm run start | 
|                    | docker-compose-dev-proxy.yml | Reverse proxy untuk tonjo | 
| production | docker-compose-prod-tonjoo.yml | Environment production | 

# Menjalankan Aplikasi (Env = ` dev local` )

## 1. Clone project

Clone project dan hapus repo git bawaan untuk kemudian meng-init git baru

```
git clone git@git.tonjoo.com:tonjoo/tonjoo-admin-panel.git tap-project && cd tap-project && rm .git -rf
git init
```

## 2. Cara kerja file `.env`

Pada aplikasi berbasis docker semua `ENV` aplikasi disimpan pada file `docker/.env`. Jangan menambahkan file  file `.env` pada folder `backend`, `frontend-web` dan `frontend-dashboard`.


Susunan `.env` pada docker dapat dilihat pada tabel dibawah

| file compose | .env          |
|------------|---------|
| docker-compose.yml | `.env` |
| docker-compose-dev-proxy.yml | `.env-dev-proxy` |
| docker-compose-dev-tonjoo.yml | `.env-dev-tonjoo` | 

Bagaimana jika aplikasi tidak dijalankan dengan docker misalnya pada saat pengembangan ? maka buatlah file `.env` seperti biasanya pada masing masing folder aplikasi 

| Aplikasi   | Stack   | lokasi .env |
|------------|---------|---------|
| Backend | Laravel | backend/.env |
| Dashboard | Node JS | dashboard/.env |
| Frontend | Node JS | frontend/.env |

Untuk membuat file .env pada aplikasi buka file `docker/.env-sample` kemudian silahkan dipilah untuk masing masing aplikasi

**Cara copy env**
```
# Docker
bash wrapper.sh copy_env .env-sample .env
# Jangan copy docker/.env ke backend/.env jika menggunakan docker
# cp docker/.env backend/.env
# Tanpa docker
cp backend/.env-sample backend/.env

nano backend/.env -> copy bagian #Laravel Backend
nano frontend/.env -> copy bagian #Node js frontend
nano dashboard/.env -> copy bagian #Node js dashboard

```

## 3. Jalankan docker

Jika tidak menggunakan docker untuk pengembangan langkah ini dapat dilewati untuk langsung mengerjakan langkah 4 

```
# setup htpasswd
htpasswd -c docker/nginx/.htpasswd traefik
# atau
bash wrapper.sh dev-tonjoo secure

# sesuaikan permission
sudo chown $USER:www-data backend/ -R
sudo chmod 775 backend/ -R
sudo chmod -R gu+w backend/storage
sudo chmod -R guo+w backend/storage

bash wrapper.sh up
```

## 4. Jalankan backend

### Cara biasa

```
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
npm install
php artisan serve --host 0.0.0.0 
npm run dev -- --host
```


### Cara docker

```
bash wrapper.sh up
bash wrapper.sh run --rm workspace-backend  composer install
# Tidak perlu key:generate karena jika dari docker yang digunakan file docker/.env
# bash wrapper.sh run --rm workspace-backend  php artisan key:generate
bash wrapper.sh run --rm workspace-backend  php artisan migrate
bash wrapper.sh run --rm workspace-backend  php artisan db:seed
bash wrapper.sh run --rm workspace-backend  npm install

## Jalankan backend php
bash wrapper.sh run -p 8000:8000 --rm workspace-backend php artisan serve --host 0.0.0.0 

## Pastikan gunakan --host agar dapat diakses dari semua ip
bash wrapper.sh run -p 5173:5173 --rm workspace-backend npm run dev -- --host 0.0.0.0
```

## 5. Jalankan frontend-web

```
# cara biasa
npm install
npm run dev-no-docker

# cara docker
bash wrapper.sh run --rm node-frontend-web npm install 
bash wrapper.sh run -p 8080:8080 --rm node-frontend-web npm run dev -- -H 0.0.0.0
```

## 6. Jalankan frotnend-dashboard
```
# cara biasa
npm install
npm run dev-no-docker

# cara docker
bash wrapper.sh run --rm node-frontend-dashboard npm install 
bash wrapper.sh run -p 8090:8090 --rm node-frontend-dashboard npm run dev -- -H 0.0.0.0
```
## 7. Akses 

Akses aplikasi melalui `127.0.0.1:8000`, `127.0.0.1:8080` dan `127.0.0.1:8090`

## 8. Script `deploy/tap-start-dev.sh`


Aplikasi yang yang sudah berjalan pada environment `dev-tonjoo` tidak dapat langsung berjalan pada environment dev-local. Untuk mereset hasil optimasi dan menjalankan kembali di environment `dev-local`  jalankan script berikut : `bash deploy/tap-start-dev.sh`


# Menjalankan Aplikasi dengan environment `dev tonjoo`

Untuk menjalankan aplikasi pada environment `dev-tonjoo` kita dapat memanggil script `deploy/tap-start-dev.sh`. Script ini akan melakukan optimasi laravel dan build aplikasi pada node. Aplikasi yang berjalan pada environment `dev-local` ini berjalan pada kondisi yang optimized siap digunakan untuk production.

Environment `dev-tonjoo` terdiri dari 2 docker-compose dengan 2 environemnt  `dev-proxy` && `dev-tonjoo` 

## 1. Setup etc host

Kita perlu melakukan mapping beberapa domain ke ip 127.0.0.1

```
127.0.0.1 dev.local admin.dev.local dashboard.dev.local proxy.dev.local
127.0.0.1 traefik.dev.local
```


## 2. Setup Environment

- `bash wrapper.sh copy_env .env-dev-tonjoo-sample .env-dev-tonjoo`
- `bash wrapper.sh copy_env .env-dev-proxy-sample .env-dev-proxy`
- sesuaikan environment variable laravel dan node js

Sebelum melanjutkan langkah selanjutnya kita perlu membuat sertifkat SSL

## 3. Generate SSL

Konfigurasi SSL traefik ada pada file `docker/traefik/dynamic.yml`

**Generate Fake SSL**

```
cd docker/traefik/certs
openssl req -new -newkey rsa:2048 -days 365 -nodes -x509 -keyout server.key -out server.crt
```

Dengan fake SSL ini kita hanya perlu melakukan 1x exception ketika mengakses website dengan https. 

**Genarate Valid SSL dengan MKcert**

Kita dapat generate certificate local yang valid dengan [mkcert](https://github.com/FiloSottile/mkcert)

Install mkcert kemudian generate sertifikat dengan perintah : 

```
cd docker/traefik/certs
mkcert dev.local *.dev.local
```

Selanjutnya kita perlu mendaftarkan sertifkat CA mkcert ke Firefox dengan cara : 

```
cat ~/.local/share/mkcert/rootCA.pem 
```

Save ke dalam file misal `mkcert.crt` kemudian masuk ke firefox : Setting -> Certificate Manager -> Authorities -> Import file

## 4. Generate htpasswd

```
bash wrapper.sh dev-tonjoo secure
```

## 5. Menjalankan Docker

- Matikan semua docker. Jika semua docker tidak dimatikan ada kemungkinan port binding bertabrakan : `docker ps -a -q | xargs -I {} docker stop {}`
- Jalankan script bash `deploy/deploy-dev-local.sh dev-proxy dev-tonjoo`
    - Script ini melakukan build aplikasi dan menjalankan `bash wrapper.sh dev-proxy dev-tonjoo`
- Akses aplikasi melalui domain `admin.devl.local`, `dashboard.dev.local`, `proxy.dev.local` dan `dev.local`

# Tips & Trick

## Rilis Aplikasi dengan environment `Production`

Copy file : 

- `docker/docker-compose-dev-proxy.yml` -> `docker/docker-compose-prod-proxy.yml`
- `docker/docker-compose-dev-tonjoo.yml` -> `docker/docker-compose-prod-tonjoo.yml`
- `docker/.env-dev-tonjoo` -> `docker/.env-prod-tonjoo`
- `docker/.env-dev-proxy` -> `docker/.env-prod-proxy`
- `deploy/deploy-dev-local.sh` -> `deploy/tap-deploy-prod-server.sh`

Sesuaikan `ENV` prod misalnya 

```
APP_ENV=production
```

Tambahkan command yang diperlukan pada  `deploy/tap-deploy-prod-server.sh`

Kemudian jalankan dengan perintah `bash deploy/tap-deploy-prod-server.sh` pada server production


## Proses Development FE menggunakan server dev-tonjoo

Tim FE dapat development dengan koneksi langsung ke API pada server DEV , hal ini memiliki keuntungan tim FE dapat menggunakan format API dan data database yang real  sehingga diharapkan hasil tim FE dapat langsung digunakan tanpa banyak internvensi tim BE.

Contoh ini menggunakan environment berikut 

| Service         | env        | domain                         | host local |
|-----------------|------------|--------------------------------|------------|
| dashboard next  | local      | local.tap.tongkolspace.com     | 127.0.0.1  |
| dashboard next  | dev-tonjoo | dashboard.tap.tongkolspace.com |            |
| backend laravel | dev-tonjoo | admin.tap.tongkolspace.com     |            |


Target dari tutorial ini adalah tim FE dapat mengerjakan pada environment local dengan domain `local.tap.tongkolspace.com` dan akan menggunakan server dev pada url `admin.tap.tongkolspace.com` 

Video Penjelasan : [Link](https://git.tonjoo.com/tonjoo/sysadmin-task/uploads/a9524779da841deb6ff29feca1ef9712/Recording__28.mp4)

**1.Setup etc host untuk akses local**

```
127.0.0.1 -> local.tap.tongkolspace.com
```

Setup domain ini diperlukan karena cookies dari sanctum tidak bisa di set cross domain

**2. Setup cors**

Setup cors pada [admin](https://admin.tap.tongkolspace.com/api)

Allow untuk cors untuk 2 aplikasi dashboard dan frontend  

- https://local.tap.tongkolspace.com:8080
- https://local.tap.tongkolspace.com:8090

**3. Ubah .env**
```
###################################################
# NODE JS frontend-dashboard + NODE JS frontend-web
###################################################
FRONTEND_CMS_SERVER_API_PROTOCOL=https 
FRONTEND_CMS_SERVER_API_HOSTNAME=admin.tap.tongkolspace.com
NEXT_PUBLIC_FRONTEND_CMS_SERVER_API_BASE_URL=https://admin.tap.tongkolspace.com/api

FRONTEND_CMS_CLIENT_API_PROTOCOL=https
FRONTEND_CMS_CLIENT_API_HOSTNAME=admin.tap.tongkolspace.com
NEXT_PUBLIC_FRONTEND_CMS_CLIENT_API_BASE_URL=https://admin.tap.tongkolspace.com/api

# Jika tidak menggunakan docker comment ENV `NEXT_PUBLIC_FRONTEND_CMS_CLIENT_REPLACE_IMAGE_URL` !!!
# NEXT_PUBLIC_FRONTEND_CMS_CLIENT_REPLACE_IMAGE_URL=https://admin.dev.local|http://nginx

# Untuk mengaktifkan cache nextjs, non-aktifkan jika ditahap development
# NEXT_PUBLIC_API_CACHE=true
```

**4. Jalankan Node js dengan https mode**

`npm run dev -- -H 0.0.0.0 --experimental-https`










## Proses Kolaborasi BE - FE 

Pada aplikasi Tonjoo Admin Panel tim BE dan FE bekerja menggunakan 1 Git, hal ini memerlukan perhatikan khusus karena bisa jadi hasil pekerjaan yang akan di merge tidak sesuai misalnya : 

- Tim FE menggunakan base branch yang tidak update sehingga jika di merge akan menimbulkan kekacauan
- Tim BE melakukan update code backend tetapi juga mengubah code pada frontent tetapi belum stable

Untuk mengantisipasi hal ini maka perlu dilakukan

1. Gunakan plugin `git-tree-compare` untuk compare branch
2. Gunakan perintah checkout pada folder tertentu 

Contoh yang akan diberikan pada tulisan ini menggunakan asumsi berikut

- Tim BE menggunakan branch `master`
- Tim FE menggunakan branch `frontend-web-fe`
- Tim BE akan melakukan merge folder `frontend-web`

### Plugin VS Code `git-tree-compare`

Install plugin di VS Code kemudian masuk ke dalam git tree compare. 
Tim BE dapat  mengetahui perbedaan diantara 2 branch dengan cara klik tiga titik kemudian pilih base branch `frontend-web-fe` (dengan asumsi BE bekerja di branch `master`)
Sebaliknya tim FE dapat mengetahui perbedaan dengan pilih base branch `master` (dengan asumsi BE bekerja di branch `frontend-web-fe`)

![img](https://storage.tongkolspace.com/tonjoo/3hfhirg.png)

Gambar diatas adalah komparasi dari sudut pandang BE, kita mengetahui bahwa semua file pada folder backend berubah di branch `frontend-web-fe` sehingga jika di merge akan berbahaya

### Checkout pada folder tertentu

Jika tim BE akan  melakukan checkout dari folder `frontend-web` saja dapat digunakan perintah

```
git checkout origin/frontend-web-fe -- frontend-web
```

Dengan cara ini maka tim BE mengupdate semua file di folder `frontend-web`. 
Langkah selanjutnya jika code sudah stabil maka Tim BE melakukan push ke master diikuti tim FE melakukan pull dari master agar tidak tertinggal jauh

Trik ini juga bisa dilakukan tim FE untuk mengupdate folder `backend` dan `docker` saja misalnya : 

```
git checkout origin/master -- backend
git checkout origin/master -- docker
```

## Parameter script `deploy/deploy-dev-local.sh`

| Paramater | Keterangan        |
|------------|---------|
| --no-build | tidak melakukan build |

Jika build sudah dilakukan dan pada deploy selanjutnya dibutuhkan melakukan re-konfigurasi docker maka deploy dapat dilakukan tanpa perlu melakukan build dan clean

```
bash /deploy/tap-deploy-dev-local.sh dev-proxy dev-tonjoo --no-build
# atau
bash wrapper.sh dev-proxy dev-tonjoo up
```

## Debugging node dengan docker

Matikan docker `node-frontend-(dashboard|web)` kemudian jalankan ubah file docker compose pada bagian command

`command: [ "/usr/local/bin/npm", "run", "dev" ]`

```
  node-frontend-web:
    image: tongkolspace/node:20-v1.0.0
    container_name: workspace-frontend-web-${APP_NAME}
    build:
      context: ./node-frontend-web
      dockerfile: Dockerfile
    command: [ "/usr/local/bin/npm", "run", "dev" ]
    volumes:
```

Pastikan untuk merevert menjadi `npm run start` ini sebelum melakukan commit

## Fixing strict-origin-when-cross-origin saat akses backend
tambahkan domain dan centang bagian `Is Cors Allowed` di `backend.com/option/availables-sites`

## Aktifasi cache di sisi Nextjs
```
# Untuk mengaktifkan cache tambahkan ENV ini
NEXT_PUBLIC_API_CACHE=true
```