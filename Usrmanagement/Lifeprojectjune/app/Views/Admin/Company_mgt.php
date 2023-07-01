
<table>
<thead> <th> Id</th> <th>Company Type </th></thead>
<?php if($listcomp):?>
<?php  foreach($listcomp as $row):?> 
    <tbody>
        <tr> 
<td><?php echo $row['Id'];?> </td> <td><?php echo $row['Description'];?> </td> 
</tr>
    </tbody>
    <?php endforeach;
    endif;?>

</table>