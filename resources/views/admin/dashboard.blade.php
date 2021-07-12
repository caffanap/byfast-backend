@extends('admin.template')

@section('dashboard')
<div>
    <div class="flex flex-wrap">
        <div class="w-full px-4 lg:w-6/12 xl:w-4/12">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                            <h5 class="text-xs font-bold text-gray-400 uppercase">
                                Total Packet
                            </h5>
                            <span class="text-4xl font-semibold text-gray-700">
                                {{$packettotal}}
                            </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                            <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-red-500 rounded-full shadow-lg">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="mt-4 text-sm text-gray-400">
                        <span class="mr-2 text-emerald-500">
                            <i class="fas fa-arrow-up"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap">
                            Since last month
                        </span>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="w-full px-4 lg:w-6/12 xl:w-4/12">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                            <h5 class="text-xs font-bold text-gray-400 uppercase">
                                Total User
                            </h5>
                            <span class="text-4xl font-semibold text-gray-700">
                                {{$usertotal}}
                            </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                            <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-green-500 rounded-full shadow-lg">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="mt-4 text-sm text-gray-400">
                        <span class="mr-2 text-red-500">
                            <i class="fas fa-arrow-down"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last week </span>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="w-full px-4 lg:w-6/12 xl:w-4/12">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                            <h5 class="text-xs font-bold text-gray-400 uppercase">
                                Total Toping
                            </h5>
                            <span class="text-4xl font-semibold text-gray-700">
                                {{$toppingtotal}}
                            </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                            <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-pink-500 rounded-full shadow-lg">
                                <i class="fas fa-chart-area"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="mt-4 text-sm text-gray-400">
                        <span class="mr-2 text-orange-500">
                            <i class="fas fa-arrow-down"></i> 1.10%
                        </span>
                        <span class="whitespace-nowrap"> Since yesterday </span>
                    </p> -->
                </div>
            </div>
        </div>
        <!-- <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                            <h5 class="text-xs font-bold text-gray-400 uppercase">
                                Performance
                            </h5>
                            <span class="text-xl font-semibold text-gray-700">
                                49,65%
                            </span>
                        </div>
                        <div class="relative flex-initial w-auto pl-4">
                            <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-blue-500 rounded-full shadow-lg">
                                <i class="fas fa-percent"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-400">
                        <span class="mr-2 text-emerald-500">
                            <i class="fas fa-arrow-up"></i> 12%
                        </span>
                        <span class="whitespace-nowrap">
                            Since last month
                        </span>
                    </p>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection