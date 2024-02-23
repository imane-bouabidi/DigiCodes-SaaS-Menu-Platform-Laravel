creat
@extends('admin/layouts/admin_layout')

@section('content')
{{-- display msg errors --}}
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> {{ $error }}
    </li>
    @endforeach
</ul>
@endif
<a href="{{route('menu.update')}}"><button class="mainBg rounded-md w-full text-white flex justify-center items-center mt-4 px-4 py-1 transition-shadow box-border color-opacity-87 shadow-md shadow-blue-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
        <path d="M14 4l0 4l-6 0l0 -4" />
    </svg>update
</button></a>

<form action="{{ route('menu.store') }}" method="GET" class="h-full w-full p-4 flex flex-col md:flex-row justify-between gap-4">
    @csrf
    <div class="w-full p-4 bg-white rounded-sm transition-shadow box-border color-opacity-87   shadow-md backdrop-blur-md">
        <h3 class="mb-4 text-3xl font-semibold text-gray-500">Add new Menu</h3>
        <label for="title" class="flex flex-col gap-y-1 mt-8">
            Title
            <input type="text" id="title" name="title" class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600" placeholder="Enter title">
        </label>
        <label for="description" class="flex flex-col gap-y-1 mt-8">
            Description
            <textarea id="description" name="description" class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600 h-20" placeholder="Enter description"></textarea>
        </label>

    </div>

    <div class="basis-1/3">
        <div class="p-4 h-40 bg-white rounded-sm transition-shadow box-border color-opacity-87 shadow-md backdrop-blur-md">
            <h4 class="mb-4 text-3xl font-semibold text-gray-500">Publish</h4>
            <hr>
            <button type="submit" class="mainBg rounded-md w-full text-white flex justify-center items-center mt-4 px-4 py-1 transition-shadow box-border color-opacity-87 shadow-md shadow-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M14 4l0 4l-6 0l0 -4" />
                </svg>Save
            </button>
        </div>
    </div>
</form>
@endsection
