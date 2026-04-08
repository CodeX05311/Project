<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainDesign.css">
    <link rel="stylesheet" href="aboutmePage.css">
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
        $condition = false;
        if(isset($_POST['forPersonals'])){
            $condition = true;
        }

        $file = fopen("aboutme.txt", "r");
        $aboutMe = [];
        while(true){
            if(feof($file)){
                break;
            }
            $aboutMe[] = fgets($file);
        }
        fclose($file);
        echo count($aboutMe);
    ?>

    <h1 id="about">About me!</h1>

    <div id="aboutme">
        <div id="idPic">
            <div>
                <img src="profile.jpg" alt="profile">
            </div>
        </div>
        <div id="personals">
            <div>
            <p><b>Name:</b> <span><?php echo $aboutMe[0];?></span></p>
            <p><b>Age: </b><span><?php echo $aboutMe[1];?></span></p>
            <p><b>Birthday:</b> <span><?php echo $aboutMe[2];?></span></p>
            <p><b>hobbies: </b><span><?php echo $aboutMe[3];?></span></p>
            <p><b>Born: </b><span><?php echo $aboutMe[4];?></span></p>
            <p><b>live in: </b><span><?php echo $aboutMe[5];?></span></p>
            <p><b>School: </b><span><?php echo $aboutMe[6];?></span></p>
            <p><b>Course: </b><span><?php echo $aboutMe[7];?></span></p>
            <p><b>Desired Job: </b><span><?php echo $aboutMe[8];?></span></p>
            </div>
            <div>
            <i class="fa-solid fa-envelope" style="margin-top: 5%;"></i><span><?php echo $aboutMe[9];?></span><br>
            <i class="fa-solid fa-phone" style="margin-top: 10%;"></i><span><?php echo $aboutMe[10];?></span><br>
            <i class="fa-brands fa-facebook"></i><span><?php echo $aboutMe[11];?></span><br>
            <i class="fa-brands fa-square-instagram"></i><span><?php echo $aboutMe[12];?></span><br>
            <i class="fa-brands fa-tiktok"></i><span><?php echo $aboutMe[13];?></span><br>
            </div>
        </div>
    </div>
    
    <?php if($condition):?>
    <form action="ediAboutMePage.php" method="POST">
    <button id="update">Update Personal Info?</button>
    </form>
    <?php endif; ?>

    

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