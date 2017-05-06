#!/bin/bash

cd `dirname $0`
result=0
if [ ! -f composer.lock ]; then
    composer install
    result=$0
fi
if [ $result ] && [ -f composer.lock ]; then
    php -S 0.0.0.0:9080 -t public public/index.php
else
    echo -e "\n\n\n\033[0;31m composer install failed, please try again \033[0m\n\n\n"
    exit 1
fi
