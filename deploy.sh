#!/bin/bash

echo "🚀 Déploiement d'ExpressBeauty..."

# Mise à jour du code
echo "📥 Récupération des dernières modifications..."
git pull origin main

# Installation des dépendances
echo "📦 Installation des dépendances PHP..."
composer install --no-dev --optimize-autoloader

# Optimisations Laravel
echo "⚡ Optimisation de Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Installation des dépendances NPM
echo "📦 Installation des dépendances NPM..."
npm ci
npm run build

# Migration de la base de données
echo "🔄 Migration de la base de données..."
php artisan migrate --force

# Génération du sitemap
echo "🗺️ Génération du sitemap..."
php artisan sitemap:generate

# Nettoyage du cache
echo "🧹 Nettoyage du cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Permissions
echo "🔒 Mise à jour des permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Redémarrage des services
echo "🔄 Redémarrage des services..."
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx

echo "✅ Déploiement terminé !"
