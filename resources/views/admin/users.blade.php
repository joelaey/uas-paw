@extends('admin.layout')
@section('title','Kelola Users')

@section('content')
<h1 class="text-2xl font-bold mb-6">Kelola Users</h1>

<div class="bg-white rounded-xl shadow p-6">
<table class="w-full text-sm">
    <thead>
        <tr class="border-b">
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @for($i=1;$i<=6;$i++)
        <tr class="border-b">
            <td>User {{ $i }}</td>
            <td>user{{ $i }}@mail.com</td>
            <td class="text-green-600">Aktif</td>
        </tr>
        @endfor
    </tbody>
</table>
</div>
@endsection
