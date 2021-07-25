<?php
include 'note.class.php';

class NoteView extends Note{

    public function PrintInformationId($id){
        $results = $this->GetNoteId($id);
        return $results;
    }

    public function PrintInformationNickname($nickname){
        $result = $this->GetNoteNickname($nickname);
        return $result;
    }

    public function PrintInformationTitle_ID($title, $id){
        $result = $this->GetNoteTitle_ID($title, $id);
        return $result;
    }
}