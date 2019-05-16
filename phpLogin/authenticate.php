<?php
                 

                include_once 'connection.php';
                session_start();
                $d = new Db();
                $connect = $d->connect();

                if(mysqli_connect_errno())
                {

                    echo "Failed to connect to MySql: ". mysqli_connect_error();
                }
    
                          
         
                $sql = "SELECT * FROM accounts;";
                $result = mysqli_query($connect, $sql);
                $resultCheck = mysqli_num_rows($result);
                $error = "incorrect";
                $found = false;
                if($resultCheck >0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        
                        if ($_POST['password'] == $row['password'] && $_POST['username'] == $row['username']) 
                        {   
                            $found = true;
                            session_regenerate_id();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['name'] = $_POST['username'];
                            $_SESSION['id'] = $id;
                            $found = TRUE;
                            
                            header('Location: home.php');
                               }
                            }
                        }
                        if($found == false){
                            $_SESSION['error'] = "error";
                            header('Location: index.php');
                        }
                      
                        
                        
