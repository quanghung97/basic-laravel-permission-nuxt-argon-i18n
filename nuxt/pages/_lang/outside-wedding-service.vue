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
                  Trung tâm tổ chức sự kiện Argon được thiết kế theo các phong cách:
                  sang trọng, hiện đại, tinh tế kết hợp cùng với các không gian phòng tiệc, phòng hội nghị -
                  hội thảo đa dạng, phục vụ từ 100 khách đến 1500 khách, phù hợp với nhiều loại sự kiện khác nhau,
                  tiêu chuẩn đẳng cấp cùng chất lượng dịch vụ chuyên nghiệp.
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
                <img v-lazy="item.linkImage" class="card-img">
              </nuxt-link>
            </div>
            <div>
              <h1 class="text-center">{{ item.name }}</h1>
              <h2 class="text-center">{{ item.address }}</h2>
              <h2 class="text-center">{{ item.range }}</h2>
            </div>
          </div>
        </div>
        <nav aria-label="Page navigation example">
          <paginate
            :page-count="20"
            :click-handler="functionName"
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
      items: [
        {
          linkImage: '/argon/img/theme/slider1.jpg',
          name: 'name',
          address: 'address',
          range: 'range'
        },
        {
          linkImage: '/argon/img/theme/slider1.jpg',
          name: 'name',
          address: 'address',
          range: 'range'
        },
        {
          linkImage: '/argon/img/theme/slider1.jpg',
          name: 'name',
          address: 'address',
          range: 'range'
        },
        {
          linkImage: '/argon/img/theme/slider1.jpg',
          name: 'name',
          address: 'address',
          range: 'range'
        }
      ]
    }
  },
  computed: {
  },
  watch: {
  },
  methods: {
  }
}
</script>
<style>
</style>
