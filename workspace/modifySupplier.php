<!-- The following web page implements the SQL UPDATE function. Tables involved: Supplier, Product, Customer, Carrier, One_order, Orders, and Payment. This webpage handles the modification for the Supplier table -->





<?php      
         //Connect to Oracle       
        $conn = oci_connect("azakbari", "374441aaA", "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=oracle.scs.ryerson.ca)(PORT=1521))(CONNECT_DATA=(SID=orcl)))");
        
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
            <!-- FORM -->


            <div class="tab-content" style='margin-left:-2%'>
                <!--SUPPLIER-->


                <div class="tab-pane active" id="supplierDiv">
                    <form action="modifySupplier.php" method="get">
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


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick supplier
                            column to modify :</label> <select name=
                            "tableType">
                                <?php
                                                        // RETRIVE COLUMN INFORMATION FROM SUPPLIER TABLE
                                                         $columnNames = 'SELECT column_name FROM all_tab_cols WHERE  table_name = \'SUPPLIER\'';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick
                            SUPPLIERID row to update :</label> <select name=
                            "oldNameField">
                                <?php
                                                        echo  "    <option value='NULL'>NULL</option>" ;
                                                    
                                                        // RETRIVE COLUMN INFORMATION FROM SUPPLIER TABLE
                                                         $columnNames = 'SELECT SUPPLIERID FROM SUPPLIER';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "changeNameField">Enter new value:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "changeNameField" name="changeNameField" type=
                                "text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" value=
                                "submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--PRODUCTS-->


                <div class="tab-pane" id="productsDiv">
                    <form action="modifyProducts.php" method="get">
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
                            <label class="control-label col-sm-4">Pick products
                            column to modify :</label> <select name=
                            "tableType">
                                <?php
                                                        
                                                        
                                                        // RETRIVE COLUMN INFORMATION FROM PRODUCTS TABLE
                                                         $columnNames = 'SELECT column_name FROM all_tab_cols WHERE  table_name = \'PRODUCTS\'';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick
                            PRODUCTID row to update :</label> <select name=
                            "oldNameField">
                                <?php
                                                        echo  "    <option value='NULL'>NULL</option>" ;
                                                    
                                                        // RETRIVE COLUMN INFORMATION FROM PRODUCT TABLE
                                                         $columnNames = 'SELECT PRODUCTID FROM PRODUCTS';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "changeNameField">Enter new value:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "changeNameField" name="changeNameField" type=
                                "text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" name="submit"
                                type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--PAYMENT-->


                <div class="tab-pane" id="paymentDiv">
                    <form action="modifyPayment.php" method="get">
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
                            <label class="control-label col-sm-4">Pick payment
                            column to modify :</label> <select name=
                            "tableType">
                                <?php
                                                        
                                                        
                                                        // RETRIVE COLUMN INFORMATION FROM PAYMENT TABLE
                                                         $columnNames = 'SELECT column_name FROM all_tab_cols WHERE  table_name = \'PAYMENT\'';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick
                            PAYMENT_ID row to update :</label> <select name=
                            "oldNameField">
                                <?php
                                                        echo  "    <option value='NULL'>NULL</option>" ;
                                                    
                                                        // RETRIVE COLUMN INFORMATION FROM PAYMENT TABLE
                                                         $columnNames = 'SELECT PAYMENT_ID FROM PAYMENT';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "changeNameField">Enter new value:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "changeNameField" name="changeNameField" type=
                                "text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--ORDERS-->


                <div class="tab-pane" id="ordersDiv">
                    <form action="modifyOrders.php" method="get">
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
                            <label class="control-label col-sm-4">Pick order
                            column to modify :</label> <select name=
                            "tableType">
                                <?php
                                                        
                                                        
                                                        // RETRIVE COLUMN INFORMATION FROM ORDERS TABLE
                                                         $columnNames = 'SELECT column_name FROM all_tab_cols WHERE  table_name = \'ORDERS\'';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick ORDERID
                            row to update :</label> <select name=
                            "oldNameField">
                                <?php
                                                        echo  "    <option value='NULL'>NULL</option>" ;
                                                    
                                                        // RETRIVE COLUMN INFORMATION FROM ORDERS TABLE
                                                         $columnNames = 'SELECT ORDERID FROM ORDERS';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "changeNameField">Enter new value:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "changeNameField" name="changeNameField" type=
                                "text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--ONE_ORDER-->


                <div class="tab-pane" id="one_orderDiv">
                    <form action="modifyOne_order.php" method="get">
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
                            <label class="control-label col-sm-4">Pick
                            one_order column to modify :</label> <select name=
                            "tableType">
                                <?php
                                                        
                                                        
                                                        // RETRIVE COLUMN INFORMATION FROM ONE_ORDER TABLE
                                                         $columnNames = 'SELECT column_name FROM all_tab_cols WHERE  table_name = \'ONE_ORDER\'';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick ORDERID
                            row to update :</label> <select name=
                            "oldNameField">
                                <?php
                                                        echo  "    <option value='NULL'>NULL</option>" ;
                                                    
                                                        // RETRIVE COLUMN INFORMATION FROM ONE_ORDER TABLE
                                                         $columnNames = 'SELECT ORDERID FROM ONE_ORDER';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "changeNameField">Enter new value:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "changeNameField" name="changeNameField" type=
                                "text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--CUSTOMER-->


                <div class="tab-pane" id="customerDiv">
                    <form action="modifyCustomer.php" method="get">
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
                            <label class="control-label col-sm-4">Pick customer
                            column to modify :</label> <select name=
                            "tableType">
                                <?php
                                                        
                                                        
                                                        // RETRIVE COLUMN INFORMATION FROM CUSTOMER TABLE
                                                         $columnNames = 'SELECT column_name FROM all_tab_cols WHERE  table_name = \'CUSTOMER\'';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick
                            CUSTOMER_ID row to update :</label> <select name=
                            "oldNameField">
                                <?php
                                                        echo  "    <option value='NULL'>NULL</option>" ;
                                                    
                                                        // RETRIVE COLUMN INFORMATION FROM CUSTOMER TABLE
                                                         $columnNames = 'SELECT CUSTOMER_ID FROM CUSTOMER';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "changeNameField">Enter new value:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "changeNameField" name="changeNameField" type=
                                "text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--CARRIER-->


                <div class="tab-pane" id="carrierDiv">
                    <form action="modifyCarrier.php" method="get">
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
                            <label class="control-label col-sm-4">Pick payment
                            column to modify :</label> <select name=
                            "tableType">
                                <?php
                                                        
                                                        
                                                        // RETRIVE COLUMN INFORMATION FROM CARRIER TABLE
                                                         $columnNames = 'SELECT column_name FROM all_tab_cols WHERE  table_name = \'CARRIER\'';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-4">Pick
                            CARRIERID row to update :</label> <select name=
                            "oldNameField">
                                <?php
                                                        echo  "    <option value='NULL'>NULL</option>" ;
                                                    
                                                        // RETRIVE COLUMN INFORMATION FROM CARRIER TABLE
                                                         $columnNames = 'SELECT CARRIERID FROM CARRIER';
                                                        
                                                         $columnNamesArray = oci_parse($conn, $columnNames);    
                                                         oci_execute($columnNamesArray);

                                                        
                                                        
                                                        
                                                        while ($rowTest =  oci_fetch_array($columnNamesArray, OCI_ASSOC+OCI_RETURN_NULLS))
                                                        {
                                                            
                                                                foreach($rowTest as $itemTest)
                                                                {
                                                                    echo  "    <option value=\"" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "\">" . ($itemTest !== null ? htmlentities($itemTest, ENT_QUOTES) : "&nbsp;") . "</option>" ;
                                                                
                                                                }
                                                            
                                                        }       
                                                        
                                                        
                                                    ?>
                            </select>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=
                            "changeNameField">Enter new value:</label>

                            <div class="col-sm-5">
                                <input class="form-control" id=
                                "changeNameField" name="changeNameField" type=
                                "text">
                            </div>
                        </div>
                        <br>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default" type=
                                "submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF WEBPAGE --><!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js">
    </script> <!-- Bootstrap Core JavaScript -->
     
    <script src="js/bootstrap.min.js">
    </script> <!-- Menu Toggle Script -->
     <?php      

     $changeNameField = mysql_real_escape_string($_GET['changeNameField']);
     $oldNameField = mysql_real_escape_string($_GET['oldNameField']);
     $tableType = $_GET['tableType'];
     
     
     
     
     $oldNameField = trim(mysql_real_escape_string($oldNameField));
     $changeNameField = trim(mysql_real_escape_string($changeNameField));
     

     $query =  "UPDATE SUPPLIER SET " . $tableType . "=" . "'" . $changeNameField . "'" . " WHERE SUPPLIERID=" . "'" . $oldNameField . "'";
                                                                




    echo "<p style='margin-left:20%;margin-top:5%'>" . $query . "</p>"; 
                                                                        
    $insert = oci_parse($conn, $query);

    $resultBack = oci_execute($insert);

    //Reload after database transaction 
    $_SERVER['PHP_SELF'];



    oci_close($conn);

    ?>
</body>
</html>
