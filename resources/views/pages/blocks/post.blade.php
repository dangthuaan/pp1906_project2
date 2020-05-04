@foreach ($posts as $post)
<div class="ui-block">

    <article class="hentry post">

        <div class="post__author author vcard inline-items">
            <img class="default-avatar" src="{{ getAvatar($post->user->avatar) }}" alt="{{ $post->user->name }}">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{ route('user.profile', $post->user->username) }}">{{ $post->user->name }}</a>
                <div class="post-type-icon post__date">
                    <a class="show-post" href="{{ route('posts.show', $post->id) }}">
                        <time class="published">{{ getCreatedFromTime($post) }}</time>

                        @if ($post->isUpdated())
                        <span>
                            (@lang('updated')
                            <time class="published">{{ getUpdatedFromTime($post) }}</time>)
                        </span>
                        @endif
                    </a>

                    <span> · </span>

                    @if ($post->isPublic())
                    <img class="post-type" src="{{ asset('theme/socialyte/svg-icons/center/public.svg') }}" title="@lang('Public')">
                    @elseif ($post->isPrivate())
                    <img class="post-type" src="{{ asset('theme/socialyte/svg-icons/center/private.svg') }}" title="@lang('Private')">
                    @elseif ($post->isFriendsOnly())
                    <img class="post-type" src="{{ asset('theme/socialyte/svg-icons/center/only_friends.svg') }}" title="@lang('Only Friends')">
                    @endif
                </div>
            </div>
            @if (auth()->id() == $post->user->id)
            @include('pages.blocks.widgets.three_dots')
            @endif
        </div>

        <p>
            {{ $post->content }}
        </p>

        @if ($post->image)
        @include('pages.blocks.widgets.post_image')
        @endif

        @if ($post->share)
        @include('pages.blocks.widgets.share', ['post' => $post->share])
        @endif

        @include('pages.blocks.widgets.reacts_list')

        @include('pages.blocks.widgets.reacts')

    </article>

    @include('pages.blocks.list_comment')

    <!-- Comment Form  -->

    <form class="comment-form inline-items">

        <div class="post__author author vcard inline-items">
            <img src="{{ getAvatar(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">

            <div class="form-group with-icon-right ">
                <textarea class="form-control comment-content"></textarea>
            </div>
        </div>

        <button class="btn btn-md-2 btn-primary store-comment" data-post_id="{{ $post->id }}"> @lang('Post Comment') </button>

    </form>

    <!-- ... end Comment Form  -->
</div>
@endforeach
