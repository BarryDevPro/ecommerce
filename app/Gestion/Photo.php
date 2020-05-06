<?php
namespace App\Gestion;
class Photo implements PhotoInterface
{
    public function upload($image)
    {
        if (!$image->isValid()) {
            return false;
        }
        $chemin = config('images.path');
        // $extension = $image->getClientOriginalExtension();
        $nom = $image->getClientOriginalName();
        
        // do {
        //     $nom = str_random(10).'.'.$extension;
        // } while (file_exists($chemin.'/'.$nom));
        if ($image->move($chemin , $nom)) {
            return true;
        }else {
            return false;
        }
    }
}
