<div class="table-responsive">
    <table class="table table-nowrap table-check table-bordered">
        <thead class="table-light">
            <tr>
                <th style="width: 20px;" class="align-middle">
                    <div class="form-check font-size-16">
                        <input class="form-check-input" type="checkbox" id="checkAll">
                        <label class="form-check-label" for="checkAll"></label>
                    </div>
                </th>
                <th class="align-middle">Thông tin</th>
                <th class="align-middle text-end">Email</th>
                <th class="align-middle text-end">Thời gian</th>
                <th class="align-middle text-end">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
            <tr>
                <td>
                    <div class="form-check font-size-16">
                        <input class="form-check-input" type="checkbox" id="orderidcheck01">
                        <label class="form-check-label" for="orderidcheck01"></label>
                    </div>
                </td>
                <td>
                    @if (!$feedback->viewed)
                        <span class="badge badge-pill badge-soft-warning font-size-12">Chờ xác nhận </span>
                    @endif
                    @foreach (json_decode($feedback->value) as $key => $item)
                     @if ($key != 'custom' && strlen($item) > 0)
                        <p class="text-body my-1"><b>{{$key}} : </b> {!! $item !!}</p>
                     @endif
                    @endforeach
                </td>
                <td class="text-end">
                    <p class="text-muted mb-0">{{$feedback->email}}</p>
                </td>
                <td class="text-end">
                    {{$feedback->date_added}}
                </td>

                <td class="text-end">
                    @if (!$feedback->viewed)
                    <a href="{{route('admin.customers.feedback.confirm', ['id' =>$feedback->newsletter_data_id])}}" class="mb-1 link-primary">Xác nhận</a>
                    @else
                    Đã xác nhận
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>