-- =============================================================
-- SMZT: Comprehensive fix - run in phpMyAdmin > SQL tab
-- Run ALL of these, then RESTART the game server (Gameserver.bat)
-- =============================================================

-- 1. Mark server 1 as OPEN (was 0 = closed, causing silent login rejection)
UPDATE smzt_datacenter.t_server
SET isOpenServer = 1
WHERE runType = 's' AND deptId = 21 AND serverId = 1;

-- 2. Add kennylucia1 to the game's user identity table.
--    t_user is what the game server checks on login (NOT smzt_web.account).
--    utf8_bin collation = case-sensitive, so the name must match exactly.
INSERT IGNORE INTO smzt_datacenter.t_user
  (runType, deptId, id, serverId, name, identityNum, password,
   registDate, lastLoginTime, hasReceive, loginTime, logoutTime,
   totalTime, totalLeaveTime, isGM, status, smallestFlag,
   lastServerId, isSpecificMember, recommendUserAccount)
VALUES
  ('s', 21, 350001, 1, 'kennylucia1', null, 'pwd',
   NOW(), NOW(), 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, null);

-- Add any other accounts you use (change the name field):
-- INSERT IGNORE INTO smzt_datacenter.t_user ... VALUES ('s', 21, 360001, 1, 'youraccount', ...);

-- 3. Fix GM IP in web server table
UPDATE smzt_web.server
SET gmip = '127.0.0.1', ip = '127.0.0.1'
WHERE id = 1;

-- 4. Create smzt_log_s1 database (game server log DB)
CREATE DATABASE IF NOT EXISTS `smzt_log_s1`
  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- 5. Verify
SELECT runType, deptId, serverId, isOpenServer FROM smzt_datacenter.t_server WHERE serverId=1;
SELECT runType, deptId, id, name, smallestFlag FROM smzt_datacenter.t_user WHERE name='kennylucia1';
