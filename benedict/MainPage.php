<?php 
$file = fopen("aboutme.txt", "r");
$file1 = fopen("Activities.txt", "r");
$file2 = fopen("Projects.txt", "r");

$temp = [];

while(true){
    if(feof($file)){
        break;
    }
    $temp[] = fgets($file);
}
fclose($file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainDesign.css">
    <link rel="stylesheet" href="mainPageDesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navBar">

        <div>
            <a href="admin.php"><h1><span style="color: #01c38d;">J</span>BB.</h1></a>
        </div>

        <div class="nav">
            <a href="MainPage.php"><h1>Home</h1></a>
        </div>

        <div class="nav">
            <a href="aboutmePage.php"><h1>About me</h1></a>
        </div>
        <div class="nav">
            <a href="skill.php"><h1>Skills</h1></a>
        </div>
        <div class="nav">
            <form action="" method="get"></form>
            <select name="Works" class="works" onchange="window.location.href=this.value";>
                    <option value="none" disabled selected>Works</option>
                    <option value="ActivitiesPage.php">Actvities</option>
                    <option value="ProjectsPage.php">Projects</option>
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
            <p id="p2"><?php echo $temp[14];?></p>
            <div>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-square-instagram"></i>
                <i class="fa-brands fa-tiktok"></i>
            </div>
        </div>
    </div>

    <div class="contents">
        <h3>
            Activities
        </h3>
        <p id="p1">
            This section showcases the academic activities I have participated in as 
            a student highlighting the skills and knowledge I have gains <br><br>
            <a href="ActivitiesPage.php" class="seemoreLink">
            See more =>
            </a>        
        </p>
        <div class="contentBox">
            <div>
                <img src="labAct1.jpg" alt="Sample">
            </div>
            <div>
                <img src="labAc2.jpg" alt="Sample">
            </div>
            <div>
                <img src="labAct3.jpg" alt="Sample">
            </div>
        </div>
    </div>

    <div class="contents">
        <h3>
            Projects
        </h3>
        <p id="p1">
            This section presents my projects, demonstrating the application of
             my learning to address practical challenges in the field of it <br><br>
             <a href="ProjectsPage.php" class="seemoreLink">
                See more =>
            </a>       
        </p>
        <div class="contentBox">
            <div>
                <img src="calculator.jpg" alt="Sample">
            </div>
            <div>
                <img src="hotelwebsite.jpg" alt="Sample">
            </div>
            <div>
                <img src="snakegame.jpg" alt="Sample">
            </div>
        </div>
    </div>


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
            <p>Contact num: <br> <?php echo $temp[10];?></p>
            <p>Gmail: <br> <?php echo $temp[0];?> <br> 44@gmail.com</p>
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