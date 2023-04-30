<?php
function validateTitle($title) {
    if(strlen($title) > MAX_LENGTH){
       return "Title is too long";
    }
    elseif(strlen($title) < MIN_LENGTH){
        return "Title is too short";
    }
    else{
        return "";
    }
}

function validateSummary($summary) {
    if(strlen($summary) > SUMMARY_MAX_LENGTH){
        return "Summary is too long";
    }
    elseif(strlen($summary)< SUMMARY_MIN_LENGTH){
        return "Summary is too short";
    }
    else {
        return "";
    }
}

function validateBody($body) {
    if(strlen($body) > body_MAX_LENGTH){
       return "Body is too long";
    }
    elseif(strlen($body) < body_MIN_LENGTH){
       return "Body is too short";
    }
    else {
        return "";
    }
}

function validateImage($image) {
    $error_image = "";
    $targetDir = "../../images/";
    $targetFile = $targetDir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    if($imageFileType){ 
        $check = getimagesize($image["tmp_name"]);

        if ($check === false) {
            $error_image = "File is not an image.";
        }

        // Check file size (max 5MB)
        if ($image["size"] > Image_MAX_SIZE) {
            $error_image = "File is too large.";
        }

        // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error_image = "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    
    return $error_image;
}

?>