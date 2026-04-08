<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainDesign.css">
    <link rel="stylesheet" href="ediAboutMePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navBar">

    <div>
        <h1><span style="color: #01c38d;">J</span>BB.</h1>
    </div>

    <div class="nav">
        <a href="MainPage.php"><h1>Home</h1></a>
    </div>

    <div class="nav">
        <a href="aboutmePage.php"><h1>About</h1></a>
    </div>
    <div class="nav">
        <a href="skill.php"><h1>Skills</h1></a>
    </div>
    <div class="nav">
        <form action="" method="get"></form>
        <select name="Works" class="works" onchange="window.location.href=this.value";>
                <option value="none" disabled selected>Works</option>
                <option value="ActivitiesPage.php">Actvities</option>
                <option value="ProjectsPage.php">Project</option>
        </select>
        </form>
    </div>

    </div>

    <div class="introduction">
        <div>
            <img src="avatar.jpg" alt="avatar">
        </div>
        <div>
            <h2>Portfolio</h2>
            <p id="p1">Student from Universidad de Dagupan</p>
            <p id="p2">Welcome to my Porfolio. I am IT student, 
                and this collection highlights my academic activities 
                final projects and personal initiatives, demonstrating 
                my skills and dedication to the field of technology</p>
            <div>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-square-instagram"></i>
                <i class="fa-brands fa-tiktok"></i>
            </div>
        </div>
    </div>
    <?php 
        $file = fopen("aboutme.txt", "r");
        $temp = [];

        while(true){
            if(feof($file)){
                break;
            }
            $temp[] = fgets($file);
        }
        fclose($file);
        ?>
    

    <div class="main">
        <form action="" method="POST">
        <div style="width: 90%; margin: auto;">

        <h3>Update Personal Info</h3>

        <label for="Name">Name:</label>
        <label for="Age" class="forAge">Age: </label><br>
        
        <input type="text" name="tempName" class="inputs" style="width: 75.3%"
        placeholder="Name:" value="<?php echo $temp[0];?>" required>
        <input type="text" name="tempAge" class="inputs" style="width: 22.5%"
        placeholder="Age:" value="<?php echo $temp[1];?>" required>

        <label for="Bday">Birthday: </label>
        <label for="Hobbies" class="forHobbies">Hobbies: </label><br>

        <input type="text" name="tempbday" class="inputs" style="width: 40%"
        placeholder="Birthday:" value="<?php echo $temp[2];?>" required>
        <input type="text" name="temphobbies" class="inputs" style="width: 57.8%"
        placeholder="Hobbies:" value="<?php echo $temp[3];?>" required>

        <label for="born">Born in: </label>
        <label for="livein" class="forlivein">Live in: </label><br>

        <input type="text" name="tempborn" class="inputs" style="width: 48.8%"
        placeholder="Born in:" value="<?php echo $temp[4];?>" required>
        <input type="text" name="templivein" class="inputs" style="width: 49%"
        placeholder="live in:" value="<?php echo $temp[5];?>" required>

        <label for="school">School: </label>
        <label for="course" class="forcourse">Course: </label><br>

        <input type="text" name="tempschool" class="inputs" style="width: 54%"
        placeholder="School:" value="<?php echo $temp[6];?>" required>
        <input type="text" name="tempcourse" class="inputs" style="width: 43.8%"
        placeholder="Course:" value="<?php echo $temp[7];?>" required>

        <label for="Dream Job:">Dream Job: </label>
        <label for="Gmail" class="forgmail">Gmail: </label><br>

        <input type="text" name="tempdesiredjob" class="inputs" style="width: 47.8%"
        placeholder="Desired Job:" value="<?php echo $temp[8];?>" required>
        <input type="text" name="tempgmail" class="inputs" style="width: 50%"
        placeholder="Gmail:" value="<?php echo $temp[9];?>" required>

        <label for="contact">Contact: </label>
        <label for="Facebook" class="forfacebook">Facebook: </label><br>

        <input type="text" name="tempcontact" class="inputs" style="width: 48.8%"
        placeholder="Contact" value="<?php echo $temp[10];?>" required>
        <input type="text" name="tempfacebook" class="inputs" style="width: 49%"
        placeholder="Facebook:" value="<?php echo $temp[11];?>" required>

        <label for="forinsta">Instagram: </label>
        <label for="tiktok" class="fortiktok">Tiktok</label><br>
        <input type="text" name="tempinsta" class="inputs" style="width: 48.8%"
        placeholder="instagram:" value="<?php echo $temp[12];?>" required>
        <input type="text" name="temptiktok" class="inputs" style="width: 49%"
        placeholder="tiktok:" value="<?php echo $temp[13];?>" required>

        <label for="description">Short description about yourself: </label>
        <textarea name="tempdescription" id="" cols="30" rows="10" style="width: 99.5%;"
        placeholder="short description about yourself" required><?php echo $temp[14];?>
        </textarea><br>
        <button name="save" type="submit" id="add">save</button>
        </div>
        </form>
    </div>
    
    <?php
    if(isset($_POST['save'])){
        $temp = [];
        $new = [];

        $new[] = $_POST['tempName'];
        $new[] = $_POST['tempAge'];
        $new[] = $_POST['tempbday'];
        $new[] = $_POST['temphobbies'];
        $new[] = $_POST['tempborn'];
        $new[] = $_POST['templivein'];
        $new[] = $_POST['tempschool'];
        $new[] = $_POST['tempcourse'];
        $new[] = $_POST['tempdesiredjob'];
        $new[] = $_POST['tempgmail'];
        $new[] = $_POST['tempcontact'];
        $new[] = $_POST['tempfacebook'];
        $new[] = $_POST['tempinsta'];
        $new[] = $_POST['temptiktok'];
        $new[] = $_POST['tempdescription'];


        $file = fopen("aboutme.txt", "w");

        foreach($new as $items){
            fwrite($file, $items. "\n");
        }
        fclose($file);
    }
    ?>

    <div class="feedback">
        <h4>Feedbacks</h4>
        <p id="p1">I value your thoughts and suggestions! You can share you feedback to 
            help me improve and grow.Your input is greatly appreciated!</p>

            <div class="feedBox">
                <div style="border-right: 1px solid white;">
                    <h5>By: Bro1</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Quis quam quidem fugit hic perspiciatis veritatis aperiam, 
                        quia amet. Nemo unde praesentium deserunt, quia inventore 
                        illo architecto cumque exercitationem eum provident.</p>
                </div>
                <div>
                    <h5>By: Bro2</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Quis quam quidem fugit hic perspiciatis veritatis aperiam, 
                        quia amet. Nemo unde praesentium deserunt, quia inventore 
                        illo architecto cumque exercitationem eum provident.</p>

                </div>
                <div style="border-left: 1px solid white;">
                    <h5>By: Bro3</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Quis quam quidem fugit hic perspiciatis veritatis aperiam, 
                        quia amet. Nemo unde praesentium deserunt, quia inventore 
                        illo architecto cumque exercitationem eum provident.</p>

                </div>
            </div>
    </div>

    <button class="writeComment">
        Write Comment?
    </button>

    <div class="footer">
        <div>
            <div class="title">
                <h6>Contact Info</h6>
            </div>
            <p>Contact num: <br> 09123022825</p>
            <p>Gmail: <br> johnbenedictbaldevia <br> 44@gmail.com</p>
        </div>
        <div>
            <div class="title">
                <h6>Language Used</h6>
            </div>
            <p>HTML</p>
            <p>CSS</p>
            <p>Javascript</p>
            <p>PHP</p>
        </div>
        <div>
            <div class="title">
                <h6>Social Media Acc</h6>
            </div>
            <div style="width: 100%; text-align: center;">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-square-instagram"></i>
                <i class="fa-brands fa-tiktok"></i>
            </div>
            
        </div>
        <div>
            <div class="title">
                <h6>About</h6>
            </div>
            <p>School</p>
            <p>Personal Info</p>
        </div>

        <br>
    </div>

    
</body>
</html>