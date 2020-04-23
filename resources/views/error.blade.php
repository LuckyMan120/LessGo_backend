@extends('layouts.master')

@section('title', 'LessGo')

@section('content')

<div class="container">
            
  <div class="content">

    <!-- top container -->
    <div class="inner-wrapper">
      <div class="top-title">Oh! Seems Like you are lost </div>

      <div class="main-title">
        
        <span class="svg-wrap">
        <img src="img/not_found.svg" alt="Get it on google play">
        </span>
        
      </div>
    </div>

    <!-- bottom-tagline -->
    <p class="blurb">
      The page you were looking for doesn't exist.<br/>
      Return to  
      <a href="https://lessgo.app">homepage</a> 
      or explore
    </p>

    <a href="https://lessgo.app" class="lego-btn">Go Home</a>

        </div>
    </div>
<style>

    /* ==========================================================================
   Base Styles - ! HTML5 Boilerplate v5.0 | MIT License | http://h5bp.com/ 
   ========================================================================== */

html,
body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

::-moz-selection {
  background: #b3d4fc;
  text-shadow: none;
}

::selection {
  background: #b3d4fc;
  text-shadow: none;
}

a{
  color: #ed5255 !important; 
  text-decoration: none;
}

a:hover{
  opacity: 0.8;
}

svg {
  vertical-align: middle;
}

a.lego-btn {
    background: #ec5557;
    color: white !important;
    border-radius: 10px;
}
/* ==========================================================================
   Main Styles
   ========================================================================== */

.container {
  display: table;
  font-family: 'Open Sans', sans-serif;
  height: 100%;
  width: 100%;
  background: #fff;
}

.content{
  display: table-cell;
  font-size: 22px;
  text-align: center;
  vertical-align: middle;
  padding: 40px 30px;
}

.inner-wrapper{
  display: inline-block;
}

.top-title{
  color: #ec5355;
  font-size: 35px;
  font-weight: 700;
  margin-top: 5vh;
  margin-bottom: 25px;
}

.main-title{
  line-height: 0;
  font-size: 90px;
  font-weight: 800;
  color: #ec5355;
}

.svg-wrap{
  display: inline-block;
  font-size: 0;
  vertical-align: super;
}

#lego{
  padding: 5px;
}

.blurb{
  margin-top: 30px;
  color: #B6BECC;
}

.lego-btn{
  background: #4384F5;
  border-radius: 4px;
  color: #fff;
  display: inline-block;
  margin-top: 30px;
  padding: 12px 25px;
}

/* ==========================================================================
   Media Queries
   ========================================================================== */



@media only screen and (max-width: 440px){

  .main-title{
    font-size: 60px;
  }

  #lego{
    width: 50px;
    height: 55px;
    padding: 10px 5px;
  }
  
  .blurb,
  .lego-btn{
    font-size: 18px;
  }


}

</style>