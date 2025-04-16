

<section class="flex items-center space-x-4">
  <form action="{{ url()->current() }}" method="GET" class="border border-gray-200 rounded-md w-[450px] flex items-center px-4">
    <img src="{{ asset("assets/icons/search.svg") }}" alt="svg" class="w-7 h-7 mr-2">
    <input 
      type="text" 
      name="q"
      placeholder="Search {{ $placeholder }}" 
      value="{{ request('q') }}"
      class="flex-1 py-3 outline-none border-none focus:ring-0 text-base text-[#222]">
  </form>
  @if (request("q"))
    <button type="button" class="btn-reset bg-red-500 py-3 px-5 text-white cursor-pointer rounded-md hover:bg-red-600">Reset</button>
  @endif
</section>

@push('scripts')
  <script>
    $(document).ready(function () {
      $(".btn-reset").click(function (e) { 
        const cleanUrl = window.location.origin + window.location.pathname;
        window.history.pushState({}, '', cleanUrl);
        location.reload(); 
      });
    });
  </script>
@endpush
