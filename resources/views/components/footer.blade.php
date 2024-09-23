<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
      <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-12 footer-about">
                  <a href="{{ url('') }}" class="logo d-flex align-items-center">
                    <div class="frame-parent4">
                        <div class="parent2">
                            <div class="div2">®</div>
                            <img class="jeung-ga2" alt="" src="{{ asset('assets/file/jeung--ga.svg') }}">
                        </div>
                        <img class="svgg-icon4" alt="" src="{{ asset('assets/file/svgg3.svg') }}">
                    </div>
                  </a>
                  <div class="newsletter6">
                      <div style="width: 100%;">
                          <h4 class="footer-subscribe-to-our">Subscribe to our newsletter</h4>
                          <div class="form-input3" style="margin-bottom: 25px">
                            <div class="form-background1 mt-md-0 mt-3"></div>
                            <input
                              class="email-input"
                              placeholder="Email address"
                              type="text"
                            />

                            <img
                              class="submit-button3"
                              alt=""
                              src="{{ asset('assets/file/submit--button.svg') }}"
                            />
                          </div>
                      </div>
                  </div>
                  {{-- <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                  <div class="social-links d-flex mt-4">
                    <a href="https://x.com/?lang=id"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                    <a href="https://id.linkedin.com/"><i class="bi bi-linkedin"></i></a>
                  </div> --}}
                </div>
                <div class="col-lg-3 col-4 footer-links ps-lg-5">
                  <h4 class="footer-text-bold mt-md-0 mt-3"><b>Page</b></h4>
                  <ul>
                    <li><a href="{{ url('') }}" class="footer-text">Home</a></li>
                    <li><a href="{{ url('about-us') }}" class="footer-text">About Us</a></li>
                    <li><a href="{{ url('product') }}" class="footer-text">Products</a></li>
                    <li><a href="{{ url('why-jeungga') }}" class="footer-text">Why ® Jeungga</a></li>
                    <li><a href="{{ url('technology') }}" class="footer-text">Technology</a></li>
                  </ul>
                </div>

                <div class="col-lg-3 col-4 footer-links">
                  <h4 class="footer-text-bold mt-md-0 mt-3"><b>Partner</b></h4>
                  <ul>
                    <li><a href="{{ url('partnership') }}" class="footer-text">Partnership</a></li>
                    <li><a href="{{ url('clients') }}" class="footer-text">Client</a></li>
                  </ul>
                </div>

                <div class="col-lg-3 col-4 footer-links text-center text-md-start">
                  <h4 class="footer-text-bold mt-md-0 mt-3"><b>Help</b></h4>
                  <ul>
                    <li><a href="#" class="footer-text">FAQs</a></li>
                    <li><a href="{{ url('contact-us') }}" class="footer-text">Contact Us</a></li>
                  </ul>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12 mb-5">
                    <hr class="gy-4 mt-4 mx-3">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6 text-left text-md-left">
                                <p>© <span>Copyright</span> <strong class="px-1 sitename">Jeungga</strong> <span>All Rights Reserved</span></p>
                                <p>© Jeungga Company 2023 - present</p>
                            </div>
                            <div class="col-md-6 text-center text-md-right">
                                <div class="social-links d-flex justify-content-center justify-content-md-end">
                                    <a href="https://www.facebook.com/"><i class="bi bi-facebook" style="color: #22333c"></i></a>
                                    <a href="https://www.instagram.com/"><i class="bi bi-instagram" style="color: #22333c"></i></a>
                                    <a href="https://x.com/?lang=id"><i class="bi bi-twitter" style="color: #22333c"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="col-md-6 text-center text-md-right d-block d-md-none">
                        <div class="social-links d-flex justify-content-center justify-content-md-end">
                            <a href="https://www.facebook.com/"><i class="bi bi-facebook" style="color: #22333c"></i></a>
                            <a href="https://www.instagram.com/"><i class="bi bi-instagram" style="color: #22333c"></i></a>
                            <a href="https://x.com/?lang=id"><i class="bi bi-twitter" style="color: #22333c"></i></a>
                        </div>
                    </div>
                    <hr class="gy-4 mt-3 mx-3">
                    <div class="container">
                        <div class="row justify-content-between align-items-center footer-behavior">
                            <div class="col-md-6 text-copyright">
                                <p>© <span>Copyright</span> <strong class="px-1 sitename">Jeungga</strong> <span>All Rights Reserved</span></p>
                                <p class="present-footer">© Jeungga Company 2023 - present</p>
                            </div>
                            <div class="col-md-6 text-center text-md-right d-none d-md-block">
                                <div class="social-links d-flex justify-content-center justify-content-md-end">
                                    <a href="https://www.facebook.com/"><i class="bi bi-facebook" style="color: #22333c"></i></a>
                                    <a href="https://www.instagram.com/"><i class="bi bi-instagram" style="color: #22333c"></i></a>
                                    <a href="https://x.com/?lang=id"><i class="bi bi-twitter" style="color: #22333c"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</footer>
