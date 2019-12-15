# Cuisinator
Site web permettant de trouver une recette de cuisine en fonction des aliments que l'on possède.  

Consulter le wiki pour les différents éléments de conception.

# Requirements
1. php (7.2 is recommended)
1. MySql.

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

# Go into the web server
cd FOLDER_WEB
```

# Laravel Installation in production

```bash
# Copy the exemple .env file
cp .env.prod .env
```

Update the config file according to your configuration (Databsase, URL)

```bash

# Download the framework and his component
composer update

# Create an encryption key
php artisan key:generate

# Create the tables and add records
php artisan migrate:fresh --seed --force
```

# Enjoy



