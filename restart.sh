#!/bin/bash


PIDFILE="/tmp/auto_close_box.pid"

cmd=`ps -ef | grep "AutoCloseBox" | grep -v "grep AutoCloseBox"| wc -l`

echo $cmd

kill `cat $PIDFILE`
rm -f $PIDFILE

echo 'proccess shutdown'

/usr/local/php7/bin/php /data/web/anxinchong/artisan AutoCloseBox

echo 'proccess start'