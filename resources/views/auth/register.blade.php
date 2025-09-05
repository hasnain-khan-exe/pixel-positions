    <x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />
        <input type="hidden" name="user_type" value="{{ request()->input('type') }}">

        <x-forms.divider />

        @if (request()->input('type') === 'employer')
            <x-forms.input label="Employer Name" name="employer" />
            <x-forms.input label="Employer Avatar" name="avatar" type="file"/>
        @endif

        @if (request()->input('type') === 'employee')
            <x-forms.input label="Employee Avatar" name="avatar" type="file"/>
        @endif

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>

    <p class="mt-4 text-center text-sm text-gray-600">
        Already have an account?
        <a href="/login?type={{ request()->input('type') }}" class="text-blue-600 hover:underline">Log in</a>
    </p>

</x-layout>
