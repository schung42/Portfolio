<?php
/**
 * Created by PhpStorm.
 * User: ShaunChung
 * Date: 3/18/15
 * Time: 10:02 PM
 */

class AssignmentEntry {
    private $name;
    private $fileEntries;

    public function constructor(){
        $this->name = "";
        $this->fileEntries = array();
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    /**
     * @param $entry - fileEntry to add to list
     * @param $revision - revision that the file Entry is in
     */
    public function addFileEntry($entry, $revision){
        $this->fileEntries[$revision] = $entry;
    }

    /**
     * @return array of file entries in an assignment
     */
    public function getFileEntries(){
        return $this->fileEntries;
    }

    /**
     * @return array of revisions with list of file entries
     */
    public function getRevisions(){
        return array_keys($this->fileEntries);
    }

}

?>