@echo off

set OPTIONS=

if "%1%" == "fix13" goto fix13
goto setjava

:fix13
set ARG1=
set OPTIONS=%OPTIONS% -Xbootclasspath/p:lib\ldap.jar;lib\jndi.jar;lib\providerutil.jar;lib\ldapbp.jar

:setjava
set ARG1=%1
if "X%JAVA_HOME%" == "X" goto nojavahome

set JAVA="%JAVA_HOME%\bin\java"
goto run

:nojavahome
set JAVA=java

:run
%JAVA% %OPTIONS% -jar lbe.jar %ARG1% %2 %3 %4 %5 %6 %7 %8 %9
