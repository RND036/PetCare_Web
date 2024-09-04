<!doctype html>
<html class="no-js" lang="zxx">
<head>
    @include('components.meta')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @include("Libraries.libraries")
</head>

<body>
    <div id="preloader-active">
        @include('components.Preloader')
    </div>

    <header>
        @include('components.header')
    </header>

    <main>
        <!-- Display Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="slider-area4 slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="text-center hero-cap pt-50">
                            <h2>Appointment</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Book Appointment -->
        <section class="appointment">
            <div class="appointment_container">
                <div class="left-section">
                    <img src="assets/img/logo/Newlogo.png" alt="Pet Care Logo">
                </div>
                <div class="right-section">
                    <div class="head">
                        <h1>Welcome to Pet Care</h1>
                        <p>Schedule your pet's appointment</p>
                    </div>
                    <form id="appointment-form" method="POST" action="{{ route('Appointment') }}">
                        @csrf
                        <div class="content">
                            <div class="input-group">
                                <label for="owner-name">Owner's Full Name</label>
                                <input type="text" id="owner-name" name="petowner_name" required placeholder="Enter your name">
                            </div>
                            <div class="input-group">
                                <label for="pet-name">Pet's Name</label>
                                <input type="text" id="pet-name" name="pet_name" required placeholder="Enter your pet's name">
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <label for="pet-type">Pet Type</label>
                                <input type="text" id="pet-type" name="pet_type" required>
                            </div>
                            <div class="input-group">
                                <label for="appointment-date">Appointment Date</label>
                                <input type="date" id="appointment-date" name="appointment_date" required>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <label for="appointment-time">Appointment Time</label>
                                <input type="time" id="appointment-time" name="appointment_time" required>
                            </div>
                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="petowner_email" required placeholder="Enter your Email address">
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone_number" required placeholder="Enter your phone number">
                            </div>
                            <div class="input-group">
                                <label for="service">Service Required</label>
                                <select id="service" name="service_required" required>
                                    <option value="grooming">Grooming</option>
                                    <option value="vaccination">Vaccination</option>
                                    <option value="checkup">Checkup</option>
                                    <option value="surgery">Surgery</option>
                                </select>
                            </div>
                        </div>
                        <button id="scheduleAppointmentBtn" class="app_btn" type="submit">
                            Schedule Appointment
                        </button>
                    </form>
                    <p>Already have an appointment? <a href="/appointments" style="color:red">Check Status</a></p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        @include('components.footer')
    </footer>

    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    @include('Scripts.scripts')

    <!-- Display Flash Messages as Pop-ups -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                alert('{{ session('success') }}');
            @endif

            @if(session('error'))
                alert('{{ session('error') }}');
            @endif
        });
    </script>
</body>
</html>
