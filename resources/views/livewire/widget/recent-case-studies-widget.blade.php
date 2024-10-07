
<div>
@foreach($caseStudies as $caseStudy)
    <div class="flex flex-col">
        <img
        class="h-44 w-full rounded-2xl object-cover object-center"
        src="{{ $caseStudy->photo }}"
        alt="{{ $caseStudy->title }}"
        />
        <div class="card -mt-8 grow rounded-2xl p-4">
        <div>
            <a
            href="{{ route('case-study.edit', $caseStudy->id) }}"
            class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
            >{{ $caseStudy->name }}</a
            >
        </div>
        <p class="mt-2 grow line-clamp-3">
            {{ \Str::limit(strip_tags($caseStudy->content), 150) }}
        </p>
        <div class="mt-4 flex items-center justify-between">
            
            <p
            class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300"
            >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                />
            </svg>
            <span class="text-xs">{{ $caseStudy->created_at->format('d M, Y') }}</span>
            </p>
        </div>
        </div>
    </div>
    @endforeach
</div>