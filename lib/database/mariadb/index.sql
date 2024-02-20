CREATE DATABASE IF NOT EXISTS webtask;

USE webtask;

source /var/www/api.webtask.com/lib/database/mariadb/ddl.sql

source /var/www/api.webtask.com/lib/database/mariadb/dml.sql