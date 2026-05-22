@echo off
set path=%cd%\php;%path%
cd ..\mysql
start bin\mysqld.exe --defaults-file=my.ini