<?php
/* Host name of the MySQL server */
$host = 'server1.appfoundry.co.za';
/* MySQL account username */
$user = 'c32Tyrell_Peters';
/* MySQL account password */
$passwd = 'Sleepy_Sleep$';
/* The schema you want to use */
$schema = 'c32Main_Database';
/* The PDO object */
$pdo = NULL;
/* Connection string, or "data source name" */
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;
/* Connection inside a try/catch block */
try
{  
   /* PDO object creation */
   $pdo = new PDO($dsn, $user,  $passwd);
   
   /* Enable exceptions on errors */
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
   /* If there is an error an exception is thrown */
   echo 'Connection failed<br>';
   echo 'Error number: ' . $e->getCode() . '<br>';
   echo 'Error message: ' . $e->getMessage() . '<br>';
   die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $feedbackType = isset($_POST['feedbackType']) ? $_POST['feedbackType'] : '';
    $developerToContact = isset($_POST['developerToContact']) ? $_POST['developerToContact'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    try {
        $stmt = $pdo->prepare("INSERT INTO content (username, name, surname, mobile_number, feedback_type, developer_to_contact, message) VALUES (:username, :name, :surname, :mobile, :feedbackType, :developerToContact, :message)");
        $stmt->bindParam(':username', $email);
        $stmt->bindParam(':name', $firstName);
        $stmt->bindParam(':surname', $lastName);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':feedbackType', $feedbackType);
        $stmt->bindParam(':developerToContact', $developerToContact);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            echo 'Data inserted successfully!';
        } else {
            echo 'Error inserting data.';
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
