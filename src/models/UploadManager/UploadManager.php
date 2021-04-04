<?php

/**
 * https://makitweb.com/multiple-files-upload-at-once-with-php/
 */
class UploadManager{

    private $miniature_path;
    private $profil_picture_path;


    public function upload_annonces_miniature($annonces_id){
        /*
        $folder = 'upload/annonces_pictures/'.$annonces_id.'/';
        if(!is_dir($folder)) mkdir($folder, 755, true);

        
        $filename    = $_FILES['file']['name'][0];
        exit();
        $partName    = explode(".",$filename); 
        $newFileName = "miniature.".$partName[1]; 
        $complete_path = $folder . $newFileName;

        if(file_exists($folder."miniature.jpg"))  unlink($folder."miniature.jpg");
        if(file_exists($folder."miniature.png"))  unlink($folder."miniature.jpg");
        if(file_exists($folder."miniature.jpeg")) unlink($folder."miniature.jpg");
        if(file_exists($folder."miniature.svg"))  unlink($folder."miniature.svg");
            
        $this->miniature_path = $complete_path;

        if(move_uploaded_file($_FILES['miniature']['tmp_name'], $complete_path)){
            return true;
        }else{
            return null;
        }*/


        $folder = 'upload/annonces_pictures/'.$annonces_id.'/';
        if(!is_dir($folder)) mkdir($folder, 755, true);

        $complete_path = $folder . basename($_FILES['miniature']['name']);


        $this->miniature_path = $complete_path;

        if(file_exists($complete_path)) unlink($complete_path);

        if(move_uploaded_file($_FILES['miniature']['tmp_name'], $complete_path)){
            return true;
        }else{
            return null;
        }



    }

 
    public function upload_annonces_images($annonces_id)
    {

        $numberOfFiles = count($_FILES['file']['name']);

        if($numberOfFiles > 2 ){ return false; }
        if($_FILES['file']['name'][0] == ""){ return false; }

        $dir_path         ="upload/annonces_pictures/".$annonces_id."/";
        $allImgPath       = array();
        if(!is_dir($dir_path)) mkdir($dir_path, 755, true);
        if(file_exists($dir_path.$annonces_id.".json")) unlink($dir_path.$annonces_id.".json");
        touch($dir_path.$annonces_id.".json");

        for($i = 0;$i < $numberOfFiles; $i++){
 
            $filename    = $_FILES['file']['name'][$i];
            $partName    = explode(".",$filename); 
            $newFileName = $i.".".$partName[1]; 

            $completePath = $dir_path.$newFileName;

            if(file_exists($completePath)) unlink($completePath);

            move_uploaded_file($_FILES['file']['tmp_name'][$i],$dir_path.$newFileName);

            $allImgPath["img".$i] = $completePath;

        }


        $allImgPath = json_encode($allImgPath);

        file_put_contents($dir_path.$annonces_id.".json",$allImgPath);


        return true;

    }

    public function upload_profil_pictures($utilisateur_id){

        $folder = 'upload/profil_pictures/'.$utilisateur_id.'/';
        if(!is_dir($folder)) mkdir($folder, 755, true);

        $complete_path = $folder . basename($_FILES['profil_picture']['name']);

        $this->profil_picture_path = $complete_path;

        if(file_exists($folder.$utilisateur_id.".jpg"))  unlink($folder.$utilisateur_id.".jpg");
        if(file_exists($folder.$utilisateur_id.".png"))  unlink($folder.$utilisateur_id.".png");
        if(file_exists($folder.$utilisateur_id.".jpeg")) unlink($folder.$utilisateur_id.".jpeg");
        if(file_exists($folder.$utilisateur_id.".svg"))  unlink($folder.$utilisateur_id.".svg");
            

        if(move_uploaded_file($_FILES['profil_picture']['tmp_name'], $complete_path)){
            return true;
        }else{
            return null;
        }
    }

 
    public function isFolderExist($folderName){

    }

    public function get_miniature_path()
    {
        return $this->miniature_path;
    }

    public function get_profil_picture_path()
    {
        return $this->profil_picture_path;
    }

}


?>