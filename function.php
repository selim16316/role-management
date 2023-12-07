<?php

function saveInfo($user, $file)
{
  file_put_contents($file, json_encode($user, JSON_PRETTY_PRINT));
}