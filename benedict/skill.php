<?php 
$file = fopen("aboutme.txt", "r");
$temp = [];

while(true){
    if(feof($file)){
        break;
    }
    $temp[] = fgets($file);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainDesign.css">
    <link rel="stylesheet" href="skills.css">
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
            <p id="p2"><?php echo $temp[14]; ?></p>
            <div>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-square-instagram"></i>
                <i class="fa-brands fa-tiktok"></i>
            </div>
        </div>
    </div>

    <h3 id="act">Skills</h3>

    <?php
    $deleteId = '';
    $tempItems = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
        $deleteId = $_POST['delete_id'];
    }

    $file = fopen("skills.txt", "r");
    if ($file) {
        // Populate the array correctly
        while (!feof($file)) {
            $temptitle = trim(fgets($file));
            $tempdescription = trim(fgets($file));
            $tempimage = trim(fgets($file));
            $tempid = trim(fgets($file));

            // Validate each entry to ensure it's complete
            if ($temptitle !== false && $tempdescription !== false && $tempimage !== false && $tempid !== false) {
                $tempItems[] = [
                    "title" => $temptitle . "\n",
                    "description" => $tempdescription . "\n",
                    "image" => $tempimage . "\n",
                    "id" => $tempid . "\n"
                ];
            }
        }
        fclose($file);
    

    // Iterate through and delete the item based on id
    foreach($tempItems as $key => $values){
        if(trim($values['id']) === trim($deleteId)){
            // Remove the item from the array
            unset($tempItems[$key]);
            break; // Exit the loop after deletion
        }
    }
    $tempItems = array_filter($tempItems, function($value) {
    return !empty($value) || $value === 0;
    });

    $file = fopen("skills.txt", "w");
    foreach($tempItems as $values){
        fwrite($file, $values['title']);
        fwrite($file, $values['description']);
        fwrite($file, $values['image']);
        fwrite($file, $values['id']);
    }
    }
    ?>
    <?php 
        $condition = false;
        if(isset($_POST['forSkills'])){
            $condition = true;
        }

        $file = fopen("skills.txt", "r");
        $items = [];

        if ($file) {
            // Populate the array correctly
            while (!feof($file)) {
                $title = trim(fgets($file));
                $description = trim(fgets($file));
                $image = trim(fgets($file));
                $id = trim(fgets($file));

                // Validate each entry to ensure it's complete
                if ($title !== false && $description !== false && $image !== false && $id !== false) {
                    $items[] = [
                        "title" => $title,
                        "description" => $description,
                        "image" => $image,
                        "id" => $id
                    ];
                }
            }
            fclose($file);
        }
        // Display activities
        if (!empty($items)) {
            
            foreach ($items as $value) {
                echo "<div class='skills'>";
                echo "<div>";
                echo "<h3>" . htmlspecialchars($value['title']) . "</h3>";
                echo "<p>" . htmlspecialchars($value['description']) . "</p>";
                echo "</div>";
                echo "<div>";
                echo "<img src=\"" . htmlspecialchars($value['image']) . "\">";
                echo "</div>";
                echo "</div>";
                if($condition){
                echo "<div class='deleteandadd'>";
                echo "<div>";
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' name='delete_id' value='" . htmlspecialchars($value['id']) . "'>";
                echo "<button type='submit'>Delete</button>";
                echo "</form>";
                echo "</div>";
                echo "<div>";
                
                echo "<form action='editskillsPage.php' method='POST'>";
                echo "<input type='hidden' name='edit_id' value='" . htmlspecialchars($value['id']) . "'>";
                echo "<input type='hidden' name='show1' value='1'>";
                echo "<button type='submit'>Edit</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                }
            }
            
        } else {
            echo "<p>No activities found.</p>";
        }
    ?>


    <?php if($condition): ?>
    <form action='editskillsPage.php' method="POST">
    <input type="hidden" value="2" name="show2">
    <button id="addButton" type="submit" name="addButton">add</button>
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