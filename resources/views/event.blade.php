<!-- event.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Calendar</title>
    <style>
        .fc{
            border: 2px solid #ffffff !important;
            border-radius: 5px;
        }

        #link{
            color: #ffffff;
        }

        #link:hover{
            color: #ffffff80;
        }

        #fc-dom-1{
            margin-top: 20px;
        }

        .fc-prev-button, .fc-next-button {
            margin-top: 20px;
            background-color: #000000 !important;
            color: white !important; 
            border: 2px solid #ffffff !important; 
            border-radius: 5px; 
        }

        .fc-next-button{
            margin-right: 10px;
        }

        .fc-prev-button:hover, .fc-next-button:hover {
            background-color: #333333 !important;
            border-color: #ffffff !important; 
        }

        .fc-day-today{
            background-color: #ffffff25 !important;
        }

        .fc-scrollgrid-section-header{
            background-color: #ffffff;
            color:#000000
        }

        .admin-message {
            background-color: #e3f2fd;
            color: #1565c0;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            margin: 1rem 0;
        }
    </style>
</head>
<body class="bg-black">
    <div class="container py-5 px-2">
        <a href="./event" id="link" class="fs-5">← Back</a>
        <div class="row">
            <div class="col-12 mt-3">
                @if(Auth::check() && Auth::user()->role === 1)
                    <div class="admin-message">
                        <p class="mb-0">As an administrator, you cannot register events.</p>
                    </div>
                @endif
                <div id='calendar' class="bg-black text-white"></div>
            </div>
        </div>
    </div>

    <div id="modal-action" class="modal" tabindex="-1"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const modal = $('#modal-action');
        const csrfToken = $('meta[name=csrf_token]').attr('content');
        const isLoggedIn = @json(auth()->check());
        const isAdmin = @json(auth()->check() && auth()->user()->role === 1);

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                events: `{{ route('events.list') }}`,
                editable: false,
                headerToolbar: {
                    left: '',  
                    center: 'title',    
                    right: 'prev,next'
                },
                dateClick: function (info) {
                    if (isAdmin) {
                        return;  // Simply return without doing anything for admin users
                    }

                    $.ajax({
                        url: `{{ route('events.list') }}`,
                        data: {
                            date: info.dateStr
                        },
                        success: function (res) {
                            modal.html(res).modal('show');

                            $('#register-event-btn').on('click', function () {
                                if (isLoggedIn && !isAdmin) {
                                    $.ajax({
                                        url: `{{ route('events.create') }}`,
                                        data: {
                                            start_date: info.dateStr,
                                            end_date: info.dateStr,
                                        },
                                        success: function (res) {
                                            modal.html(res).modal('show');
                                            $('.datepicker').datepicker({
                                                todayHighlight: true,
                                                format: 'yyyy-mm-dd'
                                            });

                                            $('#form-action').on('submit', function (e) {
                                                e.preventDefault();
                                                const form = this;
                                                const formData = new FormData(form);
                                                $.ajax({
                                                    url: form.action,
                                                    method: form.method,
                                                    data: formData,
                                                    processData: false,
                                                    contentType: false,
                                                    success: function (res) {
                                                        modal.modal('hide');
                                                        calendar.refetchEvents();
                                                    },
                                                    error: function (res) {
                                                        console.error("AJAX error:", res);
                                                    }
                                                });
                                            });
                                        },
                                    });
                                } else if (!isLoggedIn) {
                                    iziToast.warning({
                                        title: 'Login Required',
                                        message: 'Please log in to register an event.',
                                        position: 'topRight'
                                    });
                                    window.location.href = '/login';
                                }
                            });
                        },
                        error: function (res) {
                            console.error("AJAX error:", res);
                        }
                    });
                },
            });

            calendar.render();
        });
    </script>
</body>
</html>