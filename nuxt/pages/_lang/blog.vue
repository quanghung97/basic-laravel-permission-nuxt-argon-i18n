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
                  {{ $t('menu.title') }}
                </slot>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-components">
      <div class="container">

        <nav aria-label="Menu" class="d-flex flex-wrap align-items-center justify-content-center">
          <h1>Editing Product {{ $route.params.blog_id }}</h1>
        </nav>
        <paginate
          :page-count="lastPage"
          :click-handler="clickCallback"
          :prev-text="'prev'"
          :next-text="'next'"
          :container-class="'pagination justify-content-end'"
          :page-class="'page-item'"
          :page-link-class="'page-link'"
          :prev-class="'page-item'"
          :prev-link-class="'page-link'"
          :next-class="'page-item'"
          :next-link-class="'page-link'">
        </paginate>
      </div>
    </section>
  </div>
</template>
<script>
import axios from '~/plugins/axios'
import Paginate from '~/components/argon-demo/Paginate'

export default {
  name: 'order-now',
  layout: 'other',
  components: {
    Paginate
  },
  data() {
    return {
      items: [],
      lastPage: 0
    }
  },
  computed: {
  },
  watch: {
  },
  mounted() {
  },
  created() {
    this.clickCallback(1)
  },
  methods: {
    clickCallback(page) {
			axios.get('menu?page=' + page)
				.then(response => {
          this.lastPage = response.data.result.last_page
					this.items = response.data.result.data;
				})
    },
    sum(dishes) {
      return dishes.reduce((price, dish) => {
        return price += dish.price
      }, 0)
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
