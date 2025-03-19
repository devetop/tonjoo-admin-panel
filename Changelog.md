# Changelog

**11/Des/2024**
- hapus NEXT_PUBLIC_
- implementasi rewrite url BE ke FE

**10/Des/2024**
- ubah title ke default title

**09/Des/2024**
- fix: minor bug
- delete and clear unused blade files

**05/Nov/2024**
- add google and facebook oauth sso

**10/Oct/2024**
- update .dockerignore
- fix cors error ubah dockerfile, supervisor conf & docker-compose
- update Readme.md
- update .env-dev-local, .env-dev-tonjoo & .env-dev-proxy
- migrasi ke format docker file baru

**19/Agu/2024**
- implementasi pemisahan login dengan role `Frontend Dashboard Admin` dan role `Frontend Dashboard User` di `frontend-dashboard`
- implementasi pemisahan login dengan guard `frontend-dashboard-admin` dan guard `frontend-dashboard-user` di `frontend-dashboard`
- redirect ke 403 saat user tidak memiliki hak untuk akses endpoint tertentu
- menambah menu sample untuk akses khusus admin
- memindah penulisan routing dari `backend/app/Api/Providers/FrontendDashboardBootProvider.php` ke `backend/routes/api_frontend_dashboard.php`
- membuat permission khusus untuk menampilkan debugbar dari sisi `backend`
- fix:update profile fe-user
- menambah file-file bruno
- ubah seeder user dengan tambahan role `Frontend Dashboard Admin` dan role `Frontend Dashboard User`
- ubah list products table dari `SSR` ke `CSR`
- [on-going] implementasi library `rtk-query, react-hook-form, redux-persist` di `frontend-dashboard` pada menu:
  - login admin
  - login user
  - register user

**05/Agu/2024**
- menambah SESSION_DOMAIN ke .env
- fixing update profile
- fixing typography tailwind di frontend web

**17/Apr/2024**
- add `npm run dev-no-docker` untuk menjalankan nextjs tanpa docker
- implement axios nextjs cache

**16/Apr/2024**
- Top bar menu
- Footer information
- Setting Theme options untuk setting topbar dan footer information

**09/Apr/2024**
- fixing sanctum
- fixing docker
- penyesuaian api untuk theme options
- add about us page seeder
- Add Autktentikasi CSRF Token dengan Cookie dari Sanctum
- Add Setting Available Site (untuk setting Cookie dan Application Token)

**08/Apr/2024**
- fix sidemenu agar dinamis
- add about page

**05/Apr/2024**
- Implementasi Breeze untuk authentikasi dengan cookie

**01/Apr/2024**
- Add About Us Page editor dengan edit metabox di backend
- Add create read update & delete di menu kategori product

**28/Mar/2024**
- add register
- refactory product table
- add profile menu

**21/Mar/2024**
- Fixing Login dan reset password
- Add flash message di nextjs dashoard
- fix build error
- set app token ke nextjs
- add product lists ke fe-web

**20/Mar/2024**
- Add Cors dan App Token

**19/Mar/2024**
- Add Frontend-Dashboard dari mas Alga

**15/Mar/2024**
- Add Frontend-Web dari mas Nugroho

**05/Mar/2024** 
- Add Dashboard sample Api

**20/Feb/2023**
- Update Docker image file : `nginx-ee`, `workspace`, `supervisor` and `php-fpm`
- Update `wrapper.sh` and `deploy/*` script
    - `bash wrapper.sh dev-proxy dev-tonjoo up`
    - remove some autocompletion on wrapper