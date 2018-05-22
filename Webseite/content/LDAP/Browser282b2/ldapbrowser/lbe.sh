#!/bin/sh

OPTIONS=

if [ ! -d "$JAVA_HOME" ] ; then
    JAVA=java
  else
    JAVA=${JAVA_HOME}/bin/java
fi

if [ "$1" = "fix13" ] ; then
    OPTIONS="${OPTIONS} -Xbootclasspath/p:lib/ldap.jar:lib/jndi.jar:lib/providerutil.jar:lib/ldapbp.jar"
    ARG1=
  else
    ARG1=$1
fi

${JAVA} ${OPTIONS} -jar lbe.jar $ARG1 $2 $3 $4 $5 $6 $7 $8 $9
