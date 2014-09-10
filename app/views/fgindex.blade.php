@extends("layout")
@section("content")
    @if (count($featurefeaturegroups))
        <table>
            <tr>
                <th>name</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($featuregroups as $featuregroups)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>
                        @if (allowed("featuregroups/edit"))
                            <a href="{{ URL::route("group/edit") }}?id={{ $group->id }}">edit</a>
                        @endif
                        @if (allowed("featuregroups/delete"))
                            <a href="{{ URL::route("group/delete") }}?id={{ $group->id }}" class="confirm" data-confirm="Are you sure you want to delete this group?">delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>There are no featuregroups.</p>
    @endif
    @if (allowed("featuregroups/add"))
        <a href="{{ URL::route("featuregroups/add") }}">add featuregroups</a>
    @endif
@stop
@section("footer")
    @parent
    <script src="/js/jquery.js"></script>
    <script src="/js/layout.js"></script>
@stop
