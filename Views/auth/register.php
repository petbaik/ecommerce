<?php 
 require 'Views/layouts/header.php'; 
?>
<?php if(\Ecommerce\App\Session::has('register')) : ?>
<p><?php \Ecommerce\App\Session::flash('register'); ?></p>
<?php endif; ?>
<div class="card">
<article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center">Регистрация</h4>
    <p class="text-center">Get started with your free account</p>
    <p>
        <a class="btn btn-block btn-twitter" href=""> <i class="fab fa-twitter"></i> &nbsp; Login via Twitter</a>
        <a class="btn btn-block btn-facebook" href=""> <i class="fab fa-facebook-f"></i> &nbsp; Login via facebook</a>
    </p>
    <p class="divider-text">
        <span>OR</span>
    </p>
    <form method="post" action="register/post">
	<div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
            <input class="form-control" type="text" placeholder="Full name" name="name">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
             </div>
            <input class="form-control" type="email" placeholder="Email address" name="email">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" type="password" placeholder="Create password" name="password">
        </div> <!-- form-group// -->                                   
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit"> Create Account  </button>
        </div> <!-- form-group// -->   
        <?php csrf_field(); ?>
        <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
    </form>
</article>
</div> <!-- card.// -->
