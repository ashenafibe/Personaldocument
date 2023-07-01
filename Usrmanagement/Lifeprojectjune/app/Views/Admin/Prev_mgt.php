<table>
<thead> <th> Id</th> <th> Route</th><th>Description </th></thead>
<?php if($Listprev):?>
<?php  foreach($Listprev as $row):?> 
    <tbody>
        <tr> 
<td><?php echo $row['Id'];?> </td> <td> <?php echo $row['Route'];?></td><td><?php echo $row['Description'];?> </td> 
</tr>
    </tbody>
    <?php endforeach;
    endif;?>

</table>