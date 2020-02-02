<div class="members view">
<h2><?php echo __('Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($member['Member']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($member['Member']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No'); ?></dt>
		<dd>
			<?php echo h($member['Member']['no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($member['Member']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($member['Member']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valid'); ?></dt>
		<dd>
			<?php echo h($member['Member']['valid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($member['Member']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($member['Member']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), array(), __('Are you sure you want to delete # %s?', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Member'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transactions'); ?></h3>
	<?php if (!empty($member['Transaction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Member Id'); ?></th>
		<th><?php echo __('Member Name'); ?></th>
		<th><?php echo __('Member Paytype'); ?></th>
		<th><?php echo __('Member Company'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Month'); ?></th>
		<th><?php echo __('Ref No'); ?></th>
		<th><?php echo __('Receipt No'); ?></th>
		<th><?php echo __('Payment Method'); ?></th>
		<th><?php echo __('Batch No'); ?></th>
		<th><?php echo __('Cheque No'); ?></th>
		<th><?php echo __('Payment Type'); ?></th>
		<th><?php echo __('Renewal Year'); ?></th>
		<th><?php echo __('Remarks'); ?></th>
		<th><?php echo __('Subtotal'); ?></th>
		<th><?php echo __('Tax'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Valid'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($member['Transaction'] as $transaction): ?>
		<tr>
			<td><?php echo $transaction['id']; ?></td>
			<td><?php echo $transaction['member_id']; ?></td>
			<td><?php echo $transaction['member_name']; ?></td>
			<td><?php echo $transaction['member_paytype']; ?></td>
			<td><?php echo $transaction['member_company']; ?></td>
			<td><?php echo $transaction['date']; ?></td>
			<td><?php echo $transaction['year']; ?></td>
			<td><?php echo $transaction['month']; ?></td>
			<td><?php echo $transaction['ref_no']; ?></td>
			<td><?php echo $transaction['receipt_no']; ?></td>
			<td><?php echo $transaction['payment_method']; ?></td>
			<td><?php echo $transaction['batch_no']; ?></td>
			<td><?php echo $transaction['cheque_no']; ?></td>
			<td><?php echo $transaction['payment_type']; ?></td>
			<td><?php echo $transaction['renewal_year']; ?></td>
			<td><?php echo $transaction['remarks']; ?></td>
			<td><?php echo $transaction['subtotal']; ?></td>
			<td><?php echo $transaction['tax']; ?></td>
			<td><?php echo $transaction['total']; ?></td>
			<td><?php echo $transaction['valid']; ?></td>
			<td><?php echo $transaction['created']; ?></td>
			<td><?php echo $transaction['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transactions', 'action' => 'edit', $transaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), array(), __('Are you sure you want to delete # %s?', $transaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
