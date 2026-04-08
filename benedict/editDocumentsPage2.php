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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="mainDesign.css">
    <link rel="stylesheet" href="editDocuments2Page.css">
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

    <?php
    $show = 0;
// Check if the 'edit_id' is set via POST
if (isset($_POST['edit_id'])) {
    $editId = $_POST['edit_id'];
    $show = $_POST['show1'];

    // Read the activity file
    $file = fopen("Projects.txt", "r");
    if ($file) {
        // Loop through the file and find the activity that matches the 'edit_id'
        while (!feof($file)) {
            $title = trim(fgets($file));
            $description = trim(fgets($file));
            $image = trim(fgets($file));
            $id = trim(fgets($file));

            // If the id matches the edit_id, populate the form
            if ($id == $editId) {
                $currentTitle = $title;
                $currentDescription = $description;
                $currentImage = $image;
                break;
            }
        }
        fclose($file);
    }
}
if(isset($_POST['addButton'])){
    $show = $_POST['show2'];
}
echo "$show dsadasdaslkdjaskld";
?>

<?php if($show === '1'):?>
<div id="editDiv1" style="display: block;">
    <h3>EDIT</h3>
    <div id="editDocuments">
    <form action="" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo htmlspecialchars($editId); ?>">

        <label for="title">Title:</label><br><br>
        <input type="text" name="title" class="inputs" value="<?php echo htmlspecialchars($currentTitle); ?>"><br><br>

        <label for="description">Description:</label><br>
        <textarea name="newdescription" cols="30" rows="10" class="inputs"><?php echo htmlspecialchars($currentDescription); ?></textarea><br><br>

        <label for="images">Images:</label><br>
        <input type="text" name="images" value="<?php echo htmlspecialchars($currentImage); ?>"><br>

        <button type="submit" name="save" id="save">Save</button>
    </form>
    </div>
</div>
<?php endif; ?>
<?php if($show === '2'):?>
<div id="editDiv2" style="display: block;">
    <h3>ADD</h3>
    <div id="editDocuments">
    <form action="" method="POST">

        <label for="title">Title:</label><br><br>
        <input type="text" name="addtitle" class="inputs" ><br><br>

        <label for="description">Description:</label><br>
        <textarea name="adddescription" cols="30" rows="10" class="inputs"></textarea><br><br>

        <label for="images">Images:</label><br>
        <input type="text" name="addimages"><br>

        <button type="submit" name="add" id="save">Save</button>
    </form>
    </div>
</div>
<?php endif; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $newTitle = $_POST['addtitle'];
    $newDescription = $_POST['adddescription'];
    $newImage = $_POST['addimages'];

    // Read existing activities and extract the last ID
    $lastId = 0;
    $file = fopen("Projects.txt", "r");
    if ($file) {
        while (!feof($file)) {
            $title = trim(fgets($file));
            $description = trim(fgets($file));
            $image = trim(fgets($file));
            $id = trim(fgets($file));

            // Keep track of the highest ID
            if (is_numeric($id)) {
                $lastId = max($lastId, $id);
            }
        }
        fclose($file);
    }

    // Increment the last ID by 1 for the new activity
    $newId = $lastId + 1;

    // Append the new activity to the file
    $file = fopen("Projects.txt", "a");
    if ($file) {
        fwrite($file, $newTitle . "\n");
        fwrite($file, $newDescription . "\n");
        fwrite($file, $newImage . "\n");
        fwrite($file, $newId . "\n");
        fclose($file);

        // After saving, redirect back to the activities page
        header("Location: ProjectsPage.php");
        exit();
    } else {
        echo "Error: Could not open the file to save the new activity.";
    }
}
?>


<?php
// When the form is submitted to update
if (isset($_POST['save'])) {
    $updatedTitle = $_POST['title'];
    $updatedDescription = $_POST['newdescription'];
    $updatedImage = $_POST['images'];
    $updatedId = $_POST['edit_id'];

    // Read all activities into an array
    $file = fopen("Projects.txt", "r");
    $tempItems = [];
    while (!feof($file)) {
        $title = trim(fgets($file));
        $description = trim(fgets($file));
        $image = trim(fgets($file));
        $id = trim(fgets($file));

        if ($id == $updatedId) {
            // Update the activity with the new values
            $tempItems[] = [
                'title' => $updatedTitle . "\n",
                'description' => $updatedDescription . "\n",
                'image' => $updatedImage . "\n",
                'id' => $updatedId . "\n"
            ];
        } else {
            $tempItems[] = [
                'title' => $title . "\n",
                'description' => $description . "\n",
                'image' => $image . "\n",
                'id' => $id . "\n"
            ];
        }
    }
    fclose($file);

    // Write the updated activities back to the file
    $file = fopen("Projects.txt", "w");
    foreach ($tempItems as $item) {
        fwrite($file, $item['title']);
        fwrite($file, $item['description']);
        fwrite($file, $item['image']);
        fwrite($file, $item['id']);
    }
    fclose($file);
    header("Location: ProjectsPage.php");
    exit();  // Make sure the script stops here
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
            <p>Contact num: <br><?php echo $temp[10];?></p>
            <p>Gmail: <br><?php echo $temp[0];?><br> 44@gmail.com</p>
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