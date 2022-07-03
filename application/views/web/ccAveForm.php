<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
	<?php
		echo "<input type=hidden name=encRequest value=$encRequest>";
		echo "<input type=hidden name=access_code value=$access_code>";
	?>
</form>

<script language='javascript'>document.redirect.submit();</script>