@extends('pages.user.profile')
@section('profile-content')
    @foreach ($user as $u)
        <form action="{{ route('update-photo', $u->uuid) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="w-full pb-3 border-b mb-5">
                <h4 class="font-bold tracking-wide text-gray-700">Change Photo Profile</h4>
            </div>

            <div class="mb-6">
                <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="photo">
                    Upload Photo
                </label>
                <input
                    class="block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg
        @error('file') is-invalid @enderror"
                    aria-describedby="user_avatar_help" id="user_avatar" name="file" type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help">
                    A profile picture is useful to confirm your are
                    logged into your account
                </div>
            </div>

            <div class="flex items-start mb-2">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save
                </button>
            </div>

        </form>
    @endforeach
@endsection
