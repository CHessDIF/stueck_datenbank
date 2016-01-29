<?php
/**
 * Created by PhpStorm.
 * User: che
 * Date: 05.11.15
 * Time: 18:18
 */

namespace Drupal\stueck_datenbank;


class DataController
{
static function getAllStuecke() {
    $result = db_query('SELECT * FROM {StueckDatenbank_Stuecke}')->fetchAllAssoc('id');
    return $result;
}
    static function addStueck($name){
        db_insert('StueckDatenbank_Stuecke')->fields(array(
            'Stueckname' => $name,
        ))->execute();
    }

    static function deleteStueck($id){
        db_delete('StueckDatenbank_Stuecke')->condition('id', $id)->execute();
    }

    static function addRole($name){
        db_insert('StuckeDatenbank_Rollen')->fields(array(
            'RollenName' => $name,
        ))->execute();
    }
}