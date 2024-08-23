<nav class="bg-gray-800">
   <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
         <div class="flex items-center">
         <div class=" hidden md:block">
               <div class="ml-10 flex items-baseline space-x-4">
                  <?php if ($_SESSION['user']??false): ?>
                     <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80 " alt="Your Company">
                     <?php else: ?>
                        <a href="/login" class="text-bold text-white ">Login</a>
                  <?php endif ?>
               </div>
            </div>
            <div class="hidden md:block">
               <div class="ml-10 flex items-baseline space-x-4">
                  <a href="/" class="<?= setActiveClass("/") ?> rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                  <a href="/todos" class="<?= setActiveClass("/todos") ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Todos</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</nav>