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
                        banners
                    </h3>
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
                            Title
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Description
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Image
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
                    @foreach($banners as $banner)
                    <tr>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$banner->id}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$banner->title}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$banner->description}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            <img src="{{Storage::url($banner->image)}}" alt="" width="200px" srcset="">
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$banner->created_at}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{$banner->updated_at}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            <div class="flex p-2 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                <a href="{{ route('admin.banners.edit',$banner->id) }}" class="p-1 px-2 mx-1 text-xs text-white bg-yellow-500 rounded-md">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr class="mb-4 border-gray-200 border-b-1">
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection