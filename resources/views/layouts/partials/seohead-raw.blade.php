@slot('title') @isset ($page->meta_title) {{$page->meta_title}}  @else  {{$page->title}}  @endisset  @endslot
@slot('description') @isset ($page->meta_desc) {{$page->meta_desc}}  @else  {{$page->teaser}}  @endisset  @endslot
@slot('image') {{$page->image}} @endslot
@slot('date') {{$page->created_at}} @endslot
