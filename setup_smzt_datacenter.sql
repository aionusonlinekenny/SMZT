-- =============================================================
-- SMZT: Fix smzt_datacenter tables for local XAMPP setup
-- Run this in phpMyAdmin > smzt_datacenter > SQL tab
-- OR via command line:
--   C:\xampp\mysql\bin\mysql.exe -u root smzt_datacenter < setup_smzt_datacenter.sql
-- =============================================================

USE `smzt_datacenter`;

-- Create smzt_log database if it doesn't exist (game server needs it)
CREATE DATABASE IF NOT EXISTS `smzt_log` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- =============================================================
-- Table: t_server_dbsources
-- Stores DB connection info + server endpoints per server/dept
-- =============================================================
DROP TABLE IF EXISTS `t_server_dbsources`;
CREATE TABLE `t_server_dbsources` (
  `runType`           varchar(2)    NOT NULL,
  `deptId`            tinyint(4)    NOT NULL,
  `serverId`          smallint(6)   NOT NULL,
  `serverCode`        varchar(50)   DEFAULT NULL,
  `gameServerHost`    varchar(50)   DEFAULT NULL,
  `scheduleServerPort` int(11)      DEFAULT '0',
  `gameServerLVSHost` varchar(50)   DEFAULT NULL,
  `gameServerPort`    int(11)       DEFAULT '0',
  `gameServerLVSPort` int(11)       DEFAULT '0',
  `clientSafePort`    int(11)       DEFAULT '0',
  `gmServerPort`      int(11)       DEFAULT '0',
  `gmServerLVSPort`   int(11)       DEFAULT '0',
  `chargePort`        int(11)       DEFAULT '0',
  `chargeLVSPort`     int(11)       DEFAULT '0',
  `logServerHost`     varchar(50)   DEFAULT NULL,
  `logServerPort`     int(11)       DEFAULT '0',
  `logDbHost`         varchar(50)   DEFAULT NULL,
  `logDbLVSHost`      varchar(50)   DEFAULT NULL,
  `logDbPort`         int(11)       DEFAULT '0',
  `logDbUsername`     varchar(50)   DEFAULT NULL,
  `logDbPassword`     varchar(100)  DEFAULT NULL,
  `logDbName`         varchar(50)   DEFAULT NULL,
  `logDbLVSPort`      int(11)       DEFAULT '0',
  `logDbLVSUser`      varchar(50)   DEFAULT NULL,
  `logDbLVSPwd`       varchar(100)  DEFAULT NULL,
  `confDbHost`        varchar(50)   DEFAULT NULL,
  `confDbPort`        int(11)       DEFAULT '0',
  `confDbName`        varchar(50)   DEFAULT NULL,
  `confDbUserName`    varchar(50)   DEFAULT NULL,
  `confDbPassword`    varchar(100)  DEFAULT NULL,
  `playerDbHost`      varchar(50)   DEFAULT NULL,
  `playerDbPort`      int(11)       DEFAULT '0',
  `playerDbName`      varchar(50)   DEFAULT NULL,
  `playerDbUserName`  varchar(50)   DEFAULT NULL,
  `playerDbPassword`  varchar(100)  DEFAULT NULL,
  `playerDbLVSHost`   varchar(50)   DEFAULT NULL,
  `playerDbLVSPort`   int(11)       DEFAULT '0',
  `playerDbLVSUser`   varchar(50)   DEFAULT NULL,
  `playerDbLVSPwd`    varchar(100)  DEFAULT NULL,
  `identityDbName`    varchar(50)   DEFAULT NULL,
  `isExistConfDb`     tinyint(4)    DEFAULT '0',
  `privateKey`        varchar(200)  DEFAULT NULL,
  `chargeKey`         varchar(200)  DEFAULT NULL,
  `clientUrl`         varchar(200)  DEFAULT NULL,
  `beMergeFlag`       int(11)       DEFAULT '0',
  PRIMARY KEY (`serverId`, `deptId`, `runType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert row for server 1, dept 21, runType S (local XAMPP)
INSERT INTO `t_server_dbsources` (
  `runType`, `deptId`, `serverId`, `serverCode`,
  `gameServerHost`, `gameServerPort`, `gameServerLVSHost`, `gameServerLVSPort`,
  `scheduleServerPort`, `clientSafePort`,
  `gmServerPort`, `gmServerLVSPort`,
  `chargePort`, `chargeLVSPort`,
  `logServerHost`, `logServerPort`,
  `logDbHost`, `logDbLVSHost`, `logDbPort`,
  `logDbUsername`, `logDbPassword`, `logDbName`,
  `logDbLVSPort`, `logDbLVSUser`, `logDbLVSPwd`,
  `confDbHost`, `confDbPort`, `confDbName`, `confDbUserName`, `confDbPassword`,
  `playerDbHost`, `playerDbPort`, `playerDbName`, `playerDbUserName`, `playerDbPassword`,
  `playerDbLVSHost`, `playerDbLVSPort`, `playerDbLVSUser`, `playerDbLVSPwd`,
  `identityDbName`, `isExistConfDb`,
  `privateKey`, `chargeKey`, `clientUrl`, `beMergeFlag`
) VALUES (
  'S', 21, 1, 's1',
  '127.0.0.1', 8000, '127.0.0.1', 8000,
  0, 0,
  0, 0,
  39001, 39001,
  '127.0.0.1', 0,
  '127.0.0.1', '127.0.0.1', 3306,
  'root', '', 'smzt_log',
  0, 'root', '',
  '127.0.0.1', 3306, 'smzt_conf', 'root', '',
  '127.0.0.1', 3306, 'smzt_game_s1', 'root', '',
  '127.0.0.1', 0, 'root', '',
  'smzt_datacenter', 0,
  '', 'chargeserver8888miyao', 'http://127.0.0.1/', 0
);

-- =============================================================
-- Table: t_server
-- Stores server metadata (serverId, host, open date, camp info)
-- =============================================================
DROP TABLE IF EXISTS `t_server`;
CREATE TABLE `t_server` (
  `runType`       varchar(2)    NOT NULL,
  `deptId`        tinyint(4)    NOT NULL,
  `serverId`      smallint(6)   NOT NULL,
  `name`          varchar(50)   DEFAULT NULL,
  `alias`         varchar(50)   DEFAULT NULL,
  `titleId`       int(11)       DEFAULT '0',
  `host`          varchar(50)   DEFAULT NULL,
  `openDate`      datetime      DEFAULT NULL,
  `version`       varchar(20)   DEFAULT NULL,
  `campOpenDays`  tinyint(4)    DEFAULT '0',
  `mergeDate`     datetime      DEFAULT NULL,
  `crossPort`     int(11)       DEFAULT '0',
  `v1ServerId`    smallint(6)   DEFAULT '0',
  `v3ServerId`    smallint(6)   DEFAULT '-1',
  `campServerId`  smallint(6)   DEFAULT '-1',
  `campUnityDate` datetime      DEFAULT NULL,
  `hpStar`        tinyint(4)    DEFAULT '0',
  `pkState`       tinyint(4)    DEFAULT '0',
  `score`         int(11)       DEFAULT '0',
  `fighForce`     int(11)       DEFAULT '0',
  `currCrosslord` varchar(50)   DEFAULT NULL,
  `winNum`        smallint(6)   DEFAULT '0',
  `loseNum`       smallint(6)   DEFAULT '0',
  `rank`          smallint(6)   DEFAULT '0',
  `orderId`       int(11)       NOT NULL DEFAULT '0',
  `isOpenServer`  tinyint(4)    DEFAULT '0',
  `isSendMessage` tinyint(4)    DEFAULT '0',
  `memo`          varchar(255)  DEFAULT NULL,
  `feedBackKey`   varchar(100)  DEFAULT NULL,
  `dns`           varchar(100)  DEFAULT NULL,
  PRIMARY KEY (`serverId`, `deptId`, `runType`),
  UNIQUE KEY `orderId_Unique` (`orderId`),
  KEY `idx_campserverid` (`campServerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert row for server 1, dept 21, runType S
INSERT INTO `t_server` (
  `runType`, `deptId`, `serverId`, `name`, `alias`, `titleId`,
  `host`, `openDate`, `version`,
  `campOpenDays`, `mergeDate`, `crossPort`,
  `v1ServerId`, `v3ServerId`, `campServerId`, `campUnityDate`,
  `hpStar`, `pkState`, `score`, `fighForce`,
  `currCrosslord`, `winNum`, `loseNum`, `rank`,
  `orderId`, `isOpenServer`, `isSendMessage`, `memo`, `feedBackKey`, `dns`
) VALUES (
  'S', 21, 1, '神话三国1服', 'S1', 0,
  '127.0.0.1', NOW(), '1.0',
  0, NULL, 0,
  1, -1, -1, NULL,
  0, 0, 0, 0,
  '', 0, 0, 0,
  1, 1, 0, '', '', '127.0.0.1'
);

-- Verify
SELECT 't_server_dbsources' AS tbl, COUNT(*) AS rows FROM t_server_dbsources
UNION ALL
SELECT 't_server', COUNT(*) FROM t_server;
