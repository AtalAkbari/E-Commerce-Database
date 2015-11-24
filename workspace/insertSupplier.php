<!-- The following web page implements the SQL INSERT function. Tables involved: Supplier, Product, Customer, Carrier, One_order, Orders, and Payment. This webpage handles the insertion for the Supplier table -->





<?php      
         //Connect to Oracle       
        $conn = oci_connect("PASSWORD", "USERNAME", "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=HOSTADDRESS)(PORT=PORT_NUM))(CONNECT_DATA=(SID=orcl)))");
        
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
<!DOCTYPE html>

<html lang="en-us">
<head>
    <!-- Latest compiled and minified CSS -->
    <link href=
    "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel=
    "stylesheet"><!-- jQuery library -->

    <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script><!-- Latest compiled JavaScript -->

    <script src=
    "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script><!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"><!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <title>
    </title>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->


        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">E-Commerce Data Base</a>
                </li>


                <li>
                    <a href="../database.php">Insert a record</a>
                </li>


                <li>
                    <a href="../delete/deleteSupplier.php">Delete a record</a>
                </li>


                <li>
                    <a href="../modify/modifySupplier.php">Modify a record</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!--

    

        INSERTION FORM 



-->

    <div class="row" style="margin-left:12%; padding-top: 5%">
        <div class="col-md-1">
        </div>


        <div class="col-md-9" id="bodyContainer">
            <ul class="nav nav-tabs nav-pills" id="tabList">
                <li class="active">
                    <a data-toggle="tab" href="#supplierDiv">Supplier</a>
                </li>


                <li>
                    <a data-toggle="tab" href="#productsDiv">Products</a>
                </li>


                <li>
                    <a data-toggle="tab" href="#paymentDiv">Payment</a>
                </li>


                <li>
                    <a data-toggle="tab" href="#ordersDiv">Orders</a>
                </li>


                <li>
                    <a data-toggle="tab" href="#one_orderDiv">Orderer
                    Information</a>
                </li>


                <li>
                    <a data-toggle="tab" href="#customerDiv">Customer</a>
                </li>


                <li>
                    <a data-toggle="tab" href="#carrierDiv">Carrier</a>
                </li>
            </ul>
            <br>
            <br>
            <!--SUPPLIER-->


            <div class="tab-content" style="margin-left:-2%">
                <div class="tab-pane active" id="supplierDiv">
                    <?php
                                        // SHOW SUPPLIER TABLE 
                                        function showTable($conn) {
                                         $stringTable =  'SELECT * FROM  SUPPLIER';
                                         $columnNames = 'SELECT column_name FROM   all_tab_cols WHERE  table_name = \'SUPPLIER\'';
                                        
                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                         $stid = oci_parse($conn, $stringTable);
                                         oci_execute($stid);
                                         oci_execute($columnNamesArray);

                                        echo "<table class='table table-striped table-hover table-bordered' style='margin-top:5%;text-align:center' border='1'>\n";
                                        
                                        echo "<tr>\n";
                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                        {
                                            
                                                foreach($rowTest as $itemTest)
                                                {
                                                    echo  "    <td>" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                }
                                            
                                        }       
                                        echo "</tr>\n"; 
                                        
                                        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                                echo "<tr>\n";
                                                foreach ($row as $item)
                                                {
                                                    echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                }
                                                echo "</tr>\n";
                                            }
                                        echo "</table>\n";
                                        }
                                        
                                        showTable($conn);
                                        //END OF SUPPLIER TABLE
                                        ?><br>
                    <br>


                    <form action="insertSupplier.php" method="get">
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "supplierNameField">Supplier ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "supplierNameField" name="supplierNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "companyNameField">Company:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "companyNameField" name="companyNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "addressNameField">Address:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "addressNameField" name="addressNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "typeNameField">Type of good:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="typeNameField"
                                name="typeNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "companyNNameField">Company name:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "companyNNameField" name="companyNNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "phoneNameField">Phone:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="phoneNameField"
                                name="phoneNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--PRODUCTS-->


                <div class="tab-pane" id="productsDiv">
                    <form action="insertProducts.php" method="get">
                        <?php
                                            // SHOW PRODUCTS TABLE 
                                             $stringTable =  'SELECT * FROM  PRODUCTS';
                                             $columnNames = 'SELECT column_name FROM   all_tab_cols WHERE  table_name = \'PRODUCTS\'';
                                            
                                             $columnNamesArray = oci_parse($conn, $columnNames);    
                                             $stid = oci_parse($conn, $stringTable);
                                             oci_execute($stid);
                                             oci_execute($columnNamesArray);

                                            echo "<table class='table table-striped table-hover table-bordered' style='margin-top:5%;text-align:center' border='1'>\n";
                                            
                                            echo "<tr>\n";
                                            while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                                
                                                    foreach($rowTest as $itemTest)
                                                    {
                                                        echo  "    <td>" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                
                                            }       
                                            echo "</tr>\n"; 
                                            
                                            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
                                                {
                                                    echo "<tr>\n";
                                                    foreach ($row as $item)
                                                    {
                                                        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                    echo "</tr>\n";
                                                }
                                            echo "</table>\n";
                                            //END OF PRODUCTS TABLE
                                            ?><br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "supplierNameField">Supplier ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "supplierNameField" name="supplierNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "productIDNameField">Product ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "productIDNameField" name="productIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "priceNameField">Price:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="priceNameField"
                                name="priceNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "productNameField">Product Name:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "productNameField" name="productNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--PAYMENT-->


                <div class="tab-pane" id="paymentDiv">
                    <form action="insertPayment.php" method="get">
                        <?php
                                            // SHOW PAYMENT TABLE 
                                             $stringTable =  'SELECT * FROM  PAYMENT';
                                             $columnNames = 'SELECT column_name FROM   all_tab_cols WHERE  table_name = \'PAYMENT\'';
                                            
                                             $columnNamesArray = oci_parse($conn, $columnNames);    
                                             $stid = oci_parse($conn, $stringTable);
                                             oci_execute($stid);
                                             oci_execute($columnNamesArray);

                                            echo "<table class='table table-striped table-hover table-bordered' style='margin-top:5%;text-align:center' border='1'>\n";
                                            
                                            echo "<tr>\n";
                                            while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                                
                                                    foreach($rowTest as $itemTest)
                                                    {
                                                        echo  "    <td>" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                
                                            }       
                                            echo "</tr>\n"; 
                                            
                                            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
                                                {
                                                    echo "<tr>\n";
                                                    foreach ($row as $item)
                                                    {
                                                        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                    echo "</tr>\n";
                                                }
                                            echo "</table>\n";
                                            //END OF PAYMENT TABLE
                                            ?><br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "customerIDNameField">Customer ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "customerIDNameField" name=
                                "customerIDNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "paymentIDNameField">Payment ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "paymentIDNameField" name="paymentIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "orderIDNameField">Order ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "orderIDNameField" name="orderIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "typeNameField">Payment Type:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="typeNameField"
                                name="typeNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--ORDERS-->


                <div class="tab-pane" id="ordersDiv">
                    <form action="insertOrders.php" method="get">
                        <?php
                                            // SHOW ORDER TABLE 
                                             $stringTable =  'SELECT * FROM  ORDERS';
                                             $columnNames = 'SELECT column_name FROM   all_tab_cols WHERE  table_name = \'ORDERS\'';
                                            
                                             $columnNamesArray = oci_parse($conn, $columnNames);    
                                             $stid = oci_parse($conn, $stringTable);
                                             oci_execute($stid);
                                             oci_execute($columnNamesArray);

                                            echo "<table class='table table-striped table-hover table-bordered' style='margin-top:5%;text-align:center' border='1'>\n";
                                            
                                            echo "<tr>\n";
                                            while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                                
                                                    foreach($rowTest as $itemTest)
                                                    {
                                                        echo  "    <td>" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                
                                            }       
                                            echo "</tr>\n"; 
                                            
                                            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
                                                {
                                                    echo "<tr>\n";
                                                    foreach ($row as $item)
                                                    {
                                                        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                    echo "</tr>\n";
                                                }
                                            echo "</table>\n";
                                            //END OF ORDERS TABLE
                                            ?><br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "orderDateNameField">Order Date:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "orderDateNameField" name="orderDateNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "orderIDNameField">Order ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "orderIDNameField" name="orderIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "addressNameField">Ship Date:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "shipDateNameField" name="shipDateNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--ORDERS ONE-->


                <div class="tab-pane" id="one_orderDiv">
                    <form action="insertOne_order.php" method="get">
                        <?php
                                            // SHOW ONE_ORDER TABLE 
                                             $stringTable =  'SELECT * FROM  ONE_ORDER';
                                             $columnNames = 'SELECT column_name FROM   all_tab_cols WHERE  table_name = \'ONE_ORDER\'';
                                            
                                             $columnNamesArray = oci_parse($conn, $columnNames);    
                                             $stid = oci_parse($conn, $stringTable);
                                             oci_execute($stid);
                                             oci_execute($columnNamesArray);

                                            echo "<table class='table table-striped table-hover table-bordered' style='margin-top:5%;text-align:center' border='1'>\n";
                                            
                                            echo "<tr>\n";
                                            while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                                
                                                    foreach($rowTest as $itemTest)
                                                    {
                                                        echo  "    <td>" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                
                                            }       
                                            echo "</tr>\n"; 
                                            
                                            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
                                                {
                                                    echo "<tr>\n";
                                                    foreach ($row as $item)
                                                    {
                                                        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                    echo "</tr>\n";
                                                }
                                            echo "</table>\n";
                                            //END OF ONE_ORDER TABLE
                                            ?><br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "paymentIDNameField">Payment ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "paymentIDNameField" name="paymentIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "productIDNameField">Product ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "productIDNameField" name="productIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "customerIDNameField">Customer ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "customerIDNameField" name=
                                "customerIDNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "orderIDNameField">Order ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "orderIDNameField" name="orderIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--CUSTOMER-->


                <div class="tab-pane" id="customerDiv">
                    <form action="insertCustomer.php" method="get">
                        <?php
                                            // SHOW CUSTOMER TABLE 
                                             $stringTable =  'SELECT * FROM  CUSTOMER';
                                             $columnNames = 'SELECT column_name FROM   all_tab_cols WHERE  table_name = \'CUSTOMER\'';
                                            
                                             $columnNamesArray = oci_parse($conn, $columnNames);    
                                             $stid = oci_parse($conn, $stringTable);
                                             oci_execute($stid);
                                             oci_execute($columnNamesArray);

                                            echo "<table class='table table-striped table-hover table-bordered' style='margin-top:5%;text-align:center' border='1'>\n";
                                            
                                            echo "<tr>\n";
                                            while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                                
                                                    foreach($rowTest as $itemTest)
                                                    {
                                                        echo  "    <td>" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                
                                            }       
                                            echo "</tr>\n"; 
                                            
                                            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
                                                {
                                                    echo "<tr>\n";
                                                    foreach ($row as $item)
                                                    {
                                                        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                    echo "</tr>\n";
                                                }
                                            echo "</table>\n";
                                            //END OF CUSTOMER TABLE
                                            ?><br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "customerIDNameField">Customer ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "customerIDNameField" name=
                                "customerIDNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "nameField">Name:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="nameField"
                                name="nameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "phoneNameField">Phone:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="phoneNameField"
                                name="phoneNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "addressNameField">Address:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "addressNameField" name="addressNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "billingNameField">Billing Country:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "billingNameField" name="billingNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--CARRIER-->


                <div class="tab-pane" id="carrierDiv">
                    <form action="insertCarrier.php" method="get">
                        <?php
                                            // SHOW CARRIER TABLE 
                                             $stringTable =  'SELECT * FROM  CARRIER';
                                             $columnNames = 'SELECT column_name FROM   all_tab_cols WHERE  table_name = \'CARRIER\'';
                                            
                                             $columnNamesArray = oci_parse($conn, $columnNames);    
                                             $stid = oci_parse($conn, $stringTable);
                                             oci_execute($stid);
                                             oci_execute($columnNamesArray);
                                                
                                               

                                            echo "<table class='table table-striped table-hover table-bordered' style='margin-top:5%;text-align:center' border='1'>\n";
                                        
                                            $i=0; 
                                            while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC + OCI_RETURN_NULLS))
                                            {
                                                    echo $rowTest[0];
                                                    $reverseRow = array_reverse($rowTest, true); 
                                                    foreach($reverseRow as $itemTest)
                                                    {
                                                        $reverseArray[$i] = $itemTest;
                                                        $i ++;
                                                    }
                                                
                                            }       
                                            
                                            
                                            $reverseArray = array_reverse($reverseArray); 
                                            
                                            echo "<tr>\n";
                                            foreach($reverseArray as $reverseTest)
                                            {
                                                    echo  "    <td>" . $reverseTest . "&nbsp;" . "</td>\n";
                                            }
                                            echo "</tr>\n"; 
                                                
                                                
                                                
                                            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
                                                {
                                                    echo "<tr>\n";
                                                    foreach ($row as $item)
                                                    {
                                                        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                                    }
                                                    echo "</tr>\n";
                                                }
                                            echo "</table>\n";
                                            //END OF CARRIER TABLE
                                            ?><br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "customerIDNameField">Carrier Company:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "customerIDNameField" name=
                                "customerIDNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "phoneNameField">Phone:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="phoneNameField"
                                name="phoneNameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "nameField">Contact Name:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id="nameField"
                                name="nameField" type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "carrierIDNameField">Carrier ID:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "carrierIDNameField" name="carrierIDNameField"
                                type="text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js">
    </script> <!-- Bootstrap Core JavaScript -->
     
    <script src="js/bootstrap.min.js">
    </script> <!-- Menu Toggle Script -->
    <?php
     $supplierNameField = $_GET['supplierNameField'];
     $companyNameField =$_GET['companyNameField'];
     $addressNameField =$_GET['addressNameField'];
     $typeNameField  =$_GET['typeNameField'];
     $companyNNameField  =$_GET['companyNNameField'];
     $phoneNameField =$_GET['phoneNameField'];


    $query =  "INSERT INTO SUPPLIER VALUES('$supplierNameField','$companyNameField','$addressNameField','$typeNameField',
                                                                        '$companyNNameField',$phoneNameField)";

    echo "<p style='margin-left:20%;margin-top:5%'>" . $query . "</p>"; 
                                                                        
    $insert = oci_parse($conn, $query);

    $resultBack = oci_execute($insert);

    $_SERVER['PHP_SELF'];

    oci_close($conn);
    ?>
</body>
</html>
