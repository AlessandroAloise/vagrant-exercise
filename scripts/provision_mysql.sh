#!/bin/bash
echo "MySql provisioning - begin"

#installare mysql-server
sudo apt-get install mysql-server -y

#abilitare le connessioni da altri server
echo "Updating bind address"
sudo sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf

# opening database port
apt-get install ufw -y
ufw --force enable
ufw allow 3306

#riavviare mysql in modo da applicare le modifiche
echo "Restarting mysql service"
sudo service mysql restart
echo "MySql provisioning - end"