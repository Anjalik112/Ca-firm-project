<?php

class PhotoUpload
{

  private  $field_name="";
  private $file_name="";
  private  $logotargetdir="";
  private  $logofilepath = "";
  public function __construct(string $field_name,string $file_name,string $targetDir)
  {
    $this->field_name=$field_name;
    $this->file_name=$file_name;
    $this->logotargetdir=$targetDir;
    
 
   
  }



  private function createPathName($temp)
  {
  
      if(!file_exists($temp))
      {
          return false;
      }
      return true;
  }
  

  private function checkImage()
  {
    $check=getimagesize($_FILES[$this->field_name]["tmp_name"]);
    if($check !==false)
    {
        return true;
    }
    else{
        return false;    
    }
  }

public function save()
{
    if($this->checkImage())
    {
      $filetype=strtolower(pathinfo($_FILES[$this->field_name]["name"],PATHINFO_EXTENSION));
      $this->logofilepath=$this->logotargetdir."".$this->file_name.".".$filetype;
      $i=1;
      while($this->createPathName($this->logofilepath))
      {
          $this->logofilepath=$this->logotargetdir."".$this->file_name.$i.".".$filetype;
          $i+=1;
      }
      if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg")
      {
        return false;
      }
      else
      {
        if(move_uploaded_file($_FILES[$this->field_name]["tmp_name"],$this->logofilepath))
                {
                   return true;
                }
                else
                {
                    return false;
                }
      }

    }
    else
    {
      return false;
    }


}

public function getPath()
{

  return $this->logofilepath;
}


}
?>