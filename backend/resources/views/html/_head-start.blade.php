<?php

// include './vendor/Vite.php';

// $vite = new Vite();

$assetPath = url('/');
//@TODO perlu diganti diload cara laravel -> https://i.imgur.com/KHeBzDe.png
$jsonAssets = url('/build/manifest.json');
$jsonAssets = json_decode($jsonAssets, true);
// print_r($jsonAssets);
// die;

// function getCompiledAssets ($jsonAssets, $assetOriginPath = false) : string {
//     if (!$assetOriginPath) {
//         return "";
//     }

//     dd($jsonAssets[$assetOriginPath]['file']);

//     return "../{$jsonAssets[$assetOriginPath]['file']}";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (!empty( $pageTitle )) ? $pageTitle . ' | ' : '' ;?>Amanah TAP v3</title>

    <!-- REQUIRED CSS -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{@url('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Phosphor -->
    <link rel="stylesheet" href="{{@url('assets/backend/plugins/phosphor-icon/fill/style.css')}}">
    <link rel="stylesheet" href="{{@url('assets/backend/plugins/phosphor-icon/regular/style.css')}}">
    <link rel="stylesheet" href="{{@url('assets/backend/plugins/phosphor-icon/bold/style.css')}}">
