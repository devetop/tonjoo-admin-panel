#!/bin/sh
cd /home/tonjoo/repo/tap.git
git fetch origin master:master
git --work-tree=/home/tonjoo/tonjoo-admin-panel --git-dir=/home/tonjoo/repo/tap.git checkout master -f
chmod +x /home/tonjoo/tonjoo-admin-panel/wrapper.sh
bash /home/tonjoo/tonjoo-admin-panel/wrapper.sh dev-local dev-tonjoo dev-proxy down
bash /home/tonjoo/tonjoo-admin-panel/wrapper.sh dev-local dev-tonjoo dev-proxy up -d
