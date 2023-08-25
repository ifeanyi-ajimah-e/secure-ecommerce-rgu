@if ( session()->has('failures'))
    <table class="table table-danger">
        <tr>
            <th>Row</th>
            <th>Attribute</th>
            <th>Errors</th>
            <th>Value</th>
        </tr>

        @foreach( session()->get('failures') as $validation)
            <tr>
                <td>{{ $validation->row() }}</td>
                <td>{{ $validation->attribute() }}</td>
                <td>
                    <ul>
                        @foreach ($validation->errors() as $e)
                            <li> {{ $e}} </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{ $validation->values()  [$validation->attribute()] }}
                </td>
            </tr>
        @endforeach

    </table>
@endif

