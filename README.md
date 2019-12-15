# Cuisinator
Site web permettant de trouver une recette de cuisine en fonction des aliments que l'on possède.  

Consulter le wiki pour les différents éléments de conception.

# Requirements
1. php (7.2 is recommended)
1. Database

# Download
```bash
wget https://github.com/HE-Arc/Cuisinator/archive/master.zip
```

# Unzip
Unzip the archive in the correct folder
```bash
unzip master.zip
cd Cuisinator-master/

# Move the folder cuisinator in the webserver folder
mv ./cuisinator/ FOLDER_WEB

# Move into the fresh copied cuisinator folder
cd FOLDER_WEB
```

# Laravel installation in production

```bash
# Copy the example .env file
cp .env.prod .env
```

Update the config file (.env) according to your configuration (Database, URL)
```
APP_URL=https://url.com
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```


Execute these commands into cuisinator folder.

```bash

# Download the framework and his component
composer update

# Create an encryption key
php artisan key:generate

# Create the tables and add records
php artisan migrate:fresh --seed --force
```

After that, you can access to cusinator.
I hope it will work !

# Enjoy



