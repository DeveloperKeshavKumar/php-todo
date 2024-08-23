<?php require("partials/header.php") ?>
<?php require("partials/navbar.php") ?>
<?php require("partials/banner.php") ?>

<main>
   <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <form action="" method="post">
         <input type="hidden" name="_method" value="<?= ($button === "Delete") ? "DELETE" : (($button === "Update") ? "PATCH" : "POST") ?>">
         <label for="todo" class="font-semibold text-[18px]">Todo Here: </label>
         <div class="my-2">
            <textarea name="todo" id="todo" cols="30" rows="5" class="px-2 border border-blue-900 rounded-md" placeholder="Here is your note..."><?= $todo['todo'] ?? null ?></textarea>
         </div>
         <label for="status" class="font-semibold text-[18px]">Status of Todo:</label>
         <div class="mt-2 mb-4">
            <input type="radio" name="status" id="status" value="1" <?= $todo['status'] === 1 ? "checked" : null ?>>
            <p class="inline mr-3">Done</p>
            <input type="radio" name="status" id="status" value="0" <?= $todo['status'] === 0 ? "checked" : null ?>>
            <p class="inline">Not Done</p>
         </div>
         <button type="submit" class="bg-blue-900 px-4 py-3 rounded-lg border border-blue-900 text-white font-semibold hover:bg-white hover:text-blue-900"><?= $button ?></button>
      </form>
      <div class="mt-5">
         <?php if (count($errors) !== 0): ?>
            <span class="px-3 py-2 rounded-md border border-red-400 text-red-500 font-medium"><?= $errors['todo'] ?></span>
         <?php endif ?>
      </div>
   </div>
</main>
</div>

<?php require("partials/footer.php") ?>