# Dockerfile para tema WordPress otimiza-an
FROM wordpress:latest

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Copiar tema para o container
COPY theme/ /var/www/html/wp-content/themes/otimiza-an-theme/

# Definir permissões corretas
RUN chown -R www-data:www-data /var/www/html/wp-content/themes/otimiza-an-theme

# Instalar dependências do tema
WORKDIR /var/www/html/wp-content/themes/otimiza-an-theme
RUN composer install --no-dev --optimize-autoloader || true

# Voltar ao diretório padrão
WORKDIR /var/www/html

# Expor porta
EXPOSE 80

# Healthcheck
HEALTHCHECK --interval=30s --timeout=3s --start-period=40s \
  CMD curl -f http://localhost/ || exit 1
