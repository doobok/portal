@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
          <div class="col-md-8">

            {{-- Заголовок та тизер --}}
            <div class="panel">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- form start -->
                <form role="form"
                        class="form-edit-add"
                        action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                        method="POST" enctype="multipart/form-data">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        Основна інформація
                        <span class="panel-desc"> Заголовок і тизер публікації</span>
                    </h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    @include('voyager::multilingual.input-hidden', [
                        '_field_name'  => 'title'
                    ])
                    <div class="form-group">
                      <label for="title">Заголовок</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ $dataTypeContent->title ?? '' }}">
                    </div>

                    {{-- slug --}}
                    <div class="form-group">
                      <small>Поле <b>slug</b> генерується автоматично</small>
                      <input type="text" class="form-control margin-top" id="slug" name="slug"
                        placeholder="slug"
                        {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "slug") !!}
                        value="{{ $dataTypeContent->slug ?? '' }}">
                    </div>

                    {{-- тизер --}}
                    <div class="form-group">
                      <label for="teaser">Тизер (вступний текст)</label>
                      <textarea class="form-control" name="teaser">{{ $dataTypeContent->teaser ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Основний текст --}}
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Основний текст</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>

                <div class="panel-body">
                    @include('voyager::multilingual.input-hidden', [
                        '_field_name'  => 'body'
                    ])
                    @php
                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                        $row = $dataTypeRows->where('field', 'body')->first();
                    @endphp
                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                </div>
            </div>

            <div class="panel panel-bordered">

                    <!-- PUT Method if we are editing -->
                    @if($edit)
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                    {{ csrf_field() }}

                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Adding / Editing -->
                        @php
                            $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            $exclude = ['title', 'body', 'teaser', 'slug', 'status', 'author_id', 'image', 'youtube', 'meta_desc', 'meta_title'];
                        @endphp

                        @foreach($dataTypeRows as $row)
                          @if(!in_array($row->field, $exclude))
                            <!-- GET THE DISPLAY OPTIONS -->
                            @php
                                $display_options = $row->details->display ?? NULL;
                                if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                    $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                }
                            @endphp
                            @if (isset($row->details->legend) && isset($row->details->legend->text))
                                <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                            @endif

                            <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                {{ $row->slugify }}
                                <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                @if (isset($row->details->view))
                                    @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add')])
                                @elseif ($row->type == 'relationship')
                                    @include('voyager::formfields.relationship', ['options' => $row->details])
                                @else
                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                @endif

                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                    {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                @endforeach
                                @if ($errors->has($row->field))
                                    @foreach ($errors->get($row->field) as $error)
                                        <span class="help-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                          @endif
                        @endforeach

                    </div><!-- panel-body -->




            </div>

          </div>

          <div class="col-md-4">
              <!-- ### DETAILS ### -->
              <div class="panel panel panel-bordered panel-warning">
                  <div class="panel-heading">
                      <h3 class="panel-title"><i class="icon wb-clipboard"></i> Деталі публікації</h3>
                      <div class="panel-actions">
                          <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                      </div>
                  </div>
                  <div class="panel-body">
                      <div class="form-group">
                          <label for="status">Статус публікації</label>
                          <select class="form-control" name="status">
                              <option value="DRAFT"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'DRAFT') selected="selected"@endif>чорновик</option>
                              <option value="PUBLISHED"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PUBLISHED') selected="selected"@endif>опубліковано</option>
                          </select>
                      </div>
                      {{-- <div class="form-group">
                          <label for="category_id">{{ __('voyager::post.category') }}</label>
                          <select class="form-control" name="category_id">
                              @foreach(Voyager::model('Category')::all() as $category)
                                  <option value="{{ $category->id }}"@if(isset($dataTypeContent->category_id) && $dataTypeContent->category_id == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div> --}}
                  </div>
              </div>

              <!-- ### IMAGE ### -->
              <div class="panel panel-bordered panel-primary">
                  <div class="panel-heading">
                      <h3 class="panel-title"><i class="icon wb-image"></i> Медіа вміст</h3>
                      <div class="panel-actions">
                          <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                      </div>
                  </div>
                  <div class="panel-body">
                      <div class="form-group">
                          <label for="meta_title">Головне зображення</label>
                          @if(isset($dataTypeContent->image))
                              <img src="{{ filter_var($dataTypeContent->image, FILTER_VALIDATE_URL) ? $dataTypeContent->image : Voyager::image( $dataTypeContent->image ) }}" style="width:100%" />
                          @endif
                          <input type="file" name="image">
                      </div>



                      <div class="form-group">
                        <label for="youtube">Youtube <small>ідентифікатор відео</small></label>
                          @if(isset($dataTypeContent->youtube))
                              <iframe width="100%" height="315" src="{{ 'https://www.youtube.com/embed/' . $dataTypeContent->youtube . '?controls=0' }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          @endif
                          <input type="text" class="form-control" name="youtube" placeholder="Video id" value="{{ $dataTypeContent->youtube ?? '' }}">
                      </div>
                  </div>
              </div>

              <!-- ### SEO CONTENT ### -->
              <div class="panel panel-bordered panel-info">
                  <div class="panel-heading">
                      <h3 class="panel-title"><i class="icon wb-search"></i> СЕО вміст</h3>
                      <div class="panel-actions">
                          <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                      </div>
                  </div>
                  <div class="panel-body">
                      <div class="form-group">
                          <label for="meta_title">Мета Заголовок</label>
                          @include('voyager::multilingual.input-hidden', [
                              '_field_name'  => 'meta_title'
                          ])
                          <input type="text" class="form-control" name="meta_title" placeholder="Мета Заголовок" value="{{ $dataTypeContent->meta_title ?? '' }}">
                      </div>
                      <div class="form-group">
                          <label for="meta_desc">Мета Опис</label>
                          @include('voyager::multilingual.input-hidden', [
                              '_field_name'  => 'meta_desc'
                          ])
                          <textarea class="form-control" name="meta_desc">{{ $dataTypeContent->meta_desc ?? '' }}</textarea>
                      </div>
                  </div>

                  <div class="panel-footer" style="position: fixed; right: 50px; bottom: 50px; z-index: 999; opacity: 0.7;">
                      @section('submit-buttons')
                          <button type="submit" class="btn btn-primary save">
                          @if(isset($dataTypeContent->id)){{ __('voyager::post.update') }}@else <i class="icon wb-plus-circle"></i> {{ __('voyager::post.new') }} @endif
                          </button>
                      @stop
                      @yield('submit-buttons')
                  </div>

                </form>

                <iframe id="form_target" name="form_target" style="display:none"></iframe>
                <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                        enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                    <input name="image" id="upload_file" type="file"
                             onchange="$('#my_form').submit();this.value='';">
                    <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    {{ csrf_field() }}
                </form>
              </div>
          </div>

        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>


    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
