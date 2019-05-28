
<?php
                 

                 include_once 'contactphp.php';

                $d = new Db();
                $connect = $d->connect();

                if(mysqli_connect_errno())
                {

                    echo "Failed to connect to MySql: ". mysqli_connect_error();
                }
    
                $_SESSION["wrongdetails"] = false;
                $nameErr = $surnameErr = $emailErr = $messageErr ="";
                $name =$surname= $email = $message = "";


                
                    if (!empty($_POST["name"])) {

                        if(strlen($name)>50){

                            $_SESSION["wrongdetails"] = true;
                            header('Location: contacttrail.php');
                            
                        }
                    }
                    else
                    {
                        $_SESSION["wrongdetails"] = true;
                        header('Location: contacttrail.php');
                        
                    }

                    if (!empty($_POST["surname"])) {

                        if(strlen($surname)>50){

                            $_SESSION["wrongdetails"] = true;
                            header('Location: contacttrail.php');
                            
                        }
                    }
                    else
                    {
                        $_SESSION["wrongdetails"] = true;
                        header('Location: contacttrail.php');
                       
                    }

                    if (!empty($_POST["email"])) {
                        
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            $emailErr= 'You did not enter a valid email.';
                            $_SESSION["wrongdetails"] = true;
                            header('Location: contacttrail.php');
                            
                        }
                    }
                    else
                    {
                        $emailErr = "Email is required";
                        $_SESSION["wrongdetails"] = true;
                        header('Location: contacttrail.php');
                        
                    }
        
                    if (!empty($_POST["message"])) {
                        $message = clean_input($_POST["message"]);
                        if(strlen($message)>50){
                            $messageErr=  "Messages cannot be longer than 50 characters.";
                            $_SESSION["wrongdetails"] = true;
                            header('Location: contacttrail.php');
                            
                        }
                    }
                    else
                    {
                        $messageErr = "Message is required";
                        $_SESSION["wrongdetails"] = true;
                        header('Location: contacttrail.php');
                        


                    }
                       
               


                    if($_SESSION["wrongdetails"] == false)
                    {
                        
                        $sql2 = "INSERT INTO contact (name, surname, email, subject, message) 
                        VALUES
                        ('$_POST[name]','$_POST[surname]','$_POST[email]','$_POST[subject]', '$_POST[message]' )";

                        if(!mysqli_query($connect, $sql2))
                        {

                         die('Error: ' . mysqli_error($connect));

                        }
                         echo"1 row added";

                         mysqli_close($connect);

                         header('Location: contacttrail.php');    
                           

                    }

                
                           

                          
                           function clean_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                       
          