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
        // Création d'une image 512x512 (taille de base)
        $img = Image::canvas(512, 512, '#ffffff');
        
        // Ajout du "E" stylisé
        $img->text('E', 256, 256, function($font) {
            $font->file(public_path('fonts/Montserrat-Bold.ttf'));
            $font->size(300);
            $font->color('#8B1D1D');
            $font->align('center');
            $font->valign('center');
        });
        
        // Ajout du petit cœur
        $heart = Image::canvas(100, 100, function ($draw) {
            $draw->circle(50, 50, 25, function ($draw) {
                $draw->background('#8B1D1D');
            });
        });
        $img->insert($heart, 'top-right', 20, 20);

        // Sauvegarde dans différentes tailles
        $sizes = [16, 32, 180, 192, 512];
        
        foreach ($sizes as $size) {
            $resized = clone $img;
            $resized->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            if ($size == 16 || $size == 32) {
                $resized->save(public_path("favicon-{$size}x{$size}.ico"));
            } else {
                $resized->save(public_path("favicon-{$size}x{$size}.png"));
            }
        }

        // Création spécifique pour apple-touch-icon
        $img->resize(180, 180)
            ->save(public_path('apple-touch-icon.png'));

        $this->info('Favicon ExpressBeauty créé avec succès !');
    }
} 