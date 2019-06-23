<div class="panel panel-primary chat">
    <div class="panel-heading">
    <i class="fa fa-user" aria-hidden="true"></i> 
    {{ session('name') }}
    </div>
    <div class="box-chat">
        <div class="user">
            <span class="message">alo</span>
            <br>
            <span class="author-message"><b>Manager</b></span>
        </div>
    </div>
    <div class="panel-footer clearfix">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control message-content" placeholder="Type your message">
                <input type="hidden" class="room-id" value="1">
                <input type="hidden" class="user-id" value="{{ session('id') }}">
                    <div class="input-group-addon">
                    <a id="interview-message-send">
                        Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@section ('script')
<script type="text/javascript">
    // CSRF bảo mật, nếu bạn nào chưa biết đọc tài liệu larave
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var boxChat = $('.box-chat');
        //Thanh scroll luôn kéo xuống dưới cùng để hiện nội dụng mới nhất
        boxChat[0].scrollTop = boxChat[0].scrollHeight;
        
        $('#interview-message-send').click(function(event) {
            var msgContent = $('.message-content').val();
            $.post('message', 
                {
                    msgContent: msgContent
                }, 
                function(data) {
                
            });
        });
    });

    
</script>
@endsection