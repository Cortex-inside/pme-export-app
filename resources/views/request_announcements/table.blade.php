<table class="table table-responsive" id="requests-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Company Id</th>
        <th>Requesting Company Id</th>
        <th>Status</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($requests as $request)
        <tr>
            <td>{!! $request->uuid !!}</td>
            <td>{!! $request->company_id !!}</td>
            <td>{!! $request->requesting_company_id !!}</td>
            <td>{!! $request->status !!}</td>
            <td>
                <a href="{!! route('exchange.requests') !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-eye-open"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
