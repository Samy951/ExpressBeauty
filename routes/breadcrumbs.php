<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Désactiver les exceptions pour les routes manquantes
Breadcrumbs::missing(function (BreadcrumbTrail $trail) {
    // Ne rien faire
});

// Accueil
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Accueil', route('home'));
});

// Accueil > Produits
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Produits', route('products.index'));
});

// Accueil > Produits > [Catégorie]
Breadcrumbs::for('products.category.makeup', function (BreadcrumbTrail $trail) {
    $trail->parent('products.index');
    $trail->push('Maquillage', route('products.category.makeup'));
});

Breadcrumbs::for('products.category.hair', function (BreadcrumbTrail $trail) {
    $trail->parent('products.index');
    $trail->push('Coiffure', route('products.category.hair'));
});

Breadcrumbs::for('products.category.lingerie', function (BreadcrumbTrail $trail) {
    $trail->parent('products.index');
    $trail->push('Lingerie', route('products.category.lingerie'));
});

// Accueil > Marques
Breadcrumbs::for('brands.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Marques', route('brands.index'));
});

// Accueil > Marques > [Marque spécifique]
Breadcrumbs::for('brands.dyson', function (BreadcrumbTrail $trail) {
    $trail->parent('brands.index');
    $trail->push('Dyson', route('brands.dyson'));
});

Breadcrumbs::for('brands.ghd', function (BreadcrumbTrail $trail) {
    $trail->parent('brands.index');
    $trail->push('GHD', route('brands.ghd'));
});

Breadcrumbs::for('brands.fenty', function (BreadcrumbTrail $trail) {
    $trail->parent('brands.index');
    $trail->push('Savage X Fenty', route('brands.fenty'));
});

Breadcrumbs::for('brands.fenty-beauty', function (BreadcrumbTrail $trail) {
    $trail->parent('brands.index');
    $trail->push('Fenty Beauty', route('brands.fenty-beauty'));
});

// Pages statiques
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('À Propos', route('about'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});

Breadcrumbs::for('faq', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('FAQ', route('faq'));
});

// Pages légales
Breadcrumbs::for('legal.mentions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mentions Légales', route('legal.mentions'));
});

Breadcrumbs::for('legal.privacy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Politique de Confidentialité', route('legal.privacy'));
});

Breadcrumbs::for('legal.cgv', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Conditions Générales de Vente', route('legal.cgv'));
});

Breadcrumbs::for('legal.terms', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Conditions d\'Utilisation', route('legal.terms'));
});

Breadcrumbs::for('legal.refund', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Politique de Remboursement', route('legal.refund'));
});
