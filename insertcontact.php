<?php
                 

                 include_once 'contactphp.php';

                $d = new Db();
                $connect = $d->connect();

                if(mysqli_connect_errno())
                {

                    echo "Failed to connect to MySql: ". mysqli_connect_error();
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
         ?>