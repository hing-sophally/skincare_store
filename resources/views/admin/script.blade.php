<!-- Core JS Files -->
<script src="{{ asset('admin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/jsvectormap/world.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('admin/assets/js/kaiadmin.min.js') }}"></script>

<!-- Demo Scripts (remove in production) -->
 <script src="{{ asset('admin/assets/js/setting-demo.js') }}"></script>
 <script src="{{ asset('admin/assets/js/demo.js') }}"></script>

<!-- Sparkline Chart Initialization -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    });
</script>
