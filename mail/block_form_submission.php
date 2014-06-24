<?php 
defined('C5_EXECUTE') or die("Access Denied.");

$submittedData='';
foreach($questionAnswerPairs as $questionAnswerPair){
	$submittedData .= $questionAnswerPair['question']."\r\n".$questionAnswerPair['answerDisplay']."\r\n"."\r\n";
} 
$formDisplayUrl=BASE_URL.DIR_REL.'/' . DISPATCHER_FILENAME . '/dashboard/reports/forms/?qsid='.$questionSetId;

$body = t("
%s

Référence : %s

", $formName, $submittedData, $formDisplayUrl);