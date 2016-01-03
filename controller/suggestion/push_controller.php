<?php
require_once '../../model/suggestion/question_service.class.php';
$question_service = new Question_Service();
move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
$doc = new DOMDocument();
$doc->load( $_FILES["file"]["name"] );
$suggestions = $doc->getElementsByTagName( "suggestion" );
foreach( $suggestions as $suggestion )
{
    $ids = $suggestion->getElementsByTagName("id");
    $qid = $ids->item(0)->nodeValue;

    $answers = $suggestion->getElementsByTagName("answer");
    $answer = $answers->item(0)->nodeValue;
    
    $ret=$question_service->update_answer($qid,$answer);
}
if($ret){
    header("Location: http://localhost/healthWEB/views/user/ex_push.php?errno=2");
    exit();
}
?>