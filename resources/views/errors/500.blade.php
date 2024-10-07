<x-base-layout title="500 - Internal Server Error">
    <!-- Page Wrapper -->
    <div
      id="root"
      class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
      x-cloak
    >
      <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="max-w-md p-6 text-center">
          <div class="w-full">
            <img
              class="w-full"
              src="images/illustrations/error-500.svg"
              alt="image"
            />
          </div>
          <p class="pt-4 text-7xl font-bold text-primary dark:text-accent">
            500
          </p>
          <p
            class="pt-4 text-xl font-semibold text-slate-800 dark:text-navy-50"
          >
            Internal Server Error
          </p>
          <p class="pt-2 text-slate-500 dark:text-navy-200">
            The server has been deserted for a while. Please be patient or try
            again later
          </p>
        </div>
      </main>
    </div>
</x-base-layout>