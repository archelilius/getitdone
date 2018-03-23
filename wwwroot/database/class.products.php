<?php
defined('__ROOT__') or define('__ROOT__', dirname(dirname(__FILE__))); 
class PRODUCTS
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    public function getCategories()
    {
       try
       {
            $stmt = $this->db->prepare("SELECT ProductCategoryID, Name FROM SalesLT.ProductCategory");
            $stmt->execute();
              
            $productRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $productCount = count($productRows);  
            if($productCount > 0)
            {  
                $columcount = $productCount / 3;
                $counter=1;
                echo'<div class="col-sm-4">
                <ul class="multi-column-dropdown">';
                foreach( $productRows as $row )  
                {
                    if(($counter % 3) == 0)
                    {
                        echo'</ul></div>
                        <div class="col-sm-4">
                        <ul class="multi-column-dropdown">';
                    }
                    $this->PopulateCategoriesList( $row );  
                    $counter++;
                }
                echo'</ul></div>';
            }
            return true; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
           return false;
       }    
    }
    function PopulateCategoriesList($row )
    {
        echo'<li><a href="/ProductList.php?Category='.$row["ProductCategoryID"].'">'.$row["Name"].'</a></li>';
    }

    public function getThumbItems($category)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT TOP 10 ProductID, Name, ListPrice, ThumbNailPhoto 
            FROM SalesLT.Product p 
            WHERE p.ProductCategoryID=:category");

            $stmt->execute(array(':category'=>$category));
            $productRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $productCount = count($productRows);  
            if($productCount > 0)
            {  
                foreach( $productRows as $row )  
                {
                    echo'<div class = "col-xs-4">
                            <img src = "data:image/gif;base64,' . base64_encode( $row["ThumbNailPhoto"] ).'" alt = "Generic placeholder thumbnail"/>
                            <div class = "caption">
                                <h3>'.$row["Name"].'</h3>
                                <p>'.round($row["ListPrice"],2).'</p>           
                                <p>  <a href = "#'.$row["ProductID"].'" class = "btn btn-primary" role = "button">Details</a> </p>
                            </div>
                        </div>';                }
                }
                return true; 
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                return false;
            }    
        }

    public function getCarouselItems()
    {
        try
        {
            $stmt = $this->db->prepare("SELECT TOP 3 ProductID, Name, ListPrice, ThumbNailPhoto 
            FROM SalesLT.Product p 
            ORDER BY NEWID()");
            /* ** Only show products with unique thumbnails
            $stmt = $this->db->prepare("SELECT TOP 10 ProductID, Name, ListPrice, ThumbNailPhoto 
            FROM SalesLT.Product p 
            WHERE p.ProductCategoryID=:category AND p.ThumbNailPhoto <> (
                SELECT TOP 1 ThumbNailPhoto 
                FROM SalesLT.Product
            ); ");
            */
            $stmt->execute();
            $productRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $productCount = count($productRows);  
            if($productCount > 0)
            {  
                $counter = 0;
                foreach( $productRows as $row )  
                {
                    if ($counter==0)
                        $this->populateCarousel( $row, true );  
                    else
                        $this->populateCarousel( $row, false );  
                    $counter++;
                }
            }
            return true; 
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }    
    }
    function populateCarousel($row, $first)
    {
        echo'<div class="item';
        if($first)echo' active';
        echo'">
                <img class="img" src="data:image/gif;base64,' . base64_encode( $row["ThumbNailPhoto"] ).'" alt="Featured1"/>
                <div class="carousel-caption"> 
                    <h3>'.$row["Name"].'</h3>
                    <p>'.round($row["ListPrice"],2).'</p>
                </div>
            </div>';
    }

    function getCategoryName($val)
    {
        $stmt = $this->db->prepare("SELECT Name FROM SalesLT.ProductCategory WHERE ProductCategoryID = :val"); 
        $stmt->execute(array(':val'=>$val));//array(':tableName'=>$tableName,':prop'=>$prop,':val'=>$val,':columnName'=>$columnName));
        $f = $stmt->fetch();
        $result = $f['Name'];
        return $result;
    }

    public function getProductItems($category)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT TOP 10
            p.Name as prodName, ProductNumber, Color, CAST (ListPrice AS decimal(12,2)) AS dListPrice, Size, Weight, ThumbNailPhoto, 
            pm.Name as modelName, Description 
            FROM SalesLT.Product p 
            LEFT JOIN SalesLT.ProductModel pm on (p.ProductModelID = pm.ProductModelID) 
            LEFT JOIN SalesLT.ProductModelProductDescription  pmpd on (pm.ProductModelID  = pmpd.ProductModelID ) 
            LEFT JOIN SalesLT.ProductDescription pd on (pmpd.ProductDescriptionID = pd.ProductDescriptionID )
            WHERE pmpd.Culture='EN' AND p.ProductCategoryID=:category");

            $stmt->execute(array(':category'=>$category));
            $productRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $productCount = count($productRows);  
            if($productCount > 0)
            {  
                $this->beginProductItem();
                foreach( $productRows as $row )  
                {
                    $this->bodyProductItem($row);
                }
                $this->endProductItem();
            }
            else
            { echo"<H3>No products found</H3>";}
            return true; 
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }    
    }
    function bodyProductItem($row)
    {
        echo'
        <div class="col-md-4">
            <div class="list-car-img">
                <img class="img-responsive" src="data:image/gif;base64,' . base64_encode( $row["ThumbNailPhoto"] ).'">
            </div>
        </div>
        <div class="col-md-8">
            <div class="list-car-title clearfix">
                <h3>'.$row["prodName"].'</h3>
                <small>'.$row["Description"].'</small>
                <hr>
            </div>
            <div class="car-details clearfix">
                <ul class="list-inline" >
                <li><i class="fa fa-gears"></i>Model<small>'.$row["modelName"].'</small></li>
                <li><i class="fa fa-road"></i>Size<small>'.$row["Size"].'</small></li>
                    <li><i class="fa fa-car"></i>Weight<small>'.$row["Weight"].'</small></li>
                    <li><i class="fa fa-clock-o"></i>Colour<small>'.$row["Color"].'</small></li>
                    <li><i class="fa fa-clock-o"></i>Price<small>'.$row["dListPrice"].'</small></li>
                </ul>    
            </div>
       
            <div class="car-bottom">
                <ul class="list-inline">
                    <li><a href="#">Add to Basket</a></li>
                    <li><a href="#">Buy Now</a></li>
                </ul>
            </div>
        </div>';
    }
    function beginProductItem()
    {
        echo'
        <div class="container bg-gray ">
	        <div class="row">
                <div class="col-md-9 shadow1">
       ';
    }
    function endProductItem()
    {
        echo'
                </div>    
            </div>
        </div>
        ';
    }
    public function testImg($prodID)
    {
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
            $stmt->bindValue('prodId', $prodID, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->bindColumn(1, $blob, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
            $stmt->fetch(PDO::FETCH_BOUND);
        
            echo 'new: <img src="data:image/gif;base64,' . base64_encode( $blob ).'" /><br>';
            echo "<br>Done!<br>";
        
        $conn = null;
        $stmt = null;
    }
}
?>