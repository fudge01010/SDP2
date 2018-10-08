<?php
include('conn.php');
include_once('functions.php');
ini_set('display_errors', true);

// class to print the table stuff
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td>" . parent::current() . "</td>";
        // " style='width:150px;border:1px solid black;'>" .    
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
}

if (!isset($_GET['qid'])) {
    echo "please supply a query ID.";
} elseif (!(($_GET['qid']>= 1 && $_GET['qid'] <= 19) || $_GET['qid'] == 99) ) {
    echo "please supply a valid query ID.";
} else {
    
    //we have a valid query ID. operate on it:

    switch ($_GET['qid']) {
        case 1:
            try {
                $sql = "SELECT * FROM products";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;
        case 11:
            try {
                $sql = "SELECT * FROM products";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
                // echo $json;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;
        
        case 2:
            if (!(isset($_GET['id']))) {
                echo "you need to supply a product ID to query.";
                break;
            }
            try {
                $sql = "SELECT * FROM products WHERE prod_id =" . $_GET['id'];
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                //set resulting array to associative
                // echo '<link rel="stylesheet" href="styles/style.css">';
                // echo "<table class=\"resultstable\">";
                // echo "<tr><th>prod_id</th><th>name</th><th>description</th><th>cost</th></tr>";
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            // echo "</table>";
            break;

        case 12:
            if (!(isset($_GET['id']))) {
                echo "you need to supply a product ID to query.";
                break;
            }
            try {
                $sql = "SELECT * FROM products WHERE prod_id =" . $_GET['id'];
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            // echo "</table>";
            break;

        case 3:
            try {
                $sql = "SELECT * FROM customers";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                //set resulting array to associative
                // echo '<link rel="stylesheet" href="styles/style.css">';
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            // echo "</table>";
            break;

        case 13:
            try {
                $sql = "SELECT * FROM customers";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                //set resulting array to associative
                // echo '<link rel="stylesheet" href="styles/style.css">';
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            // echo "</table>";
            break;

        case 14:
            if (!(isset($_GET['id']))) {
                echo "you need to supply a customer ID to query.";
                break;
            }
            try {
                $sql = "SELECT * FROM customers WHERE cust_id =" . $_GET['id'];
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            // echo "</table>";
            break;

        case 99:
            $ar = array('apple', 'orange', 'banana', 'strawberry');
            echo json_encode($ar); // ["apple","orange","banana","strawberry"]
            break;
    }
}



?>