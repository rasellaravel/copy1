 <div id="sidebar" class="users p-chat-user showChat">
    <div class="had-container">
        <div class="card card_main p-fixed users-main">
            <div class="user-box">
                <div class="card-block">
                    <div class="right-icon-control">
                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                        <div class="form-icon">
                            <i class="icofont icofont-search"></i>
                        </div>
                    </div>
                </div>
                <div class="main-friend-list">
                   <!--  <div class="media userlist-box" data-id="6" data-status="offline" data-username="Michael Scofield" data-toggle="tooltip" data-placement="left" title="Michael Scofield">
                        <a class="media-left" href="#!">
                            <img class="media-object img-circle" src="{{--asset('admin-assets/assets/images/avatar-3.png')--}}" alt="Generic placeholder image">
                            <div class="live-status bg-danger"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Michael Scofield</div>
                        </div>
                    </div> -->

                    
                    <?php 
                    if (Auth::user()->role == 1) { 
                        $admins = App\Admin::where('admins.role', 2)->get();
                    }else if(Auth::user()->role == 2){
                        $admins = App\Admin::whereIn('admins.role', [1,3])->get();
                    }else{
                        $admins = App\Admin::where('admins.role', 2)->get();

                    }
                    ?>
                    @foreach($admins as $admin)
                    <div class="media userlist-box" onclick="goToChat(<?= $admin->id?>)" data-id="{{$admin->id}}" data-status="online" data-username="{{$admin->name}}" data-toggle="tooltip" data-placement="left" title="{{$admin->name}}">
                        <a class="media-left" href="javascript:void(0)">
                            <img class="media-object img-circle" src="{{asset('admin-assets/assets/images/avatar-1.png')}}" alt="Generic placeholder image">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">{{$admin->name}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- inner chat area  -->
<div class="showChat_inner">
  <div class="media chat-inner-header">
    <a class="back_chatBox">
        <i class="icofont icofont-rounded-left"></i> <span class="trget-name"></span>
    </a>
</div>
<div class="message-area">
    <div class="receive-txt">

    </div>
    <div class="send-content">

    </div>
</div>
<div class="chat-reply-box p-b-20">
    <div class="right-icon-control">
        <input type="text" class="targetedid" hidden="">
        <input type="text" name="txtmessage" id="chatMessage" class="form-control search-text" placeholder="Share Your Thoughts">
        <button id="myBtn" hidden="" onclick="sendMessage()">Button</button>
        <div class="form-icon">
            <i class="icofont icofont-paper-plane"></i>
        </div>
    </div>
</div>
</div>

<!-- inner chat area  -->

<script>

    var input = document.getElementById("chatMessage");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("myBtn").click();
    }
}); 
    function goToChat(id) {
        $.ajax({
            url: "{{url('admin/get-targeted-admin')}}",
            type: 'post',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), 
                id: id
            },
            success: function(response) {
                $('.trget-name').html(response.name);
                $('.targetedid').val(response.id);

                $.ajax({
                    url: "{{url('admin/get-chat-history')}}",
                    type: 'post',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), 
                        id: id
                    },
                    success: function(response) {
                        // console.log(response);
                        $('.receive-txt').html(response);
                    }
                });
            }
        });
    }

    function sendMessage(){
        var receiver = $('.targetedid').val();
        var message  = $('#chatMessage').val();
        $.ajax({
            url: "{{url('admin/send-message')}}",
            type: 'post',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), 
                receiver: receiver,
                message: message
            },
            success: function(response) {
                // console.log(response);
                $('.send-content').html(response);
                $('input[name=txtmessage').val('');
                // $("#chatMessage")[0].reset();
                // $('#idedit').val(response.id);
            }
        });
    }
</script>