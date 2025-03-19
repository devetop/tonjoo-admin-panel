#!/bin/sh
# Script untuk deploy ke environment development

script_dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
current_dir=$(pwd)


echo "Script ini akan menjalankan docker untuk environtment development local

Setelah docker berjalan pada foreground, jalankan command berikut untuk menjalankan semua service :
bash wrapper.sh run -p 8000:8000 --rm workspace-backend php artisan serve --host 0.0.0.0 
bash wrapper.sh run -p 5173:5173 --rm workspace-backend npm run dev -- --host 
bash wrapper.sh run -p 8090:8090 --rm node-frontend-dashboard  npm run dev  
bash wrapper.sh run -p 8080:8080 --rm node-frontend-web npm run dev 

"

read -p "Tekan Enter untuk melanjutkan..."

echo "Reset laravel permission"

sudo chmod 775 "$script_dir/../backend/storage/" -R
sudo chmod gu+w "$script_dir/../backend/storage/" -R
sudo chmod guo+w "$script_dir/../backend/storage/" -R


bash wrapper.sh down

echo "Reset laravel optimization"
bash wrapper.sh run --rm workspace-backend php artisan cache:clear
bash wrapper.sh run --rm workspace-backend php artisan optimize:clear

echo "Menjalankan docker pada foreground.."
bash wrapper.sh up
