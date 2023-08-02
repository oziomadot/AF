<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
       
        <div>
            <x-input-label for="officalemail" :value="__('Offical Email')" />
            <x-text-input id="officalemail" name="officalemail" type="text" class="mt-1 block w-full" :value="old('officalemail', $user->officalemail)"/>
            <x-input-error class="mt-2" :messages="$errors->get('officalemail')" />
        </div>

        <div>
            <x-input-label for="about" :value="__('Why AF')" />
            <textarea id="about" name="about" rows="5" cols="50" class="mt-1 block w-full" :value="old('about', $user->about)" 
                placeholder="Why did you join Amandine foundation"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div>
            <x-formlabel name="Designation"/>
                    <select class="form-select py-px" id="designation" name="designation" required>
                        <option selected>Select designation</option>
                        @foreach($designation as $designation)
                            <option value="{{$designation->id}}" {{old('designation_id') == $designation->id ? 'selected' : ''}}>
                                {{$designation->name}}</option>
                        @endforeach
                    </select><br>
        </div>

        <div>
            <x-input-label for="profession1" :value="__('Profession')" />
            <x-text-input id="profession1" name="profession1" type="text" class="mt-1 block w-full" :value="old('profession1', $user->profession1)"/>
            <x-input-error class="mt-2" :messages="$errors->get('profession1')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
