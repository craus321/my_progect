



@foreach($comments as $comment)
    <li>
        <div class="single-comment">

            <div class="comment-avatar">
                <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="Фото профиля" class="img-profile no-border-radius">
            </div>
            <div class="commtent-text">
                <h5>{{ $comment->user->name }} <span>{{ $comment->created_at->isoFormat('LL LT') }}</span></h5>
                <p>{{ $comment->message }}</p>

            </div>
        </div>
    </li>
@endforeach
