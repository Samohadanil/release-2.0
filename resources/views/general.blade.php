@extends('layouts.app')

@section('content')

<div style="background-image: url('/images/pyrko-com-ua-uroki.png'); width: 100%; height: 800px; background-size: cover"><h1 class="u-align-center u-custom-font u-font-merriweather u-text u-text-body-alt-color u-text-1" style="padding-top:200px; font-size: 80px; text-decoration: underline">Donations for developers from all over<br>the world </h1></div>


<section class="u-align-center u-clearfix u-palette-3-base u-section-2" id="carousel_a3ed">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center u-clearfix u-gutter-100 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-col">
                    <div class="u-size-20">
                        <div class="u-layout-row">
                            <div class="u-align-center u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                                <div class="u-container-layout u-valign-middle u-container-layout-1">
                                    <h2 class="u-align-center u-text u-text-black u-text-2">TOP DONATOR </h2>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-size-30 u-white u-layout-cell-2" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                <div class="u-container-layout u-container-layout-2"> <span style="font-size: 40px;">Name: {{$topDonationName}} <br> Sum: {{$topDonationSum}} $</span>  </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-size-20">
                        <div class="u-layout-row">
                            <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                                <div class="u-container-layout u-container-layout-3">
                                    <h2 class="u-align-center u-text u-text-3">LAST MONTH AMOUNT</h2>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-size-30 u-white u-layout-cell-4" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                <div class="u-container-layout u-container-layout-4"> <span style="font-size: 40px;">{{$amount}} $</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-size-20">
                        <div class="u-layout-row">
                            <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-5">
                                <div class="u-container-layout u-valign-middle u-container-layout-5">
                                    <h2 class="u-align-center u-text u-text-default u-text-4">ALL TIME AMOUNT</h2>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-shape-rectangle u-size-30 u-white u-layout-cell-6" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                <div class="u-container-layout u-container-layout-6"> <span style="font-size: 30px;">Max sum for mounth: {{$mouns}}  <br> Max sum for day: {{$day}} $</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="u-align-center u-clearfix u-grey-80 u-section-3" id="sec-8a52">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
            <table class="u-table-entity u-table-entity-1">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead class="u-black u-table-header u-table-header-1">
                <tr style="height: 46px;">
                    <th class="u-border-1 u-border-black u-table-cell">DONATOR NAME</th>
                    <th class="u-border-1 u-border-black u-table-cell">EMAIL</th>
                    <th class="u-border-1 u-border-black u-table-cell">SUM</th>
                    <th class="u-border-1 u-border-black u-table-cell">MESSAGE</th>
                    <th class="u-border-1 u-border-black u-table-cell">DATE</th>
                </tr>
                </thead>
                <tbody class="u-table-body">
                @foreach($donation as $value)
                    <tr style="height: 75px;">
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->id}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->email}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->donation}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->message}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->created_at}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
            {{$donation->links('vendor.pagination.simple-bootstrap-4')}}
        </div>
    </div>
</section>






<footer class="u-clearfix u-footer u-grey-80" id="sec-6224"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav class="u-align-center u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse">
                <a class="u-button-style u-nav-link" href="#">
                    <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                            </symbol>
                        </defs></svg>
                </a>
            </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
    </div></footer>
</body>
</html>
@endsection
