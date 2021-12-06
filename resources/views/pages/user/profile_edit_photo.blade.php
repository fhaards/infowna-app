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

            <div class="flex items-start justify-end mb-2">
                <button type="submit"
                    class="inline-flex gap-5 px-5 py-3 text-sm font-medium text-white bg-blue-800 hover:bg-blue-900 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h13M12 5l7 7-7 7" />
                    </svg>
                    Save
                </button>
            </div>

        </form>
    @endforeach
@endsection
