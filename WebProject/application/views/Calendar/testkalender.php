<html>
<head>
<title>CodeIgniter Calendar</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
// Generate calendar
echo $this->calendar->generate($year, $month);
?>
</body>
</html>



