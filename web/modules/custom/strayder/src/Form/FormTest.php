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

    // Get the number of table, default to 0 row.
    $num_of_table = $form_state->get('num_of_table');
    if (empty($num_of_table)) {
      $num_of_table = 1;
      $form_state->set('num_of_table', $num_of_table);
    }

    // Get the number of rows, default to 1 row.
    $num_of_rows = $form_state->get('num_of_rows');
    if (empty($num_of_rows)) {
      $num_of_rows = 1;
      $form_state->set('num_of_rows', $num_of_rows);
    }
    for ($table = 1; $table <= $num_of_table; $table++) {
      // Add the headers.
      $form['cells'][$table] = [
        '#type' => 'table',
        '#title' => 'Sample Table',
        '#header' => [
          'Year',
          'Jan',
          'Feb',
          'Mar',
          'Q1',
          'Apr',
          'May',
          'Jun',
          'Q2',
          'Jul',
          'Aug',
          'Sep',
          'Q3',
          'Oct',
          'Nov',
          'Dec',
          'Q4',
          'YTD',
        ],
      ];
      $year = (string) ((date('Y')) + 1);
      // Create rows according to $num_of_rows.
      for ($i = 1; $i <= $num_of_rows; $i++) {

        $form['cells'][$table][$i]['year'] = [
          '#type' => 'textfield',
          '#title' => $this->t($year),
          '#title_display' => 'invisible',
          '#default_value' => $year - $i,
          '#size' => '4',
        ];

        $form['cells'][$table][$i]['jan'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Jan'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['feb'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Feb'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['mar'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Mar'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['Q1'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Q1'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
          '#disabled' => TRUE,
        ];
        $form['cells'][$table][$i]['apr'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Apr'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['may'] = [
          '#type' => 'textfield',
          '#title' => $this->t('May'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['jun'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Jun'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['q2'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Q2'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
          '#disabled' => TRUE,
        ];
        $form['cells'][$table][$i]['jul'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Jul'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['aug'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Aug'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['sep'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Sep'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['q3'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Q3'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
          '#disabled' => TRUE,
        ];
        $form['cells'][$table][$i]['oct'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Oct'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['nov'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Nov'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['dec'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Dec'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
        ];
        $form['cells'][$table][$i]['q4'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Q4'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
          '#disabled' => TRUE,
        ];
        $form['cells'][$table][$i]['ytd'] = [
          '#type' => 'textfield',
          '#title' => $this->t('YTD'),
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#size' => '4',
          '#disabled' => TRUE,
        ];
      }

    }

    // 'Add row' button.
    $form['actions1']['add_row'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add row'),
      '#submit' => ['::addRowCallback'],
    ];
    // 'Add table' button.
    $form['actions3']['add_table'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add table'),
      '#submit' => ['::addTableCallback'],
    ];
    // Submit button.
    $form['actions2']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }
  //Function that checks if the field value is empty.
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
  public function validateForm(array &$form, FormStateInterface $form_state) {
    //    $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep',
    //      'oct', 'nov', 'dec'];
    //    $m = [];
    $num_of_table = $form_state->get('num_of_table');
    $value = $form_state->getValues();
    $errorMm = 0;
    $errorMp = 0;
    for ($table = 1; $table<=$num_of_table; $table++) {
      $num_of_rows = $form_state->get('num_of_rows');
      for ($i=1; $i<=$num_of_rows; $i++) {
        $m1 = $value[$table][$i]['jan'];
        $m2 = $value[$table][$i]['feb'];
        $m3 = $value[$table][$i]['mar'];
        $m4 = $value[$table][$i]['apr'];
        $m5 = $value[$table][$i]['may'];
        $m6 = $value[$table][$i]['jun'];
        if ($m1 <= $m2) {
          $m12 = 0;
        }
        else {
          $m12 = 1;
        }
        if ($m2 <= $m3) {
          $m23 = 0;
        }
        else {
          $m23 = 1;
        }
        if ($m3 <= $m4) {
          $m34 = 0;
        }
        else {
          $m34 = 1;
        }
        if ($m4 <= $m5) {
          $m45 = 0;
        }
        else {
          $m45 = 1;
        }
        if ($m5 <= $m6) {
          $m56 = 0;
        }
        else {
          $m56 = 1;
        }
        if ($m6 <= $m1) {
          $m61 = 0;
        }
        else {
          $m61 = 1;
        }
        $mcount = $m12 + $m23 + $m34 + $m45 + $m56 + $m61;

        return $mcount;



      }
    }

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

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */
  public function addTableCallback(array &$form, FormStateInterface $form_state) {
    $num_of_table = $form_state->get('num_of_table');
    $num_of_table++;
    $form_state->set('num_of_table', $num_of_table);
    $form_state->setRebuild();
  }


  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    //     Find out what was submitted.
    $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep',
      'oct', 'nov', 'dec'];
    $m = [];
    $num_of_table = $form_state->get('num_of_table');
    $value = $form_state->getValues();
    for ($table = 1; $table<=$num_of_table; $table++) {
      $num_of_rows = $form_state->get('num_of_rows');
      for ($i=1; $i<=$num_of_rows; $i++) {
        $valueYear = $value[$table][$i]['year'];
        for ($s=0; $s<=count($months) - 1; $s++) {
          $m[$s] = $value[$table][$i][$months[$s]];
          $m[$s] = $this->zeroCheck($m[$s]);
        }
        $q1 = sprintf('%0.2f', ((($m[0] + $m[1] + $m[2]) + 1) / 3));
        $q2 = sprintf('%0.2f', ((($m[3] + $m[4] + $m[5]) + 1) / 3));
        $q3 = sprintf('%0.2f', ((($m[6] + $m[7] + $m[8]) + 1) / 3));
        $q4 = sprintf('%0.2f', ((($m[9] + $m[10] + $m[11]) + 1) / 3));
        $ytd = sprintf('%0.2f',((($q1 + $q2 + $q3 + $q4) + 1) / 4));
        $data[$table][$i] = [
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
    }
    \Drupal::messenger()->addMessage(print_r($data, TRUE));
    //    $data = $form_state->getValues();
    //    \Drupal::messenger()->addMessage(print_r($data['cells'], TRUE));


  }

}
