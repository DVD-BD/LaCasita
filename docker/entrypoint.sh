#!/usr/bin/env bash
set -e

cd /var/www/html

# En local con Docker Compose se usa .env.docker.example.
# En Railway se usan variables de entorno configuradas desde el panel.
if [ ! -f .env ]; then
    if [ -z "${APP_ENV:-}" ]; then
        cp .env.docker.example .env
    else
        touch .env
    fi
fi

mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

get_env_value() {
    local key="$1"
    local value
    value="$(grep -E "^${key}=" .env 2>/dev/null | tail -n 1 | cut -d '=' -f2- | sed 's/^"//' | sed 's/"$//')"
    echo "$value"
}

APP_KEY_VALUE="${APP_KEY:-$(get_env_value APP_KEY)}"

# En Railway se recomienda configurar APP_KEY como variable.
# En local, si no existe, se genera automáticamente.
if [ -z "${APP_KEY_VALUE}" ]; then
    php artisan key:generate --force
fi

DB_HOST_VALUE="${DB_HOST:-$(get_env_value DB_HOST)}"
DB_PORT_VALUE="${DB_PORT:-$(get_env_value DB_PORT)}"
DB_USERNAME_VALUE="${DB_USERNAME:-$(get_env_value DB_USERNAME)}"
DB_PASSWORD_VALUE="${DB_PASSWORD:-$(get_env_value DB_PASSWORD)}"

if [ "${WAIT_FOR_DB:-true}" = "true" ]; then
    echo "Esperando conexión con MySQL en ${DB_HOST_VALUE}:${DB_PORT_VALUE:-3306}..."
    until mysqladmin ping \
        -h"${DB_HOST_VALUE}" \
        -P"${DB_PORT_VALUE:-3306}" \
        -u"${DB_USERNAME_VALUE}" \
        --password="${DB_PASSWORD_VALUE}" \
        --silent; do
        sleep 3
    done
fi

php artisan optimize:clear

if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
    php artisan migrate --force
fi

# En Railway usar RUN_SEEDERS=true solo en el primer despliegue.
# Después cambiarlo a false para evitar duplicar datos.
if [ "${RUN_SEEDERS:-false}" = "true" ]; then
    php artisan db:seed --force
fi

exec "$@"
