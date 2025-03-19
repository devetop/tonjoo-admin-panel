#!/bin/bash

for file in $(find . -type f -name "*.php")
do
    # src=@url("assets/backend/dist/img/logo-backend.png") -> src={{{{@url("assets/backend/dist/img/logo-backend.png")}}}}
    # sed -i 's|src=@url("\([^"]*\)")|src={{@url("\1")}}|g' "$file"
    # sed -i 's|href=@url("\([^"]*\)")|href={{@url("\1")}}|g' "$file"

    # <script src="plugins/moment/moment.min.js"></script>
    # sed -i 's|<script src="\([^"]*\)"></script>|<script src={{url("\1")}}></script>|g' "$file"

    # <a href="am-form-master-pivot-basic-edit.php" -> <a href={{url("am-form-master-pivot-basic-edit.php")}}
    sed -i 's|<a href="\([^"]*\).php"|<a href={{url("html.\1")}}|g' "$file"
done