<table>
<thead> <th> Id</th> <th> Role</th><th>Fname </th><th> User Name</th> <th>Satus </th></thead>
<?php if($ListUsers):?>
<?php  foreach($ListUsers as $row):?> 
    <tbody>
        <tr> 
<td><?php echo $row['Id'];?> </td> <td> <?php echo $row['Role'];?></td><td><?php echo $row['Fname'];?> </td> <td><?php echo $row['User_Name'];?> </td> <td><?php echo $row['Status'];?> </td>
</tr>
    </tbody>
    <?php endforeach;
    endif;?>

</table>