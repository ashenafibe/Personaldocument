
<table>
<thead> <th> Id</th> <th> Role</th><th>Company Type </th></thead>
<?php if($ListRole):?>
<?php  foreach($ListRole as $row):?> 
    <tbody>
        <tr> 
<td><?php echo $row['Id'];?> </td> <td> <?php echo $row['Role'];?></td><td><?php echo $row['Description'];?> </td> 
</tr>
    </tbody>
    <?php endforeach;
    endif;?>

</table>