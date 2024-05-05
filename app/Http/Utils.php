<?php

namespace App\Http;

use App\Models\Headphone;
use App\Models\Manufacturer;

class Utils
{
    public static function queryNames($class, $tableName) : array {
        $tab = [];
        $queryResults = call_user_func('App\Models\\'.$class.'::all');

        for($i = 0; $i < count($queryResults); $i++) {
            if($tableName) {
                $tab[$i] = [
                    'name' => Utils::trans($tableName.'.'.$tableName.'.'.strtolower($queryResults[$i]->name), $queryResults[$i]->name),
                    'id' => $queryResults[$i]->id
                ];
            } else {
                $tab[$i] = [
                    'name' => $queryResults[$i]->name,
                    'id' => $queryResults[$i]->id
                ];
            }
        }

        return $tab;
    }

    public static function queryHeadphoneNames($class, $tableName) : array {
        $tab = [];
        $queryResults = Headphone::all();

        for($i = 0; $i < count($queryResults); $i++) {
            if($tableName) {
                $manufName = Manufacturer::where('id', $queryResults[$i]->idManufacturer)->first()->name;
                $tab[$i] = [
                    'name' => $manufName . ' ' . Utils::trans($tableName.'.'.$tableName.'.'.strtolower($queryResults[$i]->name), $queryResults[$i]->name),
                    'id' => $queryResults[$i]->id
                ];
            } else {
                $tab[$i] = [
                    'name' => $queryResults[$i]->name,
                    'id' => $queryResults[$i]->id
                ];
            }
        }

        return $tab;
    }

    public static function trans($key, $fallback) {;
        $strName = __($key);

        if($strName == $key) {
            return $fallback;
        }
        return $strName;
    }
}
