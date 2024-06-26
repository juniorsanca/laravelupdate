<x-layout>
     <x-slot:headings>
        Create Job
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

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
            <x-form-label for="title">Job title</x-form-label>

            <div class="mt-2">
            <x-form-input name="title" id="title" placeholder="CEO" required />

            <x-form-error name="title" />
          </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="salary">Salary</x-form-label>

            <div class="mt-2">
            <x-form-input name="salary" id="salary" placeholder="2100€" required />

            <x-form-error name="salary" />
          </div>
        </x-form-field>
      </div><br>
    <div>
        <x-form-button >Enregistrer</x-form-button>
    </div>
    </div>
  </div>
</form>

</x-layout>
