@if(count($notifications) > 0)
	@foreach($notifications as $notification)
		<li class="notification-item" data-url="{{ $notification->data['url'] }}">
		  <i class="bi bi-info-circle text-primary"></i>
		  <div>
		    <h4>{{ $notification->data['judul'] }}</h4>
		    <p>{{ $notification->data['message'] }}</p>
		    <p>{{ $notification->created_at->diffForHumans() }}</p>
		  </div>
		</li>
	@endforeach
@endif