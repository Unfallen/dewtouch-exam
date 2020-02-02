<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));

	}

	public function add() {
        if ($this->request->is('post')) {
            if (!empty($this->data)) {
                $file = $this->data['file']['tmp_name'];
                if (is_file($file) && $this->checkIfCSV($this->data['file']['type'])) {

                    $handle = fopen($this->data['file']['tmp_name'], "r");
                    $fileUploads = array();
                    while ($data = fgetcsv($handle)) {
                        if ($data[0] == 'Name' && $data[1] == 'Email') {
                            continue;
                        }

                        $upload = array(
                            'name' => $data[0],
                            'email' => $data[1]
                        );

                        array_push($fileUploads, $upload);


                    }
                    fclose($handle);
                    $this->FileUpload->saveMany($fileUploads);
                    $this->setFlash('Successfully Uploaded');
                    return $this->redirect(
                        array('controller' => 'FileUpload', 'action' => 'index')
                    );
                }
            }
        }
    }

    private function checkIfCSV($type) {
        $csv_mime_types = [
            'text/csv',
            'text/plain',
            'application/csv',
            'text/comma-separated-values',
            'application/excel',
            'application/vnd.ms-excel',
            'application/vnd.msexcel',
        ];

        return in_array($type, $csv_mime_types);
    }
}