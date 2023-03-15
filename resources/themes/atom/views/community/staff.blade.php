<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <div class="flex flex-col gap-y-4">
            @foreach($employees as $employee)
                <x-content.staff-content-section :badge="$employee->badge" :color="$employee->staff_color">
                    <x-slot:title>
                        {{ $employee->rank_name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $employee->job_description }}
                    </x-slot:under-title>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($employee->users as $staff)
                            <x-community.staff-card :user="$staff"/>
                        @endforeach
                    </div>

                    @if(count($employee->users) === 0)
                        <div class="text-center dark:text-gray-400">
                            {{ __('We currently have no staff in this position') }}
                        </div>
                    @endif
                </x-content.staff-content-section>
            @endforeach
        </div>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __(':hotel Staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('About our Team', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-4">
                <p>
                    {{ __('The :hotel Staff team is one big happy family, and the majority of the staff members have been a team since 2016.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {{ __('Most of the team members on this page are people that have been around :hotel for an extended period of time. However, this does not mean we only recruit old and known members around our community, we love adding value to our team!', ['hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-section>

        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Apply for Staff') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('How do I join the team?', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-4">
                <p>
                    {{ __('Every now and then, we will open up staff applications. Once they open, we always make sure to post a news article explaining the process. We look through our applications thoroughly and our team collectively decides who gets to join the :hotel family.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {!! __('You can occasionally also look at the :startTag Staff Applications:endTag page which will show you all of our current open positions.', ['startTag' => '<a href="/community/staff-applications" class="underline">', 'endTag' => "</a>"]) !!}
                </p>
            </div>
        </x-content.content-section>
    </div>
</x-app-layout>
