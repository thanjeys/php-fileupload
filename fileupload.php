<?php

    if($_POST) { 

        print_r($_FILES['image']);

        // Path to upload Files
        $path = "uploaded/";

        // Get File Extension from
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size']; 

        if($fileSize > 0 ) 
        {   
            // Get File Extension
            $tmp = explode('.', $fileName); 
            $extension = strtolower(end($tmp)); 

            // Allowed Extensions
            $allowedExtensions = array("jpg", "png", "jpeg"); 

            // Check valid Extension
            if(in_array($extension, $allowedExtensions) == false) { 
                $error[] = "Sorry Only JPG/PNG Extension allowed "; 
            }

            //File Size validation
            if($fileSize > 2097152)
                $error[] = "File Size Should be less than 2 MB"; 

            if(empty($error))
            { 
                if(move_uploaded_file($_FILES['image']['tmp_name'], $path. $fileName))
                    echo "File Upload";         
                else 
                    echo "Failed to Upload File"; 
            }
            else { 
                echo implode("<br> ", $error); 
            }
            
        }
        else 
            echo "Upload a File Failed"; 
        
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>File Upload Image</h2>
    <form action="" method="post" enctype="multipart/form-data"> 
        <label for="file">Upload File</label>
        <input type="file" name="image" id="image">

        <input type="hidden" name="dummy">
        <button type="submit">Submit</button>

        
    </form>
</body>
</html>