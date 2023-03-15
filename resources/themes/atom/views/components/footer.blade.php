<footer
    class="w-full h-14 bg-gray-100 dark:bg-gray-900 mt-auto flex flex-col justify-center md:flex-row md:justify-center text-gray-400 items-center md:px-8 text-sm" onclick="showFooter()">
    <div class="md:font-semibold text-[12px] md:text-[14px] cursor-pointer hover:underline">
        &copy {{ date('Y') }} -
        {{ __(':hotel is a not for profit educational project', ['hotel' => setting('hotel_name')]) }}
    </div>
</footer>

<style>
    .swal2-html-container {
        max-height: 300px;
        overflow-y: scroll;
    }
</style>

<script>
    function showFooter() {
        const creator = '<a class="text-blue-400 underline" href="https://devbest.com/threads/atom-cms-a-multi-theme-cms.93034/" target="_blank">Object</a>';
        const creator2 = '<a class="text-blue-400 underline" href="https://habplus.org/profile/Tyler" target="_blank">Tyler</a>';
        const credits = [
            '<strong>All Contributors</strong> Helping bring Atom to life<br/>',
        ];
        const content = '{{ __('Thank you for playing :hotel. Our team has put a lot of effort into making the hotel what it is. We truly appreciate you for being here to reminisce the old times❤️', ['hotel' => setting('hotel_name')]) }}';
        const drivenBy = '{{ __(':hotel is driven by Atom CMS made by:', ['hotel' => setting('hotel_name')]) }}';
        const drivenBy2 = '{{ __('With further love from:', ['hotel' => setting('hotel_name')]) }}';

        Swal.fire(
            '<span class="text-[26px]">{{ setting('hotel_name') }}</span>',
            `<span class="text-sm">${content}<br/><br/>${drivenBy} ${creator}<br/><br>${drivenBy2} ${creator2}<br/><span class="flex flex-col space-y-2"></span></span>`,
            'question'
        )
    }
</script>
