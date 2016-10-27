<?php
require 'stream.php';

$t = new ctwitter_stream();

$t->login('plahera@gmail.com', 'Artyismine101');

$t->start(array('facebook', 'fbook', 'fb'));
?>