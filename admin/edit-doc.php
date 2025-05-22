
    <?php
    
    
    include("../connection.php");



    if($_POST){
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $nic=$_POST['nic'];
        $oldemail=$_POST["oldemail"];
        $spec=$_POST['spec'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $result= $database->query("select ambulance.ambid from ambulance inner join webuser on ambulance.ambemail=webuser.email where webuser.email='$email';");
            
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["ambid"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $error='1';
                
                    
            }else{

               
                $sql1="update ambulance set ambemail='$email',ambname='$name',ambpassword='$password',ambnic='$nic',ambtel='$tele',specialties=$spec where ambid=$id ;";
                $database->query($sql1);
                
                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $database->query($sql1);

                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        $error='3';
    }
    

    header("location: ambulances.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>