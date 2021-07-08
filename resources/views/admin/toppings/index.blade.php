@extends('admin.template')

@section('css')
@endsection

@section('content')
<div class="w-full px-4 mb-12">
    <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg">
        <div class="px-4 py-3 mb-0 border-0 rounded-t">
            <div class="flex flex-wrap items-center">
                <div class="relative flex justify-between flex-1 flex-grow w-full max-w-full px-4">
                    <h3 class="text-lg font-semibold text-blueGray-700">
                        toppings
                    </h3>
                    <a href="{{ route('admin.toppings.create') }}" class="px-4 py-2 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-pink-500 rounded shadow outline-none active:bg-pink-600 hover:shadow-md focus:outline-none">
                        Add
                    </a>
                </div>
            </div>
        </div>
        <div class="block w-full px-8 pt-2 pb-8 overflow-x-auto text-xs">
            <!-- Projects table -->
            <table class="items-center w-full bg-transparent border-collapse" id="schools-table">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            ID
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Name
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Description
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Price (IDR)
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Quota (MB)
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Active period
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Created at
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Updated at
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($toppings as $topping)
                    <tr>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->id}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->name}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->description}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->price}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->quota}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->active_period}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->created_at}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$topping->updated_at}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            <div class="flex p-2 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                <a href="{{ route('admin.toppings.show',$topping->id) }}" class="p-1 px-2 mx-1 text-xs text-white bg-green-500 rounded-md">Show</a>
                                <a href="{{ route('admin.toppings.edit',$topping->id) }}" class="p-1 px-2 mx-1 text-xs text-white bg-yellow-500 rounded-md">Edit</a>
                                <form action="{{ route('admin.toppings.destroy', $topping->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="Delete" class="p-1 px-2 mx-1 text-xs text-white bg-red-500 rounded-md cursor-pointer">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr class="mb-4 border-gray-200 border-b-1">
            {{$toppings->links()}}
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection