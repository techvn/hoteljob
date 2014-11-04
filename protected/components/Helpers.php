<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/3/14
 * Time: 9:34 AM
 */

class Helpers
{
    public static function locationTrees($locations = null)
    {
        $result = array();
        if ($locations == null) {
            $locations = Locations::model()->findAll();
        }
        foreach($locations as $l) {
            if($l->parent_id == 0 || empty($l->parent_id)) {
                $result[$l->id] = $l->name;
                foreach($locations as $l_province) {
                    if($l->id == $l_province->parent_id) {
                        $result[$l_province->id] = '--- ' . $l_province->name;
                        foreach($locations as $l_district) {
                            if($l_province->id == $l_district->parent_id) {
                                $result[$l_district->id] = '------ ' .$l_district->name;
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }
}