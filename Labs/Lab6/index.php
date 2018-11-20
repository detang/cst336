<?php
    
    include 'inc/dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    
    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catID, catName from om_category ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option value='".$record["catID"]."' >" . $record["catName"] . "</option>";
        }
    }
    
    function displaySearchResults(){
        global $conn;
        
        //checks whether user has submitted the form
        if(isset($_GET['searchForm'])){
            echo "<h3>Products Found: </h3>";
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM om_product WHERE 1";
            
            if(!empty($_GET['product'])){
                $sql .= " AND (productName LIKE :productName ";
                $sql .= " OR productDescription LIKE :productDescription )";
                $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
                $namedParameters[":productDescription"] = "%" . $_GET['product'] . "%";
            }
            
            if(!empty($_GET['category'])){
                $sql .= " AND catID = :categoryID";
                $namedParameters[":categoryID"] = $_GET['category'];
            }
            
            if(!empty($_GET['priceFrom'])){
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] = $_GET['priceFrom'];
            }
            
            if(!empty($_GET['priceTo'])){
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy'] == "price"){
                    $sql .= " ORDER BY price";
                }
                else{
                    $sql .= " ORDER BY productName";
                }
            }
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            foreach($records as $record){
                echo '<div class="card">';
                echo "<a href=\"purchaseHistory.php?productId=".$record['productId']. "\" > History </a>";
                echo $record["productName"] . " " . $record["productDescription"] . 
                     " $" . $record["price"] . "<br /> <br />";
                echo "</div>";   
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CST336: OtterMart Product Search</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
    </head>
    <body>
        <h1> OtterMart Product Search </h1>
        <div id="adminLogin">
            <a href="admin.php" class="btn">Admin Login</a>
        </div>
        <div id="search">
            
            
            <form id="searchForm">
                Product: <input type="text" name="product" />
                <br>
                Category:
                    <select name="category">
                        <option value="">Select One</option>
                        <?=displayCategories() ?>
                    </select>
                <br />
                Price: From <input type="text" name="priceFrom" size="7" />
                       To   <input type="text" name="priceTo" size="7" />
                <br />
                Order result by:
                <br />
                
                <input type="radio" name="orderBy" value="price" /> Price <br>
                <input type="radio" name="orderBy" value="name" /> Name
                
                <br /><br />
                <input type="submit" value="Search" name="searchForm" />
            </form>
            
            <br />
            
            
        </div>
        
        <hr>
        <?=displaySearchResults() ?>
        
        
        <div id="footer">
            <hr>
            <br /><br />
            <p>
                CST 336 Internet Programming 2018 &copy; Tang <br />
                This website is for academic purposes only.
                <br /><br />
                <img src="img/logo.png" alt="CSUMB logo">
            </p>
        </div>
    </body>
</html>