<?php
$path=site_url();
 if(isset($_REQUEST["lang"])){
  $lang = $_REQUEST["lang"];
 }else{
  $lang = $_SESSION['lang'];
 }

if($lang=='en'){
 $company = 'The company';
 }elseif($lang=='fr'){
 $company = 'L\'entreprise';
 }
  define('company', $company);
  
 if($lang=='en'){
 $software = 'Software';
 }elseif($lang=='fr'){
 $software = 'Logiciels';
 }
  define('software', $software);
  
 if($lang=='en'){
 $management = 'Management';
 }elseif($lang=='fr'){
 $management = 'Gestion';
 }
  define('management', $management);
  
 if($lang=='en'){
 $message = 'Collaborative messaging';
 }elseif($lang=='fr'){
 $message = 'Messagerie collaborative';
 }
  define('message', $message);
  
 if($lang=='en'){
 $otherSoft = 'Other software';
 }elseif($lang=='fr'){
 $otherSoft = 'Autres logiciels';
 }
  define('otherSoft', $otherSoft);
  
 if($lang=='en'){
 $reseaux = 'Networks';
 }elseif($lang=='fr'){
 $reseaux = 'Réseaux';
 }
  define('reseaux', $reseaux);
  
 if($lang=='en'){
 $Wiring = 'Wiring';
 }elseif($lang=='fr'){
 $Wiring = 'Câblage';
 }
  define('Wiring', $Wiring);
  
 if($lang=='en'){
 $Sauvegardes = 'backups';
 }elseif($lang=='fr'){
 $Sauvegardes = 'Sauvegardes';
 }
  define('Sauvegardes', $Sauvegardes);
  
 if($lang=='en'){
 $tv = 'TV backup';
 }elseif($lang=='fr'){
 $tv = 'Télé sauvegarde';
 }
  define('tv', $tv); 
  
 if($lang=='en'){
 $sauvRep = 'Sauvgarde and replication';
 }elseif($lang=='fr'){
 $sauvRep = 'Sauvgarde et réplication';
 }
  define('sauvRep', $sauvRep); 
  
 if($lang=='en'){
 $data = 'Data Recovery';
 }elseif($lang=='fr'){
 $data = 'Récupération de données';
 }
  define('data', $data); 
  
 if($lang=='en'){
 $live = 'live';
 }elseif($lang=='fr'){
 $live = 'en direct';
 }
  define('live', $live);
  
  if($lang=='en'){
 $sheet = 'sheets';
 }elseif($lang=='fr'){
 $sheet = 'Fiches';
 }
  define('sheet', $sheet);
  
 if($lang=='en'){
 $prac = 'practices';
 }elseif($lang=='fr'){
 $prac = 'pratiques';
 }
  define('prac', $prac);
  
 if($lang=='en'){
 $more = 'To find out more?';
 }elseif($lang=='fr'){
 $more = 'Pour découvrir plus ?';
 }
  define('more', $more);
  
  
 if($lang=='en'){
 $subscribe = 'Just subscribe';
 }elseif($lang=='fr'){
 $subscribe = 'Il suffit de souscrire';
 }
  define('subscribe', $subscribe);
  
 if($lang=='en'){
 $register = 'register';
 }elseif($lang=='fr'){
 $register= 'S’inscrire';
 }
  define('register', $register);
  
 if($lang=='en'){
 $emailAdress = 'Enter your e-mail address ...';
 }elseif($lang=='fr'){
 $emailAdress= 'Saisissez votre adresse e-mail...';
 }
  define('emailAdress', $emailAdress);
  
?>