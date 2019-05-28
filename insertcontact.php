<?php
                 

                 include_once 'contactphp.php';

                $d = new Db();
                $connect = $d->connect();

                if(mysqli_connect_errno())
                {

                    echo "Failed to connect to MySql: ". mysqli_connect_error();
                }
    
                $nameErr = $surnameErr = $emailErr = $messageErr ="";
                $name = $email = $message = "";

                
                    if (!empty($_POST["name"])) {
                        $name = clean_input($_POST["name"]);
                        
                        if(strlen($name)>50){
                            $nameErr=  "Messages cannot be longer than 50 characters.";
                        }
                    }
                    else
                    {
                        $nameErr = "Name is required";
                    }



                
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
                           
                           function clean_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                       
          