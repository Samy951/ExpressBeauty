<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class GenerateFavicons extends Command
{
    protected $signature = 'favicons:generate';
    protected $description = 'Génère le logo et les différentes tailles de favicon';

    public function handle()
    {
        // Créer l'image source avec un E blanc sur fond rouge
        $size = 512; // Taille de base
        $img = Image::canvas($size, $size, '#FF0000');
        
        // Ajouter le E en blanc
        $img->text('E', $size/2, $size/2, function($font) use ($size) {
            $font->file(public_path('fonts/arial.ttf'));
            $font->size($size * 0.6);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('middle');
        });

        // Sauvegarder l'image source
        $sourcePath = storage_path('app/logo.png');
        $img->save($sourcePath);

        // Générer les différentes tailles de PNG
        $sizes = [
            16 => 'favicon-16x16.png',
            32 => 'favicon-32x32.png',
            180 => 'apple-touch-icon.png',
            192 => 'android-chrome-192x192.png',
            512 => 'android-chrome-512x512.png'
        ];

        foreach ($sizes as $size => $filename) {
            $resized = Image::make($sourcePath);
            $resized->resize($size, $size);
            $resized->save(public_path($filename));

            // Utiliser la version 32x32 comme favicon.ico également
            if ($size === 32) {
                copy(public_path($filename), public_path('favicon.ico'));
            }
        }

        // Générer le site.webmanifest
        $manifest = [
            'name' => 'Express Beauty',
            'short_name' => 'Express Beauty',
            'icons' => [
                [
                    'src' => '/android-chrome-192x192.png',
                    'sizes' => '192x192',
                    'type' => 'image/png'
                ],
                [
                    'src' => '/android-chrome-512x512.png',
                    'sizes' => '512x512',
                    'type' => 'image/png'
                ]
            ],
            'theme_color' => '#FF0000',
            'background_color' => '#FF0000',
            'display' => 'standalone'
        ];

        file_put_contents(
            public_path('site.webmanifest'),
            json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        $this->info('Logo et favicons générés avec succès !');
    }
} 