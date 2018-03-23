    <?php
        // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:357ltddbserver.database.windows.net,1433; Database = 357LtdDB", "JJthescot", "JJd45c0t");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
    echo "Connected successfully<br>";

    // Query product for picture
    $query = 'SELECT ThumbNailPhoto FROM SalesLT.Product WHERE ProductID=:prodId';
    $stmt = $conn->prepare($query);
    $stmt->bindValue('prodId', 680, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->bindColumn(1, $blob, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
    $stmt->fetch(PDO::FETCH_BOUND);

    echo 'new: <img src="data:image/gif;base64,' . base64_encode( $blob ).'" /><br>';
    echo "<br>Done!<br>";
   
    $conn = null;
    $stmt = null;

    echo '<div class="row">';
    for($i=0;$i<5;$i++){
        echo'
    <div class = "col-sm-6 col-md-3">
    <div class = "thumbnail">
       <img src = "data:image/gif;base64,' . base64_encode( $blob ).'" alt = "Generic placeholder thumbnail">
    </div>
    
    <div class = "caption">
       <h3>Thumbnail label</h3>
       <p>Some sample text. Some sample text.</p>
       
       <p>
          <a href = "#" class = "btn btn-primary" role = "button">
             Button
          </a> 
          
          <a href = "#" class = "btn btn-default" role = "button">
             Button
          </a>
       </p>
       
    </div>
 </div>
 ';}
 echo '</div>';

 try {
    $conn = new PDO("sqlsrv:server = tcp:357ltddbserver.database.windows.net,1433; Database = 357LtdDB", "JJthescot", "JJd45c0t");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

try  
{  
$tsql = "SELECT TOP 10 ProductID, Name, Color, Size, ListPrice FROM SalesLT.Product";

$getProducts = $conn->prepare($tsql);  
$getProducts->execute();  
$products = $getProducts->fetchAll(PDO::FETCH_ASSOC);  
$productCount = count($products);  
if($productCount > 0)  
{  
BeginProductsTable($productCount);  
foreach( $products as $row )  
{  
PopulateProductsTable( $row );  
}  
//EndProductsTable();  
}  
}
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) );   
}  

function BeginProductsTable($rowCount)  
{  
    /* Display the beginning of the search results table. */  
$headings = array("Product ID", "Product Name", "Color", "Size", "Price");  
echo "<table align='center' cellpadding='5'>";   
echo "<tr bgcolor='silver'>$rowCount Results</tr><tr>";  
foreach ( $headings as $heading )  
{  
echo "<td>$heading</td>";  
}  
echo "</tr>";  
}  

 function PopulateProductsTable( $values )  
{  
    /* Populate Products table with search results. */  
    $productID = $values['ProductID'];  
    echo "<tr>";  
    foreach ( $values as $key => $value )  
    {  
        if ( 0 == strcasecmp( "Name", $key ) )  
        {  
            echo "<td><a href='?action=getreview&productid=$productID'>$value</a></td>";  
        }  
        elseif( !is_null( $value ) )  
        {  
            if ( 0 == strcasecmp( "ListPrice", $key ) )  
            {  
                /* Format with two digits of precision. */  
                $formattedPrice = sprintf("%.2f", $value);  
                echo "<td>$$formattedPrice</td>";  
            }  
            else  
            {  
                echo "<td>$value</td>";  
            }  
        }  
        else  
        {  
            echo "<td>N/A</td>";  
        }  
    }  
    echo "<td>  
            <form action='adventureworks_demo_pdo.php' enctype='multipart/form-data' method='POST'>  
            <input type='hidden' name='action' value='writereview'/>  
            <input type='hidden' name='productid' value='$productID'/>  
            <input type='submit' name='submit' value='Write a Review'/>  
            </td></tr>  
            </form></td></tr>";  
}  

 ?>

        <?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:357ltddbserver.database.windows.net,1433; Database = 357LtdDB", "JJthescot", "JJd45c0t");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}


echo "Connected successfully<br>";


    // Query picture for product
    $query = 'SELECT ThumbNailPhoto FROM SalesLT.Product WHERE ProductID=:prodId';
    $stmt = $conn->prepare($query);
    $stmt->bindValue('prodId', 680, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->bindColumn(1, $blob, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
    $stmt->fetch(PDO::FETCH_BOUND);

    echo 'new: <img src="data:image/gif;base64,' . base64_encode( $blob ).'" /><br>';
    echo "<br>Done!<br>";
   
$conn = null;
$stmt = null;

echo 'new 2: ';
$products->testImg(680);
?>
<div class="container">
	<div class="row">
		<div class="thumbnails" style="float" >
        <div class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x200" alt="ALT NAME">
                        <div class="caption">
                            <h3>Header Name</h3>
                            <p>Description</p>
                            <p align="center"><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x200" alt="ALT NAME">
                        <div class="caption">
                            <h3>Header Name</h3>
                            <p>Description</p>
                            <p align="center"><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x200" alt="ALT NAME">
                        <div class="caption">
                            <h3>Header Name</h3>
                            <p>Description</p>
                            <p align="center"><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x200" alt="ALT NAME">
                        <div class="caption">
                            <h3>Header Name</h3>
                            <p>Description</p>
                            <p align="center"><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x200" alt="ALT NAME">
                        <div class="caption">
                            <h3>Header Name</h3>
                            <p>Description</p>
                            <p align="center"><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                    </div>
                </div>
            </div>
</div>
    </div>
</div>
<div class="col-md-2 column productbox">
    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-responsive">
    <div class="producttitle">Product 2</div>
    <div class="productprice"><div class="pull-right"><a href="#" class="btn btn-danger btn-sm" role="button">BUY</a></div><div class="pricetext">£8.95</div></div>
</div>
<div class="col-md-2 column productbox">
    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-responsive">
    <div class="producttitle">Product 2</div>
    <div class="productprice"><div class="pull-right"><a href="#" class="btn btn-danger btn-sm" role="button">BUY</a></div><div class="pricetext">£8.95</div></div>
</div>
	</div>
