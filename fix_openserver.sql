-- =============================================================
-- SMZT: Critical fixes after DB import
-- Run in phpMyAdmin > SQL tab (no database selected, or select any)
-- =============================================================

-- 1. Mark server 1 as OPEN so the game server accepts player logins.
--    isOpenServer=0 causes silent login rejection -> "config.xml 0%" forever.
UPDATE smzt_datacenter.t_server
SET isOpenServer = 1
WHERE runType = 's' AND deptId = 21 AND serverId = 1;

-- 2. Fix GM IP in web server table (still has production IP 122.51.27.223)
UPDATE smzt_web.server
SET gmip = '127.0.0.1', ip = '127.0.0.1'
WHERE id = 1;

-- 3. Create smzt_log_s1 database (t_server_dbsources.logDbName = 'smzt_log_s1')
--    Without it the log DB connection fails on startup (noisy but non-critical).
CREATE DATABASE IF NOT EXISTS `smzt_log_s1`
  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- 4. Verify
SELECT runType, deptId, serverId, isOpenServer, host
FROM smzt_datacenter.t_server
WHERE serverId = 1 AND deptId = 21;

SELECT id, name, ip, gmip FROM smzt_web.server WHERE id = 1;
