<template>
  <div>
    <hero>{{ $t('home.slot') }}</hero>
    <carousel></carousel>
    <download-section></download-section>

  </div>
</template>
<script>
import Hero from '~/components/argon-demo/Hero'
import Carousel from '~/components/argon-demo/Carousel'
import Examples from '~/components/argon-demo/Examples'
import DownloadSection from '~/components/argon-demo/DownloadSection'
export default {
  layout: 'argon-starter',
  components: {
    Hero,
    Carousel,
    Examples,
    DownloadSection
  }
}
</script>
<style>
</style>
