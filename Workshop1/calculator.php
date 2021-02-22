<?php

$result = '';
$resultColor = 'green';

if (isset($_POST["cal"])) {

    if ( !is_numeric($_POST["x"]) || !is_numeric($_POST["y"])) {
        $result = 'Both fields are required and must contain number';
        $resultColor = 'orange';
    }
    else{

        switch ($_POST["cal"]) {
            case 'add':
                $result = $_POST["x"] + $_POST["y"];
                break;
            case 'sub':
                $result = $_POST["x"] - $_POST["y"];
                break;
            case 'mul':
                $result = $_POST["x"] * $_POST["y"];
                break;
            case 'div':
                if ($_POST["y"] == 0){
                    $result = "Can't devide by zero !";
                    $resultColor = 'red';
                }
                else $result = $_POST["x"] / $_POST["y"];
                break;
            case 'mod':
                if ($_POST["y"] == 0){
                    $result = "Can't devide by zero !";
                    $resultColor = 'red';
                }
                else $result = $_POST["x"] % $_POST["y"];
                break;
            default:
                break;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./syles.css">
    <title>Calculator</title>
</head>

<body>
    <div class="container my-container">
        <h1 style="margin: 50px 0;text-align:center;">Calculator</h1>
        <form action="calculator.php" method="POST">

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">First Number : </label>
            <input type="text" name="x" value="" class="form-control" id="formGroupExampleInput" placeholder="Please Enter First Number">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Secound Number : </label>
            <input type="text" name="y" value="" class="form-control" id="formGroupExampleInput2" placeholder="Please Enter Secound Number">
            <div class="flex">
            <div class="con">
            <label style="margin-top: 30px; margin-right: 10px;" for="operations" class="form-label">Operations : </label>
                <button type="submit" name="cal" value="add" class="btn btn-secondary"> + </button>
                <button type="submit" name="cal" value="sub" class="btn btn-secondary"> - </button>
                <button type="submit" name="cal" value="mul" class="btn btn-secondary"> * </button>
                <button type="submit" name="cal" value="div" class="btn btn-secondary"> / </button>
                <button type="submit" name="cal" value="mod" class="btn btn-secondary"> % </button>
            </form>
            </div>
            <div class="con">
            <label style="margin-top: 30px; margin-right: 10px;" for="operations" class="form-label">Results : </label>
            <h3 style="color:<?php echo $resultColor ?>;"><?php echo $result  ?></h3>
            </div>
            </div>

        </div>
    </div>
</body>

</html>