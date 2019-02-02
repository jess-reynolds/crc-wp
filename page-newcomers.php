<?php get_header(); ?>

<div class="faq__head--hill"></div>
<section class="faq__head--container">
    <div class="faq__head--header">
        <div class="grid-x nav__bar">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell shrink nav__link"><a href="/"><img title="Home" src="<?php bloginfo('template_url'); ?>/assets/images/icon-club.png" /></a></div>
                    <div class="cell shrink nav__link"><a href="/newcomers">Newcomers</a></div>
                    <div class="cell shrink nav__link"><a href="/club">Club</a></div>
                    <div class="cell shrink nav__link"><a href="/rides">Rides</a></div>
                    <div class="cell shrink nav__link"><a href="/racing">Racing</a></div>
                    <div class="cell shrink nav__link"><a href="/shop">Shop</a></div>
                </div>
            </div>
            <div class="cell small-2 nav__link">
                <div style="text-align: right">
                    <a href="/login">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    <div class="faq__head--inside">
        <div class="faq__head--text">
            <h1>Your first ride</h1>
        </div>
    </div>


</section>

<div class="home__heading">
    We were all n00bs once.
</div>

<div class="grid-container">
    <div class="grid-x">
        <div class="cell home__intro">
            <div>
                This page helps new and prospective members by demystifying cycling clubs, explaining the Condors'
                ethos, and
                answering a few of those questions you were afraid to ask. For the majority of our members, joining the
                Condors was
                their first experience of being part of a cycling club. And for the vast majority, the prospect was
                nerve-wracking!
                Most people, even those who've owned a road bike for years and done a lot of miles, have doubts about
                whether
                they'll be quick enough, or have the bike handling skills to ride in a group.
            </div>
        </div>
    </div>

    <div class="grid-x">
        <div class="cell home__intro">
            <a type="button" class="button red button__ride" href="/membership">Ride with us</a>
        </div>
    </div>
</div>

<section class="home__banner--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)),
        url('<?php bloginfo('template_url'); ?>/assets/images/rides.jpg');">
    <div class="home__banner--inside">
        <div class="home__banner--text">
            <h1>Rides</h1>
            <p>During Spring and Summer there are regular club rides to suit any rider every Tuesday, Thursday and on
                weekends.</p>
            <a href="/rides">Read more</a>
        </div>
    </div>
</section>

<section class="home__banner--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)),
        url('<?php bloginfo('template_url'); ?>/assets/images/racing.jpg');">
    <div class="home__banner--inside">
        <div class="home__banner--text">
            <h1>Racing</h1>
            <p>We have thriving men's and women's race teams and are always glad to assist new racers.</p>
            <a href="/racing">Read more</a>
        </div>
    </div>
</section>

<section class="home__banner--container" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)),
        url('<?php bloginfo('template_url'); ?>/assets/images/shop.jpg');">
    <div class="home__banner--inside">
        <div class="home__banner--text">
            <h1>Shop</h1>
            <p>We have thriving men's and women's race teams and are always glad to assist new racers.</p>
            <a href="/racing">Read more</a>
        </div>
    </div>
</section>


<?php get_footer();
