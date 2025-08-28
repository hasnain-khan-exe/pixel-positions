    <x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="/register" enctype="multipart/form-data">
        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

        <x-forms.divider />

        @if (request()->input('type') === 'employer')
            <x-forms.input label="Employer Name" name="employer" />
            <x-forms.input label="Employer Logo" name="logo" type="file" />
        @endif

        @if (request()->input('type') === 'employee')
            <x-forms.input label="Resume" name="resume" type="file" />
        @endif

        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>