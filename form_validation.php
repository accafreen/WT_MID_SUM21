 <html>
<head>
    <title>Club Member Registration Form</title>
</head>
<body>
    <?php
        $name=$errorShow_name=$uname=$errorShow_uname=$password=$errorShow_password=$confirmpassword=$errorShow_confirmpassword=$aboutus=$errorShow_aboutus=$bio=$errorShow_bio=$gender=$errorShow_gender=$bday=$byear=$bmonth=$errorShow_bday=$errorShow_byear=$errorShow_bmonth=$email=$errorShow_email=$phone=$errorShow_phone=$street=$city=$state=$zip=$errorShow_street=$errorShow_city=$errorShow_zip=$errorShow_state=""; 
        $passcheck=false; 
      


        function PasswordCheck($pass){
            $UpperCase=$LowerCase=$Hashtag=$QuestionMark=$Num=false;
            $passwordLength= strlen($pass);
            for($i=0;$i<$passwordLength;$i++){
                if(ctype_upper($pass[$i])){
                    $UpperCase=true;
                    
                }
                if(ctype_lower($pass[$i])){
                    $LowerCase=true;
                    
                }
                if($pass[$i]== '#'){
                    $Hashtag=true;
                
                }
                
                if($pass[$i]== '?'){
                    $QuestionMark=true;
                
                }
                if($pass[$i] >= '0' && $pass[$i] <= '9'){
                    $Num=true;
                
                }
                if($LowerCase && $UpperCase && $Hashtag || $QuestionMark && $Num){
                    return true;
                }
            
            }
            return false;
            
            
            
        }

      

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            if(empty($_POST["uname"])){
                $errorShow_uname="*Username Required";
                
            }
            else if(strlen($_POST["uname"]) <6){
                $errorShow_uname="*Username Must be at least 6 characters";
                ;
            }
            else{
                $uname=htmlspecialchars($_POST["uname"]);
            }
            
            
            if(empty($_POST["name"])){
                $errorShow_name="*Name required";
            }
            else{
                $name=$_POST["name"];
            }
            
            if(empty($_POST["pass"])){
                $errorShow_password = "*Password Required";
                
            }
            
            else if(strlen($_POST["pass"])<8){
                $errorShow_password="*Password must be at least 8 characters";
            }

            else if (!PasswordCheck($_POST["pass"])){
                $errorShow_password="*Password must contain UpperCase, LowerCase, special character (# or ?) and number";
            }

            else{
                $password=$_POST["pass"];
            }


            if(empty($_POST["cpass"])){
                $errorShow_confirmpassword="*Please re-type your password";
            }

            else if($_POST["cpass"]!=$_POST["pass"]){
                $errorShow_confirmpassword="*Please match confirm password";
            }
            
            else{
                $confirmpassword=$_POST["cpass"];
            }

            
            
          

            if(empty($_POST["email"])){
               $errorShow_email="*Please enter email";
            }

            else{
                $s=strpos($_POST["email"],"@");
                if($s!=false){
                    $t=strpos($_POST["email"],".", $s+1);
                    if($t!=false){
                        $email=$_POST["email"];
                    }
                    else{
                        $errorShow_email="*Invalid email";
                    }
                }
                else{
                    $errorShow_email="*Invalid email";
                }
            }

            if(empty($_POST["phonenumber"])){
                $errorShow_phone="*Enter phone number";
            }

            else if(is_numeric($_POST["phonenumber"])==false){
                $errorShow_phone="*Please enter digit";
            }
            else{
                $phone=$_POST["phonenumber"];
            }


            if(empty($_POST["street"])){
                $errorShow_street="*Street Address Required";
            }
            else{
                $street=$_POST["street"];
            }

            if(empty($_POST["city"])){
                $errorShow_city="*City Required ";
            }
            else{
                $city=$_POST["city"];
            }


            if(empty($_POST["state"])){
                $errorShow_state="*State Required";
            }
            else{
                $state=$_POST["state"];
            }


            if(empty($_POST["zip"])){
                $errorShow_zip="*Zip code of your area Required";
            }
            else if(is_numeric($_POST["zip"])==false){
                $errorShow_zip="*Zip number must be digit";
            }
            else{
                $zip=$_POST["zip"];
            }



            if(($_POST["day"])=="Day"){
				$errorShow_bday="*Select Day";
			}
            else{
                $bday=$_POST["day"];
            }

            if(($_POST["month"])=="Month"){
				$errorShow_bmonth="*Select Month";
			}
            else{
                $bmonth=$_POST["month"];
            }

            if(($_POST["year"])=="Year"){
				$errorShow_byear="*Select Year";
			}
            else{
                $byear=$_POST["year"];
            }

           

            if(empty($_POST["gender"])){
				$errorShow_gender="****Select gender";
			}
            else{
                $gender=$_POST["gender"];
            }

            if(empty($_POST["aboutus"])){
                $errorShow_aboutus="*Select  1 or many options";
            }
            else{
                $aboutus=$_POST["aboutus"];
            }

            if(empty($_POST["bio"])){
                $errorShow_bio="*Bio text area must be filled";
            }
            else{
                $bio=$_POST["bio"];
            }
           
        }
    ?>
    
    <fieldset align="middle">
        <legend align="center"><h1>Club Member Registration Form</h1></legend>
        <form action="" method="post">
            <table border="1">
            
                <tr>
                    <td align="right"><span>Name</span></td>
                    <td>: <input type="text" placeholder="Name" value=" <?php echo $name; ?> " name="name"> 
                    <span style="color:red"><?php echo $errorShow_name; ?></span></td>
                </tr>
                <tr>
                    <td align="right"><span>Username</span></td>
                    <td>: <input type="text" placeholder="Username" value=" <?php echo $uname; ?>" name="uname"> 
                    <span style="color:red"><?php echo $errorShow_uname; ?></span></td></td>
                </tr>

                <tr>
                    <td align="right"><span>Password</span></td>
                    <td>: <input type="password" placeholder="Password" value="<?php echo $password; ?>" name="pass"> 
                    <span style="color:red"><?php echo $errorShow_password; ?></span></td>
                </tr>

                <tr>
                    <td align="right"><span>Confirm Password</span></td>
                    <td>: <input type="password" placeholder="Confirm Password" value="<?php echo $confirmpassword; ?>" name="cpass">
                    <span style="color:red"><?php echo $errorShow_confirmpassword; ?></span></td>
                </tr>

                <tr>
                <td align="right"><span>Email</span></td>
                    <td scope="col" colspan="2">: <input type="text" placeholder="Email" value="<?php echo $email; ?>" name="email"> 
                    <span style="color:red"><?php echo $errorShow_email; ?></span></td>
                </tr>

                <tr>
                    <!-- <td scope="row" align="right">&nbsp;<span>Phone Number</span></td> -->
                    <!-- <td>: <input type="text" placeholder="Phone Number" value="<?php echo $phone; ?>" name="phonenumber"> -->
                    <!-- <td>: <input type="text" placeholder="Phone Number" value="<?php echo $phone; ?>" name="phonenumber"> -->
                    <!-- <span style="color:red"><?php echo $errorShow_phone; ?></span> </td> -->
                </tr>
                

                    <tr>
                        <td><span><b>Phone</b></span></td>
                        <td>: <input type="text" name="code" placeholder ="+880" size="3"> - <input type="text" name="phone" placeholder ="Number" size = "10">
                        <span><?php echo $errShow_phone;?></span></td>
                    </tr>
                
                <tr>
                    <td align="right" rowspan="4"><span>Address</span></td>
                    <td>: <input type="text" placeholder="Street Address" value="<?php echo $street; ?>" name="street"> 
                    <span style="color:red"><?php echo $errorShow_street; ?></span></td>
                </tr>

                <tr>
                    <td>: <input type="text" placeholder="City" value="<?php echo $city; ?>" name="city">
                    <span style="color:red"><?php echo $errorShow_city; ?></span></td>
                    
                    
                </tr>
                <tr>
                    <td>: <input type="text" placeholder="State" value="<?php echo $state; ?>" name="state">
                    <span style="color:red"><?php echo $errorShow_state; ?></span></td>
                
                </tr>

                <tr>
                    <td>: <input type="text" placeholder="Postal/Zip code" value="<?php echo $zip; ?>" name="zip"> 
                    <span style="color:red"><?php echo $errorShow_zip; ?></span></td>
                </tr>

                <tr>
                <td align="right">Birth Date</td>
						<td>:
							<select name="day" value="<?php echo $day;?>">
								<option>Day</option>
								
								<?php
									for($i=1;$i<=31;$i++){
										echo "<option>$i</option>";	
									}
								?>
							</select>
							<select name="month" value ="<?php echo $bmonth?>">
								<option>Month</option>
								
								<?php
								    $month = array("January","February","March","April","May","June","July","August","September","October","November","December");
									foreach($month as $v){
										echo "<option>$v</option>";
										
									}
								?>
							</select>
                            <select name="year" value ="<?php echo $byear?>">
								<option>Year</option>
								
								<?php
									for($i=1903;$i<=2021;$i++){
										echo "<option>$i</option>";	
									}
								?>
							</select>
                            <span style="color:red"> <?php echo $errorShow_bday;?> </span>
                            <span style="color:red"> <?php echo $errorShow_bmonth;?> </span>
                            <span style="color:red"> <?php echo $errorShow_byear;?> </span>
						</td>
                </tr>
                
                <tr>
						<td align="right"><span>Gender</span></td>
						<td>:<input type="radio" value="Male" name="gender">Male<input type="radio" value="Female" name="gender">Female
                        <span style="color:red"> <?php echo $errorShow_gender;?> </span></td>
				</tr>

                <tr>
                    <td align="right" rowspan="4"><span>Where did you hear about us?</span></td>
                    <td>:<input type="checkbox" value="A friend or colleague" name="aboutus[]">A friend or colleague 
                   
                </tr>

                <tr>
                <td>:<input type="checkbox" value="Google" name="aboutus[]">Google</td>
                    
                    
                    
                </tr>
                <tr>
                <td>:<input type="checkbox" value="Blog Post" name="aboutus[]">Blog Post</td>
                    
                
                </tr>

                <tr>
                    <td>:<input type="checkbox" value="News Article" name="aboutus[]">News Article 
                    <span style="color:red"> <?php  echo $errorShow_aboutus ?> </span>
                    </td>
                </tr>

                
						<td align="right"><span>Bio </span></td>
						<td>:<textarea name="bio"></textarea>
                        <span style="color:red"> <?php  echo $errorShow_bio  ?> </span>
                        </td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" name="submit" value="Register"></td>
				</tr>



            </table>
        </form>
        
    </fieldset>
   

</body>
</html>