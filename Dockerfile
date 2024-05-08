# Gunakan image PHP dengan Apache sebagai dasar
FROM php:7.4-apache

# Instal ekstensi mysqli
RUN docker-php-ext-install mysqli

# Salin file dan direktori proyek PHP ke dalam image
COPY . /var/www/html/

# Berikan hak akses yang sesuai
RUN chmod -R 755 /var/www/html/

# Expose port 80
EXPOSE 80