@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')
    <div class="dashboard-area">
        <div class="dashboard-item-area">
            <div class="row">
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __("Total Users") }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ $users }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">{{ __("Active") }} {{ @$activeUsers }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart6" data-percent="{{ ($users != 0) ? intval(($activeUsers/$users)*100) : '0' }}">
                                    <span>
                                        @if($users != 0)
                                            {{ intval(($activeUsers/$users)*100) }}%
                                        @else
                                            0%
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __("Total Announcements") }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ @$announcements }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">{{ __("Active") }} {{ @$activeAnnouncements }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart14" data-percent="{{ ($announcements != 0) ? intval(($activeAnnouncements/$announcements)*100) : '0' }}">
                                    <span>
                                        @if($announcements != 0)
                                            {{ intval(($activeAnnouncements/$announcements)*100) }}%
                                        @else
                                            0%
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __("Total Areas") }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ @$areas }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">{{ __("Active") }} {{ @$activeAreas }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart21" data-percent="{{ ($areas != 0) ? intval(($activeAreas/$areas)*100) : '0' }}">
                                    <span>
                                        @if ($areas != 0)
                                            {{ intval(($activeAreas / $areas) * 100) }}%
                                        @else
                                            0%
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __("Total Car Types") }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ @$types }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">{{ __("Active") }} {{ @$activeTypes }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart24" data-percent="{{ ($types != 0) ? intval(($activeTypes/$types)*100) : '0' }}">
                                    <span>
                                        @if ($types != 0)
                                            {{ intval(($activeTypes / $types) * 100) }}%
                                        @else
                                            0%
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __("Total Cars") }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ @$cars }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">{{ __("Active") }} {{ @$activeCars }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart27" data-percent="{{ ($cars != 0) ? intval(($activeCars/$cars)*100) : '0' }}">
                                    <span>
                                        @if ($cars != 0)
                                            {{ intval(($activeCars / $cars) * 100) }}%
                                        @else
                                            0%
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __("Total Tickets") }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ @$tickets }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">{{ __("Active") }} {{ @$activeTickets }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart30" data-percent="{{ ($tickets != 0) ? intval(($activeTickets/$tickets)*100) : '0' }}">
                                    <span>
                                        @if ($tickets != 0)
                                            {{ intval(($activeTickets / $tickets) * 100) }}%
                                        @else
                                            0%
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-12 mb-15">
            <div class="dashbord-item">
                <div class="dashboard-content">
                    <div class="left">
                        <h6 class="title">{{ __("Booking Statistics") }}</h6>
                        <canvas width="1300" height="400" id="bookingChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-12 mb-15">
    <div class="dashbord-item">
        <div class="dashboard-content">
            <div class="left">
                <h6 class="title">{{ __("Car Type Statistics") }}</h6>
                <canvas width="400" height="400" id="carTypeChart"></canvas>
            </div>
        </div>
    </div>
</div>

    </div>

@endsection

@push('script')
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Danh sách các booking từ server (đã được truyền vào Blade)
            const carBookings = @json($car_bookings);
            console.log(carBookings);

            // Tạo một đối tượng để lưu số lượng booking theo từng ngày
            const bookingCounts = {};

            // Lặp qua danh sách booking và nhóm theo ngày
            carBookings.forEach(booking => {
                const bookingDate = new Date(booking.created_at).toLocaleDateString(); // Định dạng ngày 'YYYY-MM-DD'

                if (!bookingCounts[bookingDate]) {
                    bookingCounts[bookingDate] = 0;
                }

                bookingCounts[bookingDate]++;
            });

            // Sắp xếp mảng theo ngày (tăng dần)
            const sortedDates = Object.keys(bookingCounts).sort();
            const sortedCounts = sortedDates.map(date => bookingCounts[date]);

            // Vẽ biểu đồ đường (line chart)
            var ctx = document.getElementById('bookingChart').getContext('2d');
            var bookingChart = new Chart(ctx, {
                type: 'line', // Loại biểu đồ: line chart
                data: {
                    labels: sortedDates, // Mảng ngày (labels)
                    datasets: [{
                        label: 'Bookings',
                        data: sortedCounts, // Mảng số lượng booking (data)
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Bookings Count'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Thống kê số lượng xe theo loại (car_model hoặc car_type_id)
            const carTypeCounts = {};
            carBookings.forEach(booking => {
                const carModel = booking.cars.car_model; // Hoặc car_type_id nếu bạn muốn nhóm theo loại xe
                if (!carTypeCounts[carModel]) {
                    carTypeCounts[carModel] = 0;
                }
                carTypeCounts[carModel]++;
            });

            // Dữ liệu biểu đồ tròn
            const carTypeLabels = Object.keys(carTypeCounts);
            const carTypeData = Object.values(carTypeCounts);

            // Vẽ biểu đồ tròn (pie chart)
            var pieCtx = document.getElementById('carTypeChart').getContext('2d');
            var carTypeChart = new Chart(pieCtx, {
                type: 'pie', // Loại biểu đồ: pie chart
                data: {
                    labels: carTypeLabels, // Mảng tên loại xe (labels)
                    datasets: [{
                        label: 'Car Types',
                        data: carTypeData, // Mảng số lượng xe theo loại (data)
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        });
    </script>
@endpush

