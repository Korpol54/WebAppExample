<x-app-layout>
    <div class="container d-flex justify-content-end pt-5">
            <a href="{{ route('Content.create') }}" class="btn btn-success">
                <span><i class="fa-solid fa-plus fa-sm me-2"></i></span>
                New Post
            </a>
    </div>
    <div class="container pt-2">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td>{{ $contents->firstItem() + $loop->index }}</td>
                        <td>{{ $content->name }}</td>
                        <td>{{ Str::limit($content->description, 15) }}</td>
                        <td>
                            @if ($content->image)
                                <img src="{{ asset('storeImg/' . $content->image) }}" alt="{{ $content->name }}" width="200" height="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $content->created_at}}</td>
                        <td>{{ $content->updated_at}}</td>
                        <td>
                            <a href="{{ route('contents.edit', $content->id) }}" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="row mt-4">
                {{ $contents->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</x-app-layout>
