#!/bin/bash
service nginx start
service php8.1-fpm start
service --status-all

echo "Services started"
