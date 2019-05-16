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

                if($resultCheck >0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        
                        if ($_POST['username'] == $row['username'] || $_POST['email'] == $row['email'] ) 
                        {   
                            $_SESSION['usernameTaken'] = "username or email taken";
                            header('Location: register.php');
                               }
                            }
                        }else{
                        
                            $sql2 = "INSERT INTO accounts (username, password, email) 
                            VALUES
                            ('$_POST[username]','$_POST[password]','$_POST[email]')";
 
                            if(!mysqli_query($connect, $sql2))
                            {
 
                             die('Error: ' . mysqli_error($connect));
 
                            }
                            header('Location: index.php');
                        }

                          

                           

                           mysqli_close($connect);

                           
         ?>