<?php
/** @var $exception \Exception */

/**
 * @var $this \core\View
 */
if($exception->getCode()===404)
    $this->title = 'Page not found';
else
    $this->title = 'No permission';
?>
<style type="text/css">
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
</html>
