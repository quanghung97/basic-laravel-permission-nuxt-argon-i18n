<template>
  <div>
    <section class="section section-components mt-3">
      <div class="container shape-container d-flex align-items-center">
        <div class="col px-0">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 text-center pt-lg">
              <img src="/argon/img/brand/blue.png" style="width: 200px;" class="img-fluid">
              <p class="lead mt-4 mb-5">
                <slot>
                  {{ $t('order_now.title') }}
                </slot>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section class="section section-components">
      <div class="container">

        <nav aria-label="Form Order Now">
          <div>
            <p v-if="errors.length">
              <b>{{ $t('order_now.list_log') }}</b>
              <ul>
                <li v-for="error in errors" :key="error" class="text-warning">{{ error }}</li>
              </ul>
            </p>

            <div class="row">
              <div class="col-md-12">
                <h2>{{ $t('order_now.name') }}</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input id="name"
                         v-model="order.name"
                         :placeholder="$t('order_now.name_placeholder')"
                         type="text"
                         class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2>{{ $t('order_now.address') }}</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input id="address"
                         v-model="order.address"
                         :placeholder="$t('order_now.address_placeholder')"
                         type="text"
                         class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2>{{ $t('order_now.phone') }}</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input id="phone"
                         v-model="order.phone"
                         :placeholder="$t('order_now.phone_placeholder')"
                         type="number"
                         class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2>{{ $t('order_now.requirement') }}</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <textarea v-model="order.request"
                            :placeholder="$t('order_now.requirement_placeholder')"
                            class="form-control"
                            rows="8"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="button" class="btn btn-primary btn-lg" @click="sendOrder">{{ $t('order_now.send') }}</button>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </section> -->
  </div>
</template>
<script>

export default {
  name: 'order-now',
  layout: 'other',
  data() {
    return {
      errors: [],
      order: {
        name: null,
        address: null,
        phone: null,
        request: null
      }
    }
  },
  computed: {
  },
  watch: {
  },
  mounted() {
  },
  created() {
  },
  methods: {
    async sendOrder() {
      if (this.order.name && this.order.address && this.order.phone) {
        this.$nuxt.$loading.start()
        await this.$store.dispatch('order/order', this.order)
        this.$nuxt.$loading.finish()
        this.showOrderSuccess({title: this.$t('navbar.order_now.title'), message: this.$t('navbar.order_now.message'), type: 'success', timeout: 3000})
        this.$router.push(this.$i18n.path(''))
      }

      this.errors = [];

      if (!this.order.name) {
        this.errors.push(this.$t('order_now.name_log'));
        this.showcheckType({title: this.$t('order_now.log_title'), message: this.$t('order_now.name_log'), type: 'error', timeout: 3000})
      }
      if (!this.order.address) {
        this.errors.push(this.$t('order_now.address_log'));
        this.showcheckType({title: this.$t('order_now.log_title'), message: this.$t('order_now.address_log'), type: 'error', timeout: 3000})
      }
      if (!this.order.phone) {
        this.errors.push(this.$t('order_now.phone_log'));
        this.showcheckType({title: this.$t('order_now.log_title'), message: this.$t('order_now.phone_log'), type: 'error', timeout: 3000})
      }
    }
  },
  notifications: {
    showOrderSuccess: { // You can have any name you want instead of 'showLoginError'
      title: '',
      message: '',
      type: 'success' // You also can use 'VueNotifications.types.error' instead of 'error'
    },
    showcheckType: { // You can have any name you want instead of 'showLoginError'
      title: '',
      message: '',
      type: 'warn' // You also can use 'VueNotifications.types.error' instead of 'error'
    }
  }
}
</script>
<style>
</style>
