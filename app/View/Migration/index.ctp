<div class="row-fluid">
    <hr />

    <div class="alert">
        <h3>Migration Form</h3>
    </div>
<?php

echo $this->Form->create(false, array(
    'url' => array('controller' => 'Migration', 'action' => 'migrate'),
    'type' => 'file'
));
echo $this->Form->input('file', array('label' => 'Migration', 'type' => 'file'));
echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
echo $this->Form->end();
?>