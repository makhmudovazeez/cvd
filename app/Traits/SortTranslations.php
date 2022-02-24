<?php


namespace App\Traits;


trait SortTranslations
{

    protected function name($translations){
        $array = [];
        foreach ($translations as $translation){
            if(array_key_exists('name_short', $translation)){
                $array['name_short'][$translation['locale']] = $translation['name_short'];
            }
            if(array_key_exists('name_full', $translation)){
                $array['name_full'][$translation['locale']] = $translation['name_full'];
            }
            if(array_key_exists('name', $translation)){
                $array['name'][$translation['locale']] = $translation['name'];
            }
        }
        return $array;
    }
}
