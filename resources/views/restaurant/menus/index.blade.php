@extends('resturant/layouts/resturant_layout')

@section('content')

<div class="flex-auto block py-8 pt-6 px-9">
    <div class="overflow-x-auto">
      <table class="w-full my-0 align-middle text-dark border-neutral-200">
        <thead class="align-bottom bg-gray-200 p-8">
          <tr class="font-semibold text-[0.95rem] text-secondary-dark p-4">
            <th class="p-4 text-start">Title</th>
            <th class="p-4 text-start ">Description</th>

            <th class="p-4 text-start ">Actions</th>
          </tr>
        </thead>
        <tbody>


          @forelse ($menus as $menu)
          <tr class="border-b border-dashed last:border-b-0">
              <td class="p-3 pl-0">
                <div class="flex items-center">

                  <div class="flex flex-col justify-start">
                    <a href="javascript:void(0)" class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary">
                     {{ $menu['title']}}
                      </a>
                  </div>
                </div>
              </td>
              <td class="p-3 pr-0 text-start">
                <span class="font-semibold text-light-inverse text-md/normal"> {{ $menu['description']}}$</span>
              </td>

              <td class="p-3 pr-12 text-start">
                <form method="POST" action="" class="cursor-pointer text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none text-primary bg-primary-light rounded-lg text-red-500">
                  @csrf()
                  @method('delete')
                  <input value="delete" type="submit">

              </form>
              </td>

              </td>
            </tr>

            @empty
            <tr>
                <td colspan="6" class="text-center py-4">
                    No data available
                </td>
            </tr>
          @endforelse

        </tbody>
      </table>
    </div>
  </div>
@endsection
