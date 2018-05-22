#!/bin/sh

####################################
# Default Java home directory
# modify if necessary
####################################
JH=/usr/java

if [ ! -d "$JAVA_HOME" ] ; then
    JAVA_HOME=${JH}
fi

JNDI_LIB=lib/ldap.jar:lib/jndi.jar:lib/providerutil.jar:lib/ldapbp.jar
JSSE_LIB=lib/jsse.jar:lib/jnet.jar:lib/jcert.jar

COMMON=.:${JNDI_LIB}:${JSSE_LIB}
EXEC='lbe.jar lbe.ui.BrowserApp'

CMD="${JAVA_HOME}/bin/java -cp ${COMMON}:${EXEC}"

echo ${CMD}
${CMD}

