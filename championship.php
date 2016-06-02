<?php
use App\Championships;

$cha = new Championships();

$championship = new Championships();
$championship->name = 'ceva';
$championship->reward = 22;
$championship->level_required = 2;
$championship->ticket = 10;
$championship->max_experience = 200;
$championship->max_places = 8;
$championship->started = 0;
$championship->active = 1;
$championship->level_four = [1,2,3,4,5,6,7,8];

$championship->save();
