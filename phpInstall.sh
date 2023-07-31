 #!/bin/bash
apt-get update
apt -y install software-properties-common
add-apt-repository ppa:ondrej/php
apt-get update
apt -y install php8.1
apt-get install -y php8.1-cli php8.1-json php8-common php8-mysql php8-zip php8-gd php8-mbstring php8-curl php8-xml php8-bcmath
apt-get install -y php8.1-fpm
service php8.1-fpm start
service php8.1-fpm status
service nginx start
service --status-all