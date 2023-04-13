#git push
ssh om1cf_nico0033671139446@om1cf.ftp.infomaniak.com /bin/bash << EOF
cd /home/clients/d98898ecb865f1c357dfc40169febc89/sites/api.les6toits.ch
echo 'init git pull in directory' && pwd
git pull
EOF
