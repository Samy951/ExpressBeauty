<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class CreateExpressBeautyFavicon extends Command
{
    protected $signature = 'favicon:create';
    protected $description = 'Crée le favicon ExpressBeauty';

    public function handle()
    {
        // Création d'une image 512x512 avec fond rouge bordeaux
        $img = Image::canvas(512, 512, '#7B1F1F');
        
        // Ajout du "E" stylisé en blanc avec une taille beaucoup plus grande
        $img->text('E', 256, 236, function($font) {
            $font->file(1); // Utilisation de la police système 1
            $font->size(450); // Taille encore plus grande
            $font->color('#ffffff'); // Texte en blanc
            $font->align('center');
            $font->valign('middle');
        });

        // Sauvegarde dans différentes tailles avec une meilleure qualité
        $sizes = [16, 32, 180, 192, 512];
        
        foreach ($sizes as $size) {
            $resized = clone $img;
            $resized->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            // Augmenter le contraste pour les petites tailles
            if ($size <= 32) {
                $resized->brightness(10);
                $resized->contrast(10);
            }
            
            $resized->encode('png', 100); // Qualité maximale
            $resized->save(public_path("favicon-{$size}x{$size}.png"));

            // Utiliser la version 32x32 comme favicon.ico
            if ($size === 32) {
                copy(
                    public_path('favicon-32x32.png'),
                    public_path('favicon.ico')
                );
            }
        }

        // Création spécifique pour apple-touch-icon
        $img->resize(180, 180)
            ->encode('png', 100)
            ->save(public_path('apple-touch-icon.png'));

        $this->info('Favicon ExpressBeauty créé avec succès !');
    }
} 