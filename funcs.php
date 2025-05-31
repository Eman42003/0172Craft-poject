<?php
include('conf.php');


function redirect($errorMsg, $seconds = 3, $back, $page) {
    echo "
        <script>
            alert('{$errorMsg}\\nYou will be redirected to the {$back} after {$seconds} seconds.');
        </script>
    ";
    header("refresh:$seconds;url=$page");
    exit();
}


function redirectsuc($successMsg, $seconds = 3, $back, $page) {
    echo "
        <script>
            alert('{$successMsg}\\nYou will be redirected to the {$back} after {$seconds} seconds.');
        </script>
    ";
    header("refresh:$seconds;url=$page");
    exit();
}


function checkItem($select, $from, $value) {
    global $con;
    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
    $statement->bind_param("i", $value);//i -> Means That Integer
    $statement->execute();
    $result = $statement->get_result();
    $count = $result->num_rows;
    return $count;
}
?>