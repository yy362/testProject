<?php foreach($items as $item):?>
<tr class='ajax-row' name='<?php echo $item->name?>' layer='<?php echo $layer?>' path='<?php echo $path?$path."_".$item->name:$item->name?>'>
	<td>
		<?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $layer-1)?>
		<i class="icon-plus"></i>
		<?php echo CHtml::checkBox('AuthItemChildForm[children][]', false, array(
			'value' => $item->name,
		))?>
		<a class='ajax-link' href='javascript:;'><?php echo $item->name?></a>
	</td>
	<td><?php echo $item->description?></td>
	<td><?php echo $item->bizRule?'<code>'.$item->bizRule.'</code>':''?></td>
	<td>
		<a href='<?php echo $this->createUrl("update", array("id"=>$item->name))?>' class='icon-pencil'></a>
	</td>
</tr>
<?php endforeach;?>