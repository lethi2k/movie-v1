<div class="table-responsive">
    <table class="table table-check">
        <thead class="table-light">
            <tr>
                <th style="width: 20px;" class="align-middle">
                    <div class="form-check font-size-16">
                        <input class="form-check-input" type="checkbox" id="checkboxAll">
                        <label class="form-check-label" for="checkboxAll"></label>
                    </div>
                </th>
                <th class="align-middle">
                    <div class="title-name">
                        Khách hàng
                    </div>
                    <div class="btn-group action-content" style="display: none; cursor: pointer;">
                        <div class="dropdown-toggle fw-bold" id="defaultDropdown" data-bs-toggle="dropdown"
                            data-bs-auto-close="true" aria-expanded="false">
                            Chọn thao tác cho <span class="text-content fw-bold"></span> khách hàng <i
                                class="mdi mdi-chevron-down"></i>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                            <li class="dropdown-item delete-customer">Xóa khách hàng</li>
                            <li class="dropdown-item">Hoạt động</li>
                            <li class="dropdown-item">Ngừng hoạt động</li>
                        </ul>
                    </div>
                </th>
                <th class="align-middle">Pricing</th>
                <th class="align-middle text-end">Comment</th>
                <th class="align-middle text-end">Reviews</th>
                <th class="align-middle text-end">Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>
                        <div class="form-check font-size-16">
                            <input class="form-check-input action-checkbox" type="checkbox" id="orderidcheck01"
                                value="{{ $customer->customer_id }}">
                            <label class="form-check-label" for="orderidcheck01"></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img class="rounded avatar-sm"
                                    src="{{ asset('admin/assets/images/users/avatar-3.jpg') }}"
                                    alt="Generic placeholder image">
                            </div>
                            <div class="flex-grow-1">
                                @if ($customer->status == 1)
                                    <span class="badge badge-pill badge-soft-success font-size-12 mb-2">Đang hoạt
                                        động</span>
                                @else
                                    <span class="badge badge-pill badge-soft-warning font-size-12 mb-2">Ngừng hoạt
                                        động</span>
                                @endif
                                <h5 class="font-size-14 mb-1">
                                    <a href="{{ action('Modules\Admin\Http\Controllers\Ecommerce\CustomerController@edit', ['id' => $customer->customer_id]) }}"
                                        class="link-primary">{{ $customer->email }}</a>
                                </h5>
                                <p class="text-muted mb-0">
                                    {{ isset($customer->group->name) ? $customer->group->name : '' }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-0 w-430">
                            Free
                        </p>
                    </td>
                    <td class="text-end">
                        <p class="text-muted mb-0">
                            12
                        </p>
                    </td>
                    <td class="text-end">
                        <p class="text-muted mb-0">
                            12
                        </p>
                    </td>
                    <td class="text-end">
                        {{ $customer->date_added }}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@section('js')
    @if (Session::has('success'))
        <script type="text/javascript">
            flashSuccess("{{ session()->get('success') }}");
        </script>
    @endif

    <script>
        $('.delete-customer').click(function() {
            var selected = [];
            $('.action-checkbox').each(function() {
                if ($(this).is(":checked")) {
                    selected.push($(this).val());
                }
            });

            $.ajax({
                url: "{{ route('admin.customers.customer.destroy.multiple') }}",
                dataType: 'json',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    customer_ids: selected,
                },
                success: function(json) {
                    location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });
    </script>
@endsection
