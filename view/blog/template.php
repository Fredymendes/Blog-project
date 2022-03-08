<!DOCTYPE html>
<html>
<!--Head-->
<?php require 'view/blog/headView.php'; ?>
<!--Navigator-->
<?php require 'view/blog/navigatorView.php'; ?>
<body>
    <?php if (isset($_SESSION['message'])) :?> 
        <div class='alert alert-info'>
            <?php echo $_SESSION['message'];
            unset($_SESSION['message']);?>
        </div>
    <?php endif ?>
    <?php echo $content ?>
<!-- Footer -->
    <?php require 'view/blog/footerView.php'; ?>
</body>
</html>