# Persiapan

```
sudo chmod 755 backend -R
sudo chmod 755 frontend-web -R
sudo chmod 755 frontend-dashboard -R
sudo chown $USER:$USER backend . -R
sudo chown $USER:$USER frontend-web . -R
sudo chown $USER:$USER frontend-dashboard . -R
``` 

# Environment

| Service           | Stack                 | Folder               | dev-local                | dev-tonjoo                | Deskripsi                                      |
|-------------------|-----------------------|----------------------|--------------------------|---------------------------|------------------------------------------------|
| Admin Panel       | nginx                 | `admin`              | 127.0.0.1:57710          | admin.dev.local:57710     | Admin tools (phpmyadmin etc)                   |
|                   | nginx,traefik         | `admin`              | -                        | proxy.dev.local:57710     | Traefik Dashboard                              |
| Backend           | laravel,inertia,react | `backend`            | 127.0.0.1:9000           | admin.dev.local           | Admin Backend                                  |
| Inertia Dashboard | laravel,inertia,react | `backend`            | 127.0.0.1:9000/dashboard | admin.dev.local/dashboard | Dashboard aplikasi dengan base Laravel Inertia |
| Next JS Web       | next-js,react         | `frontend-web`       | 127.0.0.1:8080/          | dev.local                 | Website berbasis NextJS                        |
| Next JS Dashboard | next-js,react         | `frontend-dashboard` | 127.0.0.1:8090/          | dashboard.dev.local       | Aplikasi Web berbasis NextJS                   |


- Semua user menggunakan uid 1000 , di docker menggunakan user `app`

Host File
```
127.0.0.1 admin.dev.local proxy.dev.local dev.local  dashboard.dev.local  
```

# Quick guide `dev-local'

## Docker
```
bash wrapper.sh copy_env .env-dev-local-sample .env-dev-local
bash init.sh setup_fake_https_cert
bash wrapper.sh dev-local up
```

## Menjalankan Backend

```
# Terminal 1
## Masuk cli as user app
bash wrapper.sh dev-local exec backend bash
composer install
php artisan migrate --seed
npm install
php artisan optimize:clear

# Terminal 2
## Masuk cli as user app
bash wrapper.sh dev-local exec backend bash 
npm run dev -- --host 0.0.0.0
```

## Menjalankan Frontend Web

```
# Terminal 3
## Masuk cli as user app
bash wrapper.sh dev-local exec frontend-web bash
npm install
npm run dev -- -H 0.0.0.0
```

## Menjalankan Frontend Dashboard

```
# Terminal 4
## Masuk cli as user app
bash wrapper.sh dev-local exec frontend-dashboard bash
npm install
npm run dev -- -H 0.0.0.0
```

# Catatan
- Storage folder (wp dan laravel_) ada di folder media

# Quick guide `dev-tonjoo'

Coba build image dengan perintah :

```
bash wrapper.sh dev-local dev-tonjoo dev-proxy build --no-cache
```

Copy environment

```
# Untuk password database, traefik dan password lain bisa dicopy / modifikasi manual dari dev-local
bash wrapper.sh copy_env .env-dev-tonjoo-sample .env-dev-tonjoo
```

Jalankan docker
```
bash wrapper.sh dev-local dev-tonjoo dev-proxy up --build

# Untuk down
bash wrapper.sh dev-local dev-tonjoo dev-proxy down
```

# Tips
## Supervisorctl
Untuk mengatur service yang berjalan gunakan supervisorctl
```
    supervisorctl -c /home/app/supervisor/supervisord-app.conf
```