<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainDesign.css">
    <link rel="stylesheet" href="admin.css">
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
        <a href=""><h1>About</h1></a>
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
        $file = fopen("adminCondition.txt", "r");
        $admin = [];
        $admin[] = fgets($file);
        $admin[] = fgets($file);
        $admin[] = fgets($file);
        echo $admin[0] . " ".$admin[1] . " " . $admin[2];

        fclose($file);
    ?>

    <div id="adminLogin" style="display: <?php echo trim($admin[2]) === '1' ? 'none' : 'block'; ?>">
        <form action="" method="POST">
        <h1>Login</h1>
        <label for="email">Email: </label><br>
        <input type="text" name="email" id="email"><br>
        <label for="password">Password: </label><br>
        <input type="password" name=pass id="pass"><br>
        <button type="submit" name="login">login</button>
        </form>
    </div>

    <?php if(trim($admin[2]) === '1'):?>
    <div id="Buttons">
        
        <div>
            <form action="ActivitiesPage.php" method="POST">
            <h1>Activities</h1>
            <button type="submit" name="forActivities">edit / add</button>
            </form>
        </div>
        
        <div>
            <form action="ProjectsPage.php" method="POST">
            <h1>Projects</h1>
            <button type="submit" name="forProjects">edit / add</button>
            </form>
        </div>
            <form action="skill.php" method="POST">
            <div><h1>Skills</h1>
            <button type="submit" name="forSkills">edit / add</button>
            </form>
        </div>
        
        <div>
            <form action="aboutmePage.php" method="POST">
            <h1>Personal Info</h1>
            <button type="submit" name="forPersonals">edit / add</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <?php
        if(isset($_POST['login'])){
            $file = fopen("adminCondition.txt", "r");
            $email = htmlspecialchars(trim($_POST['email']));
            $pass = htmlspecialchars(trim($_POST['pass']));
            $infos = [];
            $condition = false;
            $infos[] = fgets($file);
            $infos[] = fgets($file);
            $infos[] = fgets($file);
            fclose($file);
            if(strpos(trim($infos[0]), trim($email)) !== false && 
            strpos(trim($infos[1]), trim($pass)) !== false){
                $file1 = fopen("adminCondition.txt", "w");
                $infos[2] = '1';
                $condition = true;
                fwrite($file1, $infos[0]);
                fwrite($file1, $infos[1]);
                fwrite($file1, $infos[2]);
                fclose($file1);

                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
            else{
                echo "<p>wrong email or password</p>";
            }
        }
    ?>
        <?php if(trim($admin[2]) === '1'):?>
        <div id="logout">
            <form action="" method="POST">
            <button type="submit" name="logout">logout</button>
            </form>
        </div>
        <?php endif; ?>
        
        <?php 
            if(isset($_POST['logout'])){
                $admin[2] = '0';
            }
        ?>

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