# Setup path
script_dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
current_dir=$(pwd)

# load env
function load_env {
    # Source the .env file
    if [ -f $1 ]; then
        echo "source $1"
        export $(grep -v '^#' $1 | xargs)
    else
        echo "No .env file found in $1"
        exit
    fi
}


check_folder() {
  if [ -d "$1" ]; then
    echo "Folder $1 already exists, exiting"
    exit
  fi
}

setup_htaccess() {
    htpasswd -bc "$script_dir/docker/app/nginx/.htpasswd" "$ADMIN_PANEL_USERNAME" "$ADMIN_PANEL_PASSWORD"

    echo "Admin Panel berjalan di port 57710 user = $ADMIN_PANEL_USERNAME | password = $ADMIN_PANEL_PASSWORD"
}

setup_fake_https_cert(){
        
    sudo openssl req -new -newkey rsa:2048 -days 365 -nodes -x509 \
    -subj "/C=US/ST=Denial/L=Springfield/O=Dis/CN=www.example.com" \
    -keyout "$script_dir/docker/traefik/certs/server.key" -out "$script_dir/docker/traefik/certs/server.crt"

}

setup_network() {
    # Check if the network "$NETWORK" exists
    found=$(docker network ls --format "{{.Name}}" | awk -v net="$NETWORK" '$0 == net {count++} END {print count}')
    if [ -n "$found" ]; then
        echo "Network '$NETWORK' already exists."
    else
        echo "Network '$NETWORK' does not exist, creating it..."
        docker network create $NETWORK
    fi
}


if [[ "$1" =~ ^(dev-|prod-|staging-|pre-prod-) ]]; then
    load_env "$script_dir/docker/.env-$1"
    shift 1
elif [[ "$1" != "clean" ]]; then
    load_env "$script_dir/docker/.env-dev-local"
fi

if [ "$1" == "setup_htaccess" ]
then
    setup_htaccess
elif [ "$1" == "setup_fake_https_cert" ]
then
    setup_fake_https_cert
elif [ "$1" == "clean" ]
then
    rm "$script_dir/docker/.env-dev-local"
    rm "$script_dir/docker/.env-dev-tonjoo"
    rm "$script_dir/docker/.env-dev-proxy"
    rm "$script_dir/backend/public/hot"
    sudo rm -rf "$script_dir/docker/app/nginx/.htpasswd"
    sudo rm -rf "$script_dir/docker/mysql/datadir/" 
    sudo rm -rf "$script_dir/docker/redis/data/" 
else 
    echo "penggunaan"
    echo "bash init.sh clean"
    echo "bash init.sh setup_htaccess"
    echo "bash init.sh setup_fake_https_cert"

fi
