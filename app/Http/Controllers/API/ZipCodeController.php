<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ZipCode;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    //

    public function EnviarCP($zip_code){

        $datosCP = ZipCode::where("d_codigo",$zip_code)->get();

        if(isset($datosCP)){

            $info = $datosCP->first();

            $d_estado = mb_strtoupper($this->stripaccents($info->d_estado));


            $federal_entity = new \stdClass();
            $federal_entity->key  = $info->c_estado;
            $federal_entity->name = $d_estado;
            $federal_entity->code = $info->c_cp;  

            $municipality = new \stdClass();
            $municipality->key  = $info->c_mnpio;

            $d_mnpio = mb_strtoupper($this->stripaccents($info->d_mnpio));

            $municipality->name = $d_mnpio;

            $settlements = collect();

            foreach ($datosCP as $line){

                $settlement_type = new \stdClass();
                $settlement_type->name = $line->d_tipo_asenta;

                $d_asenta = mb_strtoupper($this->stripaccents($line->d_asenta));

                $settle = new \stdClass();
                $settle->key                = $line->id_asenta_cpcons;
                $settle->name               = $d_asenta;
                $settle->zone_type          = mb_strtoupper($line->d_zona);
                $settle->settlement_type    = $settlement_type;

                $settlements->push($settle);
            }

            $result = new \stdClass();
            $result->zip_code = $info->d_codigo;

            $locality = mb_strtoupper($this->stripaccents($info->d_ciudad));

            $result->locality       = $locality;
            $result->federal_entity = $federal_entity;

            $result->settlements  = $settlements;
            $result->municipality = $municipality;

           return response()->json($result);
        }

        return response()->json($datosCP);

    }

    function stripaccents($string)
    {
        $replace = array('/??/','/??/','/??/','/??/','/??/', '/??/', '/??/');
        $with = array('e','i','o','a', 'n', 'u', 'u');

        $newstring = preg_replace($replace, $with, $string);

        return $newstring;
    }

}
