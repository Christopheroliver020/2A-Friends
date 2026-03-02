<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
        session_start();
        require_once 'student.php';
    ?>

    <div class="form-container">
        <h2>Student Information</h2>
        <form action="#" method="POST">
            <label for="id">ID</label>
            <input type="number" name="id" required>

            <label for="name">Name</label>
            <input type="text" name="name" required>

            <label for="course">Course</label>
            <input type="text" name="course" required>

            <label for="age">Age</label>
            <input type="number" name="age" required>

            <button type="submit" name="submit">Enter</button>
        </form>

        <?php

            if(isset($_POST['submit'])){
                $student = new Student
                (
                    $_POST['id'],
                    $_POST['name'],
                    $_POST['course'],
                    $_POST['age']
                );

            $_SESSION['student'][] = [
                'id' => $student->getId(),
                'name' => $student->getName(),
                'course' => $student->getCourse(),
                'age' => $student->getAge(),
            ];

            header("Location: ".$_SERVER['PHP_SELF']);
            exit();

            } 
        ?>
    </div>


    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Age</th>
            </thead>

            <tbody>
                <?php
                    if(empty($_SESSION['student'])){
                        echo "<tr><td colspan='4' class='no-data'>No Data Available!</td></tr>";
                    }else{
                        foreach($_SESSION['student'] as $data){
                            echo "<tr>
                                <td>{$data['id']}</td>
                                <td>{$data['name']}</td>
                                <td>{$data['course']}</td>
                                <td>{$data['age']}</td>
                            </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>