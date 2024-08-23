<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/navbar.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<div class="w-[60%] mx-auto mt-4">
   <ul>
      <?php foreach ($todos as $todo): ?>
         <li class="list-disc font-medium"> <?= $todo['todo'] ?> <?= $todo['status']===1 ?"✅":"❌"?></li>
         <div class="my-5 flex gap-x-3">
            <a href="todo/edit?id=<?= $todo['id'] ?>" class="bg-yellow-500 p-1 rounded-lg border border-yellow-500 text-white font-semibold hover:bg-white hover:text-yellow-500">Update</a>
            <a href="todo/delete?id=<?= $todo['id'] ?>" class="w-[65px] text-center bg-red-500 p-1 rounded-lg border border-red-500 text-white font-semibold hover:bg-white hover:text-red-500">Delete</a>
         </div>
      <?php endforeach ?>
   </ul>
   <a href="/todos/create" class="bg-blue-900 px-4 py-3 rounded-lg border border-blue-900 text-white font-semibold hover:bg-white hover:text-blue-900">Create</a>

</div>
<?php require base_path("views/partials/footer.php") ?>