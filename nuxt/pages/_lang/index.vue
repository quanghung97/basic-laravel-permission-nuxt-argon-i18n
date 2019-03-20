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
import { mapState } from 'vuex'

export default {
  layout: 'argon-starter',
  components: {
    Hero,
    Carousel,
    Examples,
    DownloadSection
  },
  data() {
    return {}
  },
  computed: {
    ...mapState('order', {
      message: state => state.message
    })
  },
  watch: {},
  mounted() {
  },
  created() {},
  methods: {
    // sendOrder() {
    //   console.log('âsaa')
    // },
    // async sendOrder() {
    //   if (this.order.name && this.order.address && this.order.phone) {
    //     this.$nuxt.$loading.start()
    //     await this.$store.dispatch('order/order', this.order)
    //     this.$nuxt.$loading.finish()
    //     this.$router.push(this.$i18n.path(''))
    //   }
    //   this.errors = [];
    //   if (!this.order.name) {
    //     this.errors.push('Name required.');
    //   }
    //   if (!this.order.address) {
    //     this.errors.push('Address required.');
    //   }
    //   if (!this.order.phone) {
    //     this.errors.push('Phone required.');
    //   }
    // }
  }
}
</script>
<style lang="scss">
.v-fade-left-enter-active,
.v-fade-left-leave-active,
.v-fade-left-move {
  transition: all 0.5s;
}
.v-fade-left-enter,
.v-fade-left-leave-to {
  opacity: 0;
  transform: translateX(-500px) scale(0.2);
}
</style>
