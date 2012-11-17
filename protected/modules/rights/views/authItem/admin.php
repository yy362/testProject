<table class='table table-bordered table-striped'>
	<thead>
		<tr><th width=500px>#名称</th><th width=30%>描述</th><th width=20%>业务规则</th><th width=10%>操作</th></tr>
	</thead>
	<tbody>
		<?php $this->renderPartial('/authItem/_authItem', array(
			'items' => $rootItems,
			'path' => '',
			'layer' => 1,
		));?>
	</tbody>
</table>
<script>
$('.ajax-row a.ajax-link').live('click', function() {

	var self = $(this);
	var row = self.closest('tr');
	
	if(row.attr('expand') == 1) {
		hideRow(row);
	} else {
		if(!self.attr('loaded')) {
			$.get('<?php echo $this->createUrl('getItemChildren')?>', 
				{
					'name': row.attr('name'), 
					'layer': row.attr('layer'),
					'path': row.attr('path')
				}, 
				function(html) {
					newRows = $('<tbody>'+html+'</tbody>');
					row.data('children', newRows.children());
					newRows.children().insertAfter(row);
				}
			);
			self.attr('loaded', 1);
		}
		showRow(row);
	}

	function showRow(row) {
		children = row.data('children');
		if(children) {
			children.show();
		}
		row.find('i').removeClass('icon-plus').addClass('icon-minus');
		row.attr('expand', 1);
	}

	function hideRow(row) {
		children = row.data('children');
		
		row.find('i').removeClass('icon-minus').addClass('icon-plus');
		row.attr('expand', 0);

		if(children) {
			children.each(function(i,e) {
				row = $(e);
				row.hide();
				hideRow(row);
			});
		}
	}
	
	
});
</script>