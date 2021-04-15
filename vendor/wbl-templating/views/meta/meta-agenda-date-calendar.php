<?php

use WBL\Templating\Template;
use function WBL\Templating\get_agenda_date;

$date = get_agenda_date();

$timestamp = strtotime($date);

// $date = DateTime::createFromFormat('Y-m-d', $date);
$month = wp_date('M', $timestamp);
$day = wp_date('d', $timestamp);

$month = ($month) ? $month : '-';
$day = ($day) ? $day : '-';
?>

<div class="calendar-date">
	<span class="calendar-date__month"><?= $month ?></span>
	<span class="calendar-date__date"><?= $day ?></span>
</div>
