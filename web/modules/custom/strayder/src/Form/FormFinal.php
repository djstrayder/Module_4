<?php

namespace Drupal\strayder\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * {@inheritdoc}
 */

class FormFinal extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {

    return 'form_final';
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // 'Add row' button.
    $form['actions1']['add_row'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add row'),
      '#submit' => array('::addRowCallback'),
    ];
    // Get the number of rows, default to 1 row.
    $num_of_rows = $form_state->get('num_of_rows');
    if (empty($num_of_rows)){
      $num_of_rows=1;
      $form_state->set('num_of_rows', $num_of_rows);
    }

    // Add the headers.
    $form['cells'] = [
      '#type' => 'table',
      '#title' => 'Sample Table',
      '#header' => ['Year', 'Jan', 'Feb', 'Mar', 'Q1', 'Apr', 'May', 'Jun',
        'Q2', 'Jul', 'Aug', 'Sep', 'Q3', 'Oct', 'Nov', 'Dec', 'Q4', 'YTD',],
    ];
    $year = (string)((date('Y')) + 1);
    // Create rows according to $num_of_rows.
    for ($i=1; $i<=$num_of_rows; $i++) {
      $form['cells'][$i]['year'] = [
        '#type' => 'textfield',
        '#title' => $this->t($year),
        '#title_display' => 'invisible',
        '#default_value' => $year - $i,
        '#size' => '4',
      ];

      $form['cells'][$i]['jan'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Jan'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['feb'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Feb'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['mar'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Mar'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['Q1'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Q1'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
        '#disabled' => TRUE,
      ];
      $form['cells'][$i]['apr'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Apr'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['may'] = [
        '#type' => 'textfield',
        '#title' => $this->t('May'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['jun'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Jun'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['q2'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Q2'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
        '#disabled' => TRUE,
      ];
      $form['cells'][$i]['jul'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Jul'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['aug'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Aug'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['sep'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Sep'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['q3'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Q3'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
        '#disabled' => TRUE,
      ];
      $form['cells'][$i]['oct'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Oct'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['nov'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Nov'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['dec'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Dec'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
      ];
      $form['cells'][$i]['q4'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Q4'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
        '#disabled' => TRUE,
      ];
      $form['cells'][$i]['ytd'] = [
        '#type' => 'textfield',
        '#title' => $this->t('YTD'),
        '#title_display' => 'invisible',
        '#default_value' => '',
        '#size' => '4',
        '#disabled' => TRUE,
      ];
    }



    // Submit button.
    $form['actions2']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */
  public function addRowCallback(array &$form, FormStateInterface $form_state) {

    // Increase by 1 the number of rows.
    $num_of_rows = $form_state->get('num_of_rows');
    $num_of_rows++;
    $form_state->set('num_of_rows', $num_of_rows);

    // Rebuild form with 1 extra row.
    $form_state->setRebuild();
  }


  public function zeroCheck($m) {
    if ($m=='') {
      $m = 0;
    }
    return $m;
  }
  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Find out what was submitted.
    $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep',
      'oct', 'nov', 'dec'];
    $m = [];
    $num_of_rows = $form_state->get('num_of_rows');
    for ($i=1; $i<=$num_of_rows; $i++) {
      $value = $form_state->getValues();
      $valueYear = $value['cells'][$i]['year'];

      for ($s=0; $s<=count($months) - 1; $s++) {
        $m[$s] = $value['cells'][$i][$months[$s]];
        $m[$s] = $this->zeroCheck($m[$s]);
      }
      $q1 = sprintf('%0.2f', ((($m[0] + $m[1] + $m[2]) + 1) / 3));
      $q2 = sprintf('%0.2f', ((($m[3] + $m[4] + $m[5]) + 1) / 3));
      $q3 = sprintf('%0.2f', ((($m[6] + $m[7] + $m[8]) + 1) / 3));
      $q4 = sprintf('%0.2f', ((($m[9] + $m[10] + $m[11]) + 1) / 3));
      $ytd = sprintf('%0.2f',((($q1 + $q2 + $q3 + $q4) + 1) / 4));
      $data[$i] = [
        'year' => $valueYear,
        'jan' => $m[0],
        'feb' => $m[1],
        'mar' => $m[2],
        'q1' => $q1,
        'apr' => $m[3],
        'may' => $m[4],
        'jun' => $m[5],
        'q2' => $q2,
        'jul' => $m[6],
        'aug' => $m[7],
        'sep'=> $m[8],
        'q3' => $q3,
        'oct' => $m[9],
        'nov' => $m[10],
        'dec' => $m[11],
        'q4' => $q4,
        'ytd' => $ytd,
      ];
    }

    \Drupal::messenger()->addMessage(print_r($data, TRUE));

  }

}
