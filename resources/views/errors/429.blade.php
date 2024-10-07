<x-base-layout title="429 - Too Many Requests">
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
              x-show="!$store.global.isDarkModeEnabled"
              src="images/illustrations/error-429.svg"
              alt="image"
            />
            <img
              class="w-full"
              x-show="$store.global.isDarkModeEnabled"
              src="images/illustrations/error-429-dark.svg"
              alt="image"
            />
          </div>
          <p class="pt-4 text-7xl font-bold text-primary dark:text-accent">
            429
          </p>
          <p
            class="pt-4 text-xl font-semibold text-slate-800 dark:text-navy-50"
          >
            Too many requests
          </p>
          <p class="pt-2 text-slate-500 dark:text-navy-200">
            The user has send too many requests in a given amount of time.
            Intended for use with rate limiting schemas
          </p>
        </div>
      </main>
    </div>
</x-base-layout>