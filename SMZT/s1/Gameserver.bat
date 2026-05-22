@echo off
color 1f
title [SMZT] 1S

D:\SMZT\Java\jdk1.8.0_144\bin\java.exe -server -Xmx1536m -Xms1536m -XX:NewSize=256m -XX:MaxNewSize=256m -XX:CMSInitiatingOccupancyFraction=70 -XX:+UseCMSInitiatingOccupancyOnly -Xnoclassgc -XX:+DisableExplicitGC -XX:+UseParNewGC -XX:+UseConcMarkSweepGC -XX:+ScavengeBeforeFullGC -XX:+CMSScavengeBeforeRemark -XX:CompileThreshold=5000 -XX:SoftRefLRUPolicyMSPerMB=0 -XX:+PrintGCApplicationStoppedTime -XX:+PrintGCDetails -XX:+PrintGCTimeStamps -XX:+PrintGC -XX:+HeapDumpOnOutOfMemoryError -XX:HeapDumpPath=./ -Djprofiler.jmxServerPort=7080 -cp ".;./*;./lib/*" com.luoshenfu.GameServer
pause
