#!/bin/bash
php ../otrance/public/index.php -u [otrance user name] -p [otrance password] -c export -a update-all
rsync -r ../otrance/data/export/ .
cd tmp
rm -r *
cd ..
echo "export done, tmp cleared"
