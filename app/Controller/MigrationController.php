<?php
App::uses('SimpleXLSX', 'Lib');

class MigrationController extends AppController{

    public function index() {
        $this->setFlash('Migration of data to multiple DB table');
    }

    public function migrate() {
        $this->loadModel('Member');
        $this->loadModel('Transaction');
        $this->loadModel('TransactionItem');

        if ($this->request->is('post')) {
            if (!empty($this->data)) {
                $file = $this->data['file']['tmp_name'];
                if (is_file($file) && $this->checkIfXls($this->data['file']['type'])) {
                    if ( $xlsx = SimpleXLSX::parse($file) ) {
                       // debug($xlsx->rows()); exit;
                        foreach($xlsx->rows() as $key => $row) {

                            if ($key == 0) {
                                continue;
                            }
                            $memberNo = explode(" ", $row[3]);
                            $date = new DateTime($row[0]);

                            $year = $date->format('Y');
                            $day = $date->format('d');
                            $month = $date->format('m');
                            $date = $date->format('Y-m-d');


                            /*
                             * Indexes of $row
                             * 0 => Date
                             * 1 => Reference No.
                             * 2 => Member Name
                             * 3 => Member No.
                             * 4 => Member Paytype
                             * 5 => Member Company
                             * 6 => Payment by
                             * 7 => Batch No.
                             * 8 => Receipt No.
                             * 9 => Cheque No.
                             * 10 => Payment Description
                             * 11 => Renewal Year
                             * 12 => Subtotal
                             * 13 => Tax
                             * 14 => Total
                             */
                            $member = array(
                                'type' => $memberNo[0],
                                'no' => $memberNo[1],
                                'name' => $row[2],
                                'company' => $row[5]
                            );
                            $member = $this->Member->save($member);

                            $transaction = array(
                                'member_id' => $member['Member']['id'],
                                'member_name' => $row[2],
                                'member_paytype' => $row[4],
                                'member_company' => $row[5],
                                'date' => $date,
                                'year' => $year,
                                'month' => $month,
                                'ref_no' => $row[1],
                                'receipt_no' => $row[8],
                                'payment_method' => $row[6],
                                'batch_no' => $row[7],
                                'cheque_no' => $row[9],
                                'payment_type' => $row[10],
                                'renewal_year' => $row[11],
                                'subtotal' => $row[12],
                                'tax' => $row[13],
                                'total' => $row[14],
                            );
                            $transaction = $this->Transaction->save($transaction);

                            $transactionItem = array (
                                'transaction_id' => $transaction['Transaction']['id'],
                                'description' => "Being Payment for: $row[10] : $row[11]",
                                'quantity' => 1,
                                'unit_price' => $row[12],
                                'sum' => $row[12],
                                'table' => 'Member',
                                'table_id' => $member['Member']['id']
                            );
                            $this->TransactionItem->save($transactionItem);
                            $this->Member->clear();
                            $this->Transaction->clear();
                            $this->TransactionItem->clear();
                        }
                    }
                }
            }
        }
        $this->setFlash('Successfully Migrated');
        return $this->redirect(
            array('controller' => 'Migration', 'action' => 'index')
        );

    }

    public function q1(){

        $this->setFlash('Question: Migration of data to multiple DB table');


// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
    }

    public function q1_instruction(){

        $this->setFlash('Question: Migration of data to multiple DB table');



// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
    }

    private function checkIfXls($type) {
        $xls_mime_types = [
            'application/vnd.ms-excel',
            'application/vnd.ms-excel.addin.macroEnabled.12',
            'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
            'application/vnd.ms-excel.sheet.macroEnabled.12',
            'application/vnd.ms-excel.template.macroEnabled.12',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',

         ];

        return in_array($type, $xls_mime_types);
    }

}