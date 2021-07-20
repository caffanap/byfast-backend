@extends('admin.template')
@section('css')

@endsection

@section('content')
<div class="w-full px-4 lg:w-8/12">
    <div class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
        <div class="px-6 py-6 mb-0 bg-white rounded-t">
            <div class="flex justify-between text-center">
                <h6 class="text-xl font-bold text-blueGray-700">
                    Add
                </h6>
            </div>
        </div>
        <div class="flex-auto px-4 pb-10 bg-white lg:px-10">
            <form action="{{ route('admin.credits.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap">
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="relative w-full mb-3">
                            <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                                Phone number
                            </label>
                            <input name="phone_number" type="text" class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring" value="{{ old('phone_number') }}" placeholder="phone_number" />
                            @error('phone_number')
                            <small class="text-pink-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="relative w-full mb-3">
                            <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                                Balance
                            </label>
                            <input name="balance" type="text" class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring" value="{{ old('balance') }}" placeholder="balance" />
                            @error('balance')
                            <small class="text-pink-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="relative w-full mb-3">
                            <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                                Point
                            </label>
                            <input name="point" type="text" class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring" value="{{ old('point') }}" placeholder="point" />
                            @error('point')
                            <small class="text-pink-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="px-4 py-2 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-pink-500 rounded shadow outline-none active:bg-pink-600 hover:shadow-md focus:outline-none" type="submit">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection