@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>change</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                        @csrf
                        @method('patch')
                        <x-input name="name" label="Name" type="text" :value="$user->name" />
                        <x-input name="email" label="Email" type="mail" :value="$user->email" />
                        <div class="mb-3">
                            <label for="role_id">Role</label><br>
                            <select style="width:150px;" class="form-select" id ="role_id" name = "role_id">
                                <option disabled>ROle</option>
                                @foreach ($roles as $id => $role)
                                    <option {{ $id == $user->role_id ? 'selected' : '' }} value="{{ $id }}">
                                        {{ $role }}</option>
                                @endforeach
                                @error('role_id')
                                    <p class = "text-red-600 text-danger">{{ $message }}</p>
                                @enderror
                            </select>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                    <form method="POST" action="{{ route('admin.user.destroy', $user->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" style="margin-top:15px" class="btn btn-danger" ">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </section><!-- /.content -->
                                                </div><!-- /.content-wrapper -->
@endsection
