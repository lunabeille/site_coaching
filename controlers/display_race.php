<?php
include_once('../lib/utils.php');


function display_race($id){

}

if (isset($_GET['nom']))
{
  $list_participants = get_participant_to_one_race($_GET['nom']);
}
?>