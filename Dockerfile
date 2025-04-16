# Étape 1 : Choisir l'image de base avec PHP et Apache
FROM php:8.0-apache

# Étape 2 : Copier le code source dans le conteneur
COPY . /var/www/html/

# Étape 3 : Installer les extensions PHP nécessaires (par exemple, mysqli pour la base de données)
RUN docker-php-ext-install mysqli

# Étape 4 : Définir les permissions (facultatif, pour que Apache puisse lire les fichiers)
RUN chown -R www-data:www-data /var/www/html

# Étape 5 : Exposer le port 80 (le port par défaut d'Apache)
EXPOSE 80

# Étape 6 : Démarrer Apache en mode premier plan
CMD ["apache2-foreground"]
