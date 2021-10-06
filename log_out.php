<?php
include_once 'config/session.php';
session_destroy();
header("Location: index.php");