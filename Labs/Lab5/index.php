<?php
include 'dbConnection.php';
$conn = getDatabaseConnection();
function displayCategories(){
    global $conn;
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record){
        echo "<option value='" . $record["catId"] . "' >" . $record["catName"] . "</option>";
    }
}
    
//Display results of search if submitted 
function displaySearchResults(){
    global $conn;
    if(isset($_GET['searchForm'])){
        echo "<h3>Products Found: </h3>";
        //Query below prevents SQL injections
        $namedParameters = array();
        
        $sql = "SELECT * FROM om_product WHERE 1";
        
        if(!empty($_GET["product"])){
            $sql .= " AND (productName LIKE :productName";
            $sql .= " OR productDescription LIKE :productName)";
            $namedParameters[":productName"] = "%" . $_GET["product"] . "%";
        }
        
        if(!empty($_GET["category"])){
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET["category"];
        }
        
        if(!empty($_GET["priceFrom"])){
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET["priceFrom"];
        }
        
        if(!empty($_GET["priceTo"])){
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET["priceTo"];
        }
        
        if(isset($_GET["orderBy"])){
            if($_GET["orderBy"] == "price"){
                $sql .= " ORDER BY price";
            } else {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<div class='productInfo'>";
            echo "<b>" . $record["productName"] . "</b><br />" . $record["productDescription"] . "<br /><b>$" . $record["price"] . "</b><br />";
            echo "<a href=\"purchaseHistory.php?productId=" . $record["productId"] . "\"> History</a> <br /><br />";
            echo "</div>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>OtterMart Product Search</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    
    <body>
        
        <header>
            <h1> OtterMart Product Search</h1>
        </header>
        <hr />
        <main> 
            <form>
                <span class='label'>Product:</span> <input type="text" name="product" />
                <br />
                <span class='label'>Category:</span>
                    <select name="category">
                        <option value="">Select One</option>
                        <?=displayCategories()?>
                    </select>
                <br />
                <span class='label'>Price: From</span> <input type="text" name="priceFrom" size="7" />
                       <span class='label'>To </span>   <input type="text" name="priceTo" size="7" />
                <br />
                <span class='label'>Order results by:</span>
                <br />
                
                <input type="radio" name="orderBy" value="price" /> <span class='label'>Price</span>
                <input type="radio" name="orderBy" value="name" /> <span class='label'>Name</span>
                
                <br /><br />
                <input type="submit" value="Search" name="searchForm" />
                
            </form>
            
            <br />
            <hr />
        
            <?=displaySearchResults()?>
        </main>    
</html>