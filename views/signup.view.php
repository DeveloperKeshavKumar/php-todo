<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/navbar.php") ?>

<main>
   <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col items-center gap-y-3">
      <!-- Your content -->
      <img class="h-12 w-12 rounded-full " src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <p class="text-blue-900 text-2xl font-bold "><?= $heading ?> Your Account</p>

      <form action="" method="post" class="mt-5 w-[50%] flex flex-col gap-y-1 font-semibold">
         <?php if (strtolower($heading) === "register"): ?>
            <label for='name'>Enter Name:</label><input type='name' name='name' id='name' placeholder='John Doe' value="<?= $_POST['name'] ?? "" ?>" class='p-2 rounded-sm border border-black-500'>
         <?php endif ?>
         <label for="email">Enter Email:
         </label>
         <input type="email" name="email" id="email" placeholder="abc@xyz" value="<?= $_POST['email'] ?? "" ?>" class="p-2 rounded-sm border border-black-500">
         <?php if (isset($errors['email'])): ?>
            <span class="px-3 py-2 rounded-md border border-red-400 text-red-500 font-medium"><?= $errors['email'] ?></span>
         <?php endif ?>
         <label for="password">
            <p>Enter Password:</p>
         </label>
         <input type="password" name="password" id="password" placeholder="Abc@123#" value="<?= $_POST['password'] ?? "" ?>" class="p-2 rounded-sm border border-black-500">
         <?php if (isset($errors['password'])): ?>
            <span class="px-3 py-2 rounded-md border border-red-400 text-red-500 font-medium"><?= $errors['password'] ?></span>
         <?php endif ?>
         <button type="submit" class="bg-blue-900 px-4 py-3 mt-2 rounded-lg border border-blue-900 text-white font-semibold hover:bg-white hover:text-blue-900"><?= $heading ?></button>
      </form>

      <?php if ($heading === "Login"): ?>
         <p>
            Do not have an Account?  
            <a href="/register" class="font-semibold text-black underline">Register</a>
         </p>
      <?php else: ?>
         <p>
            Already have an Account?  
            <a href="/login" class="font-semibold text-black underline">Login</a>
         </p>
      <?php endif ?>
   </div>
</main>
</div>

<?php require base_path("views/partials/footer.php") ?>