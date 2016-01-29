<?php
/**
 * Created by PhpStorm.
 * User: che
 * Date: 11.11.15
 * Time: 09:17
 */

namespace Drupal\stueck_datenbank;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

class StueckOverview extends ControllerBase

{
    function content() {
        $url = Url::fromRoute('stueck_datenbank.stueck_add');
        $add_link = '<p>' . \Drupal::l(t('Create new play'), $url) . '</p>';

        // Table header.
        $header = array(
            'id' => t('Id'),
            'name' => t('Name of Play'),
            'operations' => t('Delete'),
        );

        $rows = array();

        foreach (DataController::getAllStuecke() as $id => $content) {

            // Row with attributes on the row and some of its cells.

            //Delete Link will be used later.
            $url = new Url('bd_contact_delete', array('id' => $id));
            $rows[] = array(
                'data' => array(
                    $id,
                    $content->Stueckname,
                    ),
            );
        }

        $table = array(
            '#type' => 'table',
            '#header' => $header,
            '#rows' => $rows,
            '#attributes' => array(
                'id' => 'stueck_datenbank_Overview',
            ),
        );

        //\Drupal::service('renderer')->render($table, false);

        return $table;

    }

}