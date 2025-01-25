<div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-5 categories">
  @foreach (__('categories') as $item)
    <a
        href="{{ url('letselschadetest/' . $item['id'] . '-' . $item['slug']) }}"
        class="btn-category{{ request()->path() === 'letselschadetest/' . $item['id'] . '-' . $item['slug'] ? ' active cursor-not-allowed' : '' }}"
    >
      <img src="{{ url('/assets/images/categories/' . $item['slug'] . '.jpg') }}" alt="{{ $item['name'] }}">
      <span class="name">
          {{ $item['name'] }}
      </span>
    </a>
  @endforeach
</div>