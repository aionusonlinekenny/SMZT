-- =============================================================
-- SMZT: Fix smzt_web tables for local XAMPP/phpStudy setup
-- Run in phpMyAdmin > smzt_web > SQL tab
-- OR: C:\xampp\mysql\bin\mysql.exe -u root -p123456 smzt_web < fix_smzt_web.sql
-- =============================================================

USE `smzt_web`;

-- Fix 1: Update hunfu URL from production IP to localhost
-- The PHP config.php does: SELECT * FROM hunfu WHERE url='127.0.0.1:81'
-- But table has url='122.51.27.223:81' (production), so $PLAT becomes empty → -1
UPDATE `hunfu` SET `url` = '127.0.0.1:81' WHERE `url` = '122.51.27.223:81';

-- Fix 2: Update server table - change production game server IP to localhost
-- The 'gmip' column stores the game server host used by the Flash client
UPDATE `server` SET `gmip` = '127.0.0.1' WHERE `gmip` = '122.51.27.223';

-- Verify
SELECT id, name, url, plat, ok FROM hunfu;
SELECT sid, name, fqid, port, gmip, mysql_ip FROM server;
