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
                  {{ $t('wedding_service.title') }}
                </slot>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-components">
      <div class="container">
        <div v-for="item in items" :key="item.id" class="row mb-5">
          <div class="col-md-12 mb-5 mb-md-0">
            <div class="card card-lift--hover shadow border-0">
              <nuxt-link to="/" title="Tiệc cỗ bắt mắt">
                <img v-lazy="'https://firsttraining.test/'+item.link_image" class="card-img">
              </nuxt-link>
            </div>
            <div>
              <h1 class="text-center">{{ item.name }}</h1>
              <h2 class="text-center">{{ item.address }}</h2>
              <h2 class="text-center">{{ $t('wedding_service.number') }}: <span class="text-success">{{ item.min_people }} - {{ item.max_people }} </span> {{ $t('wedding_service.people') }}</h2>
              <h2 v-if="item.status.name === 'free'" class="text-center">{{ $t('wedding_service.status') }}: <span class="text-success"> {{ $t('wedding_service.free') }} </span></h2>
              <h2 v-else class="text-center">{{ $t('wedding_service.status') }}: <span class="text-warning"> {{ $t('wedding_service.booking') }} </span></h2>
            </div>
          </div>
        </div>
        <nav aria-label="Page navigation example">
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
        </nav>
      </div>
    </section>
    <!-- <carousel></carousel>
    <download-section></download-section>-->
  </div>
</template>
<script>
import HeroWeddingService from '~/components/argon-demo/HeroWeddingService'
import Carousel from '~/components/argon-demo/Carousel'
import Examples from '~/components/argon-demo/Examples'
import DownloadSection from '~/components/argon-demo/DownloadSection'
import Paginate from '~/components/argon-demo/Paginate'
import axios from '~/plugins/axios'

export default {
  name: 'wedding-service',
  layout: 'other',
  components: {
    HeroWeddingService,
    Carousel,
    Examples,
    DownloadSection,
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
  created() {
    this.clickCallback(1)
  },
  methods: {
    clickCallback(page) {
			axios.get('locations?page=' + page)
				.then(response => {
          this.lastPage = response.data.result.last_page
					this.items = response.data.result.data;
				})
		}
  }
}
</script>
<style>
</style>
