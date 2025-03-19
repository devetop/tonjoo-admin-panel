#!/bin/sh
# Script untuk deploy ke server development (untuk production ubah seperlunya) 
# Service dijalankan dengan mode production
script_dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
current_dir=$(pwd)
docker_compose_pattern="^(dev|prod|staging|pre-prod)-.*$"

# Export env
if [ -f .env ]
then
    export $(cat .env | sed 's/#.*//g' | xargs)
fi

function help_wrapper {
    echo "./deploy-server-dev.sh [dev-*|prod-*|staging-*|pre-prod-*] --no-build"
    echo "./wrapper.sh  [help]"
    exit 1
}

if [ "$1" == "help" ]
then
    help_wrapper
    cd $current_dir
    exit
fi

DEV_ENV=""
for arg in "$@"
do
    if [[ $arg =~ $docker_compose_pattern ]]; then
        DEV_ENV+="$arg "
        shift 1
    fi
done

DEV_ENV=${DEV_ENV:-"dev-proxy dev-tonjoo"}

# Restart Docker
cd "$script_dir/../"
# remove dev vite from laravel backend
rm "$script_dir/../backend/public/hot" -rf

echo "Reset laravel permission"
sudo chmod 775 "$script_dir/../backend/storage/" -R
sudo chmod gu+w "$script_dir/../backend/storage/" -R
sudo chmod guo+w "$script_dir/../backend/storage/" -R

# clean build folder if neccesarry
if [[ ! $@ =~ --no-build ]] 
then
    echo "Cleaning build folder..."
    rm "$script_dir/../backend/vendor" -rf
    rm "$script_dir/../backend/frontend-web/.next" -rf
    rm "$script_dir/../backend/frontend-web/node_modules" -rf
    rm "$script_dir/../backend/frontend-dashboard/.next" -rf
    rm "$script_dir/../backend/frontend-dashboard/node_modules" -rf
fi
bash wrapper.sh $DEV_ENV down
# temporary solution for adding www-data user
# bash wrapper.sh $DEV_ENV up php-fpm --build


# build node frontend-web
if [[ ! $@ =~ --no-build ]] 
then
    echo "Build node application..."
    bash wrapper.sh  $DEV_ENV run --rm --user=node node-frontend-web npm install  
    bash wrapper.sh  $DEV_ENV run --rm --user=node node-frontend-dashboard npm install 
    bash wrapper.sh  $DEV_ENV run --rm --user=node node-frontend-web npm run build  
    bash wrapper.sh  $DEV_ENV run --rm --user=node node-frontend-dashboard npm run build 
fi

# Run Docker compose after nodejs finish install dan build
# Ganti dengan up -d jika di prod
bash wrapper.sh $DEV_ENV up -d

# run other service
if [[ ! $@ =~ --no-build ]] 
then
    echo "Build backend application..."
    bash wrapper.sh $DEV_ENV run --rm workspace-backend composer install 
    bash wrapper.sh $DEV_ENV run --rm workspace-backend npm install 
    bash wrapper.sh $DEV_ENV run --rm workspace-backend npm run build 
fi
bash wrapper.sh $DEV_ENV run --rm --user=root  workspace-backend php artisan cache:clear
bash wrapper.sh $DEV_ENV run --rm --user=workspace workspace-backend php artisan optimize