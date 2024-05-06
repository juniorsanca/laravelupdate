<x-layout>
     <x-slot:headings>
        Register User Job
    </x-slot:headings>
<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action="/jobs">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">

      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <x-form-field>
            <x-form-label for="email">Email Adress</x-form-label>

            <div class="mt-2">
            <x-form-input name="email" id="email" placeholder="jondoe@gmail.com" required />

            <x-form-error name="email" />
          </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="password">Password</x-form-label>

            <div class="mt-2">
            <x-form-input name="password" id="password" type="password" required />

            <x-form-error name="password" />
          </div>
        </x-form-field>

      </div><br>
    <div>
        <x-form-button >Log In</x-form-button>
    </div>
    </div>
  </div>
</form>

</x-layout>
