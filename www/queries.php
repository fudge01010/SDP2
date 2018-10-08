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

        case 15:
            try {
                //get the variables from get string, and decode.
                $name = urldecode($_GET['name']);
                $description = urldecode($_GET['description']);
                $cost = urldecode($_GET['cost']);

                //is the ID set? if so updating a product.
                if (isset($_GET['id'])) {
                    //we do have an id.
                    $id = $_GET['id'];
                    $sql = "INSERT INTO products (id, name, description, cost) VALUES($id, \"$name\", \"$description\", $cost) ON DUPLICATE KEY UPDATE name=\"$name\", description=\"$description\", cost=$cost";
                } else {
                    //we don't have an ID, new product.
                    $sql = "INSERT INTO products (name, description, cost) VALUES (\"$name\", \"$description\", \"$cost\")";
                }

                //we have an SQL statement, execute it:
                $stmt = $conn->prepare($sql);
                $stmt->execute();

            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 99:
            $ar = array('apple', 'orange', 'banana', 'strawberry');
            echo json_encode($ar); // ["apple","orange","banana","strawberry"]
            break;
    }
}



?>