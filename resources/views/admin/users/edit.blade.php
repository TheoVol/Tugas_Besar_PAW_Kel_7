<h2>Edit User</h2>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" required><br>
    <input type="email" name="email" value="{{ $user->email }}" required><br>
    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah"><br>
    <select name="role">
        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
        <option value="penjual" {{ $user->role == 'penjual' ? 'selected' : '' }}>Penjual</option>
    </select><br>
    <button type="submit">Update</button>
</form>
