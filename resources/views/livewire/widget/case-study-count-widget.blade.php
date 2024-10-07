<div class="mt-4 sm:mt-5 lg:mt-6">
    <div
    class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-3 "
  >
    <div
      class="relative flex flex-col overflow-hidden rounded-lg bg-white shadow-lg p-3.5"
    >
      <p class="text-sm uppercase text-dark">Total Case Studies</p>
      <div class="flex items-end justify-between space-x-2">
        <p class="mt-4 text-2xl font-medium text-dark">{{ $caseStudiesCount }}</p>
        <a
          href="{{ route('case-study.create') }}"
          class="border-b border-dotted border-current pb-0.5 text-xs font-medium text-dark outline-none transition-colors duration-300 line-clamp-1 hover:text-primary focus:text-primary"
          >Create new
        </a>
      </div>
      <div
        class="mask is-reuleaux-triangle absolute top-0 right-0 -m-3 h-16 w-16 bg-white/20"
      ></div>
    </div>
  </div>
</div>