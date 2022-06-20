<?php
/** @var $exception Exception */

/**
 * @var $this View
 */

use core\View;

if($exception->getCode()===404)
    $this->title = 'Page not found';
else if($exception->getCode()===403)
    $this->title = 'No permission';
else
    $this->title = 'Server Error';

?>
<style>
    <?php include '../public/css/header.css'?>
    <?php include '../public/css/error.css'?>
    <?php include '../public/css/footer.css'?>
</style>
<body>
    <main>
        <h1 class="error">Error <?php echo $exception->getCode() ?> - <?php echo $exception->getMessage()?></h1>
    </main>
    <script><?php require_once("layouts/load_footer.js");?></script>
</body>
