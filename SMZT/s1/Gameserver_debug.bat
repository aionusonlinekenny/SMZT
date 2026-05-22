@echo off
color 1f
title [SMZT] DEBUG

mkdir logs 2>nul

echo Starting server, errors will be saved to logs\error.log
echo ========================================================

D:\SMZT\Java\jdk1.8.0_144\bin\java.exe -server -Xmx512m -Xms512m -XX:NewRatio=1 -Xnoclassgc -XX:+DisableExplicitGC -XX:+UseParNewGC -XX:+UseConcMarkSweepGC -XX:+ScavengeBeforeFullGC -XX:+CMSScavengeBeforeRemark -XX:CompileThreshold=5000 -XX:SoftRefLRUPolicyMSPerMB=0 -XX:HeapDumpOnOutOfMemoryError -XX:HeapDumpPath=./ -cp ".;./*;./lib/*" com.luoshenfu.GameServer 2>logs\error.log

echo.
echo ========================================================
echo Server stopped. Check logs\error.log for errors:
echo ========================================================
type logs\error.log
pause
