<div class="mt-5 pt-2"><img class="w-100" src="{{ asset('assets/img/footer-banner.jpg') }}" alt="HealthCare"> </div>
    <section class="footer-section">
        <div class="container py-4">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-3 footer-block mb-5 mb-lg-0">
                        <div class="content_footercms_right">
                            <div class="footer-contact">
                                <div class="footer-logo mb-3">
                                   <a href="{{ url('/') }}"> <img class="img-auto" 
                                    src="{{ asset('assets/img/m-logo.png') }}" alt="HealthCare"> </a> 
                                </div>
                                {{-- <p class="mb-2">B-14 Collins Street West Victoria 2386</p>
                                <p class="mb-2">(+123) 456 789 - (+024) 666 888</p>
                                <p class="mb-2"><a href="/">Contact@yourcompany.com</a></p>
                                <div class="social_icon d-none">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 footer-block mb-4 mb-lg-0">
                        <h6 class="footer-title"><span class="tlt-txt"> <span>@lang('_lan.quick') </span>@lang('_lan.links')</span><span
                            class="pm show-ul d-block d-lg-none"><span class="pm-icon p-icon">+</span><span
                            class="pm-icon m-icon d-none">-</span></span> </h6>
                            <ul class="f-in-ul">
                                @if(count($gPages) > 0)
                                @foreach($gPages as $page)
                                <li><a href="{{ url('/'.$page->slug) }}">{{$page->title_lt}}</a></li>
                                @endforeach
                                @endif        

                            </ul>
                        </div>
                        <div class="col-lg-3 footer-block mb-4 mb-lg-0">
                            <h6 class="footer-title"><span class="tlt-txt"> <span>@lang('_lan.quick') </span>@lang('_lan.links')</span><span
                                class="pm show-ul d-block d-lg-none"><span class="pm-icon p-icon">+</span><span
                                class="pm-icon m-icon d-none">-</span></span> </h6>
                                <ul class="f-in-ul">
                                    @if(count($gPages) > 0)
                                    @foreach($gPages as $page)
                                    <li><a href="{{ url('/'.$page->slug) }}">{{$page->title_lt}}</a></li>
                                    @endforeach
                                    @endif        

                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="footer-title color-white">Get in Touch
                                    <span class="pm show-ul d-block d-lg-none"><span
                                        class="pm-icon p-icon">+</span><span class="pm-icon m-icon
                                        d-none">-</span></span> 
                                    </h6>
                                    <div class="content_info">
                                        <ul>
                                            <li class="d-flex align-item-center mb-3">
                                                <div class="content_icon mr-2">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <div class="content_text">
                                                    <span>+370 674 53 554</span>
                                                </div>
                                            </li>
                                            <li class="d-flex align-item-center mb-3">
                                                <div class="content_icon mr-2"><i class="fas fa-envelope"></i></div>
                                                <div class="content_text">
                                                    <span>pylimo@copypro.lt</span>
                                                </div>
                                            </li>
                                            <li class="d-flex align-item-center mb-3">
                                                <div class="content_icon mr-2"><i class="fas fa-map-marker-alt"></i></div>
                                                <div class="content_text">
                                                    <span>Pylimo g. 22D,</span>
                                                    <span>Vilnius</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p class="mb-2">Gedimino pr. 33, Vilnius</p>
                                    <p class="mb-2">KIEKVIENĄ DIENĄ nuo 7.00 iki 22.00</p>
                                    <p class="mb-2">Tel. +370 5 260 0522 </p>
                                    <p class="mb-2">Mob. +370 688 02 504 </p>
                                    <p class="mb-2"><a href="/">copypro@copypro.lt</a></p>
                                    <div class="social_icon d-none">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p class="mb-2">Pylimo g. 22D, Vilnius</p>
                                    <p class="mb-2">I-V nuo 7.00 iki 19.00</p>
                                    <p class="mb-2">Mob. +370 674 53 554 </p>
                                    <p class="mb-2"><a href="/">pylimo@copypro.lt</a></p>                                    <div class="social_icon d-none">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                            

                    


                            
                        </div>
                    </div>

                    
                </section>
                <div class="footer-bottom d-none">
                    <div class="max-cnt">
                        <div class="row align-item-center">
                            <div class="col-md-6">
                                <div class="copyright-part">@ 2021 @lang('_lan.allReserved')</div>
                            </div>
                            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                                <div class="copyright-part">@lang('_lan.developedBy') <a href="https://igonet.lt/" target="_blank"> igonet.lt</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mdl-title-for-update-pro" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="updateQuan" action="{{ url('update-pro-quantity') }}" method="post">
                            @csrf
                            <input type="hidden" value="" class="pro_id" name="pro_id">
                            <div class="modal-body">
                                <label>@lang('home.quantity')</label>
                                <input type="number" name="quantity" min="1" value="" class="form-control up-qaunt">
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('home.close')</button>
                            <button type="submit" form="updateQuan" class="btn btn-primary">@lang('home.update')</button>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
    // function for snackbar message 
    function showSnakeBar() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }

    function makeSure() {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    }
</script>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
