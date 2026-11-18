
@if (app()->environment('production') && filled(config('services.google_analytics.measurement_id')))
    <!-- Google Analytics 4 -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.measurement_id') }}">
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            window.dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', @json(config('services.google_analytics.measurement_id')), {
            send_page_view: true
        });
    </script>
@endif
