<div>
    @extends('index')

    @section('content')
    <div class="container">
        <h1>Kết Quả Tìm Kiếm cho "{{$results}}"</h1>
    
        @if(!empty($results))
            @foreach($results as $type => $items)
                <h2>{{ ucfirst($type) }}</h2>
                <ul>
                    @foreach($items as $item)
                        @if($type == 'users')
                            <li>{{ $item->name }} ({{ $item->email }})</li>
                        @elseif($type == 'db_products')
                            <li>{{ $item->ProductName }}: {{ $item->Description }}</li>
                        @endif
                    @endforeach
                </ul>
            @endforeach
        @else
            <p>Không tìm thấy kết quả nào.</p>
        @endif
    </div>
    @endsection
    
</div>
