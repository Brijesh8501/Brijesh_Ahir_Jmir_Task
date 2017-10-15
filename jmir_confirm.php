 <?php
 include 'jmircontroll.php';
 if(isset($_REQUEST['adddata']))
{
 ?>
  <div class="panel panel-default">
    <div class="panel-body">Your data is saved. Go to the listing page to see!</div>
  </div>
<div class="container">
  <table class="brijesh-table">
<tr>
<th>Name</th>
<td>:</td>
<td><?php echo $Name; ?></td>
</tr>
<tr>
<th>Province</th>
<td>:</td>
<td><?php echo $Province; ?></td>
</tr>
<tr>
<th>Telephone</th>
<td>:</td>
<td><?php echo $Telephone; ?></td>
</tr>
<tr>
<th>Postal Code</th>
<td>:</td>
<td><?php echo $Postalcode; ?></td>
</tr>
<tr>
<th>Salary</th>
<td>:</td>
<td><?php echo $Salary; ?></td>
</tr>
</table>
</div>
<?php } ?>
