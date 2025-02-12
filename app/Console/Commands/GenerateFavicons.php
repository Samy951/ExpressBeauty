<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class GenerateFavicons extends Command
{
    protected $signature = 'favicons:generate {source}';
    protected $description = 'Génère les différentes tailles de favicon';

    public function handle()
    {
        $sizes = [16, 32, 180, 192, 512];
        $source = $this->argument('source');

        foreach ($sizes as $size) {
            $img = Image::make($source);
            $img->resize($size, $size);
            $img->save(public_path("favicon-{$size}x{$size}.png"));
        }

        $this->info('Favicons générés avec succès !');
    }
} 