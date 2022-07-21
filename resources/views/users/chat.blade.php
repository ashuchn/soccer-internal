@extends('users.layout.app')
@section('content')

<div class="content-wrapper">

    @if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{Session('status')}}
    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button> -->
    </div>
	@endif

    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                 <div class="col-md-6  justify-content-center">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">Users</div>
                            </div>
                        </div> 
                        <div class="card-body">
                            @foreach($data as $rows)
                                    <a href="{{ route('chat-window', ['userId' => $rows->id]) }}">{{ $rows->name }}</a><span class="badge badge-primary">{{ $rows->status }}</span>
                                @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6  justify-content-center" style="display:<?php echo $display ?>">

                    <div class="card" style="overflow:scroll; height:400px;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col"><b>Start Chatting  </b></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <label for="">Enter Message</label>
                            
                            <form id="sendMessage">
                                <input type="hidden" name="senderId" id="senderId" value="{{ session('chatUserId') }}">
                                <input type="hidden" name="receiverId" id="receiverId" value="{{ $receiverId }}">
                                <input type="text" name="message" id="message" required class="form-control mb-2">
                                <input type="submit" class="btn btn-success" value="Send">
                            </form>
                            <hr>
                            <div id="messgs">
                                @foreach($chat as $data)
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-primary"><?php if($data->sender_id == session('chatUserId')) { echo 'You:'; } else { $name = DB::table('chat_users')->where('id', $data->receiver_id)->pluck('name'); echo "<b>".$name[0]."</b>: "; } ?> {{$data->message  .' &'. session('chatUserId') }}</p>
                                        </div>
                                        <div class="col">
                                            <span class="text-right text-danger">{{"  time: ".$data->time}}</span>
                                        </div>                                       
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    
                </div> 
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $('#sendMessage').on('submit', function(e) {
       e.preventDefault(); 
       var senderId = $('#senderId').val();
       var receiverId = $('#receiverId').val();
       var message = $('#message').val();


       $.ajax({
           type: "POST",
           url: "{{route('send-message') }}",
           headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           data: {senderId:senderId, message:message, receiverId:receiverId},
           success: function( msg ) {
            $('#message').val('');
            console.log(msg);
                $("#messgs").prepend("<p class='text-primary'>You: "+ msg.message + "</p>");
           }
       });
   });
</script>



@endsection