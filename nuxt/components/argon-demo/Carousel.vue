<template>
  <div>
    <b-carousel id="carousel1" controls indicators>
      <!-- Text slides with image -->
      <b-carousel-slide img-src="/argon/img/theme/chup-anh-cuoi-dep-1-21.jpg">
        <h1 class="text-carousel">{{ $t('home.carousel.slide1') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide img-src="/argon/img/theme/img-2-1200x1000.jpg">
        <h1 class="text-carousel">{{ $t('home.carousel.slide2') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide img-src="/argon/img/theme/sinhnhat.jpg">
        <h1 class="text-carousel">{{ $t('home.carousel.slide3') }}</h1>
      </b-carousel-slide>
      <b-carousel-slide img-src="/argon/img/theme/tiec.JPG">
        <h1 class="text-carousel">{{ $t('home.carousel.slide4') }}</h1>
      </b-carousel-slide>
    </b-carousel>
  </div>
</template>
<script>
export default {}
</script>
<style scoped>
.text-carousel {
  text-shadow: 12px 6px 12px rgba(193, 207, 216, 0.83);
  font-size: 3.5rem;
}
</style>
