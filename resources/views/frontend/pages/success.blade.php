@extends('frontend.layouts.master')
@section('content')
<div class="about-section ptb-80 text-center">
   <h3>Cảm ơn bạn đã sử dụng dịch vụ!</h3>
    <p>Chúng tôi đang xử lý thanh toán của bạn. Vui lòng chờ...</p>
</div>
 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');
        // Kiểm tra xem có token trong URL không
        if (token) {
         console.log(token)

            // Gọi API để xác nhận thanh toán
            axios.get(`http://localhost:8000/api/v1/confirm?token=${token}`)
                .then(response => {
                  
                })
                .catch(error => {
                    console.error("Error confirming payment:", error);
                    // Nếu có lỗi, hiển thị thông báo lỗi
                    document.querySelector('.about-section').innerHTML = `
                        <h3>Payment Failed</h3>
                        <p>There was an issue processing your payment. Please try again.</p>
                    `;
                });
        } else {
            // Nếu không có token trong URL, hiển thị thông báo lỗi
            document.querySelector('.about-section').innerHTML = `
                <h3>Payment Failed</h3>
                <p>No token found. Please try again.</p>
            `;
        }
    </script>
@endsection
