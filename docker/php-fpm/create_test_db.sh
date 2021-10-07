mysql -u root -ppassword -h db -P 3306 -e 'create database vo_test;'
mysql -u root -ppassword -h db -P 3306 -e "GRANT ALL ON vo_test.* TO 'vo';"