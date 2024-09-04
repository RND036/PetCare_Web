<!doctype html>
<html class="no-js" lang="zxx">
<head>
@include('components.meta')

   <!-- CSS here -->
   @include("Libraries.libraries")
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
    @include('components.Preloader')
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        @include('components.header')
        <!-- Header End -->
    </header>
    <main>
         <!-- Hero Area Start -->
         <div class="slider-area6 slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Contact US</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
            <!-- add contact form -->
<div class="form-container">
    <h1>
        Contact Us Now
    </h1>
  <form>
    <div class="grid">
      <div class="grid-item">
        <label for="first-name" class="label">First Name</label>
        <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" class="input-field" />
      </div>
      <div class="grid-item">
        <label for="last-name" class="label">Last Name</label>
        <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" class="input-field" />
      </div>
      <div class="grid-item">
        <label for="email" class="label">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" class="input-field" />
      </div>
      <div class="grid-item">
        <label for="phone" class="label">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" class="input-field" />
      </div>
    </div>
    <div class="form-group">
      <label for="topic" class="label">Choose your topic</label>
      <select id="topic" name="topic" class="select-field">
        <option>Select one</option>
        <option>General Inquiry</option>
        <option>Support</option>
        <option>Feedback</option>
      </select>
    </div>
    <div class="form-group">
      <label for="message" class="label">Message</label>
      <textarea id="message" name="message" rows="4" placeholder="Type your message..." class="textarea-field"></textarea>
    </div>
    <div class="form-group flex">
      <input id="terms" name="terms" type="checkbox" class="checkbox" />
      <label for="terms" class="checkbox-label">I accept the terms of Conditions..</label>
    </div>
    <div class="form-group">
      <button type="submit" class="submit-button">Submit</button>
    </div>
  </form>
</div>
		
        <!-- ================ contact section end ================= -->
    </main>
    @include('components.partners')
    <footer>    
        <!-- Footer Start-->
    @include('components.footer')
        
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    @include('Scripts.scripts')

    </body>
</html>