<?php
require_once '../../model/suggestion/question_service.class.php';
session_start();
$question_service = new Question_Service();
$op=$_GET['op'];
$user=$_SESSION['username'];

if($op==1){
    $expert=$_POST['expert'];
    $question=$_POST['question'];
    $detail=$_POST['detail'];
    $ret=$question_service->add_question($user,$expert,$question,$detail);
   
    if($ret){
        header("Location: http://localhost/healthWEB/views/suggestion/mySuggestion.php");
        exit();
    }
} else if($op==2){
    $answer=$_POST['answer'];
    $qid=$_GET['qid'];
    $ret=$question_service->update_answer($qid,$answer);
    if($ret){
        header("Location: http://localhost/healthWEB/views/user/expert.php?errno=2");
        exit();
    }
}
?>