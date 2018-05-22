@echo off

if "X%JAVA_HOME%" == "X" goto setjavahome
goto setup

:setjavahome
rem #### MODIFY ##########
set JAVA_HOME=c:\program files\javasoft\jre\1.2
rem #######################

:setup
set JNDI_LIB=lib\ldap.jar;lib\jndi.jar;lib\providerutil.jar;lib\ldapbp.jar
set JSSE_LIB=lib\jsse.jar;lib\jnet.jar;lib\jcert.jar

set COMMON=.;%JNDI_LIB%;%JSSE_LIB%
set EXEC=lbe.jar lbe.ui.BrowserApp

set CMD="%JAVA_HOME%\bin\java" -cp %COMMON%;%EXEC%

echo %CMD%
%CMD%

