@extends('layouts.app')

@section('title') {{trans('general.my_posts')}} -@endsection

@section('content')
<section class="section section-sm">
    <div class="container">
      <div class="row justify-content-center text-center mb-sm">
        <div class="col-lg-8 py-5">
          <h2 class="mb-0 font-montserrat"><i class="feather icon-feather mr-2"></i> {{trans('general.my_posts')}}</h2>
          <p class="lead text-muted mt-0">{{trans('general.all_post_created')}}</p>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12 mb-5 mb-lg-0">

          @if ($posts->count() != 0)
          <div class="card shadow-sm mb-2">
          <div class="table-responsive">
            <table class="table table-striped m-0">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">{{trans('admin.content')}}</th>
                  <th scope="col">{{trans('admin.description')}}</th>
                  <th scope="col">{{trans('admin.type')}}</th>
                  <th scope="col">{{trans('general.price')}}</th>
                  <th scope="col">{{trans('general.interactions')}}</th>
                  <th scope="col">{{trans('admin.date')}}</th>
                  <th scope="col">{{trans('admin.status')}}</th>
                </tr>
              </thead>

              <tbody>

                @foreach ($posts as $post)

                  @php
                    $allFiles = $post->media()->groupBy('type')->get();
                  @endphp
                  <tr>
                    <td>{{ $post->id }}</td>

                    <td>
                      @if ($allFiles->count() != 0)
                        @foreach ($allFiles as $media)

                          @if ($media->type == 'image')
                            <i class="feather icon-image mr-1"></i>
                          @endif

                          @if ($media->type == 'video')
                            <i class="feather icon-video mr-1"></i>
                          @endif

                          @if ($media->type == 'music')
                            <i class="feather icon-mic mr-1"></i>
                            @endif

                            @if ($media->type == 'file')
                          <i class="far fa-file-archive"></i>
                          @endif

                        @endforeach

                      @else
                        <i class="bi bi-file-font"></i>
                      @endif
                    </td>

                    <td>
                    <a href="{{ url($post->user()->username, 'post').'/'.$post->id }}" target="_blank">
                      {{ str_limit($post->description, 20, '...') }} <i class="bi bi-box-arrow-up-right ml-1"></i>
                    </a>
                    </td>
                    <td>
                      @if ($post->locked == 'yes')
                        <i class="feather icon-lock mr-1" title="{{trans('users.content_locked')}}"></i>
                      @else
                        <i class="iconmoon icon-WorldWide mr-1" title="{{trans('general.public')}}"></i>
                      @endif
                    </td>
                    <td>{{ Helper::amountFormatDecimal($post->price) }}</td>
                    <td>
                      <i class="far fa-heart"></i> {{ $post->likes()->count() }} 
                      <i class="far fa-comment ml-1"></i> {{ $post->totalComments() }}
                      <i class="feather icon-bookmark ml-1"></i> {{ $post->bookmarks()->count() }}
                    </td>
                    <td>{{Helper::formatDate($post->date)}}</td>
                    <td>
                      @if ($post->status == 'active')
                        <span class="badge badge-pill badge-success text-uppercase">{{trans('general.active')}}</span>
                      @else
                        <span class="badge badge-pill badge-warning text-uppercase">{{trans('general.pending')}}</span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div><!-- card -->

          @if ($posts->hasPages())
  			    	{{ $posts->onEachSide(0)->links() }}
  			    	@endif

        @else
          <div class="my-5 text-center">
            <span class="btn-block mb-3">
              <i class="feather icon-feather ico-no-result"></i>
            </span>
            <h4 class="font-weight-light">{{trans('general.not_post_created')}}</h4>
          </div>
        @endif
        </div><!-- end col-md-6 -->

      </div>
    </div>
  </section>
@endsection
