<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <!-- https://github.com/farhodxakimov24 -->
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #calculator {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 18px;
        }

        button {
            width: 48px;
            height: 48px;
            font-size: 18px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div id="calculator">
    <form method="post" action="">
        <input type="text" name="display" value="<?php echo isset($_POST['display']) ? $_POST['display'] : ''; ?>" readonly>
        <br>

        <button type="submit" name="number" value="1">1</button>
        <button type="submit" name="number" value="2">2</button>
        <button type="submit" name="number" value="3">3</button>
        <button type="submit" name="operator" value="+">+</button>
        <br>

        <button type="submit" name="number" value="4">4</button>
        <button type="submit" name="number" value="5">5</button>
        <button type="submit" name="number" value="6">6</button>
        <button type="submit" name="operator" value="-">-</button>
        <br>

        <button type="submit" name="number" value="7">7</button>
        <button type="submit" name="number" value="8">8</button>
        <button type="submit" name="number" value="9">9</button>
        <button type="submit" name="operator" value="*">*</button>
        <br>

        <button type="submit" name="number" value="0">0</button>
        <button type="submit" name="clear" value="C">C</button>
        <button type="submit" name="calculate" value="=">=</button>
        <button type="submit" name="operator" value="/">/</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $display = isset($_POST['display']) ? $_POST['display'] : '';
    $value = isset($_POST['number']) ? $_POST['number'] : '';
    $operator = isset($_POST['operator']) ? $_POST['operator'] : '';
    $calculate = isset($_POST['calculate']);

    if ($calculate) {
        // Evaluate the expression
        try {
            $result = eval("return $display;");
            echo "<script>document.forms[0].display.value = $result;</script>";
        } catch (Exception $e) {
            echo "<script>alert('Invalid calculation');</script>";
        }
    } elseif ($value !== '') {
        // Append the selected number to the display
        echo "<script>document.forms[0].display.value += '$value';</script>";
    } elseif ($operator !== '') {
        // Append the selected operator to the display
        echo "<script>document.forms[0].display.value += ' $operator ';</script>";
    } elseif ($_POST['clear'] === 'C') {
        // Clear the display
        echo "<script>document.forms[0].display.value = '';</script>";
    }
}
?>

</body>
</html>
