<!-- Notifications: style can be found in dropdown.less -->
@if (count(auth()->user()->notifications) > 0)
  <li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-bell-o"></i>
      <span class="label label-warning">{{ count(auth()->user()->notifications) }}</span>
    </a>
    <ul class="dropdown-menu">
      <li class="header">{{ __('You have') }} {{ count(auth()->user()->notifications) }} {{ __('notifications') }}</li>
      <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
          @foreach (auth()->user()->notifications as $notification)
            <li>
              @if ($notification->type == 'App\Notifications\PasswordReset')
                <a href="#" style="cursor: initial">
                  <i class="fa fa-unlock text-aqua"></i>{{ __('Your password has been reset!') }}
                  <span class="pull-right">
                    {{ $notification->created_at->format('h:i') }}
                  </span>
                </a>
              @endif
            </li>
            @php
               $notification->markAsRead();

               if ($notification->read_at < \Carbon\Carbon::now()->addMinutes(-15)) {
                  $notification->delete();
               }
            @endphp
          @endforeach
        </ul>
      </li>
      {{-- <li class="footer"><a href="#">View all</a></li> --}}
    </ul>
  </li>
@endif

