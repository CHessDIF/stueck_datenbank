<?php
/**
 * Created by PhpStorm.
 * User: che
 * Date: 05.11.15
 * Time: 18:23
 */

namespace Drupal\stueck_datenbank;


use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;

class AddStueck implements FormInterface
{

    /**
     * Returns a unique string identifying the form.
     *
     * @return string
     *   The unique string identifying the form.
     */
    public function getFormId()
    {
        return 'stueckDatenbank_Play_Add';
    }

    /**
     * Form constructor.
     * Will create a simple Form.
     * Name -> Textfield
     * And a 'Add' button.
     * @param array $form
     *   An associative array containing the structure of the form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     *
     * @return array
     *   The form structure.
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = array(
            '#type' => 'textfield',
            '#title' => t('Name of Play'),
            '#description' => t('Enter name of Play please')
        );
        $form['actions'] = array(
            '#type' => 'actions',
        );
        $form['actions'] ['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Add')
        );

        return $form;
    }

    /**
     * Form validation handler.
     *
     * @param array $form
     *   An associative array containing the structure of the form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        /**
         * Nothing to validate here.
         */
    }

    /**
     * Form submission handler.
     * Adds Inputs to database.
     *
     * @param array $form
     *   An associative array containing the structure of the form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $name = $form_state->getValue('name');
        DataController::addStueck($name);
        drupal_set_message(t('Play %play has been successfully created.', array('%play' => $name)));

        return;
    }
}