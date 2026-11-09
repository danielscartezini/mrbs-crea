<?php
declare(strict_types=1);
namespace MRBS;

use MRBS\Form\Form;

require "defaultincludes.inc";
require_once "mrbs_sql.inc";


// Check the CSRF token
Form::checkToken();

// Check the user is authorised for this page
checkAuthorised(this_page());

// Get non-standard form variables
$name = get_form_var('name', 'string', null, INPUT_POST);
$description = get_form_var('description', 'string', null, INPUT_POST);
$capacity = get_form_var('capacity', 'int', null, INPUT_POST);
$room_admin_email = get_form_var('room_admin_email', 'string', null, INPUT_POST);
$type = get_form_var('type', 'string', null, INPUT_POST);

// This file is for adding new areas/rooms
$error = '';

// First of all check that we've got an area or room name
if (!isset($name) || ($name === ''))
{
  $error = "empty_name";
}
else
{
  // Strip out any extra whitespace that the user may accidentally have typed in the name
  $name = remove_extra_whitespace($name);
  // We need to do different things depending on if it's a room
  // or an area
  if ($type == "area")
  {
    $area_enable_periods = get_form_var('area_enable_periods', 'string', null, INPUT_POST);
    $periods_bool = ($area_enable_periods !== null) ? ($area_enable_periods === '1' || $area_enable_periods === 'true') : null;
    $area = mrbsAddArea($name, $error, $periods_bool);
  }
  elseif ($type == "room")
  {
    $posted_area = get_form_var('area', 'int', $area, INPUT_POST);
    if (!empty($posted_area))
    {
      $area = $posted_area;
    }
    $room = mrbsAddRoom($name, $area, $error, $description, $capacity, $room_admin_email);
  }
}

$returl = "admin.php?area=$area" . (!empty($error) ? "&error=$error" : "");
location_header($returl);
