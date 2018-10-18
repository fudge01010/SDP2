<?php
include('conn.php');
include_once('functions.php');
ini_set('display_errors', true);

// class to print the table stuff <DEPRECATED>
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

if (!isset($_GET['qid']) && !isset($_POST['qid'])) {
    echo "please supply a query ID (qid) via POST or GET.";
} else {
    //we have a query ID. operate on it:

    if (isset($_POST['qid'])) {
        // it's a POST req
        $porg = true;
        $qid = $_POST['qid'];
    } else {
        //it's a GET req
        $porg = false;
        $qid = $_GET['qid'];
    }

    switch ($qid) {
        //in numeric order

        //case 5:

        case 6:
            if (!(isset($_GET['id'])) && !isset($_POST['id'])) {
                echo "you need to supply a invoice ID to query.";
                break;
            }
            if ($porg) {
                //its post.
                $id = $_POST['id'];
            } else {
                //its get
                $id = $_GET['id'];
            }
            try {
                $sql = "SELECT * , (SELECT COUNT(*) FROM inv_lines WHERE inv_lines.inv_id = invoices.inv_id) AS number_of_lines FROM invoices WHERE inv_id = " . $id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 7:
            //print all invoices
            try {
                $sql = "SELECT * , (SELECT COUNT(*) FROM inv_lines WHERE inv_lines.inv_id = invoices.inv_id) AS number_of_lines FROM invoices";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 11:
            // uncomment below if you need ID checking.
            // if (!(isset($_GET['id'])) && !isset($_POST['id'])) {
            //     echo "you need to supply a product ID to query.";
            //     break;
            // }
            try {
                $sql = "SELECT * FROM products";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 12:
            if (!(isset($_GET['id'])) && !isset($_POST['id'])) {
                echo "you need to supply a product ID to query via post or get.";
                break;
            }
            if ($porg) {
                //its post.
                $id = $_POST['id'];
            } else {
                //its get
                $id = $_GET['id'];
            }
            try {
                $sql = "SELECT * FROM products WHERE prod_id =" . $id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 13:
            try {
                $sql = "SELECT * FROM customers";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 14:
            if (!(isset($_GET['id'])) && !isset($_POST['id'])) {
                echo "you need to supply a product ID to query.";
                break;
            }
            if ($porg) {
                //its post.
                $id = $_POST['id'];
            } else {
                //its get
                $id = $_GET['id'];
            }
            try {
                $sql = "SELECT * FROM customers WHERE cust_id =" . $id;
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 15:
            // uncomment below if you need ID checking.
            // if (!(isset($_GET['id'])) && !isset($_POST['id'])) {
            //     echo "you need to supply a product ID to query.";
            //     break;
            // }

            //use these to get your args from either post or get (not both - post overrules.)
            if ($porg) {
                //its post.
                $id = $_POST['id'];
                $name = urldecode($_POST['name']);
                $description = urldecode($_POST['description']);
                $cost = urldecode($_POST['cost']);
            } else {
                //its get
                $id = $_GET['id'];
                $name = urldecode($_GET['name']);
                $description = urldecode($_GET['description']);
                $cost = urldecode($_GET['cost']);
            }
            try {
                //is the ID set? if so updating a product.
                if (isset($_GET['id']) || isset($_POST['id'])) {
                    //we do have an id.
                    $sql = "INSERT INTO products (prod_id, name, description, cost) VALUES('$id', '$name', '$description', '$cost') ON DUPLICATE KEY UPDATE name='$name', description='$description', cost='$cost'";
                } else {
                    //we don't have an ID, new product.
                    $sql = "INSERT INTO products (name, description, cost) VALUES ('$name', '$description', '$cost')";
                }

                //we have an SQL statement, execute it:
                $stmt = $conn->prepare($sql);
                $stmt->execute();

            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 18:
            // uncomment below if you need ID checking.
            // if (!(isset($_GET['id'])) && !isset($_POST['id'])) {
            //     echo "you need to supply a product ID to query.";
            //     break;
            // }

            //use these to get your args from either post or get (not both - post overrules.)
            if ($porg) {
                //its post.
                $id = $_POST['id'];
                $fullname = urldecode($_POST['fullname']);
                $contactno = urldecode($_POST['contactno']);
                $postcode = urldecode($_POST['postcode']);
            } else {
                //its get
                $id = $_GET['id'];
                $fullname = urldecode($_GET['fullname']);
                $contactno = urldecode($_GET['contactno']);
                $postcode = urldecode($_GET['postcode']);
            }
            try {
                //is the ID set? if so updating a product.
                if (isset($_GET['id']) || isset($_POST['id'])) {
                    //we do have an id.
                    $sql = "INSERT INTO customers (cust_id, fullname, contactno, postcode) VALUES('$id', '$fullname', '$contactno', '$postcode') ON DUPLICATE KEY UPDATE fullname='$fullname', contactno='$contactno', postcode='$postcode'";
                } else {
                    //we don't have an ID, new product.
                    $sql = "INSERT INTO customers (fullname, contactno, postcode) VALUES ('$fullname', '$contactno', '$postcode')";
                }

                //we have an SQL statement, execute it:
                $stmt = $conn->prepare($sql);
                $stmt->execute();

            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;

        case 51:
        try {
                $sql = "SELECT i.inv_id, i.total, c.fullname, c.contactno, c.postcode, l.line_id, l.prod_id, p.name, p.description, p.cost, l.qty FROM invoices AS i INNER JOIN customers AS c ON i.cust_id = c.cust_id INNER JOIN inv_lines AS l ON i.inv_id = l.inv_id INNER JOIN products AS p on l.prod_id = p.prod_id WHERE i.date = '2018-10-14'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        break;

        case 52:
        try {
                $sql = "SELECT* FROM invoices AS i INNER JOIN customers AS c ON i.cust_id = c.cust_id INNER JOIN inv_lines AS l ON i.inv_id = l.inv_id INNER JOIN products AS p on l.prod_id = p.prod_id WHERE i.date BETWEEN '2018-10-08' AND '2018-10-14'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        break;

        case 53:
        try {
                $sql = "SELECT* FROM invoices AS i INNER JOIN customers AS c ON i.cust_id = c.cust_id INNER JOIN inv_lines AS l ON i.inv_id = l.inv_id INNER JOIN products AS p on l.prod_id = p.prod_id WHERE i.date BETWEEN '2018-10-01' AND '2018-10-14'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        break;

        case 54:
        try {
                $sql = "SELECT l.prod_id AS 'productID', COUNT(*) as count FROM inv_lines as l INNER JOIN products as p ON l.prod_id = p.prod_id GROUP BY l.prod_id HAVING COUNT > 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(utf8ize($result));
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        break;

        case 99:
            $ar = array('apple', 'orange', 'banana', 'strawberry');
            echo json_encode($ar); // ["apple","orange","banana","strawberry"]
            break;

        default:
            echo "please supply a valid query ID.";
            break;
    }
}



?>