@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <smalls>add user</smalls>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ route('admin.user.store') }}">
                        @csrf
                        <x-input name="name" label="Name" type="text" />
                        <x-input name="email" label="Email" type="mail" />
                        <x-input name="password" label="password" type="password" />
                        <div class="mb-3">
                            <label for="role_id">Role</label><br>
                            <select style="width:150px;" class="form-select" id ="role_id" name = "role_id">
                                <option disabled>Role</option>
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}">
                                        {{ $role }}</option>
                                @endforeach
                                @error('role_id')
                                    <p class = "text-red-600 text-danger">{{ $message }}</p>
                                @enderror
                            </select>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                    </form>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
