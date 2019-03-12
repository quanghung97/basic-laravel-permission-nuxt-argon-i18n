<template>
  <section class="section section-lg">
    <div class="container">
      <div class="row row-grid justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="display-3">
            {{ $t('home.download_section.gift.text1') }}
            <span class="text-success">{{ $t('home.download_section.gift.text2') }} <span class="text-warning">{{ $t('home.download_section.gift.text3') }}</span>{{ $t('home.download_section.gift.text4') }}<span class="text-warning">{{ $t('home.download_section.gift.text5') }}</span></span>
          </h2>
          <p
            class="lead"
          >{{ $t('home.download_section.gift.text6') }}</p>
          <div class="btn-wrapper">
            <nuxt-link
              to="/abc"
              class="btn btn-primary mb-3 mb-sm-0"
            >
              <span class="btn-inner--icon">
                <i class="fa fa-mouse-pointer mr-2"></i>
              </span>
              <span class="nav-link-inner--text">{{ $t('navbar.order_now.type') }}</span>
            </nuxt-link>
          </div>
          <!-- <div class="text-center">
            <h4 class="display-4 mb-5 mt-5"></h4>
            <div class="row justify-content-center">
              <div class="col-lg-2 col-4">
                <a
                  href="https://getbootstrap.com/"
                  target="_blank"
                  data-toggle="tooltip"
                  data-original-title="Bootstrap 4 - Most popular front-end component library"
                >
                  <img
                    v-lazy="'https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/bootstrap.jpg'"
                    class="img-fluid"
                  >
                </a>
              </div>
              <div class="col-lg-2 col-4">
                <a
                  href="https://www.sketchapp.com/"
                  target="_blank"
                  data-toggle="tooltip"
                  data-original-title="[Coming Soon] Sketch - Digital design toolkit"
                >
                  <img
                    v-lazy="'https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/sketch.jpg'"
                    class="img-fluid opacity-5"
                  >
                </a>
              </div>
              <div class="col-lg-2 col-4">
                <a
                  href="https://www.adobe.com/products/photoshop.html"
                  data-toggle="tooltip"
                  data-original-title="[Coming Soon] Adobe Photoshop - Software for digital images manipulation"
                >
                  <img
                    v-lazy="'https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/ps.jpg'"
                    class="img-fluid opacity-5"
                  >
                </a>
              </div>
              <div class="col-lg-2 col-4">
                <a
                  href="https://vuejs.org/"
                  target="_blank"
                  data-toggle="tooltip"
                  data-original-title="Vue.js - The progressive javascript framework"
                >
                  <img
                    v-lazy="'https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/vue.jpg'"
                    class="img-fluid"
                  >
                </a>
              </div>
              <div class="col-lg-2 col-4">
                <a
                  href="https://angularjs.org/"
                  target="_blank"
                  data-toggle="tooltip"
                  data-original-title="[Coming Soon] Angular - One framework. Mobile &amp; desktop"
                >
                  <img
                    v-lazy="'https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/angular.jpg'"
                    class="img-fluid opacity-5"
                  >
                </a>
              </div>
              <div class="col-lg-2 col-4">
                <a
                  href="https://reactjs.org/"
                  target="_blank"
                  data-toggle="tooltip"
                  data-original-title="[Coming Soon] React - A JavaScript library for building user interfaces"
                >
                  <img
                    v-lazy="'https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/react.jpg'"
                    class="img-fluid opacity-5"
                  >
                </a>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {}
</script>
<style>
</style>
