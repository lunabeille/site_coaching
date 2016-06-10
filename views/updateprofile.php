<?php
extract($data);

$data['vma'] = '<input type="number" id="vma" name="vma" step="0.1" min="6.0" max="30.0" value="'.$vma.'"/>';
$data['age'] = '<input type="number" id="age" name="age" step="1" min="10" max="100" value="'.$age.'"/>';
$data['ville'] = '<input type="text" id="ville" name="ville" value="'.$ville.'"/>';
$data['rp10h'] = '<input type="text" maxlength=2 size=2 class="chrono" name="rp10h" placeholder="hh" value="'. $rp10h . '" required/>';
$data['rp10min'] = '<input type="text" maxlength=2 size=2 class="chrono" name="rp10min" placeholder="mm"value="'. $rp10min . '" required/>';
$data['rp10sec'] = '<input type="text" maxlength=2 size=2 class="chrono" name="rp10sec" placeholder="ss" value="'. $rp10sec . '" required/>';
// $data['rp10'] = '<input type="text" id="rp10" name="rp10" value="'.$rp10.'"/>';
$data['rpsemih'] = '<input type="text" maxlength=2 size=2 class="chrono" name="rpsemih" placeholder="hh" value="'. $rpsemih . '" required/>';
$data['rpsemimin'] = '<input type="text" maxlength=2 size=2 class="chrono" name="rpsemimin" placeholder="mm"value="'. $rpsemimin . '" required/>';
$data['rpsemisec'] = '<input type="text" maxlength=2 size=2 class="chrono" name="rpsemisec" placeholder="ss" value="'. $rpsemisec . '" required/>';

extract($data);
include('displayprofile.php');
?>
