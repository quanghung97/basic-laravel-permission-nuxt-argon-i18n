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
          <div v-for="item in items" :key="item.id" class="col-md-6 d-flex flex-wrap flex-column align-items-center justify-content-left">
            <b-btn :aria-controls="`collapse${item.id}`"
                   :aria-expanded="item.collapse ? 'true' : 'false'"
                   :class="item.collapse ? 'collapsed' : null"
                   class="btn-block ml-auto btn-outline-primary"
                   @click="item.collapse = !item.collapse">
              <div class="float-left" size="small">{{ item.name }}</div>
              <div>
                <i class="ni ni-bold-down float-right mt-1"></i>
              </div>
            </b-btn>
            <!-- Using dishes -->
            <!-- Element to collapse -->
            <b-collapse :id="`collapse${item.id}`" v-model="item.collapse" class="">
              <b-card class="d-block">
                <ul v-for="dish in item.dishes" :key="dish.id" class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">{{ dish.name }}
                    <b-button v-b-tooltip.right.hover variant="outline-secondary" title="Image for dish">
                      <img v-lazy="`https://firsttraining.test/${dish.link_image}`" class="card-img">
                    </b-button>
                  </li>
                </ul>
                <b>{{ $t('menu.total_price') }}: <span class="text-success">{{ sum(item.dishes) }}</span> VND/{{ $t('menu.meal') }}</b>
              </b-card>
            </b-collapse>
          </div>
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
