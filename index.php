<!DOCTYPE html>
<html lang="en">
    <head>
        <link ref="stylesheet" href="css/styles.css">
    </head>

<body>
    <h1>Calculator app.</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <input type="number" name="num_1" placeholder="Input number 1" required>    
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num_2" placeholder="Input number 2" required>    
        <button>Enter</button>

    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        // INPUT DATA
        $num_1 = filter_input(INPUT_POST, "Input number 1", FILTER_SANITIZE_NUMBER_FLOAT);
        $num_2 = filter_input(INPUT_POST, "Input number 2", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        // ERROR HANDLING
        $errors = false;

        if(empty($num_1) || empty($num_2) || empty($operator)) {
            echo "<h4>Please fill in the provided fields.</h4>";
            $errors = true;
        }

        if(!is_numeric($num_1) || !is_numeric($num_2)) {
            echo "<h4>Only numbers are allowed.</h4>";
            $errors = true;
        }

        // CONTINUE IF NO ERRORS
        if (!$errors) {
        $value = 0;
           switch ($operator){
                case "add":
                    $value = $num_1 + $num_2;
                    break;
                case "subtract":
                    $value = $num_1 - $num_2;
                    break;
                case "multiply":
                    $value = $num_1 * $num_2;
                    break;
                case "divide":
                    $value = $num_1 / $num_2;
                    break;
                default:
                echo '<h1>Calculator app just shat itself. Please standby.</h1>';
           } 
           echo("<p>Result =" .$value."</p>");
        }
    }
    ?>

    </body>
</html>
