<div class="modal fade edit-post-modal" id="editPostModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title margin-top-5" id="editPostModalLabel">
                    <img class="options-message" src="{{ asset('socialyte/svg-icons/center/edit.svg') }}">
                    @lang('Edit your post')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ui-block">
                    <div class="news-feed-form single-post">
                        <div class="tab-content">
                            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="author-thumb">
                                    <img class="avatar" src="{{ asset('socialyte/img/author-page.jpg') }}" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="">{{ $post->content }}</textarea>

                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="@lang('ADD PHOTOS')">
                                        <img data-toggle="modal" data-target="#update-header-photo" src="{{ asset('socialyte/svg-icons/center/camera.svg') }}">
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="@lang('TAG YOUR FRIENDS')">
                                        <img src="{{ asset('socialyte/svg-icons/center/tag.svg') }}">
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-md-2"> @lang('Accept Changes') </button>
                                    <div class="form-group post-type">
                                        <select class="selectpicker form-control" name="type">
                                            <option value="{{ config('post.type.public') }}" {{ $post->isPublic() ? 'selected' : '' }}>@lang('Public')</option>
                                            <option value="{{ config('post.type.private') }}" {{ $post->isPrivate() ? 'selected' : '' }}>@lang('Private')</option>
                                            <option value="{{ config('post.type.only_friends') }}" {{ $post->isFriendsOnly() ? 'selected' : '' }}>@lang('Only Friends')</option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
