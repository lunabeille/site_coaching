<?php
extract($data);
$data['vma'] = '<input type="number" id="vma" name="vma" step="0.1" min="6.0" max="30.0" value="'.$vma.'"/>';
$data['age'] = '<input type="number" id="age" name="age" step="1" min="10" max="100" value="'.$age.'"/>';
$data['ville'] = '<input type="text" id="ville" name="ville" value="'.$ville.'"/>';
$data['rp10'] = '<input type="text" id="rp10" name="rp10" value="'.$rp10.'"/>';
extract($data);
include('displayprofile.php');
?>
