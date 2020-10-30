<section>
    <div class="block">
        <div class="fixed-bg" style="background-image: url({{asset('images/topbg.jpg')}});"></div>
        <div class="page-title-wrapper text-center">
            <div class="col-md-8 col-sm-12 col-lg-8">
                <div class="page-title-inner">
                    <h1 itemprop="headline">Search your favourite restaurant location</h1>
                    <form class="restaurant-search-form brd-rd2">
                        <div class="row mrg10">
                            <div class="col-md-10 col-sm-9 col-lg-9 col-xs-12">
                                <div class="input-field brd-rd2">
                                    <input class="brd-rd2" id="input-search" name="location" type="text" placeholder="Search for Location" value="{{$location}}">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
                                <button class="brd-rd2 red-bg" type="submit">SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>