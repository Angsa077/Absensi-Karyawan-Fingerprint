<div class="relative md:ml-64 bg-blueGray-50">
    <div class="relative bg-blue-500 md:pt-16 pb-16 pt-8">
        <div class="px-4 md:px-10 mx-auto w-full">
            @if (Request::routeIs('dashboard'))
                @yield('dashboard')
            @endif
        </div>
    </div>

    <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full overflow-x-auto mb-6 shadow-lg rounded bg-white">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
</div>