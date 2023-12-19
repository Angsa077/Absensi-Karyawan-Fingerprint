<nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <p
            class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
            Absensi Karyawan
        </p>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                            href="{{ route('dashboard') }}">
                            Absensi Karyawan
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button"
                            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                            onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    <input type="text" placeholder="Search"
                        class="border-0 px-3 py-2 h-12 border-solid border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal" />
                </div>
            </form>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route('dashboard') }}"
                        class="text-xs uppercase py-3 font-bold block hover:text-blue-500 {{ Request::routeIs('dashboard') ? 'text-blue-500' : 'text-blueGray-700' }}"">
                        <i class="fas fa-tv mr-2 text-sm text-blueGray-300"></i>
                        Dashboard
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('user.index') }}"
                        class="text-xs uppercase py-3 font-bold block hover:text-blue-500 
                        {{ Request::routeIs('user.index') || Request::routeIs('user.filtered') || Request::routeIs('user.create') || Request::routeIs('user.edit') ? 'text-blue-500' : 'text-blueGray-700' }}">
                        <i class="fas fa-user mr-2 text-sm opacity-75"></i>
                        User
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('absensi.index') }}"
                        class="text-xs uppercase py-3 font-bold block hover:text-blue-500  {{ Request::routeIs('absensi.index') || Request::routeIs('absensi.filtered') ? 'text-blue-500' : 'text-blueGray-700' }}">
                        <i class="fas fa-table mr-2 text-sm opacity-75"></i>
                        Absensi
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('welcome') }}"
                        class="text-xs uppercase py-3 font-bold block hover:text-blue-500">
                        <i class="fas fa-home mr-2 text-sm opacity-75"></i>
                        Home
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
