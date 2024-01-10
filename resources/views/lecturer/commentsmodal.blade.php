<div class="modal-body">
    <div class="comments-list">
    @foreach ($comments as $c)
        <div id="comment-{{ $c->id }}" class="comment-item" style="display: flex; align-items: center; margin-bottom: 10px;">
        @if($c->lecturer)
        <div class="user-initials-circle">{{ $c->lecturer->initials }}</div>
        <div class="comment-content">
            <div style="display: flex;">
            <strong> {{ $c->lecturer->name }} </strong>
            <span class="badge badge-success rounded-circle p-0" style="background-color: transparent;" title="Verified">
                &nbsp;<i class="fa-solid fa-circle-check fa-lg" style="color: #4c68d7;"></i>
            </span>
            </div>
            <p>{{ $c->content }}</p>
            <small>{{ $c->updated_at }}</small>
        </div>

        @if (Session::get('role') == 3)
        <a class="delete-comment" data-comment-id="{{ $c->id }}"><i class="fas fa-trash"></i></a>
        {{-- <a href="#" class="delete-comment" data-comment-id="{{ $c->id }}">Delete</a> --}}
        @endif
        @else
        <div class="user-initials-circle">{{ $c->student->initials }}</div>
        <div class="comment-content" style="margin-left: 8px;">
            <strong>{{ $c->student->name }}</strong>
            <p>{{ $c->content }}</p>
            <small>{{ $c->updated_at }}</small>
        </div>

        @if (Session::get('role') == 4 && Session::get('id') == $c->student->id)
        <a class="delete-comment" data-comment-id="{{ $c->id }}"><i class="fas fa-trash"></i></a>
        @endif
        
        
        {{-- <a href="#" class="delete-comment" data-comment-id="{{ $c->id }}">Delete</a> --}}
        
        
        @endif  
    </div> 
    @endforeach
        
    </div>

    
</div>

<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>
<script>
$('.delete-comment').click(function(event) {
    event.preventDefault();
    var cId = $(this).data('comment-id');

    $.ajax({
        url: '/student/deletecomments/' + cId,
        method: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            // Remove the comment element
            $('#comment-' + response.deletedCommentId).remove();

            // Optionally, display a success message
            if (response.message) {
                alert(response.message);
            }
        },
        error: function(error) {
            // Handle errors
            console.error(error);
            alert('Failed to delete comment. Please try again.');
        }
    });
});
</script>
