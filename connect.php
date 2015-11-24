<!-- Connect to Oracle --> 

<?php		
         //Connect to Oracle       
		$conn = oci_connect("USERNAME", "PASSWORD", "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=oracle.scs.ryerson.ca)(PORT=1521))(CONNECT_DATA=(SID=orcl)))");
        
        if (!$conn)
			{
                    $m = oci_error();
                    echo $m['message'], "\n";
                     exit;
            } 
       else 
	   {
                 
        }	            
?>
