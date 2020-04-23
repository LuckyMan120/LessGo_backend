@extends('layouts.master')

@section('title', 'LessGo')

@section('content')

<header id="home" class="header d-flex align-items-center justify-content-center" aria-labelledby="header-title" aria-describedby="header-description">
      <div  id="banner" class="center "class="header__text ">

         <div class="headline">
             <h1 id="header-title" class="info__title"> Reaching.<span class="text-red">Destinations</span>Together </h1>
             <p>LessGo is all you need to reduce up to 75% on your expenses, to make new friends and create unforgettable memories while sharing a ride."What are you waiting for? Let's do this, LessGo!</p>
             <div class="download">
          <span class="d-block mb-3">Coming Soon to the stores</span>
          <ul class="d-flex">
            <li class="mr-3">
              <a id="home-apple">
                <img src="img/coming_soon_ios.png" alt="Download on the Apple store">
              </a>
            </li>
            <li>
              <a id="home-andorid" >
                <img src="img/coming_soon_android.png" alt="Get it on google play">
              </a>
            </li>
          </ul>
   </div>
         </div>



  </div>
       
      
      </div>
    </header>

    <main class="main">
    <section id="about" aria-labelledby="about-title" aria-describedby="about-description">
        <div class="container">
          <h2 id="about-title" class="info__title mb-4">About</h2>
          <p id="about-description" class="mb-5">
		LessGo is a long distance (city to city - country to country) ridesharing platform where passengers with no means of transportation and drivers with empty car seats meet to share the same journey, in order to reduce costs, tons of CO2 emissions (fighting global warming) and creating a human connection, where travelers share experiences, cultures, and stories while sharing a ride. 
              <br/><br/>
		We had to question ourselves why we depended so much on our cars, and what the consequent pains of moving around the city were, from rush hours to traffic to the terrible driving habits and unavailability of parking spots, all these things came rushing through our minds in addition to the pain of high cost of on-demand services.LessGo plays a major role in people’s lives, whether it’s the daily commuters, suffering from poor transportation, terrible travel alternatives, and increasing expenses, to the travelers, the adventure seekers, who want to discover places, cultures, and create unforgettable memories. LessGo eases the journey and shortens the distance for them to reach their destinations and eliminates the hustle to find their perfect ride. We have designed our platform with passion, empathy, and love, especially for them, because we’ve been there most of the time.
          </p>
          <div>
            <span class="d-block mb-3">Keep in touch</span>
            <ul class="d-flex about__social">
              <li class="social__item mr-4">
                <a id="social-fb" href="https://www.facebook.com/LessGoapp">
                  <img src="img/facebook.svg" alt="">
                  Facebook
                </a>
              </li>
              <li class="social__item mr-4">
                <a id="social-tw" href="https://www.twitter.com/LessGoapp">
                  <img src="img/twitter.svg" alt="">
                  Twitter
                </a>
              </li>
              <li class="social__item mr-4">
                <a id="social-ig" href="https://www.instagram.com/LessGoapp/">
                  <img src="img/instagram.svg" alt="">
                  Instagram
                </a>
              </li>
           
            </ul>
          </div>
        </div>
      </section>

    
      <section id="download" class="main__rides text-center" aria-labelledby="download-title" aria-describedby="download-action">
        <div class="container">
          <p id="download-title" class="info__title_2 mb-4">Reaching.<span class="text-red">Destinations</span>.Together </p>
          <div class="download">
            <span class="soon d-block mb-3">Coming Soon to the stores</span>
            <ul class="d-flex justify-content-center">
              <li class="mr-3">
                <a id="download-apple" href="#">
                <img style="width:10em;"src="img/coming_soon_ios.png" alt="Download on the Apple store">
                </a>
              </li>
              <li>
                <a id="download-android" href="#">
                <img style="width:10em;" src="img/coming_soon_android.png" alt="Get it on google play">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </section>

    
    </main>



@endsection
