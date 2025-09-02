<x-layout>
    <x-page-heading>Log In</x-page-heading>

    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.button>Log In</x-forms.button>
    </x-forms.form>

    <p class="mt-4 text-center text-sm text-gray-600">
        Don't have an account?
        <a href="/register" class="text-blue-600 hover:underline">Register</a>

</x-layout>