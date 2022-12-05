<div class="col-md-6 col-lg-3 mb-3">

<button type="button" class="btn-menu-expand btn btn-primary btn-block mb-2 d-lg-none" type="button" data-toggle="collapse" data-target="#navbarUserHome" aria-controls="navbarCollapse" aria-expanded="false">
		<i class="fa fa-bars mr-2"></i> {{trans('general.menu')}}
	</button>

	<div class="navbar-collapse collapse d-lg-block" id="navbarUserHome">

		<!-- Start Account -->
		<div class="card shadow-sm card-settings mb-3">
				<div class="list-group list-group-sm list-group-flush">

    <small class="text-muted px-4 pt-3 text-uppercase mb-1 font-weight-bold">{{ trans('general.account') }}</small>

					@if (auth()->user()->verified_id == 'yes')
					<a href="{{url('dashboard')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('dashboard')) active @endif">
							<div>
									<i class="bi bi-speedometer2 mr-2"></i>
									<span>{{trans('admin.dashboard')}}</span>
							</div>
							<div>
									<i class="feather icon-chevron-right"></i>
							</div>
					</a>
				@endif

				<a href="{{url(auth()->user()->username)}}" class="list-group-item list-group-item-action d-flex justify-content-between url-user">
						<div>
								<i class="feather icon-user mr-2"></i>
								<span>{{ auth()->user()->verified_id == 'yes' ? trans('general.my_page') : trans('users.my_profile') }}</span>
						</div>
						<div>
								<i class="feather icon-chevron-right"></i>
						</div>
				</a>

					<a href="{{url('settings/page')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('settings/page')) active @endif">
							<div>
									<i class="bi bi-pencil mr-2"></i>
									<span>{{ auth()->user()->verified_id == 'yes' ? trans('general.edit_my_page') : trans('users.edit_profile')}}</span>
							</div>
							<div>
									<i class="feather icon-chevron-right"></i>
							</div>
					</a>

					@if ($settings->disable_wallet == 'off')
						<a href="{{url('my/wallet')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/wallet')) active @endif">
								<div>
										<i class="iconmoon icon-Wallet mr-2"></i>
										<span>{{trans('general.wallet')}}</span>
								</div>
								<div>
										<i class="feather icon-chevron-right"></i>
								</div>
						</a>
					@endif

          @if ($settings->referral_system == 'on' || auth()->user()->referrals()->count() != 0)
  					<a href="{{url('my/referrals')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/referrals')) active @endif">
  							<div>
  									<i class="bi-person-plus mr-2"></i>
  									<span>{{trans('general.referrals')}}</span>
  							</div>
  							<div>
  									<i class="feather icon-chevron-right"></i>
  							</div>
  					</a>
  				@endif

				  @if ($settings->story_status && auth()->user()->verified_id == 'yes')
				  <a href="{{url('my/stories')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/stories')) active @endif">
						  <div>
								  <i class="bi-clock-history mr-2"></i>
								  <span>{{trans('general.my_stories')}}</span>
						  </div>
						  <div>
								  <i class="feather icon-chevron-right"></i>
						  </div>
				  </a>
			  @endif

					<a href="{{url('settings/verify/account')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('settings/verify/account')) active @endif">
							<div>
									<i class="@if (auth()->user()->verified_id == 'yes') feather icon-check-circle @else bi-star @endif mr-2"></i>
									<span>{{ auth()->user()->verified_id == 'yes' ? trans('general.verified_account') : trans('general.become_creator')}}</span>
							</div>
							<div>
									<i class="feather icon-chevron-right"></i>
							</div>
					</a>

				</div>
			</div><!-- End Account -->

			<!-- Start Subscription -->
			<div class="card shadow-sm card-settings mb-3">
					<div class="list-group list-group-sm list-group-flush">

			<small class="text-muted px-4 pt-3 text-uppercase mb-1 font-weight-bold">{{ trans('general.subscription') }}</small>

			@if (auth()->user()->verified_id == 'yes')
			<a href="{{url('settings/subscription')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('settings/subscription')) active @endif">
					<div>
							<i class="bi bi-cash-stack mr-2"></i>
							<span>{{trans('general.subscription_price')}}</span>
					</div>
					<div>
							<i class="feather icon-chevron-right"></i>
					</div>
			</a>
		@endif

			@if (auth()->user()->verified_id == 'yes')
			<a href="{{url('my/subscribers')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/subscribers')) active @endif">
					<div>
							<i class="feather icon-users mr-2"></i>
							<span>{{trans('users.my_subscribers')}}</span>
					</div>
					<div>
							<i class="feather icon-chevron-right"></i>
					</div>
			</a>
		@endif

			<a href="{{url('my/subscriptions')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/subscriptions')) active @endif">
					<div>
							<i class="feather icon-user-check mr-2"></i>
							<span>{{trans('users.my_subscriptions')}}</span>
					</div>
					<div>
							<i class="feather icon-chevron-right"></i>
					</div>
			</a>

		</div>
	</div><!-- End Subscription -->

	<!-- Start Privacy and security -->
	<div class="card shadow-sm card-settings mb-3">
			<div class="list-group list-group-sm list-group-flush">

	<small class="text-muted px-4 pt-3 text-uppercase mb-1 font-weight-bold">{{ trans('general.privacy_security') }}</small>

	<a href="{{url('privacy/security')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('privacy/security')) active @endif">
			<div>
					<i class="bi bi-shield-check mr-2"></i>
					<span>{{trans('general.privacy_security')}}</span>
			</div>
			<div>
					<i class="feather icon-chevron-right"></i>
			</div>
	</a>

	<a href="{{url('settings/password')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('settings/password')) active @endif">
			<div>
					<i class="iconmoon icon-Key mr-2"></i>
					<span>{{trans('auth.password')}}</span>
			</div>
			<div>
					<i class="feather icon-chevron-right"></i>
			</div>
	</a>

	@if (auth()->user()->verified_id == 'yes')
	<a href="{{url('block/countries')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('block/countries')) active @endif">
			<div>
					<i class="bi bi-eye-slash mr-2"></i>
					<span>{{trans('general.block_countries')}}</span>
			</div>
			<div>
					<i class="feather icon-chevron-right"></i>
			</div>
	</a>
@endif

<a href="{{url('settings/restrictions')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('settings/restrictions')) active @endif">
		<div>
				<i class="feather icon-slash mr-2"></i>
				<span>{{trans('general.restricted_users')}}</span>
		</div>
		<div>
				<i class="feather icon-chevron-right"></i>
		</div>
</a>

			</div>
		</div><!-- End Privacy and security -->

			<!-- Start Payments -->
			<div class="card shadow-sm card-settings mb-3">
					<div class="list-group list-group-sm list-group-flush">

	    <small class="text-muted px-4 pt-3 text-uppercase mb-1 font-weight-bold">{{ trans('general.payments') }}</small>

			<a href="{{url('my/payments')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/payments')) active @endif">
					<div>
							<i class="bi bi-receipt mr-2"></i>
							<span>{{trans('general.payments')}}</span>
					</div>
					<div>
							<i class="feather icon-chevron-right"></i>
					</div>
			</a>

			@if (auth()->user()->verified_id == 'yes')
			<a href="{{url('my/payments/received')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/payments/received')) active @endif">
					<div>
							<i class="bi bi-receipt mr-2"></i>
							<span>{{trans('general.payments_received')}}</span>
					</div>
					<div>
							<i class="feather icon-chevron-right"></i>
					</div>
			</a>
		@endif

			@if (Helper::showSectionMyCards())
				<a href="{{url('my/cards')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/cards')) active @endif">
						<div>
								<i class="feather icon-credit-card mr-2"></i>
								<span>{{trans('general.my_cards')}}</span>
						</div>
						<div>
								<i class="feather icon-chevron-right"></i>
						</div>
				</a>
				@endif

				@if (auth()->user()->verified_id == 'yes' || $settings->referral_system == 'on' || auth()->user()->balance != 0.00)
				<a href="{{url('settings/payout/method')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('settings/payout/method')) active @endif">
						<div>
								<i class="bi bi-credit-card mr-2"></i>
								<span>{{trans('users.payout_method')}}</span>
						</div>
						<div>
								<i class="feather icon-chevron-right"></i>
						</div>
				</a>

				<a href="{{url('settings/withdrawals')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('settings/withdrawals')) active @endif">
						<div>
								<i class="bi bi-arrow-left-right mr-2"></i>
								<span>{{trans('general.withdrawals')}}</span>
						</div>
						<div>
								<i class="feather icon-chevron-right"></i>
						</div>
				</a>
			@endif

					</div>
				</div><!-- End Payments -->

	@if ($settings->shop
			|| auth()->user()->sales()->count() != 0 && auth()->user()->verified_id == 'yes'
			|| auth()->user()->sales()->count() != 0 && auth()->user()->verified_id == 'yes'
			|| auth()->user()->purchasedItems()->count() != 0)
	<!-- Start Shop -->
	<div class="card shadow-sm card-settings">
			<div class="list-group list-group-sm list-group-flush">

				<small class="text-muted px-4 pt-3 text-uppercase mb-1 font-weight-bold">{{ trans('general.shop') }}</small>

					@if ($settings->shop && auth()->user()->verified_id == 'yes' || auth()->user()->sales()->count() != 0 && auth()->user()->verified_id == 'yes')
					<a href="{{url('my/sales')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/sales')) active @endif">
							<div>
									<i class="bi-cart2 mr-2"></i>
									<span class="mr-1">{{trans('general.sales')}}</span>

									@if (auth()->user()->sales()->whereDeliveryStatus('pending')->count() != 0)
										<span class="badge badge-warning">{{ auth()->user()->sales()->whereDeliveryStatus('pending')->count() }}</span>
									@endif
							</div>
							<div>
									<i class="feather icon-chevron-right"></i>
							</div>
					</a>
				@endif

				@if ($settings->shop && auth()->user()->verified_id == 'yes' || auth()->user()->products()->count() != 0 && auth()->user()->verified_id == 'yes')
				<a href="{{url('my/products')}}" class="list-group-item list-group-item-action d-flex justify-content-between">
						<div>
								<i class="bi-tag mr-2"></i>
								<span>{{trans('general.products')}}</span>
						</div>
						<div>
								<i class="feather icon-chevron-right"></i>
						</div>
				</a>
			@endif

					@if ($settings->shop || auth()->user()->purchasedItems()->count() != 0)
					<a href="{{url('my/purchased/items')}}" class="list-group-item list-group-item-action d-flex justify-content-between @if (request()->is('my/purchased/items')) active @endif">
							<div>
									<i class="bi-bag-check mr-2"></i>
									<span>{{trans('general.purchased_items')}}</span>
							</div>
							<div>
									<i class="feather icon-chevron-right"></i>
							</div>
					</a>
				@endif
			</div>
	</div><!-- End Shop -->
	@endif

	</div>
</div>
