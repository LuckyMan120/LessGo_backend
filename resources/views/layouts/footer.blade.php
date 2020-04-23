
<script src="js/jquery-1.12.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<script src="js/flickr.js"></script>
<script src="js/flexslider.min.js"></script>
<script src="js/lightbox.min.js"></script>
<script src="js/masonry.min.js"></script>
<script src="js/twitterfetcher.min.js"></script>
<script src="js/spectragram.min.js"></script>
<script src="js/ytplayer.min.js"></script>
<script src="js/countdown.min.js"></script>
<script src="js/smooth-scroll.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/scripts.js"></script>
<script>
      $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $($(this).attr('href'));

        if (target.length) {
          var scrollTop = target.offset().top - 100;
          $(this).parent().addClass('active').siblings().removeClass('active');
          $('html, body').animate({
            scrollTop
          }, 1000, function() {
            target.attr('tabindex', '-1');
          });
        }
      });

      // Facebook Pixel tracking
      $('#nav-rides').on('click', function() {
        fbq('trackCustom', 'EnNavRides', {
          content_ids: 'En-Nav-Rides'
        });
      });

      $('#nav-how-to').on('click', function() {
        fbq('trackCustom', 'EnNavHowTo', {
          content_ids: 'En-Nav-How-To'
        });
      });

      $('#nav-download').on('click', function() {
        fbq('trackCustom', 'EnNavDownload', {
          content_ids: 'En-Nav-Download'
        });
      });

      $('#nav-about').on('click', function() {
        fbq('trackCustom', 'EnNavAbout', {
          content_ids: 'En-Nav-About'
        });
      });

      $('#nav-driver').on('click', function() {
        fbq('trackCustom', 'EnNavDriver', {
          content_ids: 'En-Nav-Driver'
        });
      });

      $('#home-apple').on('click', function() {
        fbq('trackCustom', 'EnHomeApple', {
          content_ids: 'En-Home-Apple'
        });
      });

      $('#home-andorid').on('click', function() {
        fbq('trackCustom', 'EnHomeAndroid', {
          content_ids: 'En-Home-Android'
        });
      });

      $('#rides-download-now').on('click', function() {
        fbq('trackCustom', 'EnRidesDownloadNow', {
          content_ids: 'En-Rides-download-now'
        });
      });

      $('#download-apple').on('click', function() {
        fbq('trackCustom', 'EnDownloadApple', {
          content_ids: 'En-Download-Apple'
        });
      });

      $('#download-andorid').on('click', function() {
        fbq('trackCustom', 'EnDownloadAndroid', {
          content_ids: 'En-Download-Android'
        });
      });

      $('#social-fb').on('click', function() {
        fbq('trackCustom', 'EnSocialFacebook', {
          content_ids: 'En-Social-Facebook'
        });
      });

      $('#social-tw').on('click', function() {
        fbq('trackCustom', 'EnSocialTwitter', {
          content_ids: 'En-Social-twitter'
        });
      });

      $('#social-ig').on('click', function() {
        fbq('trackCustom', 'EnSocialInstagram', {
          content_ids: 'En-Social-Instagram'
        });
      });

      $('#social-yt').on('click', function() {
        fbq('trackCustom', 'EnSocialYoutube', {
          content_ids: 'En-Social-Youtube'
        });
      });

      $('#language-arabic').on('click', function() {
        fbq('trackCustom', 'LanguageArabic', {
          content_ids: 'Language-Arabic'
        });
      });

      $('#jobs-apply').on('click', function() {
        fbq('trackCustom', 'JobsApply', {
          content_ids: 'Jobs-Apply'
        });
      });

      if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
          navigator.serviceWorker.register('/sw.js').then(function(registration) {
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
          }, function(err) {
            console.log('ServiceWorker registration failed: ', err);
          });
        });
      }
      mixpanel.track("Page view");
    </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128187723-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128187723-1');
</script>