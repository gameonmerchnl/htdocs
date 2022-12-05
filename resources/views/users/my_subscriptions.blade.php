@extends('layouts.app')

@section('title') {{trans('users.my_subscriptions')}} -@endsection

@section('content')
<section class="section section-sm">
    <div class="container">
      <div class="row justify-content-center text-center mb-sm">
        <div class="col-lg-8 py-5">
          <h2 class="mb-0 font-montserrat"><i class="feather icon-user-check mr-2"></i> {{trans('users.my_subscriptions')}}</h2>
          <p class="lead text-muted mt-0">{{trans('users.my_subscriptions_subtitle')}}</p>
        </div>
      </div>
      <div class="row">

        @include('includes.cards-settings')

        <div class="col-md-6 col-lg-9 mb-5 mb-lg-0">

          @if ($subscriptions->count() != 0)

            @if (session('message'))
            <div class="alert alert-success mb-3">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
              </button>
              <i class="fa fa-check mr-1"></i> {{ session('message') }}
            </div>
            @endif

            @if (session('error_message'))
            <div class="alert alert-danger mb-3">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="far fa-times-circle"></i></span>
              </button>
              <i class="fa fa-check mr-1"></i> {{ session('error_message') }}
            </div>
            @endif

          <div class="card shadow-sm">
          <div class="table-responsive">
            <table class="table table-striped m-0">
              <thead>
                <tr>
                  <th scope="col">{{trans('users.subscribed')}}</th>
                  <th scope="col">{{trans('admin.date')}}</th>
                  <th scope="col">{{trans('general.interval')}}</th>
                  <th scope="col">{{ trans('admin.ends_at') }}</th>
                  <th scope="col">{{trans('admin.status')}}</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($subscriptions as $subscription)
                  <tr>
                    <td>
                      @if (! isset($subscription->subscribed()->username))
                        {{ trans('general.no_available') }}
                      @else
                      <a href="{{url($subscription->subscribed()->username)}}">
                        <img src="{{Helper::getFile(config('path.avatar').$subscription->subscribed()->avatar)}}" width="40" height="40" class="rounded-circle mr-2">
                        {{$subscription->subscribed()->hide_name == 'yes' ? $subscription->subscribed()->username : $subscription->subscribed()->name}}
                      </a>
                    @endif
                      </td>
                    <td>{{Helper::formatDate($subscription->created_at)}}</td>
                    <td>{{ $subscription->free == 'yes'? trans('general.not_applicable') : trans('general.'.$subscription->interval)}}</td>
                    <td>
                      @if ($subscription->ends_at)
                      {{Helper::formatDate($subscription->ends_at)}}
                    @elseif ($subscription->free == 'yes')
                      {{ __('general.free_subscription') }}
                    @else
                      {{Helper::formatDate(auth()->user()->subscription('main', $subscription->stripe_price)->asStripeSubscription()->current_period_end, true)}}
                    @endif
                    </td>
                    <td>
                      @if ($subscription->stripe_id == ''
                        && strtotime($subscription->ends_at) > strtotime(now()->format('Y-m-d H:i:s'))
                        && $subscription->cancelled == 'no'
                          || $subscription->stripe_id != '' && $subscription->stripe_status == 'active'
                          || $subscription->stripe_id == '' && $subscription->free == 'yes'
                        )
                        <span class="badge badge-pill badge-success text-uppercase">{{trans('general.active')}}</span> <br>

                      @elseif ($subscription->stripe_id != '' && $subscription->stripe_status == 'incomplete')
                        <span class="badge badge-pill badge-warning text-uppercase">{{trans('general.incomplete')}}</span> <br>

                          <a class="badge badge-pill badge-success text-uppercase" href="{{ route('cashier.payment', $subscription->last_payment) }}">
                            {{trans('general.confirm_payment')}}
                          </a>

                      @else
                        <span class="badge badge-pill badge-danger text-uppercase">{{trans('general.cancelled')}}</span>
                      @endif
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          </div><!-- card -->

          @if ($subscriptions->hasPages())
  			    	{{ $subscriptions->links() }}
  			    	@endif

        @else
          <div class="my-5 text-center">
            <span class="btn-block mb-3">
              <i class="feather icon-user-check ico-no-result"></i>
            </span>
            <h4 class="font-weight-light">{{trans('users.not_subscribed')}} <a href="{{url('creators')}}" class="font-weight-900 link-border">{{trans('general.explore_creators')}}</a></h4>
          </div>
        @endif

        </div><!-- end col-md-6 -->

      </div>
    </div>
  </section>
@endsection
