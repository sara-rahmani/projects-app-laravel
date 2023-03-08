<x-layout>
    <x-slot name="content">

    <main class="max-w-sm mx-auto">
    @if ($user)
<h1 class="text-center font-bold text-xl mb-3">Edit User: {{ $user->name }}</h1>
<form method="POST" action="/admin/users/{{ $user->id }}/edit" >
    @method('PATCH')
@else
    <h1 class="text-center font-bold text-xl mb-3">Create User</h1>
    <form method="POST" action="/admin/users/create">
@endif
      @csrf

    <div class="mb-6">
    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">name</label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? $user?->name }}" required
    class="border border-gray-400 rounded p2 w-full">
    @error('name')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
@if (!$user)

<div class="mb-6">
    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">email</label>
    <input type="text" name="email" id="email" value="{{ old('email') ?? $user?->email }}" required
    class="border border-gray-400 rounded p2 w-full">
    @error('email')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-6">
    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
    <input type="password" name="password" id="password" value="{{ old('password') ?? $user?->password }}" required
    class="border border-gray-400 rounded p2 w-full">
    @error('password')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">password_confirmation</label>
    <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') ?? $user?->password_confirmation }}" required
    class="border border-gray-400 rounded p2 w-full">
    @error('password_confirmation')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
@endif
<div class="mb-6">
          <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
        </div>
</form>
</main>

</x-slot>
</x-layout>