<footer>
    <!--? Footer Start-->
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="/" class="font-weight-bold text-uppercase">{{ App\Utility::find(1)->nama_website }}</a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>{!! nl2br(App\Utility::find(1)->tentang_kami) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Alamat</h4>
                            </div>
                            <div class="footer-cap">
                                <p>{{ App\Utility::find(1)->alamat_perusahaan }}</p>
                            </div>
                            <div class="footer-number">
                                <h4><a href="tel:{{ App\Utility::find(1)->nomor_telepon }}">{{ App\Utility::find(1)->nomor_telepon }}</a></h4>
                                <p><a href="mail:{{ App\Utility::find(1)->email }}">{{ App\Utility::find(1)->email }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a> Powered By <a target="_blank" href="https://pesan-web.com">pesan-web.com</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <span>Ikuti Kami</span>
                            <a href="{{ App\Utility::find(1)->link_twitter }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ App\Utility::find(1)->link_facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ App\Utility::find(1)->link_youtube }}"><i class="fab fa-youtube"></i></a>
                            <a href="{{ App\Utility::find(1)->link_instagram }}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
