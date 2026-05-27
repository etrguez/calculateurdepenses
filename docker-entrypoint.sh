#!/bin/sh
# =============================================
# DOCKER ENTRYPOINT - CALCULATEUR DE DÉPENSES
# =============================================

if [ ! -f "/app/vendor/autoload.php" ]; then
    echo "Vendor directory is missing or incomplete. Installing dependencies..."
    composer install --no-interaction --optimize-autoloader
else
    echo "Dependencies are already installed."
fi

chown -R www-data:www-data /app/vendor 2>/dev/null || true

exec "$@"
