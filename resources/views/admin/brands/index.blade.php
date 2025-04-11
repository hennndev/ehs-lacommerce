<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="p-10">
    <div class="flex items-center justify-between mb-5">
      <x-admin-search-input>
        <x-slot:placeholder>
          brand
        </x-slot:placeholder>
      </x-admin-search-input>
      <a href="{{ route("brands.add") }}" class="border-none outline-none bg-blue-500 p-3 rounded-md cursor-pointer text-white hover:bg-blue-600 duration-200">Add new brand</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left">
        <thead class="text-sm text-[#222]">
          <tr class="border-b border-gray-200 bg-[#222] text-white">
            <th scope="col" class="px-6 py-3 font-bold">
              No
            </th>
            <th scope="col" class="px-6 py-3 font-bold">
              Name
            </th>
            <th scope="col" class="px-6 py-3 font-bold">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $index => $brand)
            <tr class="border-b border-gray-200 text-[#222]">
              <td class="px-6 py-4">
                {{ $index + 1 }}
              </td>
              <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                {{ $brand["name"] }}
              </th>
              <td class="px-6 py-4">
                <a href="{{ route("brands.edit", $brand["id"]) }}" class="text-blue-500 border-none outline-none cursor-pointer text-sm mr-2 font-semibold">
                  Edit
                </a>
                <button class="btn-delete text-red-500 border-none outline-none cursor-pointer text-sm font-semibold" data-id="{{ $brand["id"] }}">
                  Delete
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
</x-admin-layout>


@if (session('success'))
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      toastr.success("{{ session('success') }}");
    });
  </script>
@endif



<script>
  $(document).ready(function () {
    $(".btn-delete").click(function (e) { 
      e.preventDefault();
      const id = $(this).data("id");

      $.ajax({
        type: "delete",
        url: `/admin/brands/${id}`,
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          $(this).closest("tr").remove();
          toastr.success("B rand has deleted");
        }.bind(this),
        error: function() {
          toastr.error("Brand has failed deleted");
        }
      });
    });
  });
</script>












