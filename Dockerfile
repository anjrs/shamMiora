# Utilise l'image officielle PHP avec Apache
FROM php:8.2-apache

# Copie le code source dans le conteneur
COPY . /var/www/html/

# Donne les permissions appropriées
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Active les modules Apache nécessaires
RUN a2enmod rewrite

# Expose le port 80
EXPOSE 80

# Lancement d'Apache en mode foreground
CMD ["apache2-foreground"]

pg_dump -h localhost -U postgres -d article -F c -f backup.dump

pg_dump -h localhost -U postgres -d articles -F c -f "C:/xampp/htdocs/shamMiora/backup.dump"

pg_restore -v -d "postgresql://neondb_owner:npg_U4V0PnAIMyer@ep-winter-math-abq9894a-pooler.eu-west-2.aws.neon.tech/neondb?sslmode=require" database.bak

pg_dump --no-owner --no-privileges --no-publications --no-subscriptions --no-tablespaces -Fc -v -d "postgresql://neondb_owner:npg_U4V0PnAIMyer@ep-winter-math-abq9894a-pooler.eu-west-2.aws.neon.tech/neondb?sslmode=require" -f database.bak

psql -h 192.168.1.100 -p 5432 -U mon_utilisateur -d ma_base_de_donnees
