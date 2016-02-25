<table>
<tr><th>ID</th><th>商品名</th><th>価格</th></tr>
<?php foreach($burgers as $tn){ ?>
<tr>
<td><?php echo h($tn['Burger']['id']); ?></td>
<td><?php echo h($tn['Burger']['name']); ?></td>
<td><?php echo h($tn['Burger']['price']); ?>円</td>
</tr>
<?php } ?>
</table>
<?php debug($burgers); ?>
