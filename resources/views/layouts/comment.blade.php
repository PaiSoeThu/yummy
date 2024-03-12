<div class="comments">
    <h5>Comment & Reply</h5>
    @forelse ($article->comments as $comment)
        <div class="card mb-2">
          <div class="card-body">
              <p class="mb-0">
                  <i class="bi bi-chat-left-dots"></i>
                  {{ $comment->content }}
              </p>
              <div class="">
                  <span class="badge bg-dark">
                      <i class="bi bi-person"></i>
                      {{ $comment->user->name }}
                  </span>
                  <span class="badge bg-dark">
                      <i class="bi bi-clock"></i>
                      {{ $comment->created_at->diffForHumans() }}
                  </span>

                  @can('delete',$comment)
                  <form action="{{ route('comment.destroy',$comment->id) }}" class="d-inline-block" method="post">
                      @csrf
                      @method('delete')
                      <button class="badge bg-dark"><i class="bi bi-trash3"></i> Delete</button>
                  </form>
                  @endcan

                  

              </div>
          </div>
        </div>
    @empty
    <div class="card mb-2">
      <div class="card-body text-center">
          <p class="mb-0">There is no comments</p>
      </div>
    </div>
    @endforelse
  @auth
  <form action="{{ route('comment.store')}}" method="post">
      @csrf
      <input type="hidden" name="article_id" value="{{ $article->id }}">
      <textarea class="form-control" name="content" cols="4" placeholder="say something about this article"></textarea>
      <div class="mt-3 d-flex justify-content-between">
          <span>commenting as {{ Auth::user()->name }}</span>
          <button class="btn btn-sm btn-dark">Comment</button>
      </div>
  
  </form>
  @endauth
</div>