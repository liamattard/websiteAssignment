<?php
                 

                 include_once 'contactphp.php';

                $d = new Db();
                $connect = $d->connect();

                if(mysqli_connect_errno())
                {

                    echo "Failed to connect to MySql: ". mysqli_connect_error();
                }
    
                          //$enteredDate = date("Y-m-d H:i:s",strtotime("2019-05-22 20:22:00"));

                          $date = date("Y-m-d",strtotime($_POST['date']));
                          $time = $_POST['time'];
                          $enteredDate = $date." ".$time;
                          
                          $value1 = "INSERT INTO reservations (name, surname, telephone, email, dateandtime, message) 
                          VALUES ('$_POST[name]','$_POST[surname]','$_POST[telephone]','$_POST[email]', '";                      
                          $value2 = "','$_POST[message]' )";
                          
                          
                          $sql2 = $value1.$enteredDate.$value2;
                          echo $sql2;
                           if(!mysqli_query($connect, $sql2))
                           {

                            die('Error: ' . mysqli_error($connect));

                           }
                           

                           

                           mysqli_close($connect);

                           header('Location: reserve.php');     
         ?>