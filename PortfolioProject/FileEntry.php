<?php
/**
 * Created by PhpStorm.
 * User: ShaunChung
 * Date: 3/18/15
 * Time: 9:27 PM
 */

/**
 * Class FileEntry is the class that holds all of the information for each individual file
 * on our website. Each file in our svn directory is a FileEntry
 */
class FileEntry {

    private $files;
    private $filePaths;
    private $date;
    private $author;
    private $comment;

    /**
     * Standard Constructor
     */
    public function constructor() {
        $this->author = "";
        $this->filePaths = array();
        $this->date = "";
        $this->author = "";
        $this->comment = "";
        $this->files = array();
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setComment($comment){
        $this->comment = $comment;
    }

    public function getComment(){
        return $this->comment;
    }

    public function getDate(){
        return $this->date;
    }
    /**
     * @param $date - date information from svn
     */
    public function setDate($date){
        $date[strpos($date, "T")] = " ";
        $dateInformation = date_parse($date); //date_parse to be implemented
        $resultDate = $this->getMonth($dateInformation['month']) . " " . $dateInformation['day'] . ", " .
            $dateInformation['year'] . " at " . $this->correctTime($dateInformation["hour"], $dateInformation["minute"]);

        $this->date = $resultDate;
    }

    /** DONT THINK I NEED
     * Changes the wonky time scheme svn uses to readable time
     * @param $hr - string 24 hr
     * @param $min - string for minutes
     * @return adjusted readable time
     */
    public function correctTime($hr, $min)
    {
        $PM = intval($hr) > 12;
        $adjustedHr = (intval($hr) % 12) . "";

        if ($PM) {
            return $adjustedHr . ":" . $min . "PM";
        } else {
            return $adjustedHr . ":" . $min . "AM";
        }
    }

        /**
         * @param $number check number corresponds to date
         * @return the Month that corresponds to int
         */
    public function getMonth($number){
        if($number === "01"){
            return "January";
        }
        elseif($number === "02"){
            return "February";
        }
        elseif($number === "03"){
            return "March";
        }
        elseif($number === "04"){
            return "April";
        }
        elseif($number === "05"){
            return "May";
        }
        elseif($number === "06"){
            return "June";
        }
        elseif($number === "07"){
            return "July";
        }
        elseif($number === "08"){
            return "August";
        }
        elseif($number === "09"){
            return "September";
        }
        elseif($number === "10"){
            return "October";
        }
        elseif($number === "11"){
            return "November";
        }
        elseif($number === "12"){
            return "December";
        }
        else{
            return "Not a Month";
        }
    }


    public function setFilePaths($filePaths){
        $this->filePaths = $filePaths;
    }

    public function addFilePaths($filePath){
        $this->filePaths[] = $filePath;
    }

    public function getFilePaths(){
        return $this->filePaths;
    }

    public function setFiles($files){
        $this->files = $files;
    }

    public function addFiles($file){
        $this->files[] = $file;
    }

    public function getFiles(){
        return $this->files;
    }
}

?>