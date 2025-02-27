<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    public static function getData(){
        return [
            [
                "id" => 1,
               "name" => "Abdellatif Markazi"
            ],
            [
                "id" => 2,
                "name" => "Markazi"
            ]
        ];
    }

    public static function find($id){
        $listings = self::getData();
        if(empty($id)) abort(404);

        foreach($listings as $listing){
            if($listing['id'] === (int)$id) {
                return $listing;
            }
        }
        return null;
    }
}
