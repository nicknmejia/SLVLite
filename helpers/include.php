<?php

// Include all models
foreach (glob("models/*.php") as $filename)
{
	include $filename;
}

// Include all controllers

foreach (glob("controllers/*.php") as $filename)
{
	include $filename;
}