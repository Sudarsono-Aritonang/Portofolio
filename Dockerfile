FROM php:7.4-apache

# Salin file dan direktori proyek PHP ke dalam image
COPY . /var/www/html/

# Berikan hak akses yang sesuai
RUN chmod -R 755 /var/www/html/

# Expose port 80
EXPOSE 80