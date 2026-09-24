#!/bin/sh
set -eu

echo "Waiting for MariaDB..."
until mariadb-admin ping -h db -uroot -pmariadb --silent; do
    sleep 2
done

echo "Applying schema..."
mariadb -h db -uroot -pmariadb < schema.sql

echo "Applying migrations..."
mariadb -h db -uroot -pmariadb < migrate-barcode-codes.sql

echo "Database is ready."