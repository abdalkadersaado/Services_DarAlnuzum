@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('BackEnd/user.Edit_user') }} ({{ $user->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('BackEnd/user.users') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.users.update',$user->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">{{ __('BackEnd/user.name') }}</label>
                        <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="username">{{ __('BackEnd/user.username') }}</label>
                        <input type="text" name="username" value="{{ old('name',$user->username) }}" class="form-control">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="email">{{ __('BackEnd/user.email') }}</label>
                        <input type="text" name="email" value="{{ old('email',$user->email) }}" class="form-control">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                         <label for="mobile">{{ __('BackEnd/user.mobile') }}</label>
                        <input type="text" name="mobile" value="{{ old('mobile',$user->mobile) }}" class="form-control">
                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="password">{{ __('BackEnd/user.password') }}</label>
                        <input type="text" name="password" value="{{ old('password',$user->password) }}" class="form-control">

                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="statsus">{{ __('BackEnd/user.status') }}</label>
                        <select name="receive_email" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('status',$user->status) == '1' ? 'selected': '' }}>{{ __('BackEnd/user.active') }}</option>
                            <option value="0" {{ old('status ',$user->status) == '0' ? 'selected': '' }}>{{ __('BackEnd/user.inactive') }}</option>
                     </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="receive_email">{{ __('BackEnd/user.Receive_Email') }}</label>
                        <select name="receive_email" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('receive_email', $user->receive_email) == '1' ? 'selected': '' }}>{{ __('BackEnd/user.yes') }}</option>
                            <option value="0" {{ old('receive_email ', $user->receive_email) == '0' ? 'selected': '' }}>{{ __('BackEnd/user.no') }}</option>
                         </select>
                        @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="bio">{{ __('BackEnd/user.Bio') }}</label>
                        <textarea name="bio" rows="5" class="form-control">{{ old('bio',$user->bio) }}</textarea>
                        @error('bio')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row pt-4">
                @if ($user->user_image != '')
                    <div class="col-12 text-center">
                        <div id="imgArea">
                            <img src="{{ asset('assets/users/' . $user->user_image) }}" width="200" height="200">
                            <button class="btn btn-danger removeImage">{{ __('BackEnd/user.Remove_Image') }}</button>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <label for="user_image">{{ __('BackEnd/user.User_Image') }}</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="user_image" id="user-image" class="file-input-overview">
                        <span class="form-text text-muted">{{ __('BackEnd/user.Image_width') }}</span>
                        @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary">{{ __('BackEnd/user.Update') }}</button>
            </div>
           </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function () {
            $('#user-image').fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });

            $('.removeImage').click(function () {
                $.post('{{ route('admin.users.remove_image') }}', { user_id: '{{ $user->id }}', _token: '{{ csrf_token() }}' }, function (data) {
                    if (data == 'true') {
                        window.location.href = window.location;
                    }
                })

            });
        });
    </script>
@endsection
