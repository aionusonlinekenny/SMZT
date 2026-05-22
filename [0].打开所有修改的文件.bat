Title [一键打开所有修改的文件]
color 0A
:start
@echo off
:fjgna
cls
echo           +----------------------------------------------------+
echo           +                                                    +
echo           +                 一键打开所有修改文件               +
echo           +                                        ㊣          +
echo           +               阿泽源码网 - www.lyzwlkj.vip         +
echo           +----------------------------------------------------+
echo ........................................................................
echo 温馨提示：
echo          1、请确定已经安装了了Notepad++工具
echo          2、请确定程序解压到了D盘
echo          3、程序仅适合套件版本的，其他版本的可能有所遗漏
pause
start Notepad++ "D:\SMZT\SmztWEB\game.php"
start Notepad++ "D:\SMZT\SmztWEB\smztpay.php"
start Notepad++ "D:\SMZT\SmztWEB\SMZT\config.xml"
pause