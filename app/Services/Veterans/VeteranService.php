<?php
    namespace App\Services\Veterans;


use App\Models\ExCombatant;
use App\Models\Veteran;
use Illuminate\Support\Facades\DB;

    class VeteranService{
        public function getVeteran($id){
            // Retrieve the veteran from the database
            $veteran = Veteran::find($id);
            return $veteran;
        }

        //Get a list of all veterans
        public function getAllVeterans(){
            return DB::table('veterans')->get();
        }

        //Get a list of ExCombatants
        public function getExCombatants(){
            return DB::table('ex_combatants')->get();
        }

        //Retrieve a particular excombatant
        public function getExcombatant($id){
            return ExCombatant::find($id);
        }
    }

?>