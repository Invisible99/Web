<form name="eventform" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month; ?>&day=<?php echo $day; ?>&year=<?php echo $year; ?>&v=true&add=true">
	<table width="100%">
    	<tr>
        	<td width="37.5%">Title</td>
            <td width="62.5%"><input type="text" name="txttitle"></td>
        </tr>
        <tr>
        	<td width="37.5%">Detail</td>
            <td width="62.5%"><textarea name="txtdetail"></textarea></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input type="submit" name="btnadd" value="Add event"></td>
        </tr>
    </table>
</form>
