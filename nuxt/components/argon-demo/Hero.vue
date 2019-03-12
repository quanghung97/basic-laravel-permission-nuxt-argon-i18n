<template>
  <section class="section-hero section-shaped my-0">
    <div class="shape shape-style-1 shape-primary">
      <span class="span-150"></span>
      <span class="span-50"></span>
      <span class="span-50"></span>
      <span class="span-75"></span>
      <span class="span-100"></span>
      <span class="span-75"></span>
      <span class="span-50"></span>
      <span class="span-100"></span>
      <span class="span-50"></span>
      <span class="span-100"></span>
    </div>
    <div class="container shape-container d-flex align-items-center">
      <div class="col px-0">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-7 text-center pt-lg">
            <img src="/argon/img/brand/white.png" style="width: 200px;" class="img-fluid">
            <p class="lead text-white mt-4 mb-5">
              <slot>A beautiful Design System for Bootstrap 4. It's Free and Open Source.</slot>
            </p>
            <!-- <div class="btn-wrapper">
              <base-button
                tag="a"
                href="https://demos.creative-tim.com/argon-design-system/docs/components/alerts.html"
                class="mb-3 mb-sm-0"
                type="info"
                icon="fa fa-code"
              >Components</base-button>
              <base-button
                tag="a"
                href="https://www.creative-tim.com/product/argon-design-system"
                class="mb-3 mb-sm-0"
                type="white"
                icon="ni ni-cloud-download-95"
              >Download HTML</base-button>
            </div>-->

          </div>
        </div>
        <tabs-section></tabs-section>
        <div class="row align-items-center justify-content-around stars-and-coded">
          <div class="col-sm-4">
            <span class="text-white alpha-7 ml-3">{{ $t('home.hero.rate') }}</span>
            <a
              href="https://wwww.facebook.com/quanghung997"
              target="_blank"
              title="Support us on Facebook"
            >
              <img
                src="/argon/img/icons/common/lgfacebook.svg"
                style="height: 64px; margin-top: -3px"
              >
            </a>
          </div>
          <div class="col-sm-4 mt-4 mt-sm-0 text-right">
            <span class="text-white alpha-7">{{ $t('home.hero.call') }}</span>
            <a href="https://www.facebook.com/quanghung997" target="_blank" title="0964307930">
              <img src="/argon/img/brand/phone.png" class="ml-3" style="height: 30px;">
            </a>
            <span class="text-white alpha-7">0964307930</span>
          </div>
        </div>
      </div>

    </div>
  </section>
</template>
<script>
import TabsSection from './JavascriptComponents/TabsSection'

export default {
  components: {
    TabsSection
  }
}
</script>
<style>
</style>
